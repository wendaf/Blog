@extends('layouts.back')

@php use App\Article;  @endphp

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="text-value-home">{{count(Article::all())}}</div>
                        <p class="text-center text-value-md" style="font-size:2rem;padding-top:5%;">Article</p>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:20px;">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="text-value-home">{{$likes}}</div>
                        <p class="text-center text-value-md" style="font-size:2rem;padding-top:5%;">Like</p>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:20px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>All article</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Content</th>
                                <th>Created at</th>
                                <th>Update at</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($article as $key => $elem)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$elem->title}}</td>
                                    <td>{{substr($elem->description, 0, 15)}} ...</td>
                                    <td>{{$elem->created_at ?? "null"}}</td>
                                    <td>{{$elem->updated_at ?? "null"}}</td>
                                    <td>{{$elem->author ?? "null"}}</td>
                                    <td>
                                        <a href="/home/admin/edit/article/{{$elem->id}}" class="text-white badge badge-success"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0);" onclick="delete_article({{$elem->id}})" class="text-white badge badge-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination">
                            {{$article->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


<script>
    function delete_article(id)
    {
        $.ajax({
            url: '/home/admin/delete/article/' + id,
            type: 'get',
            success: function(data) {
                console.log("Success");
                console.log(data);
                swal('Info', 'Article Destroyed', 'success');
                setTimeout(function() { location.reload() }, 2000);
            },
            error: function(data) {
                console.log("Error");
                console.log(data);
                swal('Info', 'Article not destroyed', 'error',);
                setTimeout(function() { location.reload() }, 2000);
            }
        })
    }
</script>

