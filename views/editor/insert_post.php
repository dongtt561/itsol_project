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
        <title>Thêm bài viết</title>
            <script src="http://localhost/hocphp/taianh/ckeditor/ckeditor.js"></script>
            <link href="http://localhost/hocphp/taianh/ckeditor/style.css" rel="stylesheet" />
          
    </head>
    <body>
        <h2> THÊM BÀI VIẾT</h2>
        <div id="ckedit_main">
        <?php
        // put your code here
        //echo "Thêm bài viết";
        ?>
            <form method="post" action="xuly.php" enctype="multipart/form-data">
                <label class="space">Title: </label>
                <textarea class= "input"  name="title" minlength="1"  maxlength="200"> <?php ?></textarea>
                <div class="clear"></div>
                <label class="space">Ảnh:</label>
                <input  class="input" type="file" id="images" name="fileupload" maxlength="200"/>
                <div class="clear"></div>
                <label class="space">Tóm tắt:</label>
                <textarea   class="input" id="summary_post" name="summary_post" maxlength="500"> <?php ?></textarea>
                <div class="clear"></div>
                <label class="space">Nội dung:</label>
                <div class="clear"></div>
                <!--chèn đoạn chứa-->
                <textarea class="content" name="content"> <?php echo $row["a"]?></textarea>
                <div class="clear"></div>
                <label class="space">Tác giả:</label>
                <textarea id="tacgia" class="input" name="author" maxlength="50"> <?php ?></textarea>
                <div class="clear"></div>
                <label class="space">Danh mục:</label>
                <div class="input">
                    <select class="space">
                        <option  >Danh sách 01</option>
                    </select>

                </div>
                <div class="clear"></div>
                <input type="submit" id="insert" name="insert" value="Thêm" />
            </form>   
            <script lang="text/javascript">CKEDITOR.replace("content")</script>
        </div>
    </body>
</html>
