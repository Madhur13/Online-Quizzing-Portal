@extends('layout');

@section('header')

	<script type="text/javascript">
		try{
				var xmlHttp=new XMLHttpRequest();
				//document.getElementById("abc").innerHTML="<p>gsff</p>";
			}
				catch(e)
			{
					alert("error in xml object");
			}

			var option_count=1;
			function addoption()
					{
						option_count++;
						var x=document.createElement("tr");
						x.innerHTML='<td>'+option_count+'</td><td>  <div class="col l10"><textarea name="option'+option_count+'"></textarea></div>  </td>';
						x.innerHTML+='<td><input type="checkbox" class="filled-in" id="'+option_count+'" name="correct'+option_count+'"><label for="'+option_count+'"></label></td>';
						document.getElementById('options').appendChild(x);
					}


            function delete_question(question_id)
			{
				if(xmlHttp.readyState==0||xmlHttp.readyState==4)
				{
					xmlHttp.open('GET','/online_quizzing/delete_question/'+question_id,true);
					xmlHttp.onreadystatechange=refresh_after_delete();
					xmlHttp.send(null);
				}
			}

			function refresh_after_delete()
			{
				if(xmlHttp.readyState==4)
				{
					
					if(xmlHttp.status==200)
					{
						response=xmlHttp.responseText;
						if(response=='1')
						{
							window.location.reload();
							document.getElementById('ques').innerHTML=response;

						}
						else
						{
							window.location.href="/online_quizzing/access_denied";
						}
					}
					else
					{
						alert("something went wrong");
					}
				}
				else
				{
					setTimeout('refresh_after_delete()',500);
				}
			}
			



			function savequestion()
			{
				var formdata=new FormData(document.getElementById('question_data'));
				formdata.append('option_count',option_count);
				option_count=1;
				formdata.append('quiz_id',{{ $quiz->id }});
				formdata.append('_token','<?php echo csrf_token() ?>');
				if(xmlHttp.readyState==0|| xmlHttp.readyState==4)
				{
					xmlHttp.open('POST','/online_quizzing/savequestion',true);
					xmlHttp.readystatechange=refresh_after_save();
					xmlHttp.send(formdata);
				}
			}


			function refresh_after_save()
			{
				if(xmlHttp.readyState==4)
				{
					
					if(xmlHttp.status==200)
					{
						response=xmlHttp.responseText;

						document.getElementById("quiz").innerHTML=response;
					}
					else
					{
						alert("something went wrong");
					}
				}
				else
				{
					setTimeout('refresh_after_save()',500);
				}
			}




		function addquestion()
		{
			option_count=1;
			if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
			{
				xmlHttp.open("GET","/online_quizzing/addquestion",true);
				xmlHttp.onreadystatechange=display();
				xmlHttp.send(null);
			}
		}
        
		function func(question)
		{
			if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
			{
					//document.getElementById("abc").innerHTML="changeauction called";
					xmlHttp.open("GET","/online_quizzing/question/"+question,true);
					xmlHttp.onreadystatechange=display();
					xmlHttp.send(null);
			}
			
		}
		function display()
		{

			if(xmlHttp.readyState==4)
			{
				
				if(xmlHttp.status==200)
				{
					response=xmlHttp.responseText;

					document.getElementById("ques").innerHTML=response;
				}
				else
				{
					alert("something went wrong");
				}
			}
			else
			{
				setTimeout('display()',500);
			}
		}
	</script>
    <?php $faculty_id = Auth::user()->username ?>
@stop


@section('content')
	<div class="main-container row">
        
        <div id="profile_head">
            <h4 class="center">Manage Quiz</h4>
            <a id="return_button" class="btn-floating" href="/online_quizzing/faculty/"><i class="fa fa-arrow-left"></i></a>
        </div>
        
        
        <div  id="quiz" class="col l4">
        <div class="col l12">
            <ul>
                        <?php $i=1 ?>
                        @foreach($quiz->questions as $question)
                            <li>
                            <div class="col l3" >
                            <span class="waves-effect btn qno" onclick="func( {{ $question->id }} )">{{$i++}}</span>
                            </div>
                            </li>
                        @endforeach
            </ul>
            </div>	
        <button  class="waves-effect btn col l6 offset-l3" onclick="addquestion()">Add Question</button>    
        </div>
        
			

			
				<div id="ques" align="center" class="col l6 offset-l1 s12">
					
				</div>
	</div>
@stop