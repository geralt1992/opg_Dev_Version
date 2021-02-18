<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\firm;
use\App\favourite;
use\App\product_favourite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class favourite_controller extends Controller
{
    
    public function save_firm_favourite($firm_id){
        
        $user_id = auth::id();

            $save_favourite = new favourite;
            $save_favourite->user_id = $user_id;
            $save_favourite->firm_id = $firm_id;
            $save_favourite->save();
    
            return redirect()->back()->with('success' , 'Uspješno spremljeno u favorite');
            

    }

    public function remove_firm_favourite($firm_id){
        
        $remove_from_favourites = favourite::where('firm_id' , $firm_id);
        $remove_from_favourites->delete();

        return redirect()->back()->with('success' , 'Uspješno uklonjeno iz favorita');
        
    }



    public function save_product_favourite($product_id){
        
        $user_id = auth::id();

        $products_origin_firm = DB::table('products')->join('firms' , 'firms.id' , '=' , 'products.firm_id')->where('products.id' , $product_id)->first();

        $save_favourite = new product_favourite;
        $save_favourite->user_id = $user_id;
        $save_favourite->product_id = $product_id;
        $save_favourite->firm_id = $products_origin_firm->firm_id;
        $save_favourite->save();

        return redirect()->back()->with('success' , 'Uspješno spremljeno u favorite');

    }

    public function remove_product_favourite($product_id){
        $auth_user_id = auth::id();
        $remove_from_favourites = product_favourite::where('product_id' , $product_id)->where('user_id' , $auth_user_id);
        $remove_from_favourites->delete();

        return redirect()->back()->with('success' , 'Uspješno uklonjeno iz favorita');
        
    }

}
