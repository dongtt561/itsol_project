<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
     <div id="menu_admin">
            <ul class="nav nav-tabs" role="tablist">
              <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
              <li class="active"><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
              <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
              <li><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
              <li><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
            </ul>
        </div>
    <div id="user_manager">
        <div>
            <div class="add_users">
                <a href="index.php?controller=admin&action=add_post"><b>Thêm bài viết mới</b>
                </a>
            </div>
            <?php   
                $name_ = '';
                if(isset($_SESSION['sortPost'])){
                    $name_=$_SESSION['sortPost']['name'];
                    $post=new adminController();

                    $posts=$post->getAllPosts($name_);
                }
                else{
                    $post=new adminController();
                    $posts=$post->getAllPosts('');
                }
            ?>
            <div id="user_Arrange">
                <h6><b>Sắp xếp theo</b></h6>
                <form id="list-sort" method="post" action="<?php echo HOME_PATH.'/index.php?controller=admin&action=sortPost'?>">
                    <select onchange="javascript:document.getElementById('list-sort').submit();" name="name">
                    <option  value="id" <?php echo $name_ == 'id'?'selected="selected"':''; ?>>ID</option>
                    <option value="title" <?php echo $name_ == 'title'?'selected="selected"':''; ?>>Tiêu đề bài viết</option>
                    <option value="author" <?php echo $name_ == 'author'?'selected="selected"':''; ?>>Tác giả</option>
                    <option value="category" <?php echo $name_ == 'category'?'selected="selected"':''; ?>>Thể loại</option>
                    <option value="editor" <?php echo $name_ == 'editor'?'selected="selected"':''; ?>>Tên người đăng</option>
                    <option value="time" <?php echo $name_ == 'time'?'selected="selected"':''; ?>>Thời gian đăng bài</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="deletePost_status">
            <?php 
                if(isset($_SESSION['message_deletePost'])){
                echo $_SESSION['message_deletePost'];
                unset($_SESSION['message_deletePost']);
                }
            ?>
        </div>
        <div class="edit_status">
            <?php 
                if(isset($_SESSION['message_edit'])){
                    echo $_SESSION['message_edit'];
                    unset($_SESSION['message_edit']);
                }
            ?>
        </div>
        <div class="table_users">
            <table class="table table-bordered tablesorter" > 
                <thead>
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-3">Tiêu đề</th>
                    <th class="col-sm-2">Tác giả</th>
                    <th class="col-sm-1">Thể loại</th>
                    <th class="col-sm-1">Người đăng</th>
                    <th class="col-sm-2">Thời gian</th>
                    <th class="col-sm-2">Tùy chọn</th>
                </thead>
                <tbody>
                    <?php if (isset($posts)) { ?>
                        <?php foreach ($posts as $value) { ?>
                            <tr>
                                <td><?php echo $value['id'] ;?></td>
                                <td><?php echo $value['title'] ;?></td>
                                <td><?php echo $value['author']; ?></td>
                                <td><?php echo $value['summary_category']; ?></td>
                                <td><?php echo $value['user_name']; ?></td>
                                <td><?php echo $value['time_post']; ?></td>
                                <td> 
                                    </a>
                                    <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=deletePost&id=<?php echo $value['id'] ?>">Xóa
                                    </a>|
                                    <a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=views_news&id_post=<?php echo $value['id'] ?>">Xem
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="12">Không có dữ liệu</td></tr>
                    <?php } 
                      unset($_SESSION['sortUser']);
                    ?>
                </tbody>
            </table>
        </div> <!-- end user table -->
    </div>
  </div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>