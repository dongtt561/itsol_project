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
        <div id="user_manager">
            <div>
                <a href="index.php?controller=admin&action=add_user"><b>Thêm người dùng mới</b></a>
            </div>
            <div class="add_user">
                <h4>SỬA THÔNG TIN NGƯỜI DÙNG</h4>
                <div id="update_user">
                    <form method="post" action="index.php?controller=admin&action=save_userEdit&email=<?php echo $user_edit['email'] ?>" enctype="multipart/form-data">
                        <label id="space">Tên người dùng: </label>
                        <input type="text" id= "ip" value="<?php echo $user_edit['user_name']?>" name="user_name" placeholder="ex: Nguyen Van A" minlength="1"  maxlength="50" required /> 
                        <div id="clear"></div>
                        <div id="clear"></div>
                        <label id="space">Nhóm người dùng: </label>
                        <select id= "ip"  name="group_name">
                            <?php
                                $cc = new adminController();
                                $result=$cc->get_user_group();
                                foreach ($result as $value):
                            ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['group_name'] ?></option>
                                <?php 
                                endforeach;
                                ?>
                        </select>
                        <div class="clear"></div>
                        <input type="submit" id="submit_add_user" value="Hoàn thành"/>     
                    </form> 
                </div>
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>
