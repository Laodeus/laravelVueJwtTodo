<?php

namespace App\Http\Controllers;

use App\ToDo;
use Illuminate\Http\Request;
use App\Http\Ressources\Collection;

class ToDoController extends Controller
{
    public function index($idUserName){
        return new Collection(ToDo::where("idUsername", $idUserName)->get());
    }
}