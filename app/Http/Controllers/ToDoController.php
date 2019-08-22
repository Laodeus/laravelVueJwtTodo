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
}