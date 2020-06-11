@extends('layouts.back')

@section('content')

    @php
        ini_set('display_errors', 'on');
    @endphp
    <div class="animated fadeIn">
        <div class="col-sm-12">

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @elseif (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-star"></i>You can add article here</div>
                <form method="post" action="{{route('create_article')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_html">Upload media cover</label><br>
                                <input class="" name="media" id="content_media" type="file">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_categorie">Catégorie</label>
                                <select name="categorie" id="content_categorie" class="form-control" required>
                                    @foreach ($category as $key => $elem)
                                        <option value="{{$elem['name']}}">{{$elem['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_title">Title</label>
                                <input class="form-control" name="title" id="content_title" type="text" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_author">Author</label>
                                <input class="form-control" name="author" id="content_author" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-col-form-label font-weight-bold" for="content_html">Contenu</label>
                            <textarea class="form-control" name="description" id="content_html" type="text" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection