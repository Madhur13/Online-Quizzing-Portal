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
            <h4 class="center">Quizzes</h4>
            <a id="return_button" class="btn-floating" href="/online_quizzing/faculty/"><i class="fa fa-arrow-left"></i></a>
        </div>

        <div class="col l12">
            <ul class="tabs">
                <li class="tab col l4"><a class="active" href="#completed">Completed Quiz</a></li>
                <li class="tab col l4"><a href="#ongoing">Ongoing Quiz</a></li>
                <li class="tab col l4"><a href="#upcoming">Upcoming Quiz</a></li>
            </ul>
        </div>
        
        <div id="completed" class="col l12">
            <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    /*$quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','<',$cur_date)
                                ->orWhere(function($query){
                                        $cur_time=date("H:i:s");
                                        $cur_date=date("Y-m-d");
                                        $query->where('quiz.end_time','<',$cur_time)
                                                ->where('quiz.date','=',$cur_date);
                                    })
                                ->select('quiz.*')
                                ->get()
                    ;*/
                    $quizzes=DB::table('Course_taken_by')
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where([['quiz.date','<',$cur_date],['faculty_id',$faculty_id]])
                                ->orWhere([['quiz.end_time','<',$cur_time],['quiz.date','=',$cur_date],['faculty_id',$faculty_id]])
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('/images/completed.png') }}">
                            </div>
                        </div>

                        <div class="card-content center">
                            <p>{{ $quiz->course_id }} {{ $quiz->quiz_name }} {{ $quiz->date }}</p>
                            <p> {{ $quiz->start_time }} to {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href="<?php echo '/online_quizzing/view_result/'.$quiz->id ?> ">View Results</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
        </div>
        
        <div id="ongoing" class="col l12">
        
           <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    
                    $quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','=',$cur_date)
                                ->where('quiz.start_time','<',$cur_time)
                                ->where('quiz.end_time','>',$cur_time)
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('/images/ongoing.png') }}">
                            </div>
                        </div>

                        <div class="card-content center">
                            <p>{{ $quiz->course_id }} {{ $quiz->quiz_name }} {{ $quiz->date }}</p>
                            <p> {{ $quiz->start_time }} to {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href="<?php echo '/online_quizzing/quiz/'.$quiz->id ?> ">Edit Quiz</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            
        </div>
        
        <div id="upcoming" class="col l12">
        <div class="row" style="padding:20px;">

        <?php
                    $cur_date=date("Y-m-d"); 
                    $cur_time=date("H:i:s");
                    /*$quizzes=DB::table('Course_taken_by')->where('faculty_id',$faculty_id)
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where('quiz.date','>',$cur_date)
                                ->orWhere(function($query){
                                    $cur_time=date("H:i:s");
                                        $cur_date=date("Y-m-d");
                                        $query->where('quiz.start_time','>',$cur_time)
                                                ->where('quiz.date','=',$cur_date);
                                    })
                                ->select('quiz.*')
                                ->get()
                    ;*/
                    $quizzes=DB::table('Course_taken_by')
                                ->join('quiz','quiz.course_id','=','Course_taken_by.course_id')
                                ->where([['quiz.date','>',$cur_date],['faculty_id',$faculty_id]])
                                ->orWhere([['quiz.start_time','>',$cur_time],['quiz.date','=',$cur_date],['faculty_id',$faculty_id]])
                                ->select('quiz.*')
                                ->get()
                    ;
                    foreach($quizzes as $quiz)
                    {
                        
                    ?>
                    
            
                    <div class="col l4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('/images/upcoming.png') }}">
                            </div>
                        </div>

                        <div class="card-content center">
                            <p>{{ $quiz->course_id }} {{ $quiz->quiz_name }} {{ $quiz->date }}</p>
                            <p> {{ $quiz->start_time }} to {{ $quiz->end_time }} </p>
                        </div>
                        
                        <div class="card-action center">
                            <a class="waves-effect btn col s6 offset-s3" href=<?php echo '/online_quizzing/quiz/'.$quiz->id ?> ">Edit Quiz</a>
                        </div>
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            
        </div>   
        </div>
        
@stop