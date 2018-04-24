<div class="container main">
  <div class="row grid-wrapper">
    <?php foreach($this->data['quizes'] as $quiz): ?>
    <div class="col-sm-6 col-md-4 masonry">
      <a href="<?= HTTP_REDIR ?>?page=quiz&action=preview&id=<?= $quiz->id ?>" class="thumbnail-lnk">
      <div class="thumbnail">
        <img src="<?= HTTP_ROOT ?>public/images/quizes/quiz<?= $quiz->id ?>/bg.png?v=<?= time() ?>" alt="<?= $quiz->question ?>">
        <div class="caption">
          <h3> <?= $quiz->question ?> </h3>
          <?php if(isset($_SESSION) && $_SESSION['logged'] === TRUE): ?>
          <div class="pull-right">
          <!-- <button class="btn btn-sm btn-primary">Редактирай</button>&nbsp;&nbsp;&nbsp;&nbsp; -->
          <button onclick='deleteQuiz(<?= $quiz->id ?>); return false;' class="btn btn-sm btn-danger">Изтрий</button>
          </div>
          <div class="clearfix"></div>
          <?php endif; ?>
        </div>
      </div><!-- /thumbnail -->
      </a>
    </div><!-- /col-md-4 -->
    <?php endforeach; ?>
  </div><!-- /row -->
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <button class="btn btn-default btn-lg" id="loader"><i class="fas fa-spinner" id="loader-icon"></i> <?= __("Зареди още") ?></button>
    </div><!-- /col-md-6 -->
  </div><!-- /row -->
</div><!-- /container -->