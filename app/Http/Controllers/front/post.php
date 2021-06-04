<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class post extends Controller
{
    function home(){
        $data['result']=DB::table('posts')->orderby('id','desc')->get();
        return view('front.home', $data);
    }
    function post($id){
        $data['result']=DB::table('posts')->where('slug', $id)->get();
        return view('front.post', $data);
    }
    public static function page_menu(){
        $result=DB::table('pages')->where('status','1')->get();
        return $result;
    }
    function page($id){
        $data['result']=DB::table('pages')->where('slug', $id)->get();
        return view('front.page', $data);
    }
    function sent_msg(Request $request){
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+/u|max:200',
            'email'=>'required|email',
            'mobile'=>'required|numeric|min:10',
            'message'=>'required|min:20',
           
         
        ]);
        $data=array(
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'message'=>$request->input('message'),
            
        );
        DB::table('contacts')->insert($data);
        $request->session()->flash('msg','Message Sent');
        return redirect('contact');
    }
}
