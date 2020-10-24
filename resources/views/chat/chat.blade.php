@extends('layouts.front')

@section('content')

<div class="container">
    <div class="widget_title">
        <h2 style="margin-top: 30px"><a href="javascript:void(0);">Chatbox</a></h2>
        <hr>
    </div>
    <div style="margin-bottom: 10px; background-color: #337ab7; color: white; padding: 10px 25px 10px;">
        <chat-component :user="{{ auth()->user() }}"></chat-component>
    </div>
</div>
@endsection