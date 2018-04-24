<?php
$filters = array( 
  0 => 'no-filter', 
  1 => 'smile', 
  2 => 'smile_2', 
  3 => 'hot', 
  4 => 'old', 
  5 => 'young', 
  6 => 'female_2',
  7 => 'female', 
  8 => 'male', 
  9 => 'pan.hitman', 
  10 => 'hollywood', 
  11 => 'heisenberg', 
  12 => 'impression', 
  13 => 'lion', 
  14 => 'goatee', 
  15 => 'hipster', 
  16 => 'bangs', 
  17 => 'glasses', 
  18 => 'wave', 
  19 => 'makeup'
);
?>
 <div class="container main">
    <div class="page-header">
      <h2><a href="#">Title</a></h2>
      <h5>Please write the quiz title. (ex. "How well do you know Starwars?", "Can you name all the countries just by their outline?", etc..)</h5>
    </div>
    <div class="form-group">
      <input type="text" name="question" class="form-control" id="title" placeholder="Enter the quiz title">
    </div>

    <BR>
    <h2><a href="#">ViralApp(faceapp) Filter:</a></h2>
      <h5>Choose correct filter for all user picture.</h5>
    <div class="form-group">
      <select name="filter" class="selectpicker show-tick" id="filter_select">
        <option>Choose a filter</option>
      <?php foreach($filters as $filter): ?>
        <option><?= $filter ?></option>
      <?php endforeach; ?>
      </select>
       
    </div>

    <div class="page-header">
      <h2><a href="#">Results</a></h2>
      <h5>Please upload photos for the diffrent results from the quiz by drawing them into the field</h5>
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
    <div class="text-center">
        <button class="btn btn-sample btn-lg" id="add_quiz_btn" onclick="addQuiz()">Create Quiz!</button>
    </div>
  </div><!-- /container -->


<script>
  var background_images = new Array(),
      cover_id;
</script>

