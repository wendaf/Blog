@extends('layouts.front')

@section('content')

<style>
    .media-object {
        width: 120px !important;
        height: 110px !important;
    }
</style>

<div class="container">
    @if(isset($results))
        <h2 style='margin-top: 25px; margin-bottom: 15px'> Les résultats pour votre recherche <b> "{{ $q }}" </b> sont :</h2>
    @foreach($results as $result)
    <div class="category_article_wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_article_img">
                        <a href="/article/{{$result['id']}}" target="_self"><img class="img-responsive" src="{{$result['media']}}" style="width:100%;height:155px !important;" alt="{{$result['title']}}"></a>
                    </div>
                    <div class="media-body">
                            <h3 class="media-heading">
                                <a href="/article/{{$result['id']}}" target="_self">{{$result['title']}}</a>
                            </h3> <span class="media-date"><a href="javascript:void(0);">{{$result['created_at']}}</a> By <a href="javascript:void(0);">{{$result['author']}}</a></span>
                        </div>
                </div>
            </div>
            <div style="margin-top:2.5%;"></div>
            <div class="row"></div>
        </div>
    @endforeach
    @else
    <p>Aucun resultat veuillez réessayer</p>
    @endif
</div>

@endsection