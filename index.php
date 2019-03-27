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
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <script src="jquery.min.js"></script>
     <link href="bootstrap.min.css" rel="stylesheet">
     <link href="signin.css" rel="stylesheet">
     <link href="carousel.css" rel="stylesheet">
    <title>搜索</title>
  </head>
  <body>
  <div class="container marketing">
    <div class="container">
        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4"src="https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/website.png" width="300">
        </div>
      <div class="row">
        <form class="form-signin" method="get" action="results">
          <label for="inputEmail" class="sr-only">请输入您要查找的内容</label>
          <input type="text" name="search" id="input" class="form-control" placeholder="" required autofocus>
          <br>
          <div style="margin:0 auto; max-width:300px;">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="web" value="google">搜索谷歌</button>
          </div>
        </form>
      </div>
   </div>
   <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 <a href="https://github.com/LightFocus/Creative-Experiment">Light Focus</a></p>
    <p class="mb-1">All Rights Reserved.</p>
   </footer>
 </div>
 <script src="bootstrap.min.js"></script>
  </body>
</html>
