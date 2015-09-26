<?php
  session_start();
  session_regenerate_id(true);
  if (isset($_SESSION['member_login'])==false) 
  {
    print "WELCOME GUEST";
    header('Location:loigin.php');
  }else
  {
    print "WELCOME ";
    print $_SESSION['member_name'];
    print "様";
    print '<a href="member_logout.php">LOGOUT</a>';
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <title>news編集画面</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
  </script>
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="news_top.php">俺のNEWS</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="news_edit.php">Home</a></li>
        <li style="color:white"><?php print $_SESSION['member_name'].'ログイン中';?> </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
  <div class="text-center">
    <h1 style="padding-top:100px">NEWS 編集画面</h1>
    <p class="lead">ここでnewsを追加できます。<br> ガンガン更新しましょう。</p>
  </div>
  
</div><!-- /.container -->
<div class="container">
  <form class="form-horizontal" method="POST" action="news_edit_done.php" enctype="multipart/form-data">  
        <fieldset>  
          <legend>EDIT</legend>  
          <div class="control-group"> 
            <p>TITLE</p>
            <label class="control-label" for="input01">Text input</label>  
            <div class="controls">  
              <input type="text" class="input-xlarge" id="input01" name="title">  
              <p class="help-block">titleを入力</p>  
            </div>  
          </div> 
          <div class="control-group">  
              <p>CONTENTS</p>
            <label class="control-label" for="textarea">Textarea</label>  
            <div class="controls">  
              <textarea class="input-xlarge" name="contents" id="textarea" rows="3"></textarea>  
            </div>  
          </div> 
          <p>NEWS IMAGE</p>
          <div class="control-group">  
            <label class="control-label" for="fileInput">File input</label>  
            <div class="controls">  
              <input class="input-file" id="fileInput" type="file" name="upfile">  
            </div>  
          </div>  
          <div class="control-group">  
            <p>CATEGORY</p>
            <label class="control-label" for="select01">Select list</label>  
            <div class="controls">  
              <select id="select01" name="category">  
                <option value="sports">sports</option>  
                <option value="technology">technology</option>  
                <option value="business">business</option>  
                <option value="economics">economics</option>  
                <option value="inovation">innovation</option>  
              </select>  
            </div>  
          </div> 
          <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Save</button>  
            <button class="btn">Cancel</button>  
          </div>  
        </fieldset>  
</form>  
</div>
</body>
</html>

