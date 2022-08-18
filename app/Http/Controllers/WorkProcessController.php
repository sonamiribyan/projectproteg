<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\workProcess;
class WorkProcessController extends Controller
{
    public function index(){
        $workProcess=workProcess::all();
        return view('admin.home.WorkProcess',[
            'workProcess'=>$workProcess
        ]);
    }
    public function create()
    {
       return view('admin.home.workCreate');
    }
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'img'=>'required|image',
        ]);
       $path=$request->file('img')->store('uploads','public');
       workProcess ::create([
        'title'=>$validated['title'],
        'description'=>$validated['description'],
        'img_url'=>$path
       ]);
       $workProcess=workProcess::all();
          return redirect()->route('workProcess',[
        'workProcess'=>$workProcess
          ]);
    }
    public function update($id)
    {
        $work=workProcess::findOrFail($id);
        return view('admin.home.workUpdate',[
            'work'=>$work
        ]);

    }
    public function restore(Request $request,$id)
    {
        
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'img'=>'required|image',
        ]);

       $path=$request->file('img')->store('uploads','public');
     $workProcess=workProcess::findOrFail($id);
    $workProcess->title=$validated['title'];
    $workProcess->img_url=$path;
    $workProcess->description=$validated['description'];
    $workProcess->save();
    return redirect()->route('workProcess');
    }
}
