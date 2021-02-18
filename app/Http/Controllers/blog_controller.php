<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class blog_controller extends Controller
{

    public function show_blog($id){

        $blog = blog::where('id' , $id)->first();
        $all_blogs_sidebar = DB::table('blogs')->orderBy('created_at', 'DESC')->get()->take(10);

        return view('blog.blog')->with('blog' , $blog)->with('blog_sidebar' , $all_blogs_sidebar);
    }


    public function show_blog_all(){

        $all_blogs = DB::table('blogs')->orderBy('created_at', 'DESC')->get();

        return view('blog.blog_all')->with('blogs' , $all_blogs);
    }

    
//---------------------------------PRIVATE - ADMIN-----------------------------------------------------------------

    public function show_blog_save(){
        return view('blog.save_new_blog_entery');
    }

    
    public function save_new_blog(Request $request){
    
        $new_gallery_entery = new blog;
        $new_gallery_entery->save_blog($request);



        return redirect()->route('show_blog_save')->with('success' , 'Podatci uspješno spremljeni!');
    }

}
