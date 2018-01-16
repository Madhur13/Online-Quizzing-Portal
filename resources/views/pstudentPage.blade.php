@extends('layout')

@section('header')
    
    <?php $student_id = Auth::user()->username ?>

@stop

@section('content')

<div class="main-container row">

        <div id="profile_head">
            <h4 class="center">Quizzes</h4>
            <a id="return_button" class="btn-floating" href="/online_quizzing/student/"><i class="fa fa-arrow-left"></i></a>
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
                   $quizzes=DB::table('Register_Course')
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
                                ->where([['quiz.date','<',$cur_date],['student_id',$student_id]])
                                ->orWhere([['quiz.end_time','<',$cur_time],['quiz.date','=',$cur_date],['student_id',$student_id]])
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
                    $quizzes=DB::table('Register_Course')->where('student_id',$student_id)
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
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
                        <?php 
                            $result=DB::table('Score')->where('student_id',$student_id)->where('quiz_id',$quiz->id)->get();
                            if(count($result)==0)
                            {
                        ?>
                            <a class="waves-effect btn col s6 offset-s3" href="<?php 
                                Session::put('quiz_id',$quiz->id);
                            echo '/online_quizzing/give_quiz' ?> ">Participate</a>
                        <?php
                            }
                            else
                            {
                        ?>
                            <a class="waves-effect btn col s6 offset-s3" >Completed</a>
                            <?php
                                }
                            ?>
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
            
                    /*$quizzes=DB::table('Register_Course')->where('student_id',$student_id)
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
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
                    $quizzes=DB::table('Register_Course')
                                ->join('quiz','quiz.course_id','=','Register_Course.course_id')
                                ->where([['quiz.date','>',$cur_date],['student_id',$student_id]])
                                ->orWhere([['quiz.start_time','>',$cur_time],['quiz.date','=',$cur_date],['student_id',$student_id]])
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
                        
                        
                     </div>   
                <?php
                    }
                ?>
            
            </div>
            </div>
        
        
    </div>
@stop


