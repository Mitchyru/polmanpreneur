@extends('layouts.app2', ['page' => __('chat'), 'pageSlug' => 'chat'])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            @foreach($user as $data)
                @if($id == $data->user_id)
                    <a href="/chatDashboard">Back</a>
                    <h2>Chat To : {{ $data->name }}</h2>
                    
                @endif
            @endforeach
        </div>
        <div class="card-body" style="color: #fff">
            @foreach($message as $pesan)
                @foreach($user as $item)
                    @if($id == $pesan->from_user_id && $id == $item->user_id && Auth::user()->user_id == $pesan->to_user_id)
                        <hr><div class="pesan">{{ $pesan->message }}</div>
                        <div class="waktu">{{ $pesan->created_at }}</div>
                    @elseif(Auth::user()->user_id == $pesan->from_user_id && Auth::user()->user_id == $item->user_id && $id == $pesan->to_user_id)
                        <hr><div class="pesan" style="text-align: right">{{ $pesan->message }}</div>
                        <div class="waktu" style="text-align: right">{{ $pesan->created_at }}</div>
                    @endif
                @endforeach
            @endforeach
        </div><hr>
        <div class="card-footer">
            <div class="form-container sign-up-container">
                <form method="post" action="/messages" enctype="multipart/form-data">
                  @csrf
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="from_user_id" id="from_user_id">
                            <option value="{{ Auth::user()->user_id }}" type="hidden">{{ Auth::user()->name }}</option>
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4" style="display: none;">
                        <select name="to_user_id" id="to_user_id">
                            @foreach($user as $item)
                                @if($id == $item->user_id)
                                    <option value="{{ $item->user_id }}" type="hidden">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>  
                    </div>
                  </div>
                  <div class="from-group">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" name="message" placeholder="Message" value="{{ old('message') }}">
                    </div>
                  </div>
                  <button type="submit" class="btn mb-4">Send</button>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection