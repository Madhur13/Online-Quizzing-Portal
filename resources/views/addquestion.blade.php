<html>
<head>
    
</head>
<body>
<h5>Statement</h5>
<form id="question_data">
    
    <div>
		<textarea style="height:100px" name="body"></textarea>
	</div>

	<div>
		<table id="options">
			<tr>
				<td>1</td>
				<td> <div class="col l10"> <textarea name="option1"></textarea>  </div></td>
				<td><input type="checkbox" class="filled-in" id="filled-in-box" name="correct1">
				<label for="filled-in-box"></label></td>
			</tr>
		</table>
		
	</div>
</form>

<button class="waves-effect btn col s4 offset-s2" onclick='addoption()'>Add Option</button>      <!-- Button placed outside form to prevent form from redirecting to the same page because form data is to be processed by javascript function addoption() -->
<button class="waves-effect btn col s4" onclick="savequestion()">Save</button>
    
</body>
</html>