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
 * uensure all fileds are filled
 * */
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
        'title'=>$request->title,
        'description'=>$request->description,
        'deadline'=>$request->deadline,
        'isComplete'=>$request->isComplete        
    ]);
    // retreive from the db
    $task = Task::find($task->id);
// check if it exists
    if($task){
        return response([
            'message'=>'success',
            'task'=> $task
        ]);
    }else{
        return response([
            'message'=>'success',
            'task'=> 'not created'
        ]);
    }
    // response to user


    }
}
