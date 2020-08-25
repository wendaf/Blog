@extends('layouts.front')

@section('content')
<div class="container" style="margin-top: 25px; background-color: #337ab7; color: white; padding: 10px 25px 10px;">
    <chat-component :user="{{ auth()->user() }}"></chat-component>
</div>
@endsection