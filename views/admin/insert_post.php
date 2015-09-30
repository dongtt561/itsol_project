<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
        <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
                <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
                <li  class="active">
                    <a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a>
                </li>
                <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
                <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
                <li><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>        
        <div id="admin_content">   
            <div class="add_video">
                <h4>THÊM BÀI VIẾT</h4>
                <div class="video_status">
                    <?php 
                    // var_dump($_SESSION['post_video']);die();
                        if(isset($_SESSION['message_addPost'])){
                            echo $_SESSION['message_addPost'];
                            unset($_SESSION['message_addPost']);
                        }
                    ?>
                </div>
                <div id="ckedit_main">
                    <form method="post" action="index.php?controller=admin&action=insertPost" enctype="multipart/form-data">
                        <label id="space">Tiêu đề bài viết: </label>
                        <textarea id= "ip_video"  name="title" minlength="1"  maxlength="200" required></textarea>
                        <div id="clear"></div>

                        <label id="space">Mô tả bài viết:</label>
                        <textarea id= "ip_video"  name="description" minlength="1" required></textarea>
                        <div id="clear"></div>

                        <label id="space">Tác giả:</label>
                        <input type="text" id= "ip_video"  name="author" minlength="1" required>
                        </input>
                        <div id="clear"></div>


                        <label id="space">Danh mục bài viết</label>
                        <select id= "ip" name="category">
                            <option>
                                <?php
                                    $Allcate = new adminController();
                                    $Allcategory=$Allcate->loadAllcategory();
                                    foreach ($Allcategory as $value):
                                ?>
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['summary_category'] ?></option>
                                    <?php 
                                    endforeach;
                                    ?>
                            </option>
                        </select>
                        <div id="clear"></div>

                        <label id="space">Hình ảnh đại diện:</label>
                        <input type="file" id= "ip_imgUplodad" name="file">
                        </input>
                        <div id="clear"></div>

                        <label id="space">Nội dung bài viết:</br></label>
                        <div id="clear"></div>
                        <textarea id= "ip"  name="content" required></textarea>
                        <div id="clear"></div>
                        <input type="submit" id="submit_add_user" name="insert" value="Thêm" />
                    </form>
                    <script lang="text/javascript">CKEDITOR.replace('content')</script>
                </div>
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>