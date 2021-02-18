<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\product;


use File;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class firm extends Model
{


   public function create_new_firm($request){

    $my_id = Auth::id();

    $check_if_exist = DB::table('firms')->join('users' , 'firms.user_id' , '=' , 'users.id')->where('user_id' , $my_id)->count();
   

    if($check_if_exist != 0){
        return abort(404);
    }else{

        if($request->hasFile('opg_avatar')){ 
            
         $filename = time(). '.' .$request->firm_name. '.' .$request->opg_avatar->getClientOriginalExtension();
         request()->opg_avatar->move(public_path('/avatars/firms_avatars') , $filename);
     } 

        $new_firm = new firm;
       
        $new_firm->avatar =$filename;
        $new_firm->user_id = $request->user_id;
        $new_firm->firm_name = $request->firm_name;
        $new_firm->web_contact = $request->social_network;
        $new_firm->address = $request->adress;
        $new_firm->zupanija = $request->opg_zupanija;
        $new_firm->owner_name = $request->owner;
        $new_firm->firm_description = $request->what_we_do;

        $new_firm->save();
   }

    }
        
 


   public function update_firm($request , $id){

    $validator = Validator::make($request->all(), 
    [  
        'opg_name' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required' ), // let whitespaces, alpha, numeric, and null value!
        'owner' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
        'opg_zupanija' => array('required'),
        'adress' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
        'social_network' =>array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
        'what_we_do' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
        'opg_avatar' => array('mimes:jpeg,jpg,png,gif', 'required' , 'max:2048'),
        
    ]);

    if($validator->fails()){
    return redirect()->route('show_user_opg')->withInput()->withErrors($validator);
    }


    $firm_entery =  firm::find($id);
    
    $path_to_old_opg_to_delete = public_path('/avatars/firms_avatars' . '/' .  $firm_entery->avatar);
    if (File::exists($path_to_old_opg_to_delete)) {
        unlink($path_to_old_opg_to_delete);
    }

      if($request->hasFile('opg_avatar')){ 
         
         $filename = time(). '.' .$request->opg_name. '.' .$request->opg_avatar->getClientOriginalExtension();
         request()->opg_avatar->move(public_path('/avatars/firms_avatars') , $filename);
     } 

        
        $firm_entery->avatar =$filename;
        $firm_entery->user_id = $request->user_id;
        $firm_entery->firm_name = $request->opg_name;
        $firm_entery->web_contact = $request->social_network;
        $firm_entery->address = $request->adress;
        $firm_entery->zupanija = $request->opg_zupanija;
        $firm_entery->owner_name = $request->owner;
        $firm_entery->firm_description = $request->what_we_do;

        $firm_entery->save();
   }
}
