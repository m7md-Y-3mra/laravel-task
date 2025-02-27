<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    public function create(){
        $name = $_POST['name'];
        DB::table('users')->insert(['name' => $name ]);
        return redirect()->back();
    
    }

    public function destroy($id) {
        DB::table('users')->where('id' , $id)->delete();
        return redirect()->back();
        
    }

    public function edit($id){
        $task = DB::table('users')->where('id' , $id)->first();
        $tasks = DB::table('users')->get();
        return view('users' , compact('user' , 'users'));
    }

    public function update(){
        $id = $_POST['id'];
        DB::table('users')->where('id', $id)->update(['name' => $_POST['name'] ]);
        return redirect('tasks');
    }
}
