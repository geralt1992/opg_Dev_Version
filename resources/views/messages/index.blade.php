

<div class="message-wrapper">
    <ul class="messages">
 
    @isset($messages)
    @foreach($messages as $message)
    @if($message->deleted_by !=  Auth::id())
 
        <li class="message clearfix">
            <div class="picture">
                @if($message->avatar !=  0)
                <img src="{{url('avatars/user_avatars/' . $message->avatar)}}" class="{{$message->from == Auth::id() ? 'sent' : 'received'}}" alt="chat_box_profile-picture">
                @else
                    <img src="{{url('avatars/user_avatars/bez_avatara.png')}}"  class="{{$message->from == Auth::id() ? 'sent' : 'received'}}" alt="chat_box_profile-picture">
                @endif
                
            </div>

            <div class="{{$message->from == Auth::id() ? 'sent' : 'received'}}">
                <p>{{$message->message}}</p>

                    @if($message->from ==  Auth::id())
                    <p class="date"> Prima: {{$message->name}} - {{$message->created_at->format('M, d')}}</p>
                    @else
                    <p class="date"> {{$message->name}} - {{$message->created_at->format('M, d')}}</p>
                    @endif
               
                <a class="delete_message" href="{{route('delete_one_message' , [ 'id' => $message->id])}}"> <p>Ukloni poruku</p> </a>
            </div>
        </li>
        
        <hr>

    @endif
    @endforeach
    @endisset
   
    </ul> 
</div>

<div class="input-text">
    <input type="text" name="message" class="submit">
</div>
