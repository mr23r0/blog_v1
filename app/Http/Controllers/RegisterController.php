<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function login_submit(Request $request){
        $email=$request->input('email');
        $pwd=$request->input('pwd');
       
        $result=DB::table('users')->where('email', $email) ->where('password', $pwd)->get();
        
        if(isset($result[0]->id)){
            if($result[0]->status==1){

                $request->session()->put('user_id',$result[0]->id);
                $request->session()->put('name',$result[0]->name);
                return redirect('admin/post/list');

            }else{
                $request->session()->flash('msg','Access Denied');
                return redirect('admin/login');
            }

        }else{
            $request->session()->flash('msg','Please Enter Valid details');
            return redirect('admin/login');
        }

 
     
    }
}
