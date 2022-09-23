@extends('layouts.app')

@section('title')
    Category
@endsection



@section('content')
    <div>
        <form class="ms-3 mt-3" style="float:left;"
              action="{{route('addQuestionView' , ['category_id'=>$category_id] , $absolute = false)}}"
              method="post">
            @csrf
            <input style="font-size: 15px" type="submit" value="Add Question" class="btn btn-primary">
        </form>

        @if(sizeof($questions) < 24)

            <div  style="background-color: #ffdddd; border-left: 6px solid #f44336; width: 20%; margin-left: 1%; margin-top: 1%; float: left; margin-bottom: 1%">
                <p><strong>Danger !</strong>  This category won't appear because the number of questions is less than 24</p>
            </div>

        @endif

    </div>



    <div>
        <table class="table table-striped ms-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Right Answer</th>
                <th scope="col">Answers</th>
                <th scope="col">Configuration</th>
            </tr>
            </thead>

            <tbody>
            @foreach($questions as $question)

                <tr>
                    <th scope="row">{{$question->id}}</th>
                    <td>
                        <h5 >{{$question->title}}</h5>
                    </td>

                    <td>
                        <h5>{{$question->answer}}</h5>
                    </td>

                    <td>
                        @if(count($answers[$question->id]) > 0)

                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Answers
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach($answers[$question->id] as $answer)
                                        <li><a class="dropdown-item" href="http://138.68.74.161/answer/updateAnswerView?answer_id={{$answer->id}}">{{$answer->text}}</a></li>
                                    @endforeach
                            </ul>
                        </div>
                        @else
                            <h4>No Answers</h4>
                        @endif
                    </td>

                    <td>

                        <div>
                            <form style="float:left;margin-right: 10px"
                                  action="{{route('addAnswerView' , ['question_id'=>$question->id] , $absolute = false)}}"
                                  method="post">
                                @csrf
                                <input style="font-size: 15px" type="submit" value="Add Answer" class="btn btn-primary">
                            </form>

                            <form style="float:left;margin-right: 10px"
                                  action="{{route('updateQuestionView' , ['category_id'=>$category_id ,'question_id'=>$question->id , 'title'=>$question->title ,'answer'=>$question->answer] , $absolute = false)}}"
                                  method="post">
                                @csrf
                                <input style="font-size: 15px" type="submit" value="Edit Question" class="btn btn-primary">
                            </form>

                            <form style="float:left;"
                                  action="{{route('deleteQuestion' , ['question_id'=>$question->id , 'category_id'=>$category_id], $absolute = false)}}"
                                  method="post">
                                @csrf
                                <input style="font-size: 15px" type="submit" value="Delete Question" class="btn btn-danger">
                            </form>


                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
