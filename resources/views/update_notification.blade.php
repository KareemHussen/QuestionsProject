
@extends('layouts.app')

<html>

<head>

    @section('title')
        Edit Category
    @endsection

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker(
                {
                    dateFormat: "dd/mm/yy",
                    changeMonth: true,
                    changeYear: true,
                }
            );
        } );
    </script>

</head>

<body>

@section('content')

    <form action="{{route('updateNotificationFun' , ['notification_id'=>$notification->id , 'text'=>$notification->text , 'date'=>$notification->date] , $absolute = false)}}" method="post" enctype="multipart/form-data">
        @csrf
        <br>

        <div class="form-group ms-3 me-3">
            <label for="nameTextField">Notification Text</label>
            <br>
            <input type="text" value="{{$notification->text}}" class="form-control " name="text" required id="nameTextField" placeholder="name">
        </div>
        <br>

        <div class="form-group ms-3 me-3">
            <label for="nameTextField">Notification Date</label>
            <br>
            <input type="text" value="{{$notification->date}}" id="datepicker" class="form-control" name="date" required placeholder="Date">
        </div>

        <br>
        <br>

        <div class="text-center">

            <input type="submit" class="btn btn-primary ms-3 me-3" style="width: 90%" value="Submit">

            <br>
            <br>


        </div>

    </form>



@endsection

</body>
</html>




