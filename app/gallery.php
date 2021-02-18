<?php

namespace App;

use App\user;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public function save_gallery_images($request){

        
        $auth_user_id = auth::id();
        $auth_user_opg = DB::table('firms')->where('user_id' , '=' , $auth_user_id)->first();
        $auth_user_opg_id = $auth_user_opg->id;

        
        $validator = Validator::make($request->all(), 
        [ 'opg_gallery' => 'image' , 'mimes:jpeg,png,jpg,svg' , 'max:2048' ]);

        if($validator->fails()){
            return redirect()->route('show_user_opg_images')->withInput()->withErrors($validator);
        }

        if($request->hasFile('opg_gallery')){
            $filename = time(). '.' . $auth_user_opg->firm_name . '_gallery' . '.'  .$request->opg_gallery->getClientOriginalExtension();
            request()->opg_gallery->move(public_path('/avatars/galleries_avatars') , $filename);
        }

    
        $new_gallery_entery = new gallery;
        $new_gallery_entery->firm_id = $auth_user_opg_id;
        $new_gallery_entery->gallerie_avatar = $filename;
        $new_gallery_entery->save();


    }



}
