<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createUserManager()
    {
        $this->authorize('createUserWorker', User::class);

        return view('test');
    }

    /**
     * position 1 -> manager
     * position 2 -> worker
     *
     * @param Request $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        
        $this->authorize('create', $user);

        //check if user can create managers
        if (($request['position'] == 1 && !$user->can('create user manager'))) {
            abort(403);
        }

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' => ['required'],
        ]);

        $createdUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $data['position'] == 1 ? $createdUser->assignRole('manager') : $createdUser->assignRole('worker');

        return redirect('home');
    }

    public function showRegistrationForm()
    {
        $this->authorize('createUserWorker', User::class);
        return view('user.create');
    }
}
