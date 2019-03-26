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
    <p class="mb-1">&copy; 2019 Light Focus</p>
    <p class="mb-1">All Rights Reserved.</p>
   </footer>
 </div>
 <script src="bootstrap.min.js"></script>
  </body>
</html>
