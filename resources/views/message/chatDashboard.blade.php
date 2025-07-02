@extends('layouts.app', ['page' => __('chat'), 'pageSlug' => 'chat'])

@section('content')
<div class="d-flex bd-highlight container">
    <div class="p-2 flex-fill bd-highlight card" style="margin-right: 10px;">
        <div class="card-header"><h2>All User</h2></div><hr>
        <div class="card-body">
            @foreach($user as $data)
                @if(Auth::user()->user_id != $data->user_id)
                    <a href="/chat/{{ $data->user_id }}">{{ $data->name }}</a><br>
                @endif
            @endforeach
        </div>
        <div class="card-footer"></div>
    </div>
    <div class="p-2 flex-fill bd-highlight card">
        <div class="card-header"><h2>Contacted User</h2></div><hr>
        <div class="card-body">
            @foreach($user as $data)
                @foreach($message as $pesan)
                    @if($data->user_id == $pesan->from_user_id && Auth::user()->user_id == $pesan->to_user_id && Auth::user()->user_id != $data->user_id)
                        <a href="/chat/{{ $data->user_id }}">{{ $data->name }}</a><br>
                        @break
                    @elseif($data->user_id == $pesan->to_user_id && Auth::user()->user_id == $pesan->from_user_id && Auth::user()->user_id != $data->user_id)
                        <a href="/chat/{{ $data->user_id }}">{{ $data->name }}</a><br>
                        @break
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="card-footer"></div>
    </div>
</div>
@endsection