<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
    //show todos page
   public function index()
   {
       //Fetch todos from database
       $todos=Todo::orderBy('completed', 'asc')->get();


      return view('todos.index')->with('todos',$todos);
   }

   //Show single page
   public function show(Todo $todo)
   {


       return  view('todos.show')->with('todo',$todo);
   }

   public function create()
   {
       # return view form
       return view('todos.create');
   }

   public function store()
   {
       #validate incoming data
       $this->validate(request(),[
           'name'=>'required|min:3',
           'description'=>'required'
       ]);
       #get incoming data from client
       $data= request()->all();
       # store new todo to db

       $todo=new Todo();
       $todo->name=$data['name'];
       $todo->description=$data['description'];
       $todo->completed=false;
       $todo->save();

       session()->flash('success','Todo Created Successfully');
       return redirect('/todos');
   }

   public function edit(Todo $todo)
   {


       return view('todos.edit')->with('todo',$todo);
   }
   public function update(Todo $todo)
   {
       #validate incoming values
       $this->validate(request(),[
            'name'=>'required|min:3',
            'description'=>'min:10',

       ]);

       # get data from request
        $data= request()->all();


        $todo->name=$data['name'];
         $todo->description=$data['description'];

         $todo->save();

                session()->flash('success','Todo Updated Successfully');

         return redirect('/todos');
   }

   public function destroy(Todo $todo)
   {


      $todo->delete();

             session()->flash('success','Todo Deleted Successfully');

      return redirect('/todos');

   }

   public function updateCompleted(Todo $todo)
   {
       $todo->completed=true;
       $todo->save();
      session()->flash('success','Congratulations You Completed Your Task Successfully');

    return redirect('/todos');
   }
}
