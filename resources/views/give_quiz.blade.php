@extends('layout');


@section('header')
	<?php $student_id = Auth::user()->username ?>

	<script type="text/javascript">
		
		var end_time="<?php echo $quiz->end_time; ?>".split(':');
			var cur_time="<?php echo date("H:i:s"); ?>".split(':');

	try{
		var xmlHttp=new XMLHttpRequest();
	}
	catch(e)
	{
		alert('error in xml object');
	}
	

	function save_answer(question_id)
	{
		//var options_count=document.getElementById('options_table').childElementCount;
		var formdata=new FormData(document.getElementById('answer_form'));
		formdata.append('_token','<?php echo csrf_token() ?>');
		//formdata.append('options_count',options_count);
		formdata.append('student_id','{{  $student_id }}');
		formdata.append('question_id',question_id);
		if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
		{
			xmlHttp.open('POST','/online_quizzing/save_answer',true);
			xmlHttp.onreadystatechange=notify_about_save();
			xmlHttp.send(formdata);
		}
        document.getElementById('box'+question_id).style.backgroundColor='green';
	}

	function notify_about_save()
	{
		if(xmlHttp.readyState==4)
		{
			if(xmlHttp.status==200)
			{
				response=xmlHttp.responseText;
				var x=document.createElement('div');
				x.innerHTML=response;
				x.className='col l6';
				document.getElementById('submit-button').appendChild(x);
			}
		}
		else
		{
			setTimeout('notify_about_save()',500);
		}
		
	}


	function answer_question(ques_id)
	{
		if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
		{
			xmlHttp.open('GET','/online_quizzing/answer_question/'+ques_id,true);
			xmlHttp.onreadystatechange=update_div_ques();
			xmlHttp.send(null);
		}
	}

	function update_div_ques()
	{
		if(xmlHttp.readyState==4)
		{
			if(xmlHttp.status==200)
			{
				response=xmlHttp.responseText;
				document.getElementById('ques').innerHTML=response;
			}
			
		}
		else
		{
			setTimeout('update_div_ques()',500);
		}
	}

	
	</script>

@stop


@section('content')

	
	<div class="main-container row">
		<!-- <div class="col l4"> style="width:700px;float:center"   -->

			
			<?php $i=0;
					$quiz_questions=$quiz->questions;
					$quiz_questions=$quiz_questions->shuffle();
					$len=count($quiz_questions);
				?>
			<div id="ques" class="col l8">

			</div>

			<div id="quiz" class="col l4">
			<div id="timer" class="center-align" style='font-size: 50px;'>Timer</div>
				<ul>
				
				@foreach($quiz_questions as $question)
					<li>
					<div class="col l3">
						<span id="<?php echo 'box'.$question->id ?>" class="waves-effect btn qno" onclick="answer_question( {{ $question->id }} ) "><?php 
					echo $i+1; $i++; ?></span>
					</div></li>
				@endforeach
				</ul>

			</div>
			<div class="center-align">
					<a class="waves-effect btn" href="#modal1">End Quiz</a>

					<div id="modal1" class="modal">
						<div class="modal-content"><h4>Are you sure ?</h4></div>
						<div class="modal-footer">
							<a href="#" class="modal-action modal-close waves-effect btn-flat">No</a> 
							<a href="/online_quizzing/submit_quiz/{{ $quiz->id }}" class="modal-action modal-close waves-effect btn-flat">Yes</a>
						</div>

					</div>					
			</div>





			
		<!-- </div> -->
	</div>
	<script type="text/javascript">
	var hours,mins,secs;
	var currentdate = new Date(); 
         cur_hours=currentdate.getHours() ;
               
          cur_mins= currentdate.getMinutes();
           cur_secs= currentdate.getSeconds();
		 hours=parseInt(end_time[0])-parseInt(cur_hours);
		 mins=parseInt(end_time[1])-parseInt(cur_mins);
		 secs=parseInt(end_time[2])-parseInt(cur_secs);
		function timer()
	{
		//var time_left=end_time-cur_time;
		
		if(secs<0)
		{
			mins--;
			secs=60+secs;
		}
		if(mins<0)
		{
			hours--;
			mins+=60;
		}
		if(hours<0)
		{
			window.location.href="<?php echo '/online_quizzing/submit_quiz/'.$quiz->id; ?>";
		}
		else
		{
			document.getElementById('timer').innerHTML=hours+" : "+mins+" : "+secs;
			setTimeout('timer()',1000);
			secs--;
		}


		
	}
	timer();
	</script>

@stop