<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
        <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
                <li><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
                <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
                <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
                <li><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>
        <div class="add_user">
            <h4>THÊM NGƯỜI DÙNG</h4>
            <div class="register_status">
                <?php 
                if(isset($_SESSION['message_add'])){
                    echo $_SESSION['message_add'];
                    unset($_SESSION['message_add']);
                }
                ?>
            </div>
            <div id="add_user">
                <form method="post" action="<?php echo HOME_PATH;?>/index.php?controller=admin&action=insert_user" enctype="multipart/form-data">
                    <label id="space">Tên người dùng: </label>
                    <input type="text" id= "ip"  name="user_name" placeholder="ex: Nguyen Van A" minlength="1"  maxlength="50" required /> 
                    <div id="clear"></div>
                    <label id="space">Email: </label>
                    <input type="text" id= "ip"  placeholder="example@hosting.com" name="email" minlength="1"  maxlength="50"  required/> 
                    <div id="clear"></div>
                    <label id="space">Mật khẩu:</label>
                    <input type="password" id= "ip"  name="password" minlength="1"  maxlength="50" required/> 
                    <div id="clear"></div>
                    <label id="space">Xác nhận mật khẩu:</label>
                    <input type="password" id= "ip"  name="password1" minlength="1"  maxlength="50" required/> 
                    <div id="clear"></div>
                    <label id="space">Nhóm người dùng: </label>
                    <select id= "ip" name="group_name">
                        <option>
                            <?php
                                $cc = new adminController();
                                $result=$cc->get_user_group();
                                foreach ($result as $value):
                            ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['group_name'] ?></option>
                                <?php 
                                endforeach;
                                ?>
                        </option>
                    </select>
                    <div class="clear"></div>
                    <input type="submit" id="submit_add_user" value="Thêm"/>     
                </form> 
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>

