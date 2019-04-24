<?php
require_once("security.php");
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
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137375400-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-137375400-1');
    </script>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="manifest" href="/manifest.json">
     <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
     <link href="bootstrap.min.css" rel="stylesheet">
     <link href="signin.css" rel="stylesheet">
     <link href="carousel.css" rel="stylesheet">
     <style>
     #left_pic{
       position:absolute;
       left:0;
       bottom:0;
       height:80%;
       display:none;
     }
     #right_pic{
       position:absolute;
       right:0;
       bottom:0;
       height:80%;
       display:none;
     }
     </style>
    <title>WikiGo - An Alternative Everyone Deserves.</title>
    <script src="formvalidation_index.js" ></script>
    <link id="css" href="" rel="stylesheet">
  </head>
  <body>
  <div class="mask" id="dialog" initialized="true" style="position: fixed; z-index: 401; left: 324px; top: 150px; border-color:grey;display:none;">
    <table>
    <tbody>
    <tr>
    <td style="border-radius: 8px 0 0 0;width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    <td style="width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    <td style="border-radius: 0 8px 0 0;width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    </tr>
    </tr>
    <td style="width: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    <td style="background-color:#fff;">
    <div style="width:100%;height:300px;overflow:auto;padding: 0 10px 10px;"><br>
    使用 WikiGo 必须熟知的事项:<br>
    <br>
    1.本站仅抓取用户输入内容对应的谷歌 (Google Inc.) 搜索结果页面，不存储任何输入内容、搜索结果，但保留流量统计的权利;<br>
    2.所有搜索结果均由谷歌 (Google Inc.) 提供，本站对所有搜索结果不负任何责任;<br>
    3.本站仅拥有首页除GitHub图标外的媒体版权，其他页面媒体版权与本站无关;<br>
    4.本站不提供任何形式的代理，故能否访问搜索结果对应的页面取决于你所在地的法律法规;<br>
    5.TODO:为了规避法律政策风险，本站已屏蔽部分搜索关键词，希望大家合法使用该网站。<br>
    <br>Have a nice day!<br>
    </div>
    <p style="text-align:center;background: #f2f2f2;border-top: 1px solid #ccc;clear: both;margin-top: 8px;margin-bottom:0;padding: 10px;">
    <button style="color:white;background-color:#c60000;" onclick="$('#dialog').css('display','none');setCookie('gznotes-visited','true', 1);"><span>同意</span></button>
    <button style="color:black;background-color:grey;" onclick="location.href='about:blank';setCookie('gznotes-visited','true', 0);"><span>不同意</span></button>
    </p>
    </td>
    <td style="width: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    </tr>
    <tr>
    <td style="border-radius: 0 0 0 8px;width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    <td style="width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    <td style="border-radius: 0 0 8px 0;width: 8px;height: 8px;overflow: hidden;background: #000;opacity: .2;"></td>
    </tr>
    </table>
  </div>

  <a href="https://github.com/LightFocus/Creative-Experiment" class="github-corner" aria-label="View source on Github">
    <svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg>
  </a>
  <?php
    if($_SESSION["mobile"]==0){
      ?>
    <img id="left_pic" src="https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/a.png">
    <img id="right_pic" src="https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/b.png">
    <?php } ?>
  <div class="container marketing">
    <div class="container">
        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" id="anime" src="https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/website.png" width="200px" style="margin-top:50px;">
        </div>
      <div class="row">
        <form class="form-signin" method="get" action="results" onsubmit="return validate_form(this)">
          <label for="inputEmail" class="sr-only">请输入您要查找的内容</label>
          <input type="text" name="search" id="input" class="form-control" placeholder="" required focus>
          <br>
          <div style="margin:0 auto; max-width:300px;">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="web" value="google">搜索谷歌</button>
          </div>
        </form>
      </div>
   </div>
   <footer class="my-5 pt-5 text-muted text-center text-small">
   <Button id="switch" class="btn btn-sm mb-1">Dark Mode Toggle</Button>
    <p class="mb-1">&copy; 2019 Light Focus</p>
    <p class="mb-1">All Rights Reserved.</p>
   </footer>
 </div>
 <script src="bootstrap.min.js"></script>
 <script type="text/javascript">
             $("#anime").mouseover(function(e){
               $("#left_pic").css("display","inline");
               $("#right_pic").css("display","inline");
             }).mouseout(function(){
              $("#left_pic").css("display","none");
              $("#right_pic").css("display","none");
             });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      var dark=getCookie("dark");
      if(dark=='false'||dark==""){
        var css = document.getElementById('css');
        css.href = '';
      }else{
        var css = document.getElementById('css');
        css.href='/darkmode.css';
      }
    });
    $("#switch").click(function(){
      var dark=getCookie("dark");
      if(dark=='false'||dark==""){
        var css = document.getElementById('css');
        css.href = '/darkmode.css';
        setCookie('dark','true',1);
      }else{
        var css = document.getElementById('css');
        css.href='';
        setCookie('dark','false',1);
      }
    }
  );
</script>
  <script>
    var width=window.innerWidth;
    var height=window.innerHeight;
    var top1=document.getElementById("anime").offsetTop+94.813;
    $("#dialog").css("left",width*0.8<800?width*0.1:(width-800)/2);
    $("#dialog").css("top",top1);
    $("#dialog").css("width",width*0.8<800?width*0.8:800);
  </script>
  <script type="text/javascript">
        $(document).ready(function() {
          var newVisitor = isNewVisitor();// 如果是新访客
         if(newVisitor === true)
         {
         // 动画弹出消息框
         $('#dialog').css('display','inline');;
  
         // 标记：已经向该访客弹出过消息。1天之内不要再弹

        }
      });
 
      function isNewVisitor() {
      // 从cookie读取“已经向访客提示过消息”的标志位
        var flg = getCookie("gznotes-visited");
         if (flg === "") {
         return true;
         } else {
          return false;
         }
      }
    // 写字段到cookie
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires +";path=/";
      } 
      // 读cookie
      function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
           var c = ca[i];
           while (c.charAt(0)==' ') c = c.substring(1);
           if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
         }
         return "";
      }
    </script>
  </body>
</html>
