<?php

namespace App;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;

use DB;
use App\Mail\Cuspajz_Hr_Novi_Sadrzaj_Na_Blogu;

use App\Jobs\send_blog_mails_with_delay;
use Carbon\Carbon;



class blog extends Model
{

    public function save_blog($request){

        $validator = Validator::make($request->all(), 
        [ 'avatar' => 'image' , 'mimes:jpeg,png,jpg,svg' , 'max:2048']);

        if($validator->fails()){
            return redirect()->route('show_blog_save')->withInput()->withErrors($validator);
        }

        if($request->hasFile('avatar')){
            $filename = time(). '.' . $request->blog_title . '_gallery' . '.'  .$request->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('/avatars') , $filename);
        }
    
        $new_blog_entery = new blog;
        $new_blog_entery->auth_personals_info = $request->author_info;
        $new_blog_entery->blog_title = $request->blog_title; 
        $new_blog_entery->blog_content = $request->content;
        $new_blog_entery->blog_avatar = $filename;
        $new_blog_entery->save();
        



            $blog_title = $request->blog_title;
            $users = DB::table('users')->select('users.email')->get();
            $start = Carbon::now();

           
        foreach($users as $user){
        try {
            $job = new send_blog_mails_with_delay($user , $blog_title);
            $job->delay($start->addSeconds(2));
            dispatch($job);
            //sleep(2); --> zanimljiva php inbuilt funkcija, odgoi na koliko sekundi trebaš odgodu po loopu, napravi i odmori 2 sec, npr.
       
       }catch(\Exception $e){
        continue;
       }
    }
    
    
   

    }
}
