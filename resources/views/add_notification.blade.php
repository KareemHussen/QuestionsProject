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
            $( "#picker" ).datetimepicker(
                {
                    timepicker: true,
                    datepicker: true,
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


    <form action="{{route('addNotificationFun' , $absolute = false)}}" method="post" enctype="multipart/form-data">
        @csrf
        <br>

        <label for="nameTextField" style="margin-left: 1%; width: 98%">Notification Text</label>
        <br>
        <input type="text" class="form-control" name="text" required id="nameTextField" placeholder="Text" style="margin-left: 1%; width: 98%">

        <br><br>


        <label for="nameTextField" style="margin-left: 1%; width: 98%">Notification Date</label>

        <input type="datetime-local"  name="date" class="form-control" required placeholder="Date" style="margin-left: 1%; width: 98%">

        <br>

        <br>

        <br>
        <div class="text-center">

            <input type="submit" class="btn btn-primary ms-3 me-3" style="width: 90%" value="Submit">

            <br>
            <br>


        </div>

    </form>


</body>




</html>



















@endsection
