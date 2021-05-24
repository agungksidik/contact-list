<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {       
        return view('task.table', [
            'tasks' => Task::paginate(10),
        ]);
    }
}
