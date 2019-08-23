<?php

namespace App\Http\Controllers;

use App\ToDo;
use App\Http\Resources\Collection;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index($idUserName){
        return new Collection(ToDo::where("idUsername", $idUserName)->get());
    }
    public function store(Request $request)
    {
        $todo = new ToDo([
            'idUsername' => $request->get('idUsername'),
            'title' => $request->get('title')
        ]);

        $todo->save();
        return response()->json('sucess');
    }
    public function edit($id)
    {
      $todo = Todo::find($id);
      return response()->json($todo);
    }
    public function update($id, Request $request)
    {
      $todo = Todo::find($id);

      $todo->update($request->all());

      return response()->json('successfully updated');
    }
    public function delete($id)
    {
      $todo = Todo::find($id);

      $todo->delete();

      return response()->json('successfully deleted');
    }
}