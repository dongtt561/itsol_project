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
    <div id="admin_content">
        <div id="user_manager">
            <div class="add_users">
                <a href="index.php?controller=admin&action=insert_category"><b>Thêm danh mục</b>
                </a>
            </div>
            <?php
                $name_ = '';
                if(isset($_SESSION['sortCate'])){
                    $name_=$_SESSION['sortCate']['name'];
                    $cate=new adminController();
                    $categorys=$cate->getAllCate($name_);
                }
                else{
                    $cate=new adminController();
                    $categorys=$cate->getAllCate('');
                }
            ?>
            <div id="user_Arrange">
                <h6><b>Sắp xếp theo</b></h6>
                <form id="list-sort" method="post" action="<?php echo HOME_PATH.'/index.php?controller=admin&action=sortcate'?>">
                    <select onchange="javascript:document.getElementById('list-sort').submit();" name="name">
                        <option value="id" <?php echo $name_ == 'id'?'selected="selected"':''; ?>>ID</option>
                        <option value="category_name" <?php echo $name_ == 'category_name'?'selected="selected"':''; ?>>Tên danh mục</option>
                        <option value="number_posts" <?php echo $name_ == 'number_posts'?'selected="selected"':''; ?>>Số lượng tin tức</option>
                    </select>
                </form>
            </div>
            <div class="deleteCate_status">
                <?php 
                    if(isset($_SESSION['message_deleteCate'])){
                        echo $_SESSION['message_deleteCate'];
                        unset($_SESSION['message_deleteCate']);
                    }
                ?>
            </div>
            <div class="editCate_status">
                <?php 
                    if(isset($_SESSION['message_editCate'])){
                        echo $_SESSION['message_editCate'];
                        unset($_SESSION['message_editCate']);
                    }
                ?>
            </div>
            <div class="table_users">
                <table class="table table-bordered">    
                    <thead>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-2">Danh mục</th>
                        <th class="col-sm-3">Tên đầy đủ danh mục</th>
                        <th class="col-sm-2">Số lượng tin tức</th>
                        <th class="col-sm-2">Tùy chọn</th>
                    </thead>
                    <tbody>
                        <?php if (isset($categorys)) { ?>

                            <?php foreach ($categorys as $value) { ?>
                                <tr>
                                    <td><?php echo $value['id'] ;?></td>
                                    <td><?php echo $value['summary_category'] ;?></td>
                                    <td><?php echo $value['full_category']; ?></td>
                                    <td><?php echo $value['sum_posts']; ?></td>
                                    <td>
                                        <?php  
                                            if($value['id']=='1'||$value['id']=='2'){echo '&nbsp';} 
                                            else{ ?>                       
                                                </a>
                                                <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=updateCate&id=<?php echo $value['id'] ?>">Sửa
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=deleteCate&id=<?php echo $value['id'] ?>">Xóa
                                                </a>
                                            <?php } ?>                                     
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr><td colspan="12">Không có dữ liệu</td></tr>
                        <?php } 
                            unset($_SESSION['sortVideos']);
                        ?>
                    </tbody>
                </table>
            </div> <!-- end user table -->
        </div>
    </div>
</div>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>