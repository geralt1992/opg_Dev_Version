<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;
use App\user;

use Validator;
use Response;

use File;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class product_controller extends Controller
{


    public function save_new_user_products(Request $request){
        
        $new_product = new product;
        $new_product->save_new_product($request);

        return redirect()->route('show_user_products')->with('success' , 'Proizvod uspješno spremljen!');;

    }


//----------------SOLD / ACTIVE
    public function  product_is_sold($id){

        $product = product::find($id);
        $product->sold = 1;
        $product->save();

        return redirect()->route('show_user_products')->with('success' , 'Podatci uspješno izmijenjeni!');

    }

    public function  product_is_active($id){

        $product = product::find($id);
        $product->sold = 0;
        $product->save();

        return redirect()->route('show_user_products')->with('success' , 'Podatci uspješno izmijenjeni!');

    }

//----------------

    public function show_user_products(){

        $user_id = auth::id();
        $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();

    if($check_if_auth_user_have_firm != 0){
        $auth_user_id = auth::id();
        $auth_user_opg = DB::table('firms')->where('user_id' , '=' , $auth_user_id)->first();
        $auth_user_opg_id = $auth_user_opg->id;
        $auth_user_opg_name = $auth_user_opg->firm_name;
        $user_opg_products = DB::table('products')->where('firm_id' , '=' , $auth_user_opg_id)->get();

      
        return view('user.show_user_products')->with('user_opg_products' , $user_opg_products)->with('user_opg_name' , $auth_user_opg_name);
    }
    
    else{
        $create_ur_firm = 1;
        return view('user.show_user_opg')->with('create_ur_firm' , $create_ur_firm);
    }
    }
   


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//AJAX WORKING EXAMPLE! 
    public function post(Request $request){
        $response = array(
            'status' => 'success',
            'msg' => $request->message,
        );
        return response()->json($response); 
     }
  

     public function help_me(){
        return view('NEW_PAGE');
    }


    public function work(){
        
    $user_id = auth::id();
    $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();

    if($check_if_auth_user_have_firm != 0){
        $auth_user_id = auth::id();


    $are_my_products_favourited = DB::table('firms')
        ->join('products' , 'products.firm_id' , '=' , 'firms.id')
        ->join('product_favourites' , 'product_favourites.product_id' , '=' , 'products.id')
        ->where('firms.user_id' , '=' , $auth_user_id)
        ->select('product_favourites.product_id' , 'products.product_name' , 'products.product_avatar' , 'products.product_category_app' , 
        'products.product_measure' , 'products.product_price' , 'products.product_category_owner' , 'products.sold' , 'firms.firm_name' , 
        DB::raw("(SELECT count(product_favourites.product_id)   ) as put_in_favourites"))
        ->groupBy('products.product_name')
        ->get();

    }
/*
    return view('user.show_user_products')->with('are_my_products_favourited' , $are_my_products_favourited);
        }
    
    else{
        $create_ur_firm = 1;
        return view('user.show_user_opg')->with('create_ur_firm' , $create_ur_firm);
    }
*/

$are_my_products_favourited->toArray();


return response()->json($are_my_products_favourited); 



    
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function are_my_products_favourited(){

    $user_id = auth::id();
    $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();

    if($check_if_auth_user_have_firm != 0){
        $auth_user_id = auth::id();


    $are_my_products_favourited = DB::table('firms')
        ->join('products' , 'products.firm_id' , '=' , 'firms.id')
        ->join('product_favourites' , 'product_favourites.product_id' , '=' , 'products.id')
        ->where('firms.user_id' , '=' , $auth_user_id)
        ->select('product_favourites.product_id' , 'products.product_name' , 'products.product_avatar' , 'products.product_category_app' , 
        'products.product_measure' , 'products.product_price' , 'products.product_category_owner' , 'products.sold' , 'firms.firm_name' , 
        DB::raw("(SELECT count(product_favourites.product_id)   ) as put_in_favourites"))
        ->groupBy('products.product_name')
        ->get();

    

    return view('user.show_user_products')->with('are_my_products_favourited' , $are_my_products_favourited);
        }
    
    else{
        $create_ur_firm = 1;
        return view('user.show_user_opg')->with('create_ur_firm' , $create_ur_firm);
    }

}



    public function delete_user_products($id){

        $product_to_delete = product::find($id);

        $path = public_path('/avatars/products_avatars' . '/' .  $product_to_delete->product_avatar);

        if (File::exists($path)) {
            unlink($path);
        }

        $product_to_delete->delete();

        return redirect()->route('show_user_products')->with('success' , 'Podatci uspješno uklonjeni!');

    }


    public function search_product_categorie($categorie){

    $user_id = auth::id();
    $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();

    if($check_if_auth_user_have_firm != 0){

        $auth_user_id = auth::id();
        $auth_user_opg = DB::table('firms')->where('user_id' , '=' , $auth_user_id)->first();
        $auth_user_opg_id = $auth_user_opg->id;
        $user_opg_products = DB::table('products')->where('firm_id' , '=' , $auth_user_opg_id)->get();

        $user_opg_product_categorie_i_want = $user_opg_products->where('product_category_app' , '=' , $categorie);

        $auth_user_opg_name = $auth_user_opg->firm_name;
    return view('user.show_user_products')->with('my_categorie' , $user_opg_product_categorie_i_want)->with('user_opg_name_categorie' , $auth_user_opg_name);
    }

    else{
        $create_ur_firm = 1;
    return view('user.show_user_opg')->with('create_ur_firm' , $create_ur_firm);
    }
    }


//---------------PRIKAZ POJEDINAČNOG PROIZVODA - MAIN!

    public function show_product($id){

        $find_product = product::find($id);
        $find_product_opg = DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id' )->where('products.id' , $id)->first();
        $random_related_products = product::all()->random(3); 
        

        $user_id = auth::id();

        $show_fav_buttton = 0;
        $show_remove_fav_button = 1;

        $favourite_check =  DB::table('product_favourites')->where('user_id' , '=' , $user_id)->where('product_id' , '=' , $id)->first();
        
        $how_much_time_is_fav = DB::table('product_favourites')->where('product_id' , '=' , $id)->count();


        if(!$favourite_check){
            return view('product') 
            ->with('my_product' , $find_product)
            ->with('my_products_opg' , $find_product_opg)
            ->with('related_products' , $random_related_products)
            ->with('favourite_check_show_fav_button' ,  $show_fav_buttton)
            ->with('how_much_time_is_fav' ,  $how_much_time_is_fav);

        }else{
            return view('product')  
            ->with('my_product' , $find_product)
            ->with('my_products_opg' , $find_product_opg)
            ->with('related_products' , $random_related_products)
            ->with('favourite_check_show_remove_button' , $show_remove_fav_button )
            ->with('how_much_time_is_fav' ,  $how_much_time_is_fav);
        }
    }
    
    }