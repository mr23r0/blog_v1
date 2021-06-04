<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Post extends Controller
{
    function listing (){
        $data['result']=DB::table('posts')->orderby('id','desc')->get();
        return view('admin.post.list',$data);
    }
    function submit(Request $request){
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png' 
         
        ]);
        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('/public/img',$file);

        $data=array(
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'short_desc'=>$request->input('short_desc'),
            'long_desc'=>$request->input('long_desc'),
            'image'=>$file
        );
        DB::table('posts')->insert($data);
        $request->session()->flash('msg','Post Saved');
        return redirect('admin/post/list');
    }
    function delete (Request $request,$id){
      
       DB::table('posts')->where('id',$id)->delete();
       $request->session()->flash('msg','Post Deleted');
       return redirect('admin/post/list');
    }
    function edit (Request $request,$id){
        $data['result']=DB::table('posts')->where('id',$id)->get();
        return view('admin.post.edit',$data);
    }
    function update (Request $request){
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'mimes:jpg,jpeg,png' 
         
        ]);
        $data=array(
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'short_desc'=>$request->input('short_desc'),
            'long_desc'=>$request->input('long_desc')
        );
            if($request->hasfile('image')){
                $image=$request->file('image');
                $ext=$image->extension();
                $file=time().'.'.$ext;
                $image->storeAs('/public/img',$file);
                $data['image']=$file;
            }
        DB::table('posts')->where('id',$request->id)->update($data);
        $request->session()->flash('msg','Post Updated');
        return redirect('admin/post/list');
    }
}
