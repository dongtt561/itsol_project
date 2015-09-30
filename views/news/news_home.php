<div class="home_content">
	<div class="register_status">
        <?php 
	        if(isset($_SESSION['message_bestPost'])){
	            echo $_SESSION['message_bestPost'];
	            unset($_SESSION['message_bestPost']);
	        }
        ?>
    </div>
    <?php  
		$news=new homeController();
		$best_news=$news->getBestNewsHome();
	?>
	<div id="home_box">
		<?php  
			foreach ($best_news as $value) {

		?>
		
		<div id="box_left">
			<div id="box_img">
				<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id']; ?>" title="<?php echo $value['title']; ?>">
					<img src="<?php echo HOME_PATH.'/'.$value['images']; ?>">
				</a>
			</div>
			<div id="box_content">
				
				<div id="box_time"><p><?php echo $value['time_post']; ?></p>
				</div>
				<div id="box_title">
					<p><a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>"><b><?php echo $value['title']; ?></b></a></p>
				</div>
				<div id="box_summary">
					<p>
						<?php echo $value['summary_post']; ?>
						...<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">Xem tiếp</a>
					</p>
				</div>
			</div>
		</div>

		<?php } ?>
		<?php  ?>
		<div id="box_right">
			<?php 
				$topnews=new homeController();
				$news=$topnews->getTopPost();
			?>
			<div id="">
				<div class="register_status">
			        <?php 
				        if(isset($_SESSION['message_besttopPost'])){
				            echo $_SESSION['message_besttopPost'];
				            unset($_SESSION['message_besttopPost']);
				        }
			        ?>
    			</div>
    			<?php foreach ($news as $value) { ?>
			        <ul>
			        	<li>
			        		
			        		<a href="index.php?controller=news&action=views_news&id_post=<?php echo $value['id'];?>">
			        		<?php echo $value['title']; ?>
			        		</a>
			        	</li>
			        </ul>
			    <?php } ?>
			</div>
		</div>
	</div>
</div>
