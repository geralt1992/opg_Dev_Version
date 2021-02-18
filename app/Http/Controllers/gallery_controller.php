<?php

namespace App\Http\Controllers;

use App\gallery;
use App\user;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use File;

class gallery_controller extends Controller
{
    public function show_user_opg_images(){

        $user_id = auth::id();
        $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();



        if($check_if_auth_user_have_firm != 0){
        $auth_user_id = auth::id();
        $auth_user_opg = DB::table('firms')->where('user_id' , '=' , $auth_user_id)->first();
        $auth_user_opg_id = $auth_user_opg->id;

        $user_opg_gallery = DB::table('galleries')->where('firm_id' , '=' , $auth_user_opg_id)->get();

        return view('user.show_user_opg_images')->with('user_opg_gallery' , $user_opg_gallery);
        }else{
            $create_ur_firm = 1;
            return view('user.show_user_opg_images')->with('create_ur_firm' , $create_ur_firm);
        }
    }




    public function save_user_opg_images(Request $request){
    
        $new_gallery_entery = new gallery;
        $new_gallery_entery->save_gallery_images($request);

        return redirect()->route('show_user_opg_images')->with('success' , 'Podatci uspješno spremljeni!');
    }




    public function delete_user_opg_images($id){
    
        $picture_to_delete = gallery::find($id);
        $path = public_path('/avatars/galleries_avatars' . '/' .  $picture_to_delete->gallerie_avatar);

        if (File::exists($path)) {
            unlink($path);
        }

        $picture_to_delete->delete();

        return redirect()->route('show_user_opg_images')->with('success' , 'Slika uspješno uklonjena!');
  }


}
