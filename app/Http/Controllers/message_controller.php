<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\Cuspajz_Hr_Imate_Novog_Kupca;

class message_controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index($user_id , $messsage)
    {
        $my_id = Auth::id();

        if($user_id == $my_id){

        return abort(404);
        }else


        $user_seller = DB::table('users')->where('id' , $user_id)->first();
        $mail = $user_seller->email;
        Mail::to($mail)->send(new Cuspajz_Hr_Imate_Novog_Kupca($messsage));

        $message = "Pozdrav zainteresiran sam za kupnju Vašeg proizvoda - "  . $messsage;

        $greeting_message = new message;

        $greeting_message->from = $my_id;
        $greeting_message->to = $user_id;
        $greeting_message->message = $message;
        $greeting_message->is_read = 0;
        $greeting_message->deleted_by = false;
        $greeting_message->save();

        return redirect()->route('chat_all');
    }



    public function chat_all(){

      $my_id = Auth::id();

    //PORUKE KOJE SAM PRIMIO!
       $users = DB::table('messages')->leftJoin('users' , 'users.id' , '=' , 'messages.from')

       ->select('users.id' , 'users.name' , 'users.avatar' , 'users.email', 'users.is_owner' , 'messages.from' , 'messages.created_at' ,
            DB::raw("(SELECT count(messages.is_read)  where is_read = 0  ) as unread"))
       ->where('messages.to' , $my_id)
       ->where('users.id' , '!=' , $my_id)
       ->groupBy('users.id' )
       ->orderBy('messages.created_at', 'desc')
       ->get();

    //PORUKE KOJE SAM POSLAO!
       $users2 = DB::table('messages')->rightJoin('users' , 'users.id' , '=' , 'messages.to')

       ->select('users.id' , 'users.name' , 'users.avatar' , 'users.email', 'messages.from' , 'users.is_owner' , 'messages.created_at'  ,
            DB::raw("(SELECT count(null)) as unread"))
       ->where('messages.from' , $my_id)
       ->where('users.id' , '!=' , $my_id)
       ->groupBy('users.id' )
       ->orderBy('messages.created_at', 'desc')
       ->get();


       $merge = $users->merge($users2);
       $unique = $merge->unique('id');

       $new_mes=   DB::table('messages')->where('to' ,$my_id)->where('is_read' , 0)->groupBy('from' )->get();

      return view('home')->with('users' , $unique)->with('new_mes' , $new_mes);

  }



    public function getMessage($user_id){
        $my_id = Auth::id();

        //when click to see mess, selected users message will be read, update
        Message::where(['from' => $user_id , 'to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where(function ($query) use ($user_id, $my_id){
                $query->where('from' , $my_id)->where('to' , $user_id);
        })->orWhere(function ($query) use ($user_id , $my_id){
            $query->where('from' , $user_id)->where('to' , $my_id);
        })->join('users' , 'users.id' , '=' , 'messages.to')
        ->select('users.id as user_id' , 'users.avatar' , 'users.is_owner' , 'users.name as name' , 'messages.from' ,'messages.to' ,
                'messages.deleted_by' , 'messages.message' , 'messages.id as id' , 'messages.created_at' , 'messages.is_read')
        ->orderBy('messages.created_at', 'asc')
        ->get();

        return view('messages.index' , ['messages' => $messages]);


    }

    public function sendMessage(Request $request){
        $from = Auth::id();
        $to = $request->reciever_id;
        $messages = $request->message;


        $data = new Message;
        $data->deleted_by = 0;
        $data->from = $from;
        $data->to = $to;
        $data->message = $messages;
        $data->is_read = 0;
        $data->save();


        //PUSHER

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
          );
          $pusher = new Pusher(
            'ead68957832159224fef',
            'c07e3c45bfca47f1bc1f',
            '1026331',
            $options
          );

          $data = ['from' => $from, 'to' => $to]; //SENDING FROM AND TO USER WHEN PRESSED ENTER

        $pusher->trigger('my-channel' , 'my-event' , $data);
    }



  public function deleteLastMessage($id){

      $auth_user_id = Auth::id();
      $check_if_deleted_by_is_empty = Message::where('id' , $id)->first();

      if($check_if_deleted_by_is_empty->deleted_by == 0){

        $check_if_deleted_by_is_empty->update(['deleted_by' => $auth_user_id]);

        return redirect()->back()->with('success', 'Uspješno uklonjeno!');

      }else{
        $check_if_deleted_by_is_empty->delete();

        return redirect()->back()->with('success', 'Uspješno uklonjeno!');
      }

  }


}
