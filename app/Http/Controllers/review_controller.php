<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;
use App\user;
use App\firm;
use App\review;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class review_controller extends Controller
{
    public function show_review_form($id){
        
        return view('review_form')->with('id' , $id);
    }



    public function save_review(Request $request){

      $validator = Validator::make($request->all(), 
      [  
          'title' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\.\,\!\?]+$/', 'required'),
          'review' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž\.\,\!\?]+$/', 'required'),
          
      ]);
  
      if($validator->fails()){
      return redirect()->back()->withInput()->withErrors($validator);
      }

      $my_id = Auth::id();

      $check_if_exist = DB::table('reviews')->join('users' , 'reviews.user_id' , '=' , 'users.id')->where('user_id' , $my_id)->where('firm_id' , $request->firm_id)->count();
      $check_if_user_is_owner = DB::table('firms')->where('user_id' , $my_id)->where('id' , $request->firm_id)->count();


      if($check_if_exist != 0 or $check_if_user_is_owner != 0){
          return abort(404);
      }else{

      $new_review = new review;
      $auth_user_id =  auth::id();
      $opg_id = $request->firm_id;
     
      $new_review->user_id  = $auth_user_id;
      $new_review->firm_id = $request->firm_id;
      $new_review->title = $request->title;
      $new_review->review_content = $request->review;

      $new_review->service_rating = $request->star_usluznost;
      $new_review->price_rating = $request->star_cijena;
      $new_review->quality_rating = $request->star_kvaliteta;
      $new_review->overall_rating = $request->star_sveukupno;
      
      $new_review->redommendation = $request->recomendation;
      
      $new_review->save();

      return redirect()->route('show_opg' , ['id' => $opg_id])->with('success' , 'Uspješno pohranjena recenzija');
      
    }
    }

}
