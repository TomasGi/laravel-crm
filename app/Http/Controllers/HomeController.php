<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

//        $role = Role::create(['name' => 'admin']);
//        $permission = Permission::create(['name' => 'delete articles']);

//        $user->givePermissionTo('edit articles', 'delete articles');

//        $user->removeRole('writer');
//        $user->revokePermissionTo(['edit articles', 'delete articles']);

//        $role = Role::findByName('writer');
//        $role->givePermissionTo('delete articles');
//        $user->assignRole(['admin']);

        return view('home');
    }
}
