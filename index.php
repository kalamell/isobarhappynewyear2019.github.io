<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ทดสอบความหมูในตัวคุณ - powerby ISOBAR THAILAND</title>
  <meta property="fb:app_id" content="574567606322773">
  <meta property="og:url"                content="https://www.poszee.com/isobar-hny2019/index.php<?php echo isset($_GET['id']) ? '&id='.$_GET['id'] : '';?>" />
  <meta property="og:type"               content="website" />
  <meta property="og:title"              content="ลืมเธอไม่เก่ง แต่เก่งนักเรื่องไม่น่าจำ" />
  <meta property="og:description"        content="มาวัดระดับความจำสมอง ต้อนรับปีหมู 2019" />
  <?php 
  $link = 'https://www.poszee.com/isobar-hny2019/images/share.png';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $file = '';
  if ($id == 1 || $id == 2 || $id == 3 || $id == 4 || $id == 5 || $id == 6) {
    $file = $id;
  }

  if ($file == '') {
    $link = 'https://www.poszee.com/isobar-hny2019/images/share.png';
  } else {
    $link = 'https://www.poszee.com/isobar-hny2019/images/share-level'.$id.'.png';
  }
  ?>
  <meta property="og:image"              content="<?php echo $link;?>">


  <meta name="description" content="An emoji-based memory game. Made as a progressive web app.">
  <meta property="og:image" content="https://adgad.github.io/emojiquence/images/icons/icon-192x192.png">
  <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/mystyle.css">

  
</head>
<body>

  <header class="header" style="display: none;">
    <h1 class="header__title">Hi Pig Year</h1>
    <span>Level </span><span class="current-level"></span>
    <button id="butRefresh" class="headerButton button-refresh"></button>
  </header>


  <div class="main start-container" style="padding-top: 60px;">
    <div class="card cardTemplate">
      <div class="logo"><img src="images/welcome.png" class="img-responsive" alt="Hi New Year"/></div>
      
      <button class="start button mdl-button mdl-button--colored mdl-button--inverse mdl-ripple">
        <img src="images/start.png" alt="" style="width: 120px;">
      </button>
    </div>
  </div>

  <div class="main intro-container hide">
      <div class="card cardTemplate">
        <p style="font-size: 2.5em;">เพียงจำใบหน้าและเรียงลำดับให้ถูกต้อง !!!</p>
        <div class="show-timeout hide">
          <p>เกมจะเริ่มภายใน</p>
          <div class="timeout" style="text-align: center; font-family: Mitr; font-size: 3em; text-shadow: 0px 1px 0px #ccc;">5</div>
        </div>
      </div>
    </div>

  <div class="main sequence-container hide">
    <div class="card cardTemplate">
      <p>จดจำใบหน้าเหล่านี้ไว้ให้ดี!!!</p>
      <div class="sequence"></div>
    </div>
  </div>

  <div class="main guess-container hide">
    <div class="card cardTemplate" style="">
      <p>ไหนลองดูซิ ว่าคุณจะหมู และจดจำได้หรือเปล่า?</p>
      <div class="current-guess"></div>
    </div>
    <div class="card cardTemplate scrollable-emoji">
      <ul class="guess-inputs"></ul>
    </div>
  </div>

    <div class="dialog-container incorrect-dialog">
      <div class="dialog">
        <div class="dialog-body">
          <img id="level1" class="img-responsive hide level1" src="images/level1.png" alt="">
          <img id="level2" class="img-responsive hide level2" src="images/level2.png" alt="">
          <img id="level3" class="img-responsive hide level3" src="images/level3.png" alt="">
          <img id="level4" class="img-responsive hide level4" src="images/level4.png" alt="">
          <img id="level5" class="img-responsive hide level5" src="images/level5.png" alt="">
          <img id="level6" class="img-responsive hide level6" src="images/level6.png" alt="">

          <div class="correct-sequence"></div>
        </div>
        <div class="dialog-buttons">
          <button id="share" class="button mdl-button mdl-button--colored mdl-button--primary mdl-ripple fb btfb"><i class="fab fa-facebook"></i> แชร์</button>
          <button id="butTryAgain" class="try-again button mdl-button mdl-button--colored mdl-button--primary mdl-ripple"><i class="fas fa-sync-alt"></i> ลองอีกครั้ง</button>
        </div>
      </div>
    </div>
    
  </div>

  <div class="dialog-container correct-dialog">
        <div class="dialog">
          <div class="dialog-body">

            <img id="level1" class="img-responsive  " src="images/good.png" alt="">

            <div class="level-up">
              <span class="level-complete"></span> <span class="trophy"> 🏆</span>
            </div>
          </div>
          <div class="dialog-buttons">
            <button id="butTryAgain" class="button mdl-button mdl-button--colored mdl-button--primary mdl-ripple fb btfb2"><i class="fab fa-facebook"></i> แชร์</button>
            <button class="next-level button mdl-button mdl-button--colored mdl-button--primary mdl-ripple"><i class="fas fa-forward"></i> ด่านต่อไป</button>
          </div>
        </div>
      </div>
  </div>

  <div class='logo-powerby'>
    <img src="images/isobar-logo.png" alt="">
  </div>


<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '574567606322773',
        autoLogAppEvents : true,
	  xfbml            : true,
	  version          : 'v2.10'
      });
        
      FB.AppEvents.logPageView();   
        
    };
  
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
  <script src="scripts/app.js?v=4"></script>

</body>
</html>
