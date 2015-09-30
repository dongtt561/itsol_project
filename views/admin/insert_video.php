<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
        <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
              <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
              <li><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
              <li class="active"><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
              <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
              <li><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>        
        <div id="admin_content">   
            <div class="add_video">
                <h4>THÊM VIDEO</h4>
                <div class="video_status">
                    <?php 
                    // var_dump($_SESSION['post_video']);die();
                        if(isset($_SESSION['status_upload_video'])){
                            echo $_SESSION['status_upload_video'];
                            unset($_SESSION['status_upload_video']);
                        }
                    ?>
                </div>
                <div id="ckedit_main">
                    <form method="post" action="index.php?controller=admin&action=insert_videos" enctype="multipart/form-data">
                        <label id="space">Tiêu đề video: </label>
                        <textarea id= "ip_video"  name="title" minlength="1"  maxlength="200" required></textarea>
                        <div id="clear"></div>
                        <label id="space">Mô tả video:</label>
                        <textarea id= "ip_video"  name="description" minlength="1" required></textarea>
                        <div id="clear"></div>
                        <label id="space">Video tải lên:</br></label>
                        <div id="clear"></div>
                        <textarea id= "ip"  name="link_video"></textarea>
                        <div id="clear"></div>
                        <input type="submit" id="submit_add_user" name="insert" value="Thêm" />             
                    </form>
                    <script lang="text/javascript">CKEDITOR.replace('link_video')</script>
                </div>
            </div>
        </div>
    </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>