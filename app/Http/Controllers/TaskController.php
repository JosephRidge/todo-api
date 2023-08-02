<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    function createNewTask(Request $request){
/**
 * Validate Input
 * using validate()
 * to ensure the values are al provided
 */
    $request->validate([
        'title'=>'required',
        'description'=>'required',
        'deadline'=>'required',
        'isComplete'=>'required'
    ]);

    /**
     * Create Task using the Task Model Class
     */
    $task = Task::create([
        
    ]);


    }
}
