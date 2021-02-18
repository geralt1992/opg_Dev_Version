<?php

namespace App;

use App\gallery;
use App\user;
use App\firm;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{

    
   public function firm(){
    return $this->belongsTo('App\firm');
  }


    
    public function save_new_product($request){


        $auth_user_id = auth::id();
        $auth_user_opg = DB::table('firms')->where('user_id' , '=' , $auth_user_id)->first();
        $auth_user_opg_id = $auth_user_opg->id;

        $validator = Validator::make($request->all(), 
        [  
            'name_product' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'), // let whitespaces, alpha, numeric, and null value!
            'categori' => array('required'),
            'subcategori' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
            'price' => array('integer', 'required'),
            'messurment' => array('required'),
            'product_desc' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'),
            'product_picture' => array('mimes:jpeg,jpg,png,gif', 'required' , 'max:2048'),
            
        ]);
    
        if($validator->fails()){
        return redirect()->route('show_user_products')->withInput()->withErrors($validator);
        }


        if($request->hasFile('product_picture')){
            $filename = time(). '.' .$request->name_product. '_' . $auth_user_opg->firm_name . '.' .$request->product_picture->getClientOriginalExtension();
            request()->product_picture->move(public_path('/avatars/products_avatars') , $filename);
        }
        

        $new_product = new product;
        $new_product->firm_id = $auth_user_opg_id;
        $new_product->product_name = $request->name_product;
        $new_product->product_desc = $request->product_desc;
        $new_product->product_price = $request->price;
        $new_product->product_measure = $request->messurment;
        $new_product->product_category_owner = $request->subcategori;
        $new_product->product_category_app = $request->categori;
        $new_product->product_avatar = $filename;
        $new_product->save();

    }
}
