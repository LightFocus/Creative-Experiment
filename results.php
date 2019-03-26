<?php
  session_start();
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
        <link type="text/css" rel="stylesheet" href="searchbox.css"></link>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
            <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-13" viewBox="0 0 40 40">
                <path d="M26.804 29.01c-2.832 2.34-6.465 3.746-10.426 3.746C7.333 32.756 0 25.424 0 16.378 0 7.333 7.333 0 16.378 0c9.046 0 16.378 7.333 16.378 16.378 0 3.96-1.406 7.594-3.746 10.426l10.534 10.534c.607.607.61 1.59-.004 2.202-.61.61-1.597.61-2.202.004L26.804 29.01zm-10.426.627c7.323 0 13.26-5.936 13.26-13.26 0-7.32-5.937-13.257-13.26-13.257C9.056 3.12 3.12 9.056 3.12 16.378c0 7.323 5.936 13.26 13.258 13.26z" fill-rule="evenodd" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-3" viewBox="0 0 20 20">
                <path d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z" fill-rule="evenodd" />
            </symbol>
        </svg>
        <div align="center">
            <br>
            <br>
            <form method="get" action="results" novalidate="novalidate" class="searchbox sbx-google">
                <div role="search" class="sbx-google__wrapper">
                    <input type="search" name="search" placeholder="Search" autocomplete="off" required="required" class="sbx-google__input">
                    <br>
                    <br>
                    <button type="submit" title="Submit your search query." class="sbx-google__submit">
                        <svg role="img" aria-label="Search">
                            <use xlink:href="#sbx-icon-search-13"></use>
                        </svg>
                    </button>
                    <button type="reset" title="Clear the search query." class="sbx-google__reset">
                        <svg role="img" aria-label="Reset">
                            <use xlink:href="#sbx-icon-clear-3"></use>
                        </svg>
                    </button>
                </div>
            </form>
            <br>
            <br>
            <br>
            <h3>Be creative and make this world a better place.</h3>
        </div>
  <?php
    $base='http://www.google.com.hk/search?oe=utf-8&q=';
    if(isset($_SESSION['res_search'])){
      $search=urlencode($_SESSION['res_search']);
      $url=$base.$search;
      ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; GreenBrowser)');
      $homepage = file_get_contents($url,'r');
      echo $homepage;
  ?>
            <script type="text/javascript">
                var gb = document.getElementById("guser");
                gb.style.display = "none";
                var gb = document.getElementById("gbar");
                gb.style.display = "none";
                var sf = document.getElementsByClassName("sfbgg");
                sf[0].style.display = "none";
                sf[1].style.display = "none";
                sf[2].style.display = "none";
                var a8 = document.getElementsByClassName("A8ul6");
                a8[0].innerHTML = "\n";
                a8[1].innerHTML = "\n";
                var sft = document.getElementsByClassName("sFTC8c");
                sft[1].innerHTML = "\n";
                sft[2].innerHTML = "\n";
                sft[3].innerHTML = "\n";
                sft[4].innerHTML = "\n";
                sft[5].innerHTML = "\n";
                var gbh = document.getElementsByClassName("gbh");
                gbh[0].style.display = "none";
                gbh[1].style.display = "none";
            </script>
            <script>
                var img = document.getElementsByTagName("img");
                for (var i = 0; i < img.length; i++) {
                    if (img[i].src[17] == "/" && img[i].src[18] == "m") {
                        var newsrc = "https://google.com";
                        for (var j = 17; j < img[i].src.length; j++) {
                            newsrc = newsrc + img[i].src[j];
                        }
                        img[i].setAttribute("src", newsrc);
                        break;
                    }
                }
            </script>
  <?php
    }
  ?>
      <script src="bootstrap.min.js"></script>
    </body>
    </html>