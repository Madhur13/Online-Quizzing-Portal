<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Route::post('/login','dashboardController@login_check');

Route::post('/signup','dashboardController@signup');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard','dashboardController@dashboard');

    Route::get('/logout','dashboardController@logout');

    //Function to attach role
    Route::get('/attachRole/{role}','dashboardController@attachRole');
	


Route::get('/online_quizzing/quiz/{quiz}','QuizController@edit');   //

Route::get('/online_quizzing/question/{question}','QuizController@question');   //

Route::get('/online_quizzing/addquestion','QuizController@addquestion');

Route::post('/online_quizzing/savequestion','QuizController@savequestion');

Route::get('/online_quizzing/quiz_questions',function()
	{
		return view('quiz_questions');
	});

Route::get('/online_quizzing/give_quiz','QuizController@give_quiz');    //

Route::get('/online_quizzing/answer_question/{ques}','QuizController@answer_question'); //

Route::post('/online_quizzing/save_answer','QuizController@save_answer');

Route::get('/online_quizzing/faculty/','QuizController@facultyhome');

Route::get('/online_quizzing/faculty_quiz/','QuizController@faculty_quiz');

Route::get('/online_quizzing/phostquiz/','QuizController@hostquiz');

Route::get('/online_quizzing/submit_quiz/{quiz}','QuizController@submit_quiz'); //

Route::get('/online_quizzing/view_profile/','QuizController@view_profile');

Route::get('/online_quizzing/student/','QuizController@studenthome');

Route::get('/online_quizzing/student_quiz/','QuizController@student_quiz');

Route::get('/online_quizzing/view_result/{quiz}','QuizController@view_result'); //

Route::post('/online_quizzing/add_quiz/','QuizController@add_quiz');
   
Route::get('/online_quizzing/delete_question/{question_id}','QuizController@delete_question');     
    
Route::get('/online_quizzing/add_question_editor/',function(){
    return view('add_question_editor');
});
    
Route::get('/online_quizzing/access_denied',function(){
    return view('access_denied');
});
    
});