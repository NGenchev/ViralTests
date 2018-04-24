<?php 
  $QUIZ = (array)$this->data['Quiz'];
  $mainQuiz   = (object)$QUIZ['mainQuiz']; 
  $mainQuest  = (object)$QUIZ['mainQuest']; 
  $questions  = count((array)$mainQuest);
?>
<div class="container main">
      <div class="row">
        <div class="col-md-8">
          <div class="thumbnail main-tumbnail">
          <svg id="loading">
            <g>
              <path class="ld-l" fill="#39C0C4" d="M43.6,33.2h9.2V35H41.6V15.2h2V33.2z"/>
              <path class="ld-o" fill="#39C0C4" d="M74.7,25.1c0,1.5-0.3,2.9-0.8,4.2c-0.5,1.3-1.2,2.4-2.2,3.3c-0.9,0.9-2,1.6-3.3,2.2
                c-1.3,0.5-2.6,0.8-4.1,0.8s-2.8-0.3-4.1-0.8c-1.3-0.5-2.4-1.2-3.3-2.2s-1.6-2-2.2-3.3C54.3,28,54,26.6,54,25.1s0.3-2.9,0.8-4.2
                c0.5-1.3,1.2-2.4,2.2-3.3s2-1.6,3.3-2.2c1.3-0.5,2.6-0.8,4.1-0.8s2.8,0.3,4.1,0.8c1.3,0.5,2.4,1.2,3.3,2.2c0.9,0.9,1.6,2,2.2,3.3
                C74.4,22.2,74.7,23.6,74.7,25.1z M72.5,25.1c0-1.2-0.2-2.3-0.6-3.3c-0.4-1-0.9-2-1.6-2.8c-0.7-0.8-1.6-1.4-2.6-1.9
                c-1-0.5-2.2-0.7-3.4-0.7c-1.3,0-2.4,0.2-3.4,0.7c-1,0.5-1.9,1.1-2.6,1.9c-0.7,0.8-1.3,1.7-1.6,2.8c-0.4,1-0.6,2.1-0.6,3.3
                c0,1.2,0.2,2.3,0.6,3.3c0.4,1,0.9,2,1.6,2.7c0.7,0.8,1.6,1.4,2.6,1.9c1,0.5,2.2,0.7,3.4,0.7c1.3,0,2.4-0.2,3.4-0.7
                c1-0.5,1.9-1.1,2.6-1.9c0.7-0.8,1.3-1.7,1.6-2.7C72.4,27.4,72.5,26.3,72.5,25.1z"/>
              <path class="ld-a" fill="#39C0C4" d="M78.2,35H76l8.6-19.8h2L95.1,35h-2.2l-2.2-5.2H80.4L78.2,35z M81.1,27.9h8.7l-4.4-10.5L81.1,27.9z"/>
              <path class="ld-d" fill="#39C0C4" d="M98,15.2h6.6c1.2,0,2.5,0.2,3.7,0.6c1.2,0.4,2.4,1,3.4,1.9c1,0.8,1.8,1.9,2.4,3.1s0.9,2.7,0.9,4.3
                c0,1.7-0.3,3.1-0.9,4.3s-1.4,2.3-2.4,3.1c-1,0.8-2.1,1.5-3.4,1.9c-1.2,0.4-2.5,0.6-3.7,0.6H98V15.2z M100,33.2h4
                c1.5,0,2.8-0.2,3.9-0.7c1.1-0.5,2-1.1,2.8-1.8c0.7-0.8,1.3-1.6,1.6-2.6s0.5-2,0.5-3c0-1-0.2-2-0.5-3c-0.4-1-0.9-1.8-1.6-2.6
                c-0.7-0.8-1.6-1.4-2.8-1.8c-1.1-0.5-2.4-0.7-3.9-0.7h-4V33.2z"/>
              <path class="ld-i" fill="#39C0C4" d="M121.2,35h-2V15.2h2V35z"/>
              <path class="ld-n" fill="#39C0C4" d="M140.5,32.1L140.5,32.1l0.1-16.9h2V35h-2.5l-11.5-17.1h-0.1V35h-2V15.2h2.5L140.5,32.1z"/>
              <path class="ld-g" fill="#39C0C4" d="M162.9,18.8c-0.7-0.7-1.5-1.3-2.5-1.7c-1-0.4-2-0.6-3.3-0.6c-1.3,0-2.4,0.2-3.4,0.7s-1.9,1.1-2.6,1.9
                c-0.7,0.8-1.3,1.7-1.6,2.8c-0.4,1-0.6,2.1-0.6,3.3c0,1.2,0.2,2.3,0.6,3.3c0.4,1,0.9,2,1.6,2.7c0.7,0.8,1.6,1.4,2.6,1.9
                s2.2,0.7,3.4,0.7c1.1,0,2.1-0.1,3.1-0.4c0.9-0.2,1.7-0.5,2.3-0.9v-6h-4.6v-1.8h6.6v9c-1.1,0.7-2.2,1.1-3.5,1.5
                c-1.3,0.3-2.5,0.5-3.9,0.5c-1.5,0-2.9-0.3-4.1-0.8s-2.4-1.2-3.3-2.2c-0.9-0.9-1.6-2-2.1-3.3s-0.8-2.7-0.8-4.2s0.3-2.9,0.8-4.2
                c0.5-1.3,1.2-2.4,2.2-3.3c0.9-0.9,2-1.6,3.3-2.2c1.3-0.5,2.6-0.8,4.1-0.8c1.6,0,3,0.2,4.1,0.7s2.2,1.1,3,2L162.9,18.8z"/>
            </g>
          </svg>
            <img id="testResult" src="<?= HTTP_ROOT ?>public/images/quizes/quiz<?= $mainQuiz->id ?>/bg.png" alt="<?= $mainQuiz->question ?>">
            <?php if(isset($mainQuiz->type) && $mainQuiz->type === "quest"): ?>
            <div class="question_wrapper" style="display: none;">
              <?php $i = 0; foreach($mainQuest as $q): $i++;?>
                <div class="question_preview">
                  <div class="page-header">
                    <h2><a href="#">Q<?= $i ?> : <?= $q->question ?></a></h2>
                  </div>
                  <div class="funkyradio">
                  <?php $j = 0; foreach($q->answers as $ans): $j++;?>
                    <div class="funkyradio-success">
                      <input type="radio" name="quest<?= $i ?>" id="q<?= $i?>a<?= $j ?>" />
                      <label for="q<?= $i?>a<?= $j ?>"><?= $ans ?></label>
                    </div>
                  <?php endforeach; ?>
                  </div>
                  <nav aria-label="...">
                    <ul class="pager">
                      <li class="prev_q_btn<?= $i == 1 ? " disabled" : "" ?> previous"><a><span aria-hidden="true">&larr;</span> Previous question</a></li>
                      <?php if($i === $questions): ?>
                        <li class="next"><a onclick="startQuest()" > Finish </a></li>
                      <?php else: ?>
                        <li class="next_q_btn next"><a><span aria-hidden="true">&rarr;</span> Next question</a></li>
                      <?php endif; ?>
                    </ul>
                  </nav>
                </div> 
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="caption">
              <h3><?= $mainQuiz->question ?></h3>
              <p id="load">
                 <!-- <div class="fb-login-button btn btn-sample" data-scope="email,user_birthday,user_hometown,user_location,user_website,user_work_history,user_about_me
" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div> -->
              <a href="#" class="btn btn-sample social-btn fb-btn btn-lg"  data-scope="email,user_birthday,user_hometown,user_location,user_website,user_work_history,user_about_me
" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false">
<span class="btn-label"><i class="fab fa-facebook-f"></i></span>
<?= __("Вход с Facebook") ?></a>
              </p>
              
              <div class="spinner">
                <div class="spinner-a"></div>
                <div class="spinner-b"></div>
              </div>
              <p id="test-btn">
                <?php if(isset($mainQuiz->type) && $mainQuiz->type === "quest"): ?>
                <button onclick="startQuest()" class="quest-btn btn btn-sample btn-lg">Start the test</button>
                <?php endif;?>
              <div class="action-btns" style="display: none;">
                <input type="file" name="file" onchange='makeLocalTest();' id="file" class="inputfile" multiple accept="image/*" />
                <label for="file" class="btn btn-sample btn-lg">Choose a local image</label>
                <br>
                <strong>OR</strong>
                <br>
                <a style="width:100%;" onclick="makeTest();" class="btn btn-sample btn-lg">
                  <i class="fas fa-question-circle"></i> Click here for facebook image!
                </a>
                </div>
              </p>
              <div class="share">
                <a href="#" class="btn btn-sample social-btn fb-btn">
                  <span class="btn-label"><i class="fab fa-facebook-f"></i></span>
                  Share on facebook</a>
                <a href="#" class="btn btn-sample social-btn twitter-btn">
                  <span class="btn-label"><i class="fab fa-twitter"></i></span>
                  Share on twitter</a>
                <a href="#" class="btn btn-sample social-btn google-btn">
                  <span class="btn-label"><i class="fab fa-google"></i></span>
                  Share on google</a>
              </div>
            </div><!-- /caption -->
          </div><!-- /tumbnail -->
        </div><!-- /col-md-8 -->

        <div class="col-md-4 col-sm-12 aside">
         <!-- <div class=""> -->
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=124066538426010&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-page likebox" data-href="https://www.facebook.com/facebook" data-adapt-container-width="true" data-tabs="timeline" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
         <!-- </div> -->
         <br>

           <div class="row">
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>  
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>  
             <div class="col-md-4 col-sm-4">
              <button type="button" class="aside_banner btn btn-default">88x31</button>
             </div>  
           </div>
        </div><!-- /col-md-4 -->
      </div><!-- /row -->
      <div class="container">
        <div class="row grid-wrapper">
          <?php foreach($this->data['quizes'] as $quiz): ?>
          <div class="col-sm-6 col-md-4 masonry">
            <a href="<?= HTTP_REDIR ?>?page=quiz&action=preview&id=<?= $quiz->id ?>" class="thumbnail-lnk">
            <div class="thumbnail">
              <img src="<?= HTTP_ROOT ?>public/images/quizes/quiz<?= $quiz->id ?>/bg.png" alt="<?= $quiz->question ?>">
              <div class="caption">
                <h3> <?= $quiz->question ?> </h3>
              </div>
            </div><!-- /thumbnail -->
            </a>
          </div><!-- /col-md-4 -->
          <?php endforeach; ?>
        </div><!-- /row -->
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <button class="btn btn-default btn-lg" id="loader"><i class="fas fa-spinner" id="loader-icon"></i> <?= __("Зареди още!")?></button>
          </div><!-- /col-md-6 -->
        </div><!-- /row -->
      </div><!-- /container -->
</div>
<script src="https://embed.runkit.com" crossorigin="anonymous"></script>
<canvas id="myCanvas" width="800" height="420" style="display:none;"></canvas>
<div id="runkit_api" style="display:none;">
    </div>
    <?php if( $mainQuiz->filter  !== 'no-filter'):?>
    <img src="" width="400" height="420" style="display:none;" alt="User Image" id="user_img_filtered">
    <?php endif;?>
    <img src="" width="300" height="420" style="display:none;" alt="User Image" id="user_img">
    <img src="" width="800" height="420" style="display:none;" alt="Overlay Image" id="background_img">
<script>
function makeLocalTest(){
  FB.api('/me', function(response) {
    var input = document.getElementById("file");
    if (input.files.length > 0) {
      $(".action-btns").fadeOut();
      setTimeout(function(){
        $(".action-btns").remove();
      },1500);
      $('#testResult').fadeOut();
      $('#loading').show(100);  
    }
    file = input.files[0];
    var data = new FormData();
    data.append("imageData", file, file.name);
    $.ajax({
      url: "../public/responses/local.response.php",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      type: "POST",
      success: function(url){
        var secure_url = url.splice(4, 0, 's');
        document.getElementById("user_img").setAttribute("src", secure_url);
        console.log('<?= $mainQuiz->filter ?>');
        if('<?= $mainQuiz->filter ?>' !== 'no-filter' ){
          generate_faceapp(secure_url, '<?= $mainQuiz->filter?>', function(dataUrl){
            document.getElementById("user_img_filtered").setAttribute("src", dataUrl);
          });
        }
        var bg_link = "https://viraltest.eu/public/images/quizes/quiz"+<?= $mainQuiz->id ?>+"/pic";
        var imgID = Math.floor(Math.random() * <?= $mainQuiz->random_images ?>) + 1;
        bg_link += imgID + ".png";
        document.getElementById("background_img").setAttribute("src", bg_link);
        var userImg = setInterval(function(){
          if((document.getElementById("user_img").getAttribute("src") === '') == false){
            clearInterval(userImg);
            var backgroundImg = setInterval(function(){
              if((document.getElementById("background_img").getAttribute("src") === '') == false){
                clearInterval(backgroundImg);
                if(document.getElementById("user_img_filtered")){
                  var filterImg = setInterval(function(){
                    if((document.getElementById("user_img_filtered").getAttribute("src") === '') == false){
                      clearInterval(filterImg);
                      finishTest(<?= $mainQuiz->id . ",'" . $mainQuiz->image_position . "' ," ?>document.getElementById("user_img"), document.getElementById("background_img"), document.getElementById("user_img_filtered"));
                    }
                  },1000);
                }else{
                  finishTest(<?= $mainQuiz->id . ",'" . $mainQuiz->image_position . "' ," ?>document.getElementById("user_img"), document.getElementById("background_img"));
                }
              }
            }, 1000);
          }
        }, 1000);
        
      },
      error: function(data){
        console.log(data);
      }
    });
  });
}

function makeTest() {
  $(".action-btns").fadeOut();
  setTimeout(function(){
    $(".action-btns").remove();
  },1500);
  $('#testResult').fadeOut();
  $('#loading').show(100);
  var fb_profile_img = 'https://graph.facebook.com/'+fbFormichka[0].id+'/picture?width=300&height=420'
  toDataURL(fb_profile_img, function (dataUrl) {
    document.getElementById("user_img").setAttribute("src", dataUrl);
    if('<?= $mainQuiz->filter ?>' !== false ){
      generate_faceapp(fb_profile_img, '<?= $mainQuiz->filter?>', function(faceappUrl){
        document.getElementById("user_img_filtered").setAttribute("src", faceappUrl);
      });
    }
    var bg_link = "https://viraltest.eu/public/images/quizes/quiz"+<?= $mainQuiz->id ?>+"/pic";
    var imgID = Math.floor(Math.random() * <?= $mainQuiz->random_images ?>) + 1;
    bg_link += imgID + ".png";
    document.getElementById("background_img").setAttribute("src", bg_link);
    var userImg = setInterval(function(){
      if((document.getElementById("user_img").getAttribute("src") === '') == false){
        clearInterval(userImg);
        var backgroundImg = setInterval(function(){
          if((document.getElementById("background_img").getAttribute("src") === '') == false){
            clearInterval(backgroundImg);
            if(document.getElementById("user_img_filtered")){
              var filterImg = setInterval(function(){
                if((document.getElementById("user_img_filtered").getAttribute("src") === '') == false){
                  clearInterval(filterImg);
                  finishTest(<?= $mainQuiz->id . ",'" . $mainQuiz->image_position . "' ," ?>document.getElementById("user_img"), document.getElementById("background_img"), document.getElementById("user_img_filtered"));
                }
              },1000);
            }else{
              finishTest(<?= $mainQuiz->id . ",'" . $mainQuiz->image_position . "' ," ?>document.getElementById("user_img"), document.getElementById("background_img"));
            }
          }
        }, 1000);
      }
    }, 1000);
  });
}
</script>