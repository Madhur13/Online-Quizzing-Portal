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

