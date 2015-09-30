<?php include ROOT_PATH.'/views/news/news_header.php';?>
	<?php 
		$video=new newsController();
		$v=$video->getallvideo();
	?>
	<?php if (isset($v)) {
		foreach ($v as $value) { ?>
		<iframe width="420" height="200" src="
			<?php 
				$str = strstr($value['link_video'], 'src');
				$array=explode(' ', $str);
				$src=$array[0];
				$arr=explode('"', $src);
				$linkVideo=$arr[1];
				echo $linkVideo;
			?>"
		frameborder="0" allowfullscreen>	
		</iframe>
	<?php }  ?>
	<?php }  ?>
<?php include ROOT_PATH.'/views/partials/footer.php'; ?>