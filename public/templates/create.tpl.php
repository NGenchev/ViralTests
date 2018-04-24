<div class="container main">
    <div class="row">
      <div class="col-md-12">
          <h3 class="text-center"><?= __("Изберете_тип_на_теста") ?></h3>
          <br>
          <div class="row">
              <div class="col-sm-4 col-md-4">
                <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=text" class="thumbnail-lnk">
                <div class="thumbnail">
                  <img src="<?= HTTP_ROOT ?>public/img/quiz_1.png" alt="What is your true love name?">
                  <div class="caption text-center">
                    <h3><?= __("Само_със_снимки") ?></h3>
                    <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=text" class="btn btn-sample btn-lg">
                      <i class="fas fa-plus-circle"></i> <?= __("Добави нов!") ?>
                    </a>
                  </div>
                </div><!-- /thumbnail -->
                </a>
              </div><!-- /col-md-4 -->
              <div class="col-sm-4 col-md-4">
                <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=quest" class="thumbnail-lnk">
                <div class="thumbnail">
                  <img src="<?= HTTP_ROOT ?>public/img/quiz_2.png" alt="What is your true love name?">
                  <div class="caption text-center">
                    <h3><?= __("Снимки_и_въпросник") ?></h3>
                    <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=quiz" class="btn btn-sample btn-lg">
                      <i class="fas fa-plus-circle"></i> <?= __("Добави нов!") ?>
                    </a>
                  </div>
                </div><!-- /thumbnail -->
                </a>
              </div><!-- /col-md-4 -->
              <div class="col-sm-4 col-md-4">
                <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=filter" class="thumbnail-lnk">
                <div class="thumbnail">
                  <img src="<?= HTTP_ROOT ?>public/img/quiz_3.png" alt="What is your true love name?">
                  <div class="caption text-center">
                    <h3><?= __("Снимка_с_филтър_FaceApp") ?></h3>
                    <a href="<?= HTTP_REDIR ?>?page=quiz&action=create&param=filter" class="btn btn-sample btn-lg">
                      <i class="fas fa-plus-circle"></i> <?= __("Добави нов!") ?>
                    </a>
                  </div>
                </div><!-- /thumbnail -->
                </a>
              </div><!-- /col-md-4 -->
          </div>
      </div>
    </div>
  </div><!-- /container -->