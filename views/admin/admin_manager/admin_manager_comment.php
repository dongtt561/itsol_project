<?php include ROOT_PATH.'/views/admin/admin_header.php';?>
	 <div id="menu_admin">
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="index.php?controller=admin&action=home">Quản lý người dùng</a></li>
            <li><a href="index.php?controller=admin&action=post_manager">Quản lý bài viết</a></li>
            <li><a href="index.php?controller=admin&action=video_manager">Quản lý video</a></li>
            <li class="active"><a href="index.php?controller=admin&action=coment_manager">Quản lý Comment</a></li>
            <li><a href="index.php?controller=admin&action=category_manager">Quản lý danh mục</a></li>
        </ul>
    </div>
	<div id="admin_content">
		<div>
            <?php   
                $name_ = '';
                if(isset($_SESSION['sortCmt'])){
                    $name_=$_SESSION['sortCmt']['name'];
                    $cmt=new adminController();
                    $comment=$cmt->getAllCmt($name_);
                }
                else{
                    $cmt=new adminController();
                    $comment=$cmt->getAllCmt('');
                }
            ?>
            <div id="user_Arrange">
                <h6><b>Sắp xếp theo</b></h6>
                <form id="list-sort" method="post" action="<?php echo HOME_PATH.'/index.php?controller=admin&action=sortCmt'?>">
                    <select onchange="javascript:document.getElementById('list-sort').submit();" name="name">
                    <option value="id" <?php echo $name_ == 'id'?'selected="selected"':''; ?>>ID bài viết</option>
                    <option value="title" <?php echo $name_ == 'title'?'selected="selected"':''; ?>>Tiêu đề bài viết</option>
                    <option value="sum_cmt" <?php echo $name_ == 'sum_cmt'?'selected="selected"':''; ?>>Số lượt bình luận</option>
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
            <table class="table table-bordered tablesorter"> 
                <thead>
                    <th class="col-sm-2">ID bài viết</th>
                    <th class="col-sm-5">Tiêu đề bài viết</th>
                    <th class="col-sm-1">Tổng số bình luận</th>
                    <th class="col-sm-2">Tùy chọn</th>
                </thead>
                <tbody>
                    <?php if (isset($comment)) { ?>
                        <?php foreach ($comment as $value) { ?>
                            <tr>
                                <td><?php echo $value['id'] ;?></td>
                                <td><?php echo $value['title'] ;?></td>
                                <td><?php echo $value['sum_cmt']; ?></td>
                                <td> 
                                    <a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=views_news&id_post=<?php echo $value['id'] ?>">Xem Bình Luận
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="12">Không có dữ liệu</td></tr>
                    <?php } 
                      unset($_SESSION['sortcmt']);
                    ?>
                </tbody>
            </table>
        </div>
	</div>
</div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>