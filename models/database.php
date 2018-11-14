<?php
class database
{
	var $_sql = '';
	var $_connection = '';
	var $_cursor = null;
	
	//function conect to MySQL and databases
	public function database()
	{
		$this->_connection = mysqli_connect('127.0.0.1', 'root', '', 'news_project', '3309');
		if(!$this->_connection)
		{
			die('Không thể kết nối đến máy chủ');
		}
		
		// $db = 'news_project';
		// if($db != '' && !mysql_select_db($db,$this->_connection))
		// {
		// 	die('Không thể mở cơ sở dữ liệu'.mysql_error());
		// }
		// mysql_query('SET NAMES "UTF8"');
	}
	
	
	//execute SQL statements
	public function setQuery($sql)
	{
		$this->_sql = $sql;
	}
	
	public function LoadAllRow()
	{
		if(!($cur = $this->query()))//Check query
			return null;
		$array = array(); //Declare the array to store the records from query
		while($row = mysqli_fetch_assoc($cur)) //browse queries per record in assignment to the array
		{
			$array[] = $row;
		}
		mysqli_free_result($cur);
		return $array;
	}
	
	public function query()
	{
		$this->_cursor = mysqli_query($this->_connection, $this->_sql);
		return $this->_cursor;
	}
	
	public function disconnect()//disconnect database
	{
		mysqli_close($this->_connection);
	}
}
?>