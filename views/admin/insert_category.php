<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
        <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
                <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
                <li><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
                <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
                <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
                <li class="active"><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>
        <div class="add_user">
            <h4>THÊM DANH MỤC</h4>
            <div class="register_status">
                <?php 
                if(isset($_SESSION['message_addCate'])){
                    echo $_SESSION['message_addCate'];
                    unset($_SESSION['message_addCate']);
                }
                ?>
            </div>
            <div id="add_user">
                <form method="post" action="<?php echo HOME_PATH;?>/index.php?controller=admin&action=insert_cate" enctype="multipart/form-data">
                    <label id="space">Tên danh mục: </label>
                    <input type="text" id= "ip"  name="sum_cate"  minlength="1"  maxlength="200" required /> 
                    <div id="clear"></div>
                    <label id="space">Tên đầy đủ danh mục: </label>
                    <input type="text" id= "ip"  name="full_cate" minlength="1"  maxlength="500"  required/> 
                    <div class="clear"></div>
                    <input type="submit" id="submit_add_user" value="Thêm"/>     
                </form> 
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>

