<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $this->data['meta']['title'] ?></title>

  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/bootstrap.min.css?v=<?= time(); ?>">
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/animate.css?v=<?= time(); ?>"> 
  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/custom.css?v=<?= time(); ?>"> 
  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/loader.css?v=<?= time(); ?>"> 
  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/toggle_switch.css?v=<?= time(); ?>">
  <link rel="stylesheet" href="<?= HTTP_ROOT ?>public/css/bootstrap-select.css?v=<?= time(); ?>">
</head>
<body>
  <div class="header clearfix">
    <div class="container">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li>
              <a href="<?= HTTP_REDIR ?>?page=quiz&action=create" class="btn btn-sample" id="nav-add-quiz">
                <i class="fas fa-plus-circle"></i> <?= __("Добави тест") ?>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                <img src="<?= HTTP_ROOT ?>public/img/<?= LANG ?>_flag.png"> <?= ModelFunctions::getLanguages(LANG) ?>

                <span class="caret"></span></a>
              <ul class="dropdown-menu">
               <?php foreach (ModelFunctions::getLanguages() as $key => $value) : ?>
                <li><a href="<?= changeLanguage($key) ?>"> <img src="<?= HTTP_ROOT ?>public/img/<?= $key ?>_flag.png"> <?= $value ?> </a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted"><a href="<?= HTTP_REDIR ?>">Facebook Quiz</a></h3>
    </div><!-- /container -->
  </div><!-- /header -->