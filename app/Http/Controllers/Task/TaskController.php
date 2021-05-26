<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {        
        $id = Auth::user()->id;
        $user = User::find($id);
        if($user->hasRole('super admin'))
        {
            $tasks = Task::latest()->paginate(10);    
        } elseif ($user->hasRole('agen')) {
            $tasks = Task::where('user_id', $id)->latest()->paginate(10);
        }

        return view('task.table', compact('tasks'));
    }
   
}
