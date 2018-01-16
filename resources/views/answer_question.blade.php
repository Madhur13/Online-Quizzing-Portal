<html>
<head>
    <?php $student_id = Auth::user()->username; ?>
</head>
<body >
<div align="center">
<h5 >Statement:</h5>
<div ><p>{{ $ques->body }} </p></div>
<form id="answer_form">
	<div>
		<table id="options_table">
		<?php $j=1 ;
			$response=DB::table('response')->where('student_id',$student_id)->where('question_id',$ques->id)->first();
			if($response)
			{
				$response_options=DB::table('response_option')->where('response_id',$response->id)->get();
			}

		?>
		@foreach($ques->options as $option)
			<?php
				$flag=0;
				if($response)
				{
						foreach ($response_options as $chosen_option)
						{
							if($option->id==$chosen_option->option_id)
							{
								$flag=1;
								break;
							}
						}
				}
			?>
			<tr class="col l6 offset-l3">
				<td class="col l1">{{ $j++ }}</td>
				<td class="col l10"><div>{{ $option->body }}</div></td>
				<td class="col l1">
					<input id="{{ $j }}" type="checkbox" <?php if($flag==1){echo 'checked="true"';} ?>class="filled-in" name="response[]" value=<?php echo '"'.$option->id.'"' ?> />
					<label for="{{ $j }}"></label>
				</td>
			</tr>
		@endforeach
		</table>
	</div>
</form>

<div class="row" id="submit-button">
	<div class="col l6">
	<button  class="waves-effect btn" onclick="save_answer({{ $ques->id }})">Submit</button>
	</div>
</div>


</div>
</body>
</html>