<?php 
include ROOT_PATH.'/models/newsModel.php';
/**
* 
*/
class newsController{
	public function loadAllcategory () {
        $news = new newsModel();
        $news_cate = $news->getAllcategory();
        return $news_cate;
    }
	public function categoryviews(){
		if(isset($_GET['id_category'])){
			return include ROOT_PATH.'/views/news/news_sum.php';
		}
		else{
			header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
		}
	}
	public function getTopbyID(){
		$news=new newsModel();
		$idCate=$_GET['id_category'];
		$getCate=$news->getTopIDcate($idCate);
		if (isset($getCate)) {
			return $getCate;
		}
	}
	public function getPostbyIdCategory(){
		$news= new newsModel();
		$idCate=$_GET['id_category'];
		$getCate=$news->getPostbyIDcate($idCate);
		unset($getCate[0]);
		if (isset($getCate)) {
			return $getCate;
		}
	}
	public function getToptenbyIdCategory(){
		$news= new newsModel();
		$idCate=$_GET['id_category'];
		$getCate=$news->getToptenbyIDcate($idCate);
		unset($getCate[0]);
		if (isset($getCate)) {
			return $getCate;
		}
	}
	public function getBestNewsHome(){
		$news=new newsModel();
		$bestNewsID=$news->getBestNewsHomeID();
		$bestNewsHome=$bestNewsID->BestNewsHome();
		return $bestNewsHome;
	}
	public function views_news(){
		return include ROOT_PATH.'/views/news/news.php';
	}
	public function getnewsbyid(){
		$news= new newsModel();
		$id=$_GET['id_post'];
		$getNews=$news->getnewsbyId($id);
		return $getNews;
	}
	public function comment(){
		$cmt=new newsModel();
		$id_post=$_GET['id_post'];
		$content=$_POST['content'];
		$msg='';
		if (!isset($_SESSION['login'])) {
			$msg.='Bạn chưa đăng nhập';
		}
		else{
			$_SESSION['views_post']='/index.php?controller=news&action=views_news&id_post='.$id_post;
			$id_user=$_SESSION['login']['id'];
			$comment=$cmt->inserComment($content,$id_user,$id_post,date('Y-m-d H:i:s'));
			header('location: '.HOME_PATH.$_SESSION['views_post']);
		}
		if ($msg) {
			$_SESSION['msg_cmt']=$msg;
		}
		header('location: '.HOME_PATH.$_SESSION['views_post']);
	}
	public function getAllComment(){
		$cmt=new newsModel();
		$idPost=$_GET['id_post'];

		$allcmt=$cmt->getAllcmt($idPost);

		return $allcmt;
	}
	public function countCmt(){
		$news=new newsModel();
		$id=$_GET['id_post'];
		$countComment=$news->CountCmt($id);
		return$countComment;
	}
	public function deleteCmt(){
		$news= new newsModel();
		$id_post=$_GET['id_post'];
		var_dump($id_post);
		$id=$_GET['id_cmt'];
		$deleteCmtbyid=$news->deleteComment($id);
		header('location: '.HOME_PATH.'/index.php?controller=news&action=views_news&id_post='.$id_post);
	}
	public function search(){
		if (isset($_POST['search'])) {
		}
		return include ROOT_PATH.'/views/news/search.php';
	}
	public function searchfull(){
		$news=new newsModel();
		$search=addslashes($_POST['search']);
		$ser=$news->searchBy($search);
		return $ser;
	}
	public function video(){
		return include ROOT_PATH.'/views/news/video.php';
	}
	public function getallvideo(){
		$news=new newsModel();
		$v=$news->getAllvideo();
		return $v;
	}

}
?>