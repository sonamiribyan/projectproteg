<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
class ProjectController extends Controller
{
   public function store(Request $request)
   {
    $validated=$request->validate([
        'title'=>'required',
        'description'=>'required',
        'minDescription'=>'required',
        'img'=>'required|image',
        'price'=>'required|integer',
        'video'=>'required|mimetypes:video/mp4',
    ]);
    $path=$request->file('img')->store('uploads','public');
    $video=$request->file('video')->store('uploads','public');
    $example= project::create([
      'title'=>$validated['title'],
      'description'=>$validated['description'],
      'image'=>$path,
      'video'=>$video,
      'minDescription'=>$validated['minDescription'],
      'price'=>$validated['price'],
     ]);
     return redirect()->route('project');
    }
public function delete($id)
{
$proj=project::findOrFail($id);
$proj->delete();
return redirect('admin/project');
}
public function update($id)
{
$proj=project::findOrFail($id);
return view('admin.home.projectUpdate',[
    "proj"=>$proj
]);
}
public function restore(Request $request,$id)
{
$proj=project::findOrFail($id);
$validated=$request->validate([
    'title'=>'required',
    'description'=>'required',
    'minDescription'=>'required',
    'img'=>'required|image',
    'price'=>'required|integer',
    'video'=>'required|mimetypes:video/mp4',

]);

$path=$request->file('img')->store('uploads','public');
$video=$request->file('video')->store('uploads','public');
$proj->title=$validated['title'];
$proj->image=$path;
$proj->video=$video;
$proj->price=$validated['price'];
$proj->description=$validated['description'];
$proj->minDescription=$validated['minDescription'];
$proj->save();
return redirect()->route('project');
}
      }
