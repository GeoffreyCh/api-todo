<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todos;
use App\Http\Controllers\Controller;

class todosController extends Controller
{

    public function list()
    {
        $todos = Todos::all();

        return response()->json($todos);
    }


    public function saveTodo(Request $request)
    {
        $texte = $request->input('texte');

        if($texte){
            $todo = new Todos();
            $todo->texte = $texte;
            $todo->termine = 0;
            $todo->save();
            return response()->json("success");
        } else {
            return response()->json("error");
        }
    }


    public function markAsDone($id)
    {
        $todo  = Todos::find($id);

        if($todo){
            $todo->termine = 1;
            $todo->save();
            return response()->json("success");
        } else {
            return response()->json("error");
        }
    }


    public function deleteTodo($id)
    {
        $todo  = Todos::find($id);

        if($todo && $todo->termine){
            $todo->delete();
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
}
