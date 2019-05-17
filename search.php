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
<html lang="zh-CN" charset="utf-8">
<head>
  <meta charset="UTF-8">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137375400-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-137375400-1');
  </script>
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
</head>
<body>
<?php
  $base='http://www.google.com.hk/search?oe=utf-8&q=';
  if($_SESSION["mobile"]==1){
    ini_set('user_agent','Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.');
  }else
    ini_set('user_agent','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36');
  if(isset($_GET['q'])){
  $_SESSION['search']=$_GET['q'];
  unset($_GET['q']);
  $search=urlencode($_SESSION['search']);
  if(isset($_GET['start'])){
    $_SESSION['start']=$_GET['start'];
    unset($_GET['start']);
    $count="&start=".$_SESSION['start'];
    $url=$base.$search.$count;
  }else
  $url=$base.$search;
  
  if(isset($_GET['tbs'])){
    $_SESSION['tbs']=$_GET['tbs'];
    unset($_GET['tbs']);
    $tbs=$_SESSION['tbs'];
    $url=$url.'&tbs='.$tbs;
  }

  $homepage = file_get_contents($url,'r');
  ?>
  <div id="google_content">
  <?php echo $homepage; ?>
  </div>
        <Button id="switch" style="    position: relative;
    left: 50%;
    width: 150px;
    margin-left: -75px;
    font-size: 15px;
    margin-bottom: 20px;">Dark Mode Toggle</Button>
      <script type="text/javascript">
     $(document).ready(function(){
      var dark=getCookie("dark");
      if(dark=='false'||dark==""){
        var css = document.getElementById('css');
        css.href = '';
      }else{
        var css = document.getElementById('css');
        css.href='/darkmoderes.css';
      }
    });
    $("#switch").click(function(){
      var dark=getCookie("dark");
      if(dark=='false'||dark==""){
        var css = document.getElementById('css');
        css.href = '/darkmoderes.css';
        setCookie('dark','true',1);
      }else{
        var css = document.getElementById('css');
        css.href='';
        setCookie('dark','false',1);
      }
    }
  );
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
  <?php
  unset($_SESSION['search']);
  unset($_SESSION['start']);
  unset($_SESSION['tbs']);
  }
  if($_SESSION["mobile"]==0){
?>
        <script>
                var logo = document.getElementsByClassName("logo");
                logoa=logo[0].childNodes[0];
                logoa.setAttribute('href','https://wikigo.cn');
                logoimg=logoa.childNodes[0];
                logoimg.src= "https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/website.png";
                logoimg.setAttribute('height','40px');
                logoimg.setAttribute('width','40px');
                var voice = document.getElementsByClassName("dRYYxd");
                voice[0].style.display = "none";
                var app = document.getElementsByClassName("gb_Ja");
                app[0].style.display = "none";
                var setting = document.getElementById("hdtb");
                setting.style.display = "none";
                var bar = document.getElementsByClassName("Wnoohf");
                for(var i=0;i<bar.length-1;i++){
                  if(bar[i].className!="kp-blk knowledge-panel Wnoohf OJXvsb")
                    bar[i].style.display = "none";
                }
                var cu = document.getElementsByClassName("cu-container");
                for(var i=0;i<cu.length;i++){
                    cu[i].style.display = "none";
                }
                var searchbar=document.getElementsByClassName("mslg");
                searchbar[0].style.display="none";
            </script>
  <?php }else{ ?>
            <script>
                var wid = document.getElementById("qslc");
                logoa=wid.childNodes[0];
                logoa.setAttribute('href','https://wikigo.cn');
                var img = document.createElement("img");
                logoimg=logoa.childNodes[0].appendChild(img);
                logoimg.src = "https://lightfocus-1256547063.cos.ap-hongkong.myqcloud.com/website.png";
                logoimg.setAttribute('height','100%');
                var setting = document.getElementById("hdtb-sc");
                setting.style.display = "none";
                var footer = document.getElementById("ftcntr");
                footer.style.display = "none";
                var gap = document.getElementById("msc");
                gap.style.display = "none";
                var taw = document.getElementById("taw");
                taw.style.display = "none";
                var bar = document.getElementsByClassName("Wnoohf");
                for(var i=0;i<bar.length;i++){
                    bar[i].style.display = "none";
                }
            </script>
  <?php } ?>
  <?php if($_SESSION["mobile"]==0){?>
      <style>
          .kno-vrt-t a
          {
            min-height: 0px;
          }
          .logo{
            top:0;
            left:-120px;
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
          .v6U7rf{
            height:50px;
          }
          .v6U7rf .SR3ZX{
            margin-left:-18px;
          }
          .w7Ec6{
            height:auto;
          }
        </style>
      <?php } ?>
      <script src="formvalidation.js"></script>
      <link id="css" href="" rel="stylesheet">   
</body>
</html>