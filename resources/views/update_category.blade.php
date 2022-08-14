@extends('layouts.app')

@section('title')
    Edit Category
@endsection

@section('content')

    <form action="{{route('updateCategoryFun' , ['category_id'=>$category_id , 'name'=>$name] , $absolute = false)}}" method="post">
        @csrf
        <br>

        <div class="form-group ms-3 me-3">
            <label for="nameTextField">Category Name</label>
            <br>
            <input type="text" value="{{$name}}" class="form-control " name="name" required id="nameTextField" placeholder="name">
        </div>
        <br>
        <button type="submit" class="btn btn-primary ms-3 me-3">Submit</button>

    </form>



@endsection