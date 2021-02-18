<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;
use App\user;
use App\review;
use App\firm;
use Cookie;
use App\help;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Collection;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Support\Facades\Response;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show_main_page(){

    $my_id = Auth::id();
    $new_mes=   DB::table('messages')->where('to' ,$my_id)->where('is_read' , 0)->first();
    $blogs = DB::table('blogs')->orderBy('created_at', 'DESC')->get()->take(3);
    return view('main_page')->with('new_mes' , $new_mes)->with('blogs' , $blogs);
    }


    public function show_donation_page(){
        return view('our_donation_page');
    }

//HUMAN CHECK----------------------------------------------------------------------------------------------------------------------------------------------------------------------//
/*
public function show_human_check_form(){

    $secret1 = rand(1 , 10);
    $secret2 = rand(1 , 10);
    $answear = $secret1 + $secret2;

    return view('z_human_check')->with('secret1' , $secret1)->with('secret2' , $secret2)->with('answear' , $answear);
}

public function check_if_you_are_human(request $request){

    if($request->my_answear == $request->answear){
        $human = "human";
        return view('auth.register', ['human'=> $human]);
    }else{
        dd('Prepoznati ste kao robot!!!');

    }

}
*/

//SEARCH STUFF----------------------------------------------------------------------------------------------------------------------------------------------------------------------//

    public function show_search_choice(){
        return view('search.search_choice');
    }


    public function show_search_results_main_search(Request $request){

        $validator = Validator::make($request->all(),
        [
            'main_search' => 'regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/ | required', //SHOW NUM, ALPHA, WHITESPACES!

        ]);

        if($validator->fails()){
            return redirect()->route('show_main_page')->withInput()->withErrors($validator);
        }


        $search_stuff = $request->main_search;
        $search_results = DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id')
        ->where('product_name' , 'LIKE' , '%' .$search_stuff . '%')->paginate(24)->onEachSide(4);;

        $no_res_found = 'Ne postoji proizvod sa željenim imenom, pokušajte ponovno s pretragom';
        $request = $request->main_search;

        if(count($search_results) > 0){
        return view('search.main_search_product' , ['search_results'=>$search_results , 'request'=>$request]);
        }else{
            return view('search.main_search_product' , ['no_res_found'=>$no_res_found]);;
        }
    }



    public function sub_zupanije_search_under_main_search(Request $request , $variable){

        $searched_zupanija = $request->pretrazi_po_zupaniji; //tražena županija

        $sortiranje_po_zupaniji = DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id')
        ->where('product_name' , 'LIKE' , '%' .$variable . '%')->where('zupanija' , '=' , $searched_zupanija)->paginate(24)->onEachSide(4);

        return view('search.main_search_product_zupanije' , ['search_results_zupanije'=>$sortiranje_po_zupaniji , 'trazena_zupanija'=>$searched_zupanija]);

    }







    public function show_products_search(){

        $all_products = DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id')->paginate(12)->onEachSide(4);
        return view('search.product_search')->with('products' , $all_products);
    }



    public function find_products(Request $request){


        $validator = Validator::make($request->all(),
        [
            'product_name' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'), // let whitespaces, alpha, numeric, and null value!
            'product_sub_category' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
            'product_place' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
        ]);

        if($validator->fails()){
        return redirect()->route('show_products_search')->withInput()->withErrors($validator);
        }


        $userBuilder =  DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id');


        if( !empty($request->product_name) )
        {
            $userBuilder = $userBuilder->where('product_name',  'LIKE' , '%' .$request->product_name . '%');
        }

        if( !empty($request->kategorija) )
        {
            $userBuilder = $userBuilder->where('product_category_app' , '=' ,$request->kategorija);
        }

        if( !empty($request->product_sub_category) )
        {
            $userBuilder = $userBuilder->where('product_category_owner',  'LIKE' , '%' .$request->product_sub_category . '%');
        }

        if( !empty($request->product_place) )
        {
            $userBuilder = $userBuilder->where('address',  'LIKE' , '%' .$request->product_place . '%');
        }

        if( !empty($request->product_zupanija) )
        {
            $userBuilder = $userBuilder->where('zupanija' , '=' ,$request->product_zupanija);
        }


        $search_results =  $userBuilder->paginate(12)->onEachSide(4);

        if( count($search_results) <= 0){
            $no_results = "Nema rezultata pretrage";

            return view('search.product_search')->with('no_results' , $no_results);
        }
        return view('search.product_search')->with('search_results' , $search_results);
    }


    //----------------------------------------------------------------------------------------------

    public function show_opg_search(){
        $all_firms = DB::table('firms')->paginate(12)->onEachSide(4);
        return view('search.opg_search')->with('firms' , $all_firms);
    }


    public function find_opgs(Request $request){


        $validator = Validator::make($request->all(),
        [
            'firm_name' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
            'firm_product' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
            'firm_place' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
        ]);

        if($validator->fails()){
        return redirect()->route('show_opg_search')->withInput()->withErrors($validator);
        }


     $userBuilder =  DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id');

        if( !empty($request->firm_name) )
        {
            $userBuilder = $userBuilder->where('firm_name',  'LIKE' , '%' .$request->firm_name . '%');
        }
        if( !empty($request->firm_place) )
        {
            $userBuilder = $userBuilder->where('address',  'LIKE' , '%' .$request->firm_place . '%');
        }
        if( !empty($request->firm_zupanija) )
        {
            $userBuilder = $userBuilder->where('zupanija' , '=' ,$request->firm_zupanija);
        }
        if( !empty($request->firm_product) )
        {
            $userBuilder = $userBuilder->where('product_name',  'LIKE' , '%' .$request->firm_product . '%');
        }

        $search_results =  $userBuilder->groupBy('firms.id')->paginate(12)->onEachSide(4);

        if( count($search_results) <= 0){
            $no_results = "Nema rezultata pretrage";

            return view('search.opg_search')->with('no_results' , $no_results);
        }
        return view('search.opg_search')->with('search_results' , $search_results);
    }



//KATEGORIJE----------------------------------------------------------------//


    public function main_categories($categorie){

       $searched_categorie = DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id')->where('product_category_app' , '=' , $categorie)->paginate(12)->onEachSide(4);
       return view('categories')->with('searched_categorie' , $searched_categorie)->with('categorie' , $categorie);
    }



    public function main_categories_search(Request $request, $categorie){


        $validator = Validator::make($request->all(),
        [
            'name_of_product_categorie' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
            'place_of_product_categorie' => array('regex:/^[a-zA-Z0-9\s\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'nullable'),
        ]);

        if($validator->fails()){
            return redirect()->route('show_categories' ,  $categorie )->withInput()->withErrors($validator);
        }


        $userBuilder =  DB::table('firms')->join('products' ,'firms.id' , '=' , 'products.firm_id')->where('product_category_app' , '=' , $categorie);

        if( !empty($request->name_of_product_categorie) )
        {
            $userBuilder = $userBuilder->where('product_name',  'LIKE' , '%' .$request->name_of_product_categorie . '%');
        }

        if( !empty($request->place_of_product_categorie) )
        {
            $userBuilder = $userBuilder->where('address',  'LIKE' , '%' .$request->place_of_product_categorie . '%');
        }

        if( !empty($request->firm_zupanija) )
        {
            $userBuilder = $userBuilder->where('zupanija' , '=' ,$request->firm_zupanija);
        }


        $search_results =  $userBuilder->paginate(12)->onEachSide(4);

        if( count($search_results) <= 0){
            $no_results = "Nema rezultata pretrage";

            return view('categories')->with('no_results' , $no_results)->with('categorie' , $categorie);
        }
        return view('categories')->with('search_results' , $search_results)->with('categorie' , $categorie);
        }




   //FOOTER STUFF

    public function show_about_us(){
        return view('footer.footer_about_us');
    }

    public function show_faq(){
        return view('footer.footer_faq');
    }

    public function show_conditions(){
        return view('footer.footer_conditions');
    }

    public function show_help(){
        return view('footer.footer_help');
    }


    public function save_help_question(Request $request){


        $validator = Validator::make($request->all(),
        [
            'subject' => array('regex:/^[a-zA-Z0-9\s\?\,\.\!\š\Š\ć\Ć\č\Č\đ\Đ\ž\Ž]+$/', 'required'), //propušta whitespaces, alpha, num, i , . ! ?

        ]);

        if($validator->fails()){
            return redirect()->route('show_help')->withInput()->withErrors($validator);
        }

        $user_id = auth::id();
        $new_question = new help;
        $new_question->user_id = $user_id;
        $new_question->subject = $request->subject;
        $new_question->save();

        return  redirect()->back()->with('success' , 'Upit uspješno pohranjen!');
    }





}
