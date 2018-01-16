
		<div>
			<h3>Statement</h3>
			<br>
			<div class="col l12">
			<p>{{ $question->body }}</p>
			</div>
			<br>

			<table>
			<?php  $i=1;?>
				@foreach($question->options as $option)
					<tr class="col l8 offset-l4">
						<td class="col l2">{{$i++}}</td>
						
						<td class="col l8">{{ $option->body}} </td>
						
						<td class="col l2">
							<?php
								if($option->correctness==1)
								{
									echo '<input type="checkbox" class="filled-in" checked="checked">
									<label></label>';
								}
								else
								{
									echo '<input type="checkbox" class="filled-in" >
									<label></label>';
								}
							?>

						</td>
					</tr>
					<br>
				@endforeach
			</table>
            <br><br>
            <a class="waves-effect btn col l4 offset-l4" onclick="delete_question({{ $question->id }})">Remove Question</a>
		</div>
	