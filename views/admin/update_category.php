<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
        <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
                <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
                <li><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
                <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
                <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
                <li  class="active"><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>
        <div id="user_manager">
            <div>
                <a href="index.php?controller=admin&action=add_user"><b>Thêm danh mục</b></a>
            </div>
            <div class="add_user">
                <h4>SỬA DANH MỤC</h4>
                <?php 
                    $editcate= new adminController;
                    $cate=$editcate->getCatebyID();
                ?>
                <div id="update_user">
                    <form method="post" action="index.php?controller=admin&action=save_CateEdit&id=<?php echo $cate['id'] ?>" enctype="multipart/form-data">
                        <label id="space">Tên danh mục </label>
                        <input type="text" id= "ip" value="<?php echo $cate["summary_category"]?>" name="summary_category"  minlength="1"  maxlength="200" required /> 
                        <div id="clear"></div>
                        <label id="space">Tên đầy đủ danh mục</label>
                        <input type="text" id= "ip" value="<?php echo $cate["full_category"]?>" name="full_category"  minlength="1"  maxlength="500" required /> 
                        <div class="clear"></div>
                        <input type="submit" id="submit_add_user" value="Hoàn thành"/>     
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>
