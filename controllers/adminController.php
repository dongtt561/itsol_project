<?php
include ROOT_PATH.'/models/adminModel.php';


class adminController{
    //thêm danh mục
    public function home () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/admin_manager/admin_home.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function loadAllcategory () {
        $news = new adminModel();
        $news_cate = $news->getAllcategory();
        return $news_cate;
    }
    // manage users
    public function sortset(){
        $_SESSION['sortUser']=$_POST;
         header('location: '.HOME_PATH.'/index.php?controller=admin&action=home');
    }
    
    public function getAllUser($name){

        $admin=new adminModel();
        $Allusers=$admin->loadAlluser($name);
        return $Allusers;
    }
    public function add_user () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/insert_user.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function get_user_group(){
        $admin=new adminModel();
        $result=$admin->get_AllgroupUser();
        return $result;
    } 
    public function insert_user(){
        if($_SESSION['login']['id_group']!==2){
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        $admin=new adminModel();
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $password1=md5($_POST['password1']);
        $msg = '';
        if (!isset($_POST['group_name'])||$_POST['group_name']==0) {
            $msg="Chưa chọn nhóm người dùng";
        }
        $user_group=$_POST['group_name'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg.= "</br>Email không hợp lệ"; 
        }
        if(!empty($admin->get_user($email))){
            $msg.='</br>Email đã được sử dụng';
        }
        if ($password!==$password1) {
            $msg.= "</br>Xác nhận lại mật khẩu";
        }
        if($msg){
            $_SESSION['message_add'] = $msg;
        }
        else{
            $insert=$admin->insert_user($user_name, $email, $password, $user_group);

            $msg.='</br>Thêm thành công';
            $_SESSION['message_add'] = $msg;
            header('Location: '.HOME_PATH.'/index.php?controller=admin&action=add_user');
        }
        header('Location: '.HOME_PATH.'/index.php?controller=admin&action=add_user');
    }

    public function updateUser(){
        if($_SESSION['login']['id_group']==2){
            $edit=new adminModel();
            $email=$_GET['email'];
            $user_edit=$edit->get_user_full($email);
            return include ROOT_PATH.'/views/admin/update_user.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function save_userEdit(){
        if($_SESSION['login']['id_group']!==2){
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        $userSave=new adminModel();
        $email=$_GET['email'];
        $user_name=$_POST['user_name'];
        $msg='';
        $id_group=$_POST['group_name'];
        if(!empty($id_group)&&!empty($user_name)){
            $save=$userSave->saveUserEdit($user_name,$id_group,$email);
        }
        if ($save) {
            $msg.='Sửa thành công';
        }
        else{
            $msg.='Lỗi! Sửa không thành công';
        }
        if (!empty($msg)) {
            $_SESSION['message_edit'] = $msg;
        }
        
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=home');
    }
    public function deleteUser(){
        if($_SESSION['login']['id_group']==2){
            $delete=new adminModel();
            $email=$_GET['email'];
            $msg='';
            $user_delete=$delete->delete_user($email);
            if ($user_delete) {
                $msg.='Xóa thành công';
            }
            else{
                $msg.='Lỗi! Xóa không thành công';
            }
            $_SESSION['message_delete'] = $msg;
        }
        else{
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=home');
    }
    //manage pots
    public function post_manager () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/admin_manager/admin_manager_post.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function sortPost(){
        $_SESSION['sortPost']=$_POST;
         header('location: '.HOME_PATH.'/index.php?controller=admin&action=post_manager');
    }
    
    public function getAllPosts($name){
        $admin=new adminModel();
        $allPosts=$admin->loadAllPosts($name);
        return $allPosts;
    }
    public function deletePost(){
        if($_SESSION['login']['id_group']==2){
            $delete=new adminModel();
            $id=$_GET['id'];
            $msg='';
            $post_delete=$delete->delete_post($id);
            if ($post_delete) {
                $msg.='Xóa thành công';
            }
            else{
                $msg.='Lỗi! Xóa không thành công';
            }
            $_SESSION['message_deletePost'] = $msg;
        }
        else{
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=post_manager');
    }

    public function add_post(){
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/insert_post.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function insertPost(){
        if($_SESSION['login']['id_group']!==2){
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        $admin=new adminModel();
        $msg = '';
        $title=$_POST['title'];
        $summary_post=$_POST['description'];

        if($_FILES['file']['name'] != NULL){
            if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png"
            || $_FILES['file']['type'] == "image/gif"){
                if($_FILES['file']['size'] > 5120000){
                    $msg.='Ảnh không được lớn hơn 5 Mb';
                }else{
                    $name = $_FILES['file']['name'];
                    $path = '/public/img/thumnail/';
                    $tmp_name = $_FILES['file']['tmp_name'];
                    move_uploaded_file($tmp_name,$path.$name);
                }
            }else{
               $msg.='</br>Kiểu file không hợp lệ';
            }
        }else{
            $msg.='</br>Chọn ảnh tải lên';
        }
        if (isset($path) && isset($name)) {
            $images=$path.$name;
        }
        $content=$_POST['content'];
        $author=$_POST['author'];
        $id_category=$_POST['category'];
        if (!isset($id_category)) {
            $msg.='</br>Chưa chọn danh mục bài viết';
        }
        // if(str_word_count($summary_post) > 50)
        // {
        //     $msg.='Mô tả bài viết quá dài, giới hạn 50 từ';
        // }
        $id_editor=$_SESSION['login']['id'];
        if($msg){
            $_SESSION['message_addPost'] = $msg;
        }
        else{
            $insert=$admin->insert_Post($title, $images, $summary_post, $content, $author, $id_category,$id_editor,date('Y-m-d H:i:s'));
            $msg.='</br>Thêm thành công';
            $_SESSION['message_addPost'] = $msg;
            header('Location: '.HOME_PATH.'/index.php?controller=admin&action=add_post');
        }
        header('Location: '.HOME_PATH.'/index.php?controller=admin&action=add_post');
    }
    public function updatePost(){
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/update_post.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function getPostbyID(){
        $edit=new adminModel();
        $id=$_GET['id'];
        $post_edit=$edit->getpostbyid($id);
        return $post_edit;
    }
    // public function save_editPost(){
    //     if($_SESSION['login']['id_group']!==2){
    //         header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
    //     }
    //     $userSave=new adminModel();
    //     $email=$_GET['email'];
    //     $user_name=$_POST['user_name'];
    //     $msg='';
    //     $id_group=$_POST['group_name'];
    //     if(!empty($id_group)&&!empty($user_name)){
    //         $save=$userSave->saveUserEdit($user_name,$id_group,$email);
    //     }
    //     if ($save) {
    //         $msg.='Sửa thành công';
    //     }
    //     else{
    //         $msg.='Lỗi! Sửa không thành công';
    //     }
    //     if (!empty($msg)) {
    //         $_SESSION['message_edit'] = $msg;
    //     }
        
    //     header('location: '.HOME_PATH.'/index.php?controller=admin&action=home');
    // }
    //manage videos
    public function video_manager () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/admin_manager/admin_manager_video.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    
    public function insert_video(){
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/insert_video.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }

    public function insert_videos(){
        if($_SESSION['login']['id_group']!==2){
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        $admin=new adminModel();
        $msg='';
        if (!isset($_POST['link_video'])) {
            $msg.='Chưa chọn video';
        }
        else{
            $insert=$admin->insert_video($_POST['title'],mysqli_real_escape_string($_POST['link_video']),$_POST['description'],date('Y-m-d H:i:s'));
            $msg='Thêm video thành công';
            header('location: '.HOME_PATH.'/index.php?controller=admin&action=insert_video');
        }
        if ($msg) {
            $_SESSION['status_upload_video']=$msg;
        }        
    }
    public function sortVideos(){
        $_SESSION['sortVideos']=$_POST;
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=video_manager');
    }
    
    public function getAllVideos($name){
        $admin=new adminModel();
        $allVideos=$admin->loadAllVideos($name);
        return $allVideos;
    }
    public function deleteVideos(){
        if($_SESSION['login']['id_group']==2){
            $delete=new adminModel();
            $id=$_GET['id'];
            $msg='';
            $video_delete=$delete->delete_video($id);
            if ($video_delete) {
                $msg.='Xóa thành công';
            }
            else{
                $msg.='Lỗi! Xóa không thành công';
            }
            $_SESSION['message_deleteVideo'] = $msg;
        }
        else{
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=video_manager');
    }
    public function coment_manager () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/admin_manager/admin_manager_comment.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    //category manage
    public function category_manager () {
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/admin_manager/admin_manager_category.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function sortcate(){
        $_SESSION['sortCate']=$_POST;
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=category_manager');
    }
    
    public function getAllCate($name){
        $admin=new adminModel();
        $allCate=$admin->loadAllCate($name);
        return $allCate;
    }
    public function  deleteCate(){
        if($_SESSION['login']['id_group']==2){
            $delete=new adminModel();
            $id=$_GET['id'];
            $msg='';
            $category_delete=$delete->delete_Cate($id);
            $delete->delete_postCate($id);
            if ($category_delete) {
                $msg.='Xóa danh mục thành công';
            }
            else{
                $msg.='</br>Lỗi! Xóa không thành công';
            }
            if ($delete->delete_postCate($id)) {
                $msg.='</br>Xóa thành công bài viết cùng danh mục';
            }
            $_SESSION['message_deleteCate'] = $msg;
        }
        else{
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=category_manager');
    }
    public function insert_category(){
        if($_SESSION['login']['id_group']==2){
                return include ROOT_PATH.'/views/admin/insert_category.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }    
    }
	public function insert_cate(){
        if(($_SESSION['login']['id_group'])!==2){
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
        $admin=new adminModel();
        $summary_category=$_POST['sum_cate'];
        $full_category=$_POST['full_cate'];
        $msg='';
        $sum_cate=$admin->countCate();
        $sum=$sum_cate['sumCate'];
        if ($sum>10) {
            $msg='Số lượng danh mục quá nhiều, </br>Hãy xóa bớt danh mục rồi thêm lại';
        }
        else{
            $insert_cate=$admin->insert_cate($summary_category,$full_category);
            if($insert_cate){
                $msg.='Thêm danh mục thành công';
            }
            else{
                $msg.='</br>Lỗi thêm danh mục';
            }
        }
        $_SESSION['message_addCate'] = $msg;

        header('location: '.HOME_PATH.'/index.php?controller=admin&action=insert_category');
    }
    public function updateCate(){
        if($_SESSION['login']['id_group']==2){
            return include ROOT_PATH.'/views/admin/update_category.php';
        }
        else {
            header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        }
    }
    public function getCatebyID(){
            $edit=new adminModel();
            $id=$_GET['id'];
            $cate_edit = $edit->getCategorybyID($id);
            return $cate_edit;
    }
    public function save_CateEdit(){
        // if($_SESSION['login']['id_group']!==2){
        //     header('location: '.HOME_PATH.'/index.php?controller=home&action=home');
        // }
        $cateSave=new adminModel();
        $id=$_GET['id'];
        $summary_category=$_POST['summary_category'];
        $full_category=$_POST['full_category'];
        $msg='';
        if(!empty($full_category)&&!empty($full_category)){
            $save=$cateSave->saveCateEdit($summary_category,$full_category,$id);
        }
        if ($save) {
            $msg.='Sửa thành công';
        }
        else{
            $msg.='Lỗi! Sửa không thành công';
        }
        if (!empty($msg)) {
            $_SESSION['message_editCate'] = $msg;
        }
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=category_manager');
    }
    public function sortCmt(){
        $_SESSION['sortCmt']=$_POST;
        header('location: '.HOME_PATH.'/index.php?controller=admin&action=coment_manager');
    }
    
    public function getAllCmt($name){
        $admin=new adminModel();
        $allcmt=$admin->loadAllCmt(($name));
        return $allcmt;
    }

}	
?>
