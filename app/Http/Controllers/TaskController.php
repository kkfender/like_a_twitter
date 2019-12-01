<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use Domain\CustomValidator;


class TaskController extends Controller
{
    function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks]);
    }

    function create(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
    function delete(Task $task)
    {
        $task->delete();

        return redirect('/');
    }
}
