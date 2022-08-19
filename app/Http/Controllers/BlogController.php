<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
class BlogController extends Controller
{
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'minDescription'=>'required',
            'img'=>'required|image',
            'date'=>'required|date',
        ]);
        $path=$request->file('img')->store('uploads','public');
        $example= blog::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
            'image'=>$path,
            'minDescription'=>$validated['minDescription'],
            'date'=>$validated['date'],
           ]);
           return redirect()->route('blog');
    }
    public function delete($id)
    {
        $blog=blog::findOrFail($id);
        $blog->delete();
        return redirect('admin/blog');
    }
    public function update($id)
    {
        $blog=blog::findOrFail($id);
        return view('admin.home.blogUpdate',[
            'blog'=>$blog
        ]);
    }
    public function restore(Request $request,$id)
    {
        $blog=blog::findOrFail($id);
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'minDescription'=>'required',
            'img'=>'required|image',
            'date'=>'required|date',
        ]);
        
        $path=$request->file('img')->store('uploads','public');
        $blog->title=$validated['title'];
        $blog->image=$path;
        $blog->description=$validated['description'];
        $blog->minDescription=$validated['minDescription'];
        $blog->save();
        return redirect()->route('blog');
    }
}
