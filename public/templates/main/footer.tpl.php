<br>
      <footer class="footer">
        <div class="container">
          <p> Copyright &copy; 2018 <?= __("Всички права са запазени!") ?> </p>
        </div><!-- /container -->
      </footer>

  <div id="fb-root"></div>
  <script type='text/javascript'>var fbFormichka = new Array();</script>
  <script src="<?= HTTP_ROOT ?>public/js/jquery.min.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/facebook.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/mansonry.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/imagesLoaded.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/bootstrap.min.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/main.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/bootstrap-notify.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/bootstrap-select.js?v=<?= time(); ?>"></script>
  <script src="<?= HTTP_ROOT ?>public/js/quiz_preview.js?v=<?= time(); ?>"></script>
  <?php if(isset($_SESSION) && $_SESSION['logged'] === TRUE): ?>
    <script src="<?= HTTP_ROOT ?>public/js/deleteResponse.js?v=<?= time(); ?>"></script>
  <?php endif; ?>
  <?php if(isset($_GET['param']) && $_GET['action'] === "create"): ?>
    <script src="<?= HTTP_ROOT ?>public/js/upload.js?v=<?= time(); ?>"></script>
    <script src="<?= HTTP_ROOT ?>public/js/picUpload.js?v=<?= time(); ?>"></script>
    <script src="<?= HTTP_ROOT ?>public/js/<?= $_GET['param'] ?>_quiz.js?v=<?= time(); ?>"></script>
  <?php endif; ?>
  
</body>
</html>