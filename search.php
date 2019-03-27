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
<html lang="zh-CN" charset="utf-8">
<head>
</head>
<body>
<?php
  $base='http://www.google.com.hk/search?oe=utf-8&q=';
  if($_SESSION["mobile"]==1){
    ini_set('user_agent',$_SERVER['HTTP_USER_AGENT']);
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
  echo $homepage;
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
                logoimg.setAttribute('height','34px');
                logoimg.setAttribute('width','107px');
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
            margin-left:-57px;
          }
        </style>
      <?php } ?>
</body>
</html>