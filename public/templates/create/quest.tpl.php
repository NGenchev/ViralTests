  <div class="container main">
    <div class="page-header">
      <h2><a href="#">Title</a></h2>
      <h5>Please write the quiz title. (ex. "How well do you know Starwars?", "[Geography Test] Can you name all the countries just by their outline?")</h5>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="title" placeholder="Enter the quiz title">
    </div>
    <div class="page-header">
      <h2><a href="#">Questions</a></h2>
      <h5>Create your questions with multiple choice answers. There can be only 1 correct answer per question, and you can select it by checking the radio button!</h5>
    </div>
    <div class="questions">
      <div class="panel panel-default question">
        <div class="panel-heading"><a href="#"><h3>Question </h3></a></div>
        <div class="panel-body">
          <div class="form-group">
            <label>Text for the question:</label>
            <input type="text" class="form-control" placeholder="Enter the text for question!">
          </div>
          <hr>
          <strong>
            <p>Answers: </p>
          </strong>
          <div class="row answers">
            <div class="col-md-6 answer">
              <div class="form-group">
                <input type="text" class="form-control" aria-label="Answer " placeholder="Enter text for the answer!">
                <button class="btn btn-xs btn-default remove_answer_btn">X</button>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-6 answer">
              <div class="form-group">
                <input type="text" class="form-control" aria-label="Answer " placeholder="Enter text for the answer!">
                <button class="btn btn-xs btn-default remove_answer_btn">X</button>
              </div><!-- /input-group -->
            </div>
          </div>
          <br>
          <button class="btn btn-sample" id="add_answer_btn">Add Answer!</button>
        </div>
      </div>
    </div>
    <div class="page-header">
      <h2><a href="#">Results</a></h2>
      <h5>Please upload photos for the diffrent results from the quiz by draggin them into the field</h5>
    </div> 
    <iframe style="width:100%; height:250px" src="<?= HTTP_ROOT ?>public/templates/uploader/file_upload.php" frameborder="0"></iframe>
    <input type="file" name="file" id="file" class="inputfile" multiple accept="image/*"/>
    <label for="file" class="btn btn-sample btn-lg">Choose a file</label>
    <br>
    <div class="row imgs">

    </div>
    <div class="progress" style="display:none;">
      <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
      </div>
    </div>
    <div id="temp-container" style="display:none;">
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <button class="btn btn-sample btn-lg pull-left" id="add_question" onclick="addQuestion()">Add Question!</button>
    <button class="btn btn-sample btn-lg pull-right" id="add_quiz_btn" onclick="addQuiz()">Create Quiz!</button>
    <div class="clearfix"></div>
  </div><!-- /container -->
<script>
  var background_images = new Array(),
      cover_id;
</script>
