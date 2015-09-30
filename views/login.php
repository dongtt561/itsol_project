<?php include 'partials/header.php'; ?>
<div >
    <h2><b>ĐĂNG NHẬP</b></h2>
    
    <div id="ckedit_main">
    <?php
    // put your code here
    //echo "Thêm bài viết";
    ?>
        <div class="register_status">
            <?php 
            if(isset($_SESSION['message_register'])){
                echo $_SESSION['message_register'];
                unset($_SESSION['message_register']);
            }
            ?>
        </div>
        <form class="register_form" method="post"  enctype="multipart/form-data"
        action="<?php echo HOME_PATH;?>/index.php?controller=user&action=login">
            <label id="space">Email: </label>
            <input type="text" id= "ip"  placeholder="example@hosting.com" name="email" minlength="1"  maxlength="50"  required/> 
            <div id="clear"></div>
            <label id="space">Mật khẩu:</label>
            <input type="password" id= "ip"  name="password" minlength="1"  maxlength="50" required/> 
            <div id="clear"></div>
            <input type="submit" id="submit_register" name="register" value="Đăng nhập" />
        </form>   
        <script lang="text/javascript">CKEDITOR.replace("content")</script>
    </div>
</div>
<?php include 'partials/footer.php'; ?>