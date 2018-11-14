<?php 
include ROOT_PATH.'/models/database.php';

/**
* 
*/
class newsModel extends database{
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
    public function getBestNewsHome(){
        $query="SELECT * FROM posts ORDER BY time_post DESC limit 1";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getnewsbyId($id){
        $query="SELECT posts.id, posts.title, posts.summary_post, posts.content, posts.author, 
        posts.time_post, posts.id_category, category.summary_category, category.full_category
        FROM posts inner join  category ON posts.id_category=category.id WHERE posts.id=$id";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function get_TopPost(){
        $query="SELECT posts.id, posts.title, posts.summary_post, posts.content, posts.author, 
        posts.time_post, posts.id_category, category.summary_category, category.full_category
        FROM posts inner join  category ON posts.id_category=category.id ORDER BY posts.time_post DESC limit 5";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getTopIDcate($idCate){
        $query="SELECT * FROM posts WHERE id_category=$idCate ORDER BY time_post  DESC limit 1";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getPostbyIDcate($id){
        $query="SELECT * FROM posts WHERE id_category=$id ORDER BY time_post  DESC limit 3";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getToptenbyIDcate($idCate){
        $query="SELECT * FROM posts WHERE id_category=$id ORDER BY time_post  DESC limit 7";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function inserComment($content,$id_user,$id_post,$time){
        $query = "INSERT INTO comments (content_comment, id_user, id_post, time_comment) ";
        $query .= "VALUES('$content','$id_user','$id_post','$time')";
        $this->setQuery($query);
        $result = $this->query();
        return $result;
    }
    public function getAllcmt($idPost){
        $query="SELECT comments.id, comments.time_comment, users.user_name, comments.content_comment
        FROM comments INNER JOIN  posts ON comments.id_post = posts.id
        inner join users ON comments.id_user=users.id
        WHERE posts.id=$idPost
        ORDER BY comments.time_comment DESC";

        $this->setQuery($query);
        $results =$this->loadAllRow();

        $array=array();
        if (!empty($results)) {
            $array=$results;

        }
        return $array;
    }
    public function CountCmt($id){
        $query="SELECT posts.id, COUNT(comments.id) as sumCmt
        FROM comments INNER JOIN  posts ON comments.id_post = posts.id
        WHERE posts.id=$id";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }

    public function deleteComment($id){
        $query="DELETE FROM comments WHERE id=$id";
        $this->setQuery($query);
        $results=$this->query();
        return $results;
    }
    public function searchBy($search){
        $query = "SELECT * from posts where title like '%$search%' 
        or  summary_post like '%$search%' or content like '%$search%' 
        or  author like '%$search%' ORDER BY id DESC ";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
    public function getAllvideo(){
        $query = "SELECT * from videos";
        $this->setQuery($query);
        $results =$this->loadAllRow();
        $array=array();
        if (!empty($results)) {
            $array=$results;
        }
        return $array;
    }
}
?>