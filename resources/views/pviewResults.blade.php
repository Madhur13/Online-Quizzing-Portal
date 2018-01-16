@extends('layout')

@section('content')

    <div class="main-container row">
        <div id="profile_head">
            <h4 class="center">View Results</h4>
            <?php 
                $user = Auth::user();
                if($user->user_type == "student")
                    echo '<a id="return_button" class="btn-floating" href="/online_quizzing/student/"><i class="fa fa-arrow-left"></i></a>';
                else
                    echo '<a id="return_button" class="btn-floating" href="/online_quizzing/faculty/"><i class="fa fa-arrow-left"></i></a>';
            ?>
            
        </div>
        
            <table class="bordered highlight">
                    <thead>
                        <tr>    
                            <th>SNo</th>
                            <th>Name</th>
                            <th>Roll Number</th>
                            <th>
                                <?php
                                    $questions=DB::table('questions')->where('quiz_id',$quiz->id)->get();
                                    echo "Marks ( ".count($questions)." )";
                                ?>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result=DB::table('Score')
                                    ->where('Score.quiz_id',$quiz->id)
                                    ->join('Student','Score.student_id','Student.student_id')
                                    ->orderby('Student.roll_no')
                                    ->get();
                        $i=1;
                        foreach($result as $x)
                        {


                    ?>
                        
                            <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->roll_no  }}</td>
                            <td>{{ $x->marks }}</td>
                            </tr>
                        <?php
                            }
                    ?>
                </tbody>
                </table>
    
    </div>
    
@stop
