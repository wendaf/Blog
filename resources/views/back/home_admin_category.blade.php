@extends('layouts.back')

@php use App\Categorie;  @endphp

@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="text-value-home">{{count(Categorie::all())}}</div>
                        <p class="text-center text-value-md" style="font-size:2rem;padding-top:5%;">Category</p>
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
                        <i class="fa fa-align-justify"></i>All Category</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Update at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $key => $elem)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$elem->name ?? "null"}}</td>
                                    <td>{{$elem->created_at ?? "null"}}</td>
                                    <td>{{$elem->updated_at ?? "null"}}</td>
                                    <td>
                                        <a href="/home/admin/edit/category/{{$elem->id}}" class="text-white badge badge-success"><i class="fa fa-pencil"></i></a>
                                        <a href=# onclick="delete_category({{$elem->id}})" class="text-white badge badge-danger"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination">
                            {{$category->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



<script>
    function delete_category(id)
    {
        $.ajax({
            url: '/home/admin/delete/category/' + id,
            type: 'get',
            success: function(data) {
                console.log("Success");
                console.log(data);
                swal('Info', 'Category Destroyed', 'success');
                setTimeout(function() { location.reload() }, 2000);
            },
            error: function(data) {
                console.log("Error");
                console.log(data);
                swal('Info', 'Category not Destroyed', 'error');
                setTimeout(function() { location.reload() }, 2000);

            }
        });
    }
</script>

