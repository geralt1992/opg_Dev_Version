<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\firm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use\App\favourite;
use Validator;

class firm_controller extends Controller
{
    

    public function create_firm(){
        return view('opg_registration');
    }


    public function store_new_firm(Request $request){

        $validator = Validator::make($request->all(), 
        [  
            'firm_name' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\_]+$/', 'required' , 'unique:firms' ), // let whitespaces, alpha, numeric, and null value!
            'owner' => array('regex:/^[a-zA-Z0-9\s\š\ć\č\đ\ž\_]+$/', 'required'),
            'opg_zupanija' => array('required'),
            'adress' => array('regex:/^[a-zA-Z0-9\s\?\,\.\:\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\_]+$/', 'required'),
            'social_network' =>array('regex:/^[a-zA-Z0-9\s\?\,\:\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\_]+$/' , 'nullable'),
            'what_we_do' => array('regex:/^[a-zA-Z0-9\s\?\,\.\:\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\_]+$/' , 'nullable'),
            'opg_avatar' => array('mimes:jpeg,jpg,png,gif', 'required' , 'max:2048'),
            
        ]);
    
        if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator);
        }

        $new_firm = new firm;
        $new_firm->create_new_firm($request);

        return redirect()->route('show_user_opg');
    }




    public function show_user_firm(){
      
        $user_id = auth::id();
        $check_if_auth_user_have_firm = DB::table('firms')->where('user_id' , $user_id)->count();

        if($check_if_auth_user_have_firm != 0){

            $user_firm = DB::table('firms')->where('user_id' , '=' , $user_id)->first();

            $count_firm_favourites = DB::table('favourites')->where('firm_id' , $user_firm->id)->count();
            $count_firm_reviews = DB::table('reviews')->where('firm_id' , $user_firm->id)->count();;
            $count_product_favourites = DB::table('product_favourites')->where('firm_id' , '=' , $user_firm->id)->count();
    
    
            return view('user.show_user_opg')
            ->with('user_firm' , $user_firm)
            ->with('count_firm_reviews' , $count_firm_reviews)
            ->with('count_firm_favourites' , $count_firm_favourites)
            ->with('count_product_favourites' , $count_product_favourites);

        }else{
            $create_ur_firm = 1;
            return view('user.show_user_opg')->with('create_ur_firm' , $create_ur_firm);
        }
       
    }



    public function update_user_firm(Request $request , $id){
        $updated_opg = new firm;
        $updated_opg->update_firm($request , $id);

        return redirect()->route('show_user_opg');
    }




    public function show_opg($id){
        $find_opg = firm::find($id);
     
        $find_opgs_products = DB::table('products')->where('firm_id' , '=' , $id)->get();
        
        $find_opgs_gallery = DB::table('galleries')->where('firm_id' , '=' , $id)->get();

        $find_opgs_category = DB::table('products')->where('firm_id' , '=' , $id)->groupby('product_category_app')->get();

        $search_opgs_reviews = DB::table('reviews')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->join('firms', 'firms.id', '=', 'reviews.firm_id')
            ->where('firm_id' , '=' , $id)
            ->select('reviews.title' , 'reviews.review_content' , 'reviews.service_rating' , 'reviews.price_rating' , 'reviews.quality_rating' ,
                     'reviews.overall_rating' , 'reviews.redommendation' , 'reviews.created_at' , 'users.name' , 'firms.firm_name');

        $find_opgs_reviews = $search_opgs_reviews ->latest('reviews.created_at')->paginate(6);

        $service_avrage_rating_sum = DB::table("reviews")->select('service_rating')->where('firm_id' , '=' , $id)->get()->sum("service_rating");
        $service_avrage_rating_count =  DB::table('reviews')->select('service_rating')->where('firm_id' , '=' , $id)->count();
        if($service_avrage_rating_count != 0)     
            $service_avrage_rating = $service_avrage_rating_sum / $service_avrage_rating_count;  
        else     
            $service_avrage_rating = 0;

        $price_avrage_rating_sum =DB::table("reviews")->select('price_rating')->where('firm_id' , '=' , $id)->get()->sum("price_rating");
        $price_avrage_rating_count =  DB::table('reviews')->select('price_rating')->where('firm_id' , '=' , $id)->count();
        if($price_avrage_rating_count != 0)     
            $price_avrage_rating = $price_avrage_rating_sum / $price_avrage_rating_count;  
         else     
            $price_avrage_rating = 0;
        
        $quality_avrage_rating_sum =DB::table("reviews")->select('quality_rating')->where('firm_id' , '=' , $id)->get()->sum("quality_rating");
        $quality_avrage_rating_count =  DB::table('reviews')->select('quality_rating')->where('firm_id' , '=' , $id)->count();
        if($quality_avrage_rating_count != 0)     
            $quality_avrage_rating = $quality_avrage_rating_sum / $quality_avrage_rating_count;  
        else     
            $quality_avrage_rating = 0;
    

        $overall_avrage_rating_sum = DB::table("reviews")->select('overall_rating')->where('firm_id' , '=' , $id)->get()->sum("overall_rating");
        $overall_avrage_rating_count =  DB::table('reviews')->select('overall_rating')->where('firm_id' , '=' , $id)->count();
        if($overall_avrage_rating_count != 0)     
            $overall_avrage_rating = $overall_avrage_rating_sum / $overall_avrage_rating_count;  
        else     
            $overall_avrage_rating = 0;


        $user_id = auth::id();

        $show_fav_buttton = 0;
        $show_remove_fav_button = 1;

        $favourite_check =  DB::table('favourites')->where('user_id' , '=' , $user_id)->where('firm_id' , '=' , $id)->first();
     
        if(!$favourite_check){
            return view('opg')->with('my_opg' , $find_opg)
        ->with('my_opg_products' , $find_opgs_products)
        ->with('my_opg_gallery' , $find_opgs_gallery)
        ->with('my_opg_categories' , $find_opgs_category)
        ->with('my_opg_reviews' , $find_opgs_reviews)
        ->with('my_opg_reviews_service_rating' , $service_avrage_rating)
        ->with('my_opg_reviews_price_rating' , $price_avrage_rating)
        ->with('my_opg_reviews_quality_rating' , $quality_avrage_rating)
        ->with('my_opg_reviews_overall_rating' , $overall_avrage_rating)
        ->with('favourite_check_show_fav_button' ,  $show_fav_buttton);

        }else{
            return view('opg')->with('my_opg' , $find_opg)
        ->with('my_opg_products' , $find_opgs_products)
        ->with('my_opg_gallery' , $find_opgs_gallery)
        ->with('my_opg_categories' , $find_opgs_category)
        ->with('my_opg_reviews' , $find_opgs_reviews)
        ->with('my_opg_reviews_service_rating' , $service_avrage_rating)
        ->with('my_opg_reviews_price_rating' , $price_avrage_rating)
        ->with('my_opg_reviews_quality_rating' , $quality_avrage_rating)
        ->with('my_opg_reviews_overall_rating' , $overall_avrage_rating)
        ->with('favourite_check_show_remove_button' , $show_remove_fav_button );
        }

 
    }
}
