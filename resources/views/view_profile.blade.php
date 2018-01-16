@extends('layout')

@section('header')
    
    <?php $student_id = Auth::user()->username ?>

@stop

@section('content')

<div class="main-container row">

     <div id="profile_head">
            <h4 class="center">Profile</h4>
            <a id="return_button" class="btn-floating" href="/online_quizzing/student/"><i class="fa fa-arrow-left"></i></a>
        </div>

    
    <?php
        $student=DB::table('Student')->where('student_id',$student_id)->get();
        ?>
	    <table class="highlight">
                <tr>
                    <td>Name :</td>
                    <td>{{ $student[0]->name }}</td>
                </tr>

                <tr>
                    <td>Roll Number :</td>
                    <td>{{ $student[0]->roll_no }}</td>
                </tr>

                <tr>
                    <td>Branch :</td>
                    <td> {{ $student[0]->branch }}</td>
                </tr>

                <tr>
                    <td>Programme :</td>
                    <td> {{ $student[0]->programme }}</td>
                </tr>

    </table>

    <table class="bordered highlight">
    <thead>
        <th>Course Code</th>
	    
	    <th>Quiz</th>
	    <th>Obtain Score</th>
        <th>Maximum Score</th>
	</thead>

    <?php

        $result=DB::table('Register_Course')
                    ->where('Register_Course.student_id',$student_id)
                    ->join('Course','Register_Course.course_id','Course.course_id')
                    ->join('quiz','Register_Course.course_id','quiz.course_id')
                    ->join('Score','Score.student_id','Register_Course.student_id')
                    ->where('Score.quiz_id',DB::raw('quiz.id'))
                    ->select('quiz.id as quizid','Score.marks','Course.course_name','quiz.quiz_name')
                    ->get();

    
	
	       foreach($result as $x)
	       {
    ?>
                <tr>
                <td> {{ $x->course_name }} </td>
			    <td> {{ $x->quiz_name }} </td>
                <td> {{ $x->marks }} </td>
			    <td> 
                    <?php
                        $quiz_id=$x->quizid;
                        $questions=DB::table('questions')->where('quiz_id',$quiz_id)->get();
                        echo count($questions);
                    ?>

                 </td>
			     </tr>
	       
	
	
           <?php
                }
           ?>
	 </table>


    
</div>

@stop