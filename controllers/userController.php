<?php
include ROOT_PATH.'/models/userModel.php';

class userController{
	public function login(){
		$user=new userModel();
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$login=$user->login($email,$password);
		$msg='';
		if ($login) {
			$_SESSION['login']=$user->get_user($email);
		}
		else{
			$msg.='Sai Email hoặc password';
		}
		if($msg)
		{
			$_SESSION['message_login']=$msg; 
		}
		header('Location: '.HOME_PATH.'/index.php?controller=home&action=home');
	}
	public function logout(){
		unset($_SESSION['login']);
		header('Location: '.HOME_PATH.'/index.php?controller=home&action=home');
	}

	public function register(){
		if (isset($_SESSION['login'])) {
			header('Location: '.HOME_PATH.'/index.php?controller=home&action=home');
		}
		else{
			include ROOT_PATH.'/views/register.php';
		}
	}
	// public function comment_login(){
	// 	if (isset($_SESSION['login'])) {
	// 		header('Location: '.HOME_PATH.'/index.php?controller=home&action=home');
	// 	}
	// 	else{
	// 		include ROOT_PATH.'/views/login.php';
	// 	}
	// }
	public function registerProcess(){
		$user=new userModel();
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$password1=md5($_POST['password1']);
		$password2=md5($_POST['password2']);
		$msg = '';

		if ($password1!=$password2){
			$msg = 'Xác nhận lại mật khẩu';
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     		$msg.= "Email không hợp lệ"; 
    	}
		// if($this->valid_Email($email)){
		// 	$msg .= '<br/>Email không hợp lệ';
		// }
		if(!empty($user->get_user($email))){
			$msg.='</br>Email đã được sử dụng';
		}
		if($msg){
			$_SESSION['message_register'] = $msg;
		}
		else{
			$register=$user->create($user_name, $email, $password1);
			$msg.='</br>Đăng kí thành công';
			$_SESSION['message_register'] = $msg;
		}
		header('Location: '.HOME_PATH.'/index.php?controller=user&action=register');
	}
	public function valid_Email($email){
		if( strpos('$email', '@') == false || strpos('$email','.')==false){
			return false;
		}
		if ( strpos('$email','.') - strpos('$email', '@')==0) {
			return false;
		}
		if (strpos('$email', '@')==0||strpos('$email', '.')==(strlen ('$email')-1)){
			return false;
		}
		return true;

	}
	public function loadAllcategory () {
        $news = new userModel();
        $news_cate = $news->getAllcategory();
        return $news_cate;
    }
	// public function checkPassword($password1,$password2){
	// 	if ($password1==$password2) {
	// 		return true;
	// 	}
	// 	return false;
	// }
}
?>
