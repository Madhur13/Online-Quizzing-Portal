@extends('layout')

@section('content')
	
	<h1 class="c">Quizzes </h1>
	<table align="center" border="1" cellspacing="5">
		<tr>
			<th>Quiz No</th>
			<th>Duration</th>
		</tr>
		<?php $i=1 ?>
		@foreach($quizzes as $quiz)
			<tr>
				<td><a href=' /online_quizzing/quiz/{{ $quiz->id }} ' > {{ $i++ }}</a></td>
				<td>{{ $quiz->duration }}</td>
			</tr>
		@endforeach
		
	</table>
@stop
