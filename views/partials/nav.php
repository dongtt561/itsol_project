<div>
	<div class="header">
		<div class="header_top">
			<div class="row">
				<div class="col-md-4">
					<div class="SiteLogo">
						<a href="<?php echo HOME_PATH;?>/index.php?controller=home&action=home" title="Trang chủ">
							<img src="public/img/logo.png" />
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="search">
						<form method="post" action="<?php echo HOME_PATH;?>/index.php?controller=news&action=search">
							<label>
								<input type="text" id="search" name="search" minlength="1" required></input>
								<input type="submit" id="search"value="Tìm kiếm"/>
							</label>
						</form>
					</div>
				</div>
				<div class="col-md-4">
			
					<?php 
						if (isset($_SESSION['login'])) {
							echo '<div id="welcome"><b> Xin chào '.$_SESSION['login']['user_name'].'</b></div>';
							echo '<div id="logout"><a href="index.php?controller=user&action=logout">Đăng xuất</a></div>';
							if ($_SESSION['login']['id_group']==2)
							{
								echo '<div id="welcome_admin">
								<a href="index.php?controller=admin&action=home">Trang Admin</a></div>';
							}
							if ($_SESSION['login']['id_group']==3)
							{
								echo '<div id="welcome_admin"><a href="#">Quản lý bài viết</a></div>';
							}
						}
						
						else {
					?>
					<form action="<?php echo HOME_PATH;?>/index.php?controller=user&action=login" method="POST">
						<div class="row">
							<div class="col-md-4">
								<div class="login">
									<input name="email" placeholder="exam@host.com" type="text" />
								</div>
								<a href="#">Quên mật khẩu</a>
							</div>
							<div class="col-md-4">
								<div class="login">
									<input id="login_botton" name="password" placeholder="password" type="password" />
								</div>
								<a href="<?php echo HOME_PATH;?>/index.php?controller=user&action=register">Đăng kí</a> 
							</div>
							<div class="col-md-4">
								<div class="login_submit">
									<input type="submit" value="Đăng nhập"/>
								</div>	
							</div>
						</div>
						<div class="login_status">
				            <?php 
				            if(isset($_SESSION['message_login'])){
				                echo $_SESSION['message_login'];
				                unset($_SESSION['message_login']);
				            }
				            ?>
        				</div>
					</form>
					<?php } ?>
				</div>
			</div>
		</div> <!-- end header_top -->
		<div>
			<script> 
				$(function() {    
					$('.neoslideshow img:gt(0)').hide();   
					setInterval(function(){      
						$('.neoslideshow :first-child').fadeOut().next('img').fadeIn().end().appendTo('.neoslideshow');
					},4000);
				})   
			</script>
			
			<div class="neoslideshow">  
				<img src="public/img/slide/slide1.jpg" width="1000px" height="150px" />
				<img src="public/img/slide/slide2.jpg" width="1000px" height="150px" />
				<img src="public/img/slide/slide3.jpg" width="1000px" height="150px" />
			</div> 
		</div><!-- end banner -->
	</div>
	<div class="header_bottom">
		<?php 
			$news_cate= new homeController();
			$news_category=$news_cate->loadAllcategory();
		?>
		<div class="menu">
			<ul>
				<li><a href="<?php echo HOME_PATH;?>/index.php?controller=home&action=home">Trang chủ</a></li>
				<li><a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=video">Video</a></li>
				<?php foreach ($news_category as $value) { ?>
					<li>
						<a href="<?php echo HOME_PATH;?>/index.php?controller=news&action=categoryviews&id_category=<?php echo $value['id'] ?>">
						<?php echo $value['summary_category']; ?></a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div><!-- end menu -->
</div><!-- end header -->