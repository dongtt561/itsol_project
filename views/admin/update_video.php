<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

 $conn=mysqli_connect("localhost","root","chuthithuy","taianh");
 $sql=mysqli_query($conn,"select a from tb_a");
 $row=mysqli_fetch_array($sql);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa video</title>
            <script src="http://localhost/hocphp/taianh/ckeditor/ckeditor.js"></script>
            <link href="http://localhost/hocphp/taianh/ckeditor/style.css" rel="stylesheet" />
          
    </head>
    <body>
        <h2> SỬA VIDEO</h2>
        <div id="ckedit_main">
        <?php
        // put your code here
        //echo "Thêm bài viết";
        ?>
            <form method="post" action="xuly.php" enctype="multipart/form-data">
                <label class="space">Title: </label>
                <textarea disabled="true" class= "input"  name="title" minlength="1"  maxlength="200"> <?php ?></textarea>
                <div class="clear"></div>
                <label class="space">Nội dung:</label>
                <div class="clear"></div>
                <textarea class="content" name="content"> <?php echo $row["a"]?></textarea>
                <input type="submit" id="update" name="update" value="Sửa" />             
            </form>
            <script lang="text/javascript">CKEDITOR.replace("content")</script>
        </div>
    </body>
</html>
