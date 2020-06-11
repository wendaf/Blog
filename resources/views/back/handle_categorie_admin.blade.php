@extends('layouts.back')

@section('content')
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
                    <i class="fa fa-star"></i>You can create category here</div>
                <form method="post" action="{{route('create_category')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_html">Upload category cover</label>
                                <br>
                                <input class="" name="media" id="content_media" type="file">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-col-form-label font-weight-bold" for="content_categorie">Category created</label>
                                <select name="categorie" id="content_categorie" class="form-control" required>
                                    @foreach ($category as $key => $elem)
                                        <option value="{{$elem['name']}}">{{$elem['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-col-form-label font-weight-bold" for="content">Category name</label>
                            <input class="form-control" name="name" id="content" type="text" required />
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

<script type="text/javascript">

    $(document).ready(function()
    {
        var allCategory = '<?php json_encode($category, true); ?>';
        $("#content").on('keyup', function(data)
        {
            console.log("Keyup : ", data);
        });
        console.log(allCategory);
    });


</script>