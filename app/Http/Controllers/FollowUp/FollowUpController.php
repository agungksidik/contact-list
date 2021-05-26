<?php

namespace App\Http\Controllers\FollowUp;

use App\Http\Controllers\Controller;
use App\Models\Followup;
use App\Models\Task;

class FollowUpController extends Controller
{
    public function index($id)
    {
        $data = Followup::where('task_id', $id)->orderBy('id', 'desc')->paginate(10);
        $task = Task::where('id', $id)->first();
        
        return view('followup.table', [
            'task' => $task,
            'followups' => $data
        ]);
    }

    public function store()
    {
        $task_id = request()->task_id;
        $attr = request()->validate([
            'task_id' => 'required',
            'remark' => 'required|min:3',            
            'status' => 'required|min:3',            
            'follow_up_date' => 'required|date_format:Y-m-d',            
        ]);        
        
        Followup::create($attr);
        
        return redirect('followup/' . $task_id)->with('success', 'The Follow up was created');
    }
}
