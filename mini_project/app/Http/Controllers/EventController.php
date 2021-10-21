<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    //
    function index(){
        $event= Event::all();
        return view('planned')->with('event',$event);
    }

    function back(){
        return view('place');
    }

    function update(Request $req){
        $id= $req->input('id');

        $event= Event::find($id);

        $event->name= $req->name;
        $event->date= $req->date;
        $event->description= $req->description;

        $event->save();

        $event= Event::all();
        return view('planned')->with('event',$event);
    }

    function store(Request $req){
       
        $event= new Event;
        $event->name= $req->input('name');
        $event->date= $req->input('date');
        $event->description= $req->input('description');

        $event->save();

        return view('place');

    }

    function delete(Request $req){

        $id= $req->input('id');

        $event= Event::find($id);

        $event->delete();

        $event= Event::all();
        return view('planned')->with('event',$event);
    }
}
