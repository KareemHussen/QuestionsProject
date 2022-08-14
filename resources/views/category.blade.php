@extends('layouts.app')

@section('title')
    Category
@endsection


@section('content')

    <div>
        <button style="font-size: 15px" type="button" class="btn btn-primary mb-4 ms-3" onclick="location.href = 'http://127.0.0.1:8000/category/addCategoryView';">Add Category</button>
    </div>

    <div>
        <table class="table table-striped ms-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Configuration</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $cat)

                <tr>
                    <th scope="row"><h5>{{$cat->id}}</h5></th>
                    <td>
                        <a class="navbar-brand" href="{{route('question' , ['category_id'=>$cat->id ] , $absolute = false)}}"><h4>{{$cat->name}}</h4></a>
                    </td>
                    <td>
                        <div>
                            <form style="float:left; margin-right: 10px"
                                  action="{{route('updateCategoryView' , ['category_id'=>$cat->id , 'name'=>$cat->name] , $absolute = false)}}"
                                  method="post">
                                @csrf
                                <input type="submit" value="Edit Category" class="btn btn-primary">
                            </form>


                            <form style="float:left;"
                                  action="{{route('deleteCategory' , ['category_id'=>$cat->id], $absolute = false)}}"
                                  method="post">
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger" style="font-size: 15px">
                            </form>

                        </div>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection










