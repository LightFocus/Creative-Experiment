<html lang="zh-CN" charset="utf-8">
<head>
  <link type="text/css" rel="stylesheet" href="searchbox.css"></link>
</head>
<body>
  <?php
  if(isset($_GET['q'])){
  $url=$_GET['q'];
  header('Location: '.$url.'');
  }
  ?>
</body>
</html>
