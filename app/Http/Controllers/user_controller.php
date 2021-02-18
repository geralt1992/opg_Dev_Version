<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use File;
class user_controller extends Controller
{

    public function show_user_profile(){
      
        $user_id = auth::id();
        $user_profile = DB::table('users')->where('id' , '=' , $user_id)->get();
        
        return view('user.show_user_profile')->with('user_profile' , $user_profile);
    }





    public function update_user_info(Request $request)
    {

             
        $validator = Validator::make($request->all(), 
        [  
            'name' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'), // let whitespaces, alpha, numeric, and null value!
            'surname' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
            'old_password' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
            'new_password' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
            'email' => array('required'),
            'profile_avatar' => array('mimes:jpeg,jpg,png,gif', 'required' , 'max:2048'),
            
        ]);
    
        if($validator->fails()){
        return redirect()->route('show_user_profile')->withInput()->withErrors($validator);
        }
       
        $user = user::find(auth()->user()->id);

        if(Hash::check($request->old_password , $user->password)){

        $path_to_old_picture_to_delete = public_path('/avatars/user_avatars' . '/' .  $user->avatar);
            if (File::exists($path_to_old_picture_to_delete)) {
                unlink($path_to_old_picture_to_delete);
        }
    
            
        if($request->hasFile('profile_avatar')){ 
        $filename = $user->avatar. '.' .$request->profile_avatar->getClientOriginalExtension();
        request()->profile_avatar->move(public_path('/avatars/user_avatars') , $filename);
        }

        $user->id = $user->id;
        $user->is_owner = $user->is_owner;
        $user->username = $user->username;

        $user->avatar = $filename;    

        $user->name = $request->name;
        $user->last_name = $request->surname; 
        $user->email = $request->email;
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('show_user_profile')->with('success' , 'Podatci uspješno promijenjeni!');
        }else{

        return redirect()->route('show_user_profile')->withInput()->withErrors('Nešto je pošlo po krivu, provjeri unesene podatke!');
        }

    }



    public function show_delete_form(){
        return view('user.delete_user_acc');
    }


    public function delete_user(Request $request)
    {
        $this->validate($request, [
            'password'     => 'required', 'alpha_num',
        ]);

      
        $data = $request->all();
        $user = user::find(auth()->user()->id);
    
    if(Hash::check($data['password'] , $user->password)){

        $user_id = auth::id();

        //profilna slika - brisanje
        $path_profile_picture_to_delete = public_path('/avatars/user_avatars' . '/' .  $user->avatar);
   
        if(!is_dir($path_profile_picture_to_delete)){
        if (File::exists($path_profile_picture_to_delete)) {
        unlink($path_profile_picture_to_delete);
        }
        }

        

        //ako je vlasnik opga
        if($user->is_owner === 'Vlasnik'){


            //slike od proizvoda - briši
                $product_pictures_to_delete = DB::table('users')
                ->join('firms', 'firms.user_id', '=', 'users.id')
                ->join('products', 'firms.id', '=', 'products.firm_id')
                ->select('products.product_avatar')
                ->where('users.id' , $user_id)
                ->get();


                if(!empty($product_pictures_to_delete)){
                foreach($product_pictures_to_delete as $one_picturee){

                $path_to_prodcut_picture_to_delete = public_path('/avatars/products_avatars' . '/' .  $one_picturee->product_avatar);

                if (File::exists($path_to_prodcut_picture_to_delete)) {
                unlink($path_to_prodcut_picture_to_delete);
                }
                }
                }
                                
                           
            //slike iz galerije - briši
                $gallery_pictures_to_delete = DB::table('users')
                ->join('firms', 'firms.user_id', '=', 'users.id')
                ->join('galleries', 'firms.id', '=', 'galleries.firm_id')
                ->select('galleries.gallerie_avatar')
                ->where('users.id' , $user_id)
                ->get();

                if(!empty($gallery_pictures_to_delete)){
                foreach($gallery_pictures_to_delete as $one_picture){

                $path_to_gallery_picture_to_delete = public_path('/avatars/galleries_avatars' . '/' .  $one_picture->gallerie_avatar);
                if (File::exists($path_to_gallery_picture_to_delete)) {
                unlink($path_to_gallery_picture_to_delete);
                }
                }
                }


            //profilnu sliku od OPG-a - briši
                $firm_pictures_to_delete = DB::table('users')
                ->join('firms', 'firms.user_id', '=', 'users.id')
                ->select('firms.avatar as opg_avatar')
                ->where('users.id' , $user_id)
                ->first();

                if(!empty($firm_pictures_to_delete)){
                $path_to_opg_profile_picture_to_delete = public_path('/avatars/firms_avatars' . '/' .  $firm_pictures_to_delete->opg_avatar);
                if (File::exists($path_to_opg_profile_picture_to_delete)) {
                unlink($path_to_opg_profile_picture_to_delete);
                }
                }

        }

        $user_to_delete = auth::user();
        $user_to_delete->delete();
        return redirect()->route('show_main_page')->with('successs' , 'Uspješno ste obrisali profil');
    }
    else{
        return  redirect()->route('delete_user_profile')->withInput()->withErrors('Lozinka se ne podudara');
       
    }
}



    public function show_user_opg_favourite(){

        $user_id = auth::id();

        $user_favourites_opg = DB::table('favourites')
        ->join('users', 'users.id', '=', 'favourites.user_id')
        ->join('firms', 'firms.id', '=', 'favourites.firm_id')
        ->where('favourites.user_id' , $user_id)->get();

        return view('user.show_user_opg_favourites')->with('user_favourites_opg' , $user_favourites_opg);
    }


    


    public function show_user_products_favourite(){
        
        $user_id = auth::id();

        $user_favourites_products = DB::table('product_favourites')
        ->join('users', 'users.id', '=', 'product_favourites.user_id')
        ->join('products', 'products.id', '=', 'product_favourites.product_id')
        ->where('product_favourites.user_id' , $user_id)->get();

        
        return view('user.show_user_products_favourite')->with('user_favourites_products' , $user_favourites_products);
    }


    }
