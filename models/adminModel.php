<?php 
include ROOT_PATH.'/models/database.php';
class adminModel extends database  {

    public function get_AllgroupUser(){
    	$str_query = "SELECT group_name,id FROM user_group ";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        return $results;
    }
    public function get_user($email){
        
        $str_query = "SELECT * FROM users WHERE email='$email'";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results[0];
        }
        return $array;
    }
    public function get_user_full($email){
        
        $str_query= "SELECT * FROM user_group join users 
        ON user_group.id=users.id_group WHERE email='$email'";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results[0];
        }
        return $array;
    }
    public function insert_user($username,$email,$pass,$group_id) {
        $query = "INSERT INTO users (user_name,email,pass_word,id_group) ";
        $query .= "VALUES('$username','$email','$pass','$group_id')";
        $this->setQuery($query);

        $result = $this->query();
        return $result;
    }
    public function loadAlluser($order_by){
        switch ($order_by) {
            case 'username':
                $query= "SELECT * FROM user_group inner join users ON user_group.id=users.id_group ORDER BY UCASE(user_name) ASC";
                break;
            case 'email':
                $query= "SELECT * FROM user_group inner join users ON user_group.id=users.id_group ORDER BY email ASC";
                break;
            case 'group':
                $query= "SELECT * FROM user_group inner join users ON user_group.id=users.id_group ORDER BY group_name ASC";
                break;
            
            default:
                $query= "SELECT * FROM user_group inner join users ON user_group.id=users.id_group ORDER BY users.id ASC";
                break;
        }
        $this->setQuery($query);
        $results =$this->loadAllRow();
        return $results;
    }    
    public function saveUserEdit($user_name,$id_group,$email){
        $query="UPDATE users SET user_name = '$user_name' , id_group = '$id_group' WHERE email='$email'";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    public function delete_user($email){
        $query="DELETE FROM users WHERE email='$email'";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    //video
    public function insert_video($title_video,$link_video,$description,$time){
        $query = "INSERT INTO videos(title_video,link_video,description,time) ";
        $query .= "VALUES('$title_video','$link_video','$description','$time')";
        $this->setQuery($query);
        $result = $this->query();
        return $result;
    }
    public function loadAllVideos($order_by){
        switch ($order_by) {
            case 'title':
                $query= "SELECT * FROM videos  ORDER BY UCASE(title_video) DESC";
                break;
            case 'description':
                $query= "SELECT * FROM videos  ORDER BY UCASE(description) ASC";
                break;
            case 'time':
                $query= "SELECT * FROM videos  ORDER BY time DESC";
                break;
            
            default:
                $query= "SELECT * FROM videos  ORDER BY id_video ASC";
                break;
        }
        $this->setQuery($query);
        $results =$this->loadAllRow();
        return $results;
    } 
    public function delete_video($id){
        $query="DELETE FROM videos WHERE id_video=$id";
        $this->setQuery($query);
        $results=$this->query();

        return $results;
    }
    //Posts
    public function loadAllPosts($order_by){

        switch ($order_by) {
            case 'title':
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY UCASE(posts.title) ASC";
                break;
            case 'author':
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY UCASE(posts.author) ASC";
                break;
            case 'category':
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY UCASE(category.summary_category) ASC";
                break;
            case 'editor':
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY UCASE(users.user_name) ASC";
                break;
            case 'time':
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY posts.time_post ASC";
                break;            
            default:
                $query= "SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
                posts.author, posts.time_post, category.summary_category, users.user_name
                FROM posts inner join category ON posts.id_category=category.id 
                inner join users ON posts.id_editor=users.id ORDER BY posts.id ASC";
                break; 
        }
        $this->setQuery($query);
        $results =$this->loadAllRow();
        return $results;
    }
    public function delete_post($id){
        $query="DELETE FROM posts WHERE id=$id";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    public function insert_Post($title,$images, $summary_post, $content, $author, $id_category,$id_editor,$time){
        $query = "INSERT INTO posts (title, images,summary_post,content,author,time_post,id_category,id_editor) ";
        $query .= "VALUES('$title','$images','$summary_post','$content','$author','$time',$id_category,$id_editor)";
        $this->setQuery($query);
        $result = $this->query();
        return $result;
    }
    public function getpostbyid($id){
        $query="SELECT posts.id, posts.title, posts.images, posts.summary_post, posts.content,
        posts.author, posts.time_post, category.summary_category, users.user_name
        FROM posts inner join category ON posts.id_category=category.id 
        inner join users ON posts.id_editor=users.id WHERE posts.id=$id";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results[0];
        }
        return $array;
    }
    //category
    public function loadAllCate($order_by){
        switch ($order_by) {
            case 'category_name':
                $query= "SELECT category.id, category.summary_category , category.full_category, 
                COUNT(title) AS sum_posts FROM category LEFT join posts ON category.id = posts.id_category 
                GROUP BY category.id ORDER BY UCASE(category.summary_category) ASC";
                break;
            case 'number_posts':
                $query= "SELECT category.id, category.summary_category , category.full_category, 
                COUNT(title) AS sum_posts FROM category LEFT join posts ON category.id = posts.id_category 
                GROUP BY category.id ORDER BY sum_posts DESC";
                break;
            default:
                $query= "SELECT category.id, category.summary_category , category.full_category, 
                COUNT(title) AS sum_posts FROM category LEFT join posts ON category.id = posts.id_category 
                GROUP BY category.id ORDER BY category.id ASC";
                break;
        }
        $this->setQuery($query);
        $results =$this->loadAllRow();
        return $results; 
    }
    public function delete_Cate($id){
        $query="DELETE FROM category WHERE id=$id";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    } 
    public function delete_postCate($id){
        $query="DELETE FROM posts WHERE id_category=$id";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    public function insert_cate($summary_category,$full_category){
        $query = "INSERT INTO category (summary_category,full_category) ";
        $query .= "VALUES('$summary_category','$full_category')";
        $this->setQuery($query);
        $result = $this->query();
        return $result;
    }
    public function countCate(){
        $str_query = "SELECT count(id) AS sumCate FROM category";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results[0];
        }
        return $array;
    }
    public function getAllcategory(){    
        $str_query = "SELECT * FROM category WHERE id>2";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getCategorybyID($id){
        $str_query = "SELECT * FROM category WHERE id=$id";
        $this->setQuery($str_query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results[0];
        }
        return $array;
    }
    public function saveCateEdit($summary_category,$full_category,$id){
        $query="UPDATE category SET summary_category = '$summary_category' , full_category = '$full_category' WHERE id='$id'";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    //comment
    public function loadAllCmt($order_by){
        // var_dump($$order_by);die();

        switch ($order_by) {
            case 'title':
                $query= "SELECT posts.id, posts.title, COUNT(comments.id) AS sum_cmt FROM posts 
                INNER JOIN comments on posts.id=comments.id_post  GROUP BY posts.id
                ORDER BY UCASE(posts.title) ASC";
                break;
            case 'sum_cmt':
                $query= "SELECT posts.id, posts.title, COUNT(comments.id) AS sum_cmt FROM posts 
                INNER JOIN comments on posts.id=comments.id_post GROUP BY posts.id
                ORDER BY sum_cmt DESC";
                break;
            default:
                $query= "SELECT posts.id, posts.title, COUNT(comments.id) AS sum_cmt FROM posts 
                INNER JOIN comments on posts.id=comments.id_post GROUP BY posts.id
                ORDER BY posts.id ASC";
                break;
        }
        $this->setQuery($query);
                $results =$this->loadAllRow();
        return $results; 
    }
}	
