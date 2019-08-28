<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTaskForm() 
    {
        $this->authorize('create', Task::class);
        return view('dashboard.task.create');
    }

    public function create(Request $request)
    {
        $this->authorize('create', Task::class);

        $data = request()->validate([
            'device' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000']
        ]);

        // status 0 - waiting in line 
        // status 1 - examining 
        // status 2 - waiting for parts 
        // status 3 - being fixed
        // status 10 - done 
        
        $task = Task::create([
            'id' => sprintf('%09d', mt_rand(1000, 999999999)),
            'device' => $data['device'],
            'description' => $data['description'],
            'status' => 0
        ]);

    }

    public function index()
    {
        $tasks = Task::all();

        return view('dashboard.task.index', compact('tasks'));
    }
}
