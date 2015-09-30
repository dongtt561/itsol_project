<?php
include ROOT_PATH.'/models/newsModel.php';
class homeController{
	public function home(){
		ob_start();
		include(ROOT_PATH.'/views/home.php');
		$html = ob_get_contents();
		ob_end_clean();
		return $html;	
	}
	public function loadAllcategory () {
        $news = new newsModel();
        $news_cate = $news->getAllcategory();
        return $news_cate;
    }
    public function getBestNewsHome(){
		$news=new newsModel();
		$msg='';
		$bestNewsHome=$news->getBestNewsHome();
		if(!empty($bestNewsHome)){
			return $bestNewsHome;
		}
		else{
			$msg='Không có dữ liệu tin tức';
			if ($msg) {
				$_SESSION['message_bestPost']=$msg;
			}
		}		
	}
	public function getTopPost(){
		$news=new newsModel();
		$msg='';
		$topNews=$news->get_TopPost();
		unset($topNews[0]);
		if(!empty($topNews)){
			return $topNews;
			$msg='Không có dữ liệu tin tức';
		}
		else{
			$msg='Không có dữ liệu tin tức';
			if ($msg) {
				$_SESSION['message_besttopPost']=$msg;
			}
		}	
	}
}	
?>
