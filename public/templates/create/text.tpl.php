 <div class="container main">
    <div class="page-header">
      <h2><a href="#"><?= __("Заглавие") ?></a></h2>
      <h5><?= __("Въведете_заглавие_на_теста_пример_Какъв_ще_бъдеш_в_следващия_си_живот") ?></h5>
    </div>
    <div class="form-group">
      <input type="text" name="question" class="form-control" id="title" placeholder="<?= __("Въведи_заглавието_тук") ?>">
    </div>

    <BR>
    <h2><a href="#"><?= __("Позиция_на_снимките") ?></a></h2>
      <h5><?= __("Изберете_подходяща_позиция_за_всички_снимки") ?></h5>
    <div class="form-group">
       <!-- 3 state button -->
      <div class="switch-toggle switch-3 switch-ios">
          <input id="left" value='left' name="imgPosition" type="radio" checked="" onfocus="blur()">
          <label for="left" onclick=""><?= __("в_ляво") ?></label>
      
      <input id="center" value='middle' name="imgPosition" type="radio" checked="checked" onfocus="blur()">
              <label for="center" onclick=""><?= __("в_средата") ?></label>
      
          <input id="right" value='right' name="imgPosition" type="radio" onfocus="blur()">
          <label for="right" onclick=""><?= __("в_дясно") ?></label>
          <a></a>
      </div>
      <!-- /3 state button -->
    </div>

    <div class="page-header">
      <h2><a href="#"><?= __("Вашите_случайни_снимки") ?></a></h2>
      <h5><?= __("Въведете_няколко_снимки_за_по_интересни_и_различни_резултати_всеки_път") ?></h5>
    </div> 
    <iframe style="width:100%; height:250px" src="<?= HTTP_ROOT ?>public/templates/uploader/file_upload.php" frameborder="0"></iframe>
    <input type="file" name="file" id="file" class="inputfile" multiple accept="image/*"/>
    <label for="file" class="btn btn-sample btn-lg"><?= __("Изберете файл") ?></label>
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
        <button class="btn btn-sample btn-lg" id="add_quiz_btn" onclick="addQuiz()"><?= __("Създай тест") ?></button>
    </div>
  </div><!-- /container -->
<script>
  var background_images = new Array(),
      cover_id;
</script>
