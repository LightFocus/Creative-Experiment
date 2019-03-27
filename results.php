<?php
  session_start();
  function isMobile() {
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
  if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
    return true;
  }
  // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
  if (isset($_SERVER['HTTP_VIA'])) {
    // 找不到为flase,否则为true
    return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
  }
  // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel',
    'lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi',
    'openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
    // 从HTTP_USER_AGENT中查找手机浏览器的关键字
    if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
      return true;
    }
  }
  // 协议法，因为有可能不准确，放到最后判断
  if (isset ($_SERVER['HTTP_ACCEPT'])) {
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
    if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') ===
    false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
      return true;
    }
  }
  return false;
}
  if(isMobile())
    $_SESSION["mobile"]=1;
  else
    $_SESSION["mobile"]=0;

  $_SESSION['res_search']="";
  if(isset($_GET['search'])&&$_GET['search']!=""){
    $_SESSION['res_search']=$_GET['search'];
    unset($_GET['search']);
  } 
?>
    <html lang="zh-CN" charset="utf-8">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="jquery.min.js"></script>
    </head>
    <body>
  <?php
    $base='http://www.google.com.hk/search?oe=utf-8&q=';
    if(isset($_SESSION['res_search'])){
      $search=urlencode($_SESSION['res_search']);
      $url=$base.$search;
      if($_SESSION["mobile"]==1){
        ini_set('user_agent',$_SERVER['HTTP_USER_AGENT']);
      }else
        ini_set('user_agent','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36');
      $homepage = file_get_contents($url,'r');
      echo $homepage;
      if($_SESSION["mobile"]==0){
  ?>
            <script>
                var logo = document.getElementsByClassName("logo");
                logo[0].style.display = "none";
                var voice = document.getElementsByClassName("dRYYxd");
                voice[0].style.display = "none";
                var app = document.getElementsByClassName("gb_Ja");
                app[0].style.display = "none";
                var setting = document.getElementById("hdtb");
                setting.style.display = "none";
                var bar = document.getElementsByClassName("Wnoohf");
                for(var i=0;i<bar.length-1;i++){
                    bar[i].style.display = "none";
                }
                var feed = document.getElementsByClassName("kno-ftr");
                feed[0].style.display = "none";
            </script>
  <?php
      }else{ ?>
            <script>
                var wid = document.getElementsByClassName("v6U7rf");
                wid[0].style.display = "none";
                var setting = document.getElementById("hdtb-sc");
                setting.style.display = "none";
                var footer = document.getElementById("ftcntr");
                footer.style.display = "none";
                var gap = document.getElementById("msc");
                gap.style.display = "none";
            </script>
      <?php }
    }
  ?>
      <script src="bootstrap.min.js"></script>
      <?php if($_SESSION["mobile"]==0){?>
      <style>
          .kno-vrt-t a
          {
            min-height: 0px;
          }
        </style>
      <?php }else{ ?>
        <style>
          .kno-vrt-t
          {
            height: auto;
          }
          .zGVn2e{
            margin-top:20px;
          }
          .q2eaDe{
              height:auto;
          }
          .WpKAof{
              height:auto;
          }
          .QmUzgb{
              height:auto;
          }
          .vNg04e{
            height:auto;
          }
          .KojFAc{
              display:none;
          }
        </style>
      <?php } ?>
    </body>
    </html>