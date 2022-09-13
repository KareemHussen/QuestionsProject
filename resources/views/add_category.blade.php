@extends('layouts.app')

@section('title')
    Edit Category
@endsection

@section('content')



    <form action="{{route('addCategoryFun' , $absolute = false)}}" method="post">
        @csrf
        <br><br>


            <label for="nameTextField">Category Name</label>
            <br>
            <input type="text" class="form-control " name="name" required id="nameTextField" placeholder="name">
        <br>
        <button type="submit" class="btn btn-primary ms-3 me-3">Submit</button>

    </form>



@endsection
