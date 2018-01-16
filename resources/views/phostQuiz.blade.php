@extends('layout')

@section('header')

<!--    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />-->
    <link type="text/css" rel="stylesheet" href="/css/materialize.clockpicker.css" media="screen,projection" />
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script src="/js/materialize.clockpicker.js"></script>
    <?php $faculty_id = Auth::user()->username ?>
@stop

@section('content')
    
    <div class="main-container row">
     <div id="profile_head">
            <h4 class="center">Quiz Details</h4>
            <a id="return_button" class="btn-floating" href="/online_quizzing/faculty/"><i class="fa fa-arrow-left"></i></a>
        </div>

    <form action="/online_quizzing/add_quiz/" method="POST">
     <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        
        <div class="input-field col l6 offset-l3 s12">
            <input id="coursecode" type="text" class="validate" name="course_id" required>
            <label for="quizname">Course Code</label>
        </div>
        
        <div class="input-field col l6 offset-l3 s12">
            <input id="quizname" type="text" class="validate" name="quiz_name" required>
            <label for="quizname">Quiz Name</label>
        </div>
        
        <div class="input-field col l6 offset-l3 s12">
<!--            <label for="date">Date</label>-->
            <input class="datepicker" type="date" name="date" placeholder="Date">
        </div>
        
        <div class="input-field col l6 offset-l3 s12">
            <label for="timepicker1">Start Time</label>
            <input id="timepicker1" class="timepicker" name="start_time" type="time">
        </div>
        
        <div class="input-field col l6 offset-l3 s12">
            <label for="timepicker2">End Time</label>
            <input id="timepicker2" class="timepicker" name="end_time" type="time">
        </div>

        <div>
            <button type="submit" value="Submit" class="btn waves-effect col l4 offset-l4 s12">Next</button>
        </div>
       
   
        </form>
    </div>
 
        <!--        Date Picker Script-->
        <script>
            $('.datepicker').pickadate({
                selectMonths: true, 
                selectYears: 2,
                formatSubmit: 'yyyy-mm-dd',
                hiddenName : true,


            });
        </script>

        <!--        Time Picker Script-->
        <script>
            $('.timepicker').pickatime({
                autoclose: false,
                twelvehour: false
            });
        </script>
@stop