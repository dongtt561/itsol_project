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
		<div id="user_manager">
			<div class="add_users">
				<a href="index.php?controller=admin&action=insert_video"><b>Thêm video</b>
				</a>
			</div>
			<?php
				$name_ = '';
				if(isset($_SESSION['sortVideos'])){
					$name_=$_SESSION['sortVideos']['name'];
					$vd=new adminController();
					$videos=$vd->getAllVideos($name_);
				}
				else{
					$vd=new adminController();
					$videos=$vd->getAllVideos('');
				}
			?>
			<div id="user_Arrange">
				<h6><b>Sắp xếp theo</b></h6>
				<form id="list-sort" method="post" action="<?php echo HOME_PATH.'/index.php?controller=admin&action=sortVideos'?>">
					<select onchange="javascript:document.getElementById('list-sort').submit();" name="name">
			        	<option  value="id" <?php echo $name_ == 'id'?'selected="selected"':''; ?>>ID</option>
			            <option value="title" <?php echo $name_ == 'title'?'selected="selected"':''; ?>>Tiêu đề Video</option>
			            <option value="description" <?php echo $name_ == 'description'?'selected="selected"':''; ?>>Tóm tắt Video</option>
			            <option value="time" <?php echo $name_ == 'time'?'selected="selected"':''; ?>>Thời gian tải lên</option>
        			</select>
        		</form>
			</div>
			<div class="deleteVideo_status">
	            <?php 
		            if(isset($_SESSION['message_deleteVideo'])){
		                echo $_SESSION['message_deleteVideo'];
		                unset($_SESSION['message_deleteVideo']);
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
				<table class="table table-bordered">	
                    <thead>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-2">Tiêu đề video</th>
                        <th class="col-sm-3">Mô tả video</th>
                        <th class="col-sm-2">Đường dẫn video</th>
                        <th class="col-sm-2">Thời gian tải lên</th>
                        <th class="col-sm-2">Tùy chọn</th>
                    </thead>
					<tbody>
		                <?php if (isset($videos)) { ?>
		                    <?php foreach ($videos as $value) { ?>
		                        <tr>
		                            <td><?php echo $value['id_video'] ;?></td>
		                            <td><?php echo $value['title_video'] ;?></td>
		                            <td><?php echo $value['description']; ?></td>
		                            <td>
		                            	<?php 
		                            		echo $value['link_video'];
		                            		// $str = strstr($value['link_video'], 'src');
		                            		// $array=explode(' ', $str);
		                            		// $src=$array[0];
		                            		// $arr=explode('"', $src);
		                            		// $linkVideo=$arr[1];
		                            		// echo $linkVideo;

	                            		?>
	                            	</td>
		                            <td><?php echo $value['time']; ?></td>
		                            <td>                          
			                            <a href="">Xem
			                            </a>|
			                            <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=updateVideos&id=<?php echo $value['id_video'] ?>">Sửa
			                            </a>|
			                            <a href="<?php echo HOME_PATH;?>/index.php?controller=admin&action=deleteVideos&id=<?php echo $value['id_video'] ?>">Xóa
			                            </a>					                 
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