<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Resources\Collection;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($idTodo){
        return new Collection(Task::where("idTodo", $idTodo)->get());
    }
    public function store(Request $request)
    {
        $task = new Task([
            'idTodo' => $request->get('idTodo'),
            'title' => $request->get('title'),
            'status' => $request->get('status')
        ]);

        $task->save();
        return response()->json('sucess');
    }
    
    public function update($id, Request $request)
    {
      $task = Task::find($id);

      $task->update($request->all());

      return response()->json('successfully updated');
    }
    public function delete($id)
    {
      $task = Task::find($id);

      $task->delete();

      return response()->json('successfully deleted');
    }
}