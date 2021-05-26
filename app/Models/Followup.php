<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'remark',
        'status',
        'follow_up_date',
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }
}
