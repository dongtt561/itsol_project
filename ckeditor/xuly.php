<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

-->
<?php
 $conn=mysqli_connect("localhost","root","chuthithuy","taianh");
//var_dump($_POST);die();
 if(isset($_POST)){
    
  $html=mysql_real_escape_string($_POST['content']);
  //var_dump($html);die();
  mysqli_query($conn,"UPDATE tb_a SET a='$html'");
 // var_dump("UPDATE tb_a SET a='$html'");die();
  header('Location: http://localhost/hocphp/taianh/ckeditor/insert_post.php');
 }
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
