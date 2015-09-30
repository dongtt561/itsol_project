<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include ROOT_PATH.'/views/user/register_header.php'; ?>
<div class="register_" >
    <h2><b>ĐĂNG KÍ</b></h2>   
    <div class="register_status">
        <?php 
        if(isset($_SESSION['message_register'])){
            echo $_SESSION['message_register'];
            unset($_SESSION['message_register']);
        }
        ?>
    </div>
    <form class="register_form" method="post"  enctype="multipart/form-data"
    action="<?php echo HOME_PATH;?>/index.php?controller=user&action=registerProcess">
        <label id="space">Tên người dùng: </label>
        <input type="text" id= "ip"  name="user_name" placeholder="ex: Nguyen Van A" minlength="1"  maxlength="50" required /> 
        <div id="clear"></div>
        <label id="space">Email: </label>
        <input type="text" id= "ip"  placeholder="example@hosting.com" name="email" minlength="1"  maxlength="50"  required/> 
        <div id="clear"></div>
        <label id="space">Mật khẩu:</label>
        <input type="password" id= "ip"  name="password1" minlength="1"  maxlength="50" required/> 
        <div id="clear"></div>
        <label id="space">Xác nhận mật khẩu:</label>
        <input type="password" id= "ip"  name="password2" minlength="1"  maxlength="50" required />
        <div id="clear"></div>
        <input type="submit" id="submit_register" name="register" value="Đăng kí" />
    </form>   
</div>
<?php include ROOT_PATH.'/views/partials/footer.php';?>
