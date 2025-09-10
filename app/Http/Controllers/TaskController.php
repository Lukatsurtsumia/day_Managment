<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
   public function index(){
    $tasks = Task::where('user_id', auth()->user()->id)->get();
    return view('tasks', compact('tasks'));
   }
   public function create(Request $request){
        $request->validate([
            'time'=>'required',
            'title'=>'required',
            'description'=>'nullable',
        ]);
        
        auth()->user()->tasks()->create([
            'time'=>$request->time,
            'title'=> $request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('tasks');

   }
   public function deleteTask($id){
    $task = Task::find($id);
    if($task && $task->user_id == auth()->user()->id){
        $task->delete();
        return redirect()->route('tasks');
    }
   }
   public function markAsDone(Task $task){
    if($task && $task->user_id =auth()->user()->id){
        $task->update(['status'=>'done']);
        return redirect()->route('tasks');
    }
    else{
        return redirect()->back()->withErrors(['Task not found']);
    }
}
   
}
