<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    function createNewTask(Request $request)
    {
        /**
         * Validate Input
         * uensure all fileds are filled
         * */
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'isComplete' => 'required'
        ]);

        /**
         * Create Task using the Task Model Class
         */
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'isComplete' => $request->isComplete
        ]);
        // retreive from the db
        $task = Task::find($task->id);
        // check if it exists
        if ($task) {
            return response([
                'message' => 'success',
                'task' => $task
            ]);
        } else {
            return response([
                'message' => 'success',
                'task' => 'not created'
            ]);
        }
    }

    // read all tasks
    function readAllTasks()
    {
        /// no need of validation 
        $tasks = Task::all();
        // check whether the tasks exists or not
        if ($tasks) {
            return response([
                'message' => 'Success',
                'tasks' => $tasks
            ]);
        } else {
            return response([
                'message' => 'success',
                'tasks' => 'no tasks available'
            ]);
        }
    }

    // read only one task
    function readOneTask(Request $request)
    {
        // validation
        $request->validate([
            'id' => 'required'
        ]);

        // retreive the target task
        $task = Task::find($request->id);

        // return a response , might be empty
        if ($task) {
            return response([
                'message' => 'success',
                'task' => $task
            ]);
        } else {
            return response([
                'message' => 'success',
                'task' => 'task does not exist'
            ]);
        }
    }

    // updating of the records in the database 
    function updateTask(Request $request)
    {
        // validation
        $request->validate([
            'id' => 'required'
        ]);

        // retreive task from DB
        $task = Task::find($request->id);

        if ($task) {
            // update a section
            $task->isComplete = true;
            $task->save();

            // retreive the uodate record from the DB
            $task = Task::find($request->id);

            //give response
            return response([
                'message' => 'success',
                'updatedTask' => $task
            ]);
        }
        else{
            return response([
                'message'=>'success',
                'clientMessage'=>'task does not exist'
            ]);
        }
    }
}
