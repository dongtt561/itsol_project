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
				<div class="add_users">
					<a href="index.php?controller=admin&action=add_user"><b>Thêm người dùng mới</b>
					</a>
				</div>
				<?php 	
					$name_ = '';
					if(isset($_SESSION['sortUser'])){
						$name_=$_SESSION['sortUser']['name'];
						$ccc=new adminController();
						
						$users=$ccc->getAllUser($name_);
					}
					else{
						$ccc=new adminController();
						$users=$ccc->getAllUser('');
					}
				?>
				<div id="user_Arrange">
					<h6><b>Sắp xếp theo</b></h6>
					<form id="list-sort" method="post" action="<?php echo HOME_PATH.'/index.php?controller=admin&action=sortset'?>">
						<select onchange="javascript:document.getElementById('list-sort').submit();" name="name">
				        	<option value="id" <?php echo $name_ == 'id'?'selected="selected"':''; ?>>ID</option>
				            <option value="username" <?php echo $name_ == 'username'?'selected="selected"':''; ?>>Tên người dùng</option>
				            <option value="email" <?php echo $name_ == 'email'?'selected="selected"':''; ?>>Email</option>
				            <option value="group" <?php echo $name_ == 'group'?'selected="selected"':''; ?>>Nhóm người dùng</option>
	        			</select>
	        		</form>
				</div>
			</div>
			<div class="delete_status">
	            <?php 
		            if(isset($_SESSION['message_delete'])){
		                echo $_SESSION['message_delete'];
		                unset($_SESSION['message_delete']);
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
                        <th class="col-sm-2">ID</th>
                        <th class="col-sm-3">Tên người dùng</th>
                        <th class="col-sm-3">Email</th>
                        <th class="col-sm-2">Nhóm người dùng</th>
                        <th class="col-sm-2">Tùy chọn</th>
                    </thead>
					<tbody>

		                <?php if (isset($users)) { ?>
		                    <?php foreach ($users as $value) { ?>
		                        <tr>
		                            <td><?php echo $value['id'] ;?></td>
		                            <td><?php echo $value['user_name'] ;?></td>
		                            <td><?php echo $value['email']; ?></td>
		                            <td><?php echo $value['group_name']; ?></td>
		                            <td>
			                            <?php 
				                            if($value['group_name']=='Admin'){echo '&nbsp';} 
				                            else{ ?>
					                            <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=updateUser&email=<?php echo $value['email'] ?>">Sửa
					                            </a>
					                            &nbsp;&nbsp;
					                            <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=deleteUser&email=<?php echo $value['email'] ?>">Xóa
					                            </a>
					                        <?php } ?>
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
    
    