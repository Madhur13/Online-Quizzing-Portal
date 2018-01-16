<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Quiz;

use App\Option;

use App\Question;

use App\Response;

use App\Response_option;

use App\Score;

use Auth;

use DB;

use Session;

class QuizController extends Controller
{
    public function edit(Quiz $quiz)    
    {
            $user = Auth::user();
        	if($user->user_type == "faculty")
    		{
                $faculty_id=Auth::user()->username;
                $get_faculty=DB::table('quiz')
                                ->where('quiz.id',$quiz->id)
                                ->join('course_taken_by','course_taken_by.course_id','quiz.course_id')
                                ->first();
                
                if(strcmp($faculty_id,$get_faculty->faculty_id)==0)
                {
                    return view('edit_quiz',compact('quiz'));
                }
                else
                {
                    return Redirect::to('/online_quizzing/access_denied');
                }
    		}
        
        return Redirect::to('/online_quizzing/access_denied');
    }

    public function question(Question $question)    // faculty id & question id check is remaining
    {
        if(Auth::user()->user_type == "faculty")
        {
            $faculty_id=Auth::user()->username;
            $get_faculty=DB::table('questions')
                            ->where('questions.id',$question->id)
                            ->join('quiz','questions.quiz_id','quiz.id')
                            ->join('course_taken_by','course_taken_by.course_id','quiz.course_id')
                            ->select('questions.*','course_taken_by.*','quiz.id as quizid')
                            ->first();
            
            if(strcmp($faculty_id,$get_faculty->faculty_id)==0)
            {
    	       return view('question',compact('question'));
            }
            else
            {
                return Redirect::to('/online_quizzing/access_denied');
            }
        }
        
        return Redirect::to('/online_quizzing/access_denied');
    }

    public function addquestion()   // faculty id & addquestion check is remaining
    {
        if(Auth::user()->user_type == "faculty")
            return view('addquestion');
		
    	return Redirect::to('/logout');
    }

    public function savequestion(Request $request)
    {
    	$body=$_POST['body'];
		$option_count=$_POST['option_count'];
		$quiz_id=$_POST['quiz_id'];
		$quiz=Quiz::find($quiz_id);
		$ques=new Question;
		$ques->body=$body;
		$quiz->addquestion($ques);
		for($i=1;$i<=$option_count;$i++)
        {
            $correctness=0;
            if(isset($_POST['correct'.$i]))
            {
                $correctness=1;
            }
            $option_body=$_POST['option'.$i];
            $option=new Option;
            $option->body=$option_body;
            $option->correctness=$correctness;
            $ques->addoption($option);
        }
        
    	return view('quiz_questions',compact('quiz'));
    }


    public function give_quiz()   // student id & quiz id check is remaining
    {
        if(Auth::user()->user_type == "student")
        {
            if(Session::get('quiz_id'))
            {   
                $cur_date=date("Y-m-d"); 
                $cur_time=date("H:i:s");

                $student_id=Auth::user()->username;
                $quiz_id=Session::get('quiz_id');
                $result=DB::table('quiz')
                            ->where('quiz.id',$quiz_id)
                            ->where('quiz.date','=',$cur_date)
                            ->where('quiz.start_time','<',$cur_time)
                            ->where('quiz.end_time','>',$cur_time)
                            ->join('Register_course','Register_course.course_id','quiz.course_id')
                            ->where('student_id',$student_id)
                            ->first();
                if($result)
                {
                    $quiz=Quiz::find($quiz_id);
                    return view('give_quiz',compact('quiz'));
                }
                else
                    return Redirect::to('/online_quizzing/access_denied');
            }
            else
            {
                return Redirect::to('/online_quizzing/access_denied');
            }
        }
       
        return Redirect::to('/online_quizzing/access_denied');
    }

    public function answer_question(Question $ques)
    {
        if(Auth::user()->user_type == "student")
        {
            $cur_date=date("Y-m-d"); 
            $cur_time=date("H:i:s");

            $student_id=Auth::user()->username;
            $result=DB::table('questions')
                            ->where('questions.id',$ques->id)
                            ->join('quiz','questions.quiz_id','quiz.id')
                            ->join('Register_course','Register_course.course_id','quiz.course_id')
                            ->where('student_id',$student_id) 
                            ->where('quiz.date','=',$cur_date)
                            ->where('quiz.start_time','<',$cur_time)
                            ->where('quiz.end_time','>',$cur_time)
                            ->select('questions.*','Register_course.*','quiz.id as quizid')
                            ->first();
            if($result)
            {
                return view('answer_question',compact('ques'));
            }
            else
            {
                return Redirect::to('/online_quizzing/access_denied');
            }
        }
        else
        {
            return Redirect::to('/online_quizzing/access_denied');
        }
    }

    public function save_answer()
    {

        $student_id=$_POST['student_id'];
        $question_id=$_POST['question_id'];
        
        $prev_response=Response::where('student_id',$student_id)->where('question_id',$question_id)->get();
        if(count($prev_response)!=0)
        {
            $prev_response_id=$prev_response[0]->id;
            Response_option::where('response_id',$prev_response_id)->delete();
            Response::where('student_id',$student_id)->where('question_id',$question_id)->delete();
        }
        if(isset($_POST['response']))
        {
            $response_array=$_POST['response'];

            if(count($response_array)!=0)
            {
                $response=new Response;
                $response->student_id=$student_id;
                $response->question_id=$question_id;
                $response->save();
                foreach($response_array as $option_id)
                {
                    $response_option=new Response_option;
                    $response_option->response_id=$response->id;
                    $response_option->option_id=$option_id;
                    $response_option->save();
                }
            }
        }

        //add code to insert answer,, but first create necessary tables baby!!
        return '<i class="material-icons">done</i>';
    }



    public function facultyhome()
    {
        if(Auth::user()->user_type == "faculty")
            return view('facultyPage');
        else
            return Redirect::to('/logout');
    }

    public function faculty_quiz()
    {
            if(Auth::user()->user_type == "faculty")
                return view('pfacultyPage');
            else
               return Redirect::to('/logout'); 
    }

    public function hostquiz()
    {
        $user = Auth::user();
        if($user->user_type == "faculty")
		{
           return view('phostQuiz');
		}
        return redirect('/logout');
    }

    public function student_quiz()
    {
        if(Auth::user()->user_type == "student")
            return view('pstudentPage');
        else
            return Redirect::to('/logout');
    }

    public function studenthome()
    {
        if(Auth::user()->user_type == "student")
            return view('studentPage');
        else
            return Redirect::to('/logout');
    }

    public function submit_quiz(Quiz $quiz)
    {
        $student_id = Auth::user()->username;
        $marks=0;
        $quiz_questions=$quiz->questions;
        foreach($quiz_questions as $question)
        {

            $correct_options=Option::where('question_id',$question->id)->where('correctness',1)->select('id')->get();
            $option_array=array();

            foreach($correct_options as $option)
            {
                array_push($option_array,$option->id);
            }
            sort($option_array);
            $response=Response::where('student_id',$student_id)->where('question_id',$question->id)->get();
            if(count($response)!=0)
            {
                $response_options=$response[0]->options;
                $response_array=array();

                foreach($response_options as $option)
                {
                    array_push($response_array,$option->option_id);
                }
                sort($response_array);
                if(count($response_array)==count($option_array))
                {
                    
                    for($i=0;$i<count($response_array);$i++)
                    {
                        if($response_array[$i]!=$option_array[$i])
                        {
                            break;
                        }
                    }
                    if($i==count($response_array))
                    {
                        $marks++;
                    }
                }
            }
        }
        
        $score=new Score;
        $score->student_id=$student_id;
        $score->marks=$marks;
        $score->quiz_id=$quiz->id;
        $score->save();
        return Redirect::to('/online_quizzing/student/');
    }


    public function view_profile()
    {
        if(Auth::user()->user_type == "student")
            return view('view_profile');
        else
            return Redirect::to("/logout");
    }

    public function view_result(Quiz $quiz) // user id & quiz id check is remaining
    {
        return view('pviewResults',compact('quiz'));
    }

    public function add_quiz(Request $request)
    {
       /* $course_id=$_POST['course_id'];
        $quiz_name=$_POST['quiz_name'];
        $date=$_POST['date'];
        $start_time=$_POST['start_time'];
        $end_time=$_POST['end_time'];*/
        $quiz=new Quiz;
        $quiz->course_id=$request->course_id;
        $quiz->quiz_name=$request->quiz_name;
        $quiz->date=$request->date;
        $quiz->start_time=$request->start_time;
        $quiz->end_time=$request->end_time;
        $quiz->save();
        
        
        return Redirect::to('/online_quizzing/quiz/'.$quiz->id);
    }
    
    public function delete_question($question_id)
    {

        if(Auth::user()->user_type=="faculty")
        {
            
            $faculty_id=Auth::user()->username;
            $get_faculty=DB::table('questions')
                            ->where('questions.id',$question_id)
                            ->join('quiz','questions.quiz_id','quiz.id')
                            ->join('course_taken_by','course_taken_by.course_id','quiz.course_id')
                            ->select('questions.*','course_taken_by.*','quiz.id as quizid')
                            ->first();
            
            if(strcmp($faculty_id,$get_faculty->faculty_id)==0)
            {
            
                $question = Question::find($question_id);
                $options=$question->options();
                foreach($options as $option)
                {
                    $option->delete();
                }
                $question->delete();
    
                return '1';
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }
	

}
