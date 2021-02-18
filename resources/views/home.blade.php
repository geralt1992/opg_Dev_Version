@extends('layouts-chat.app')


@section('content')
    <div class="container" style="margin-bottom: 2rem;">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">

                    @foreach($users as $user)
                        <li class="user" id="{{$user->id}}">
                            @if($user->unread)
                                <span class="pending">{{$user->unread}}</span>
                            @endif
                            <div class="media">
                                <div class="media-left">

                                @if($user->avatar !=  0)
                                    <img src="{{url('avatars/user_avatars/' .$user->avatar)}}" alt="" class="media-object">
                                @else
                                    <img src="{{url('avatars/user_avatars/bez_avatara.png')}}" alt="" class="media-object">
                                @endif

                                </div>
                                <div class="media-body">

                                    <p class="owner">Kontakt: {{$user->name}}</p>

                                            @if($user->is_owner === 'Vlasnik')
                                            <p class="owner">Status: {{$user->is_owner}} OPG-a</p>
                                            @else
                                            <p class="owner">Status: {{$user->is_owner}}</p>
                                            @endif

                                    @isset($new_mes)
                                        @foreach($new_mes as $new)
                                            @if($new->from === $user->id)
                                                <p><i class="fa fa-circle" style="display:inline; color:green;" aria-hidden="false"></i> Nova poruka!</p>
                                            @endif
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </li>

                        <hr>
                        @endforeach
                        </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages"></div>
        </div>
    </div>
    @include('footer.footer_all_other')
@endsection



