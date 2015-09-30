<?php
class database
{
	var $_sql = '';
	var $_connection = '';
	var $_cursor = null;
	
	//function conect to MySQL and databases
	public function database()
	{
		$this->_connection = @mysql_connect('localhost','root','');
		if(!$this->_connection)
		{
			die('Không thể kết nối đến máy chủ');
		}
		
		$db = 'itsol_project';
		if($db != '' && !mysql_select_db($db,$this->_connection))
		{
			die('Không thể mở cơ sở dữ liệu'.mysql_error());
		}
		mysql_query('SET NAMES "UTF8"');
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
		while($row = mysql_fetch_assoc($cur)) //browse queries per record in assignment to the array
		{
			$array[] = $row;
		}
		mysql_free_result($cur);
		return $array;
	}
	
	public function query()
	{
		$this->_cursor = mysql_query($this->_sql,$this->_connection);
		return $this->_cursor;
	}
	
	public function disconnect()//disconnect database
	{
		mysql_close($this->_connection);
	}
}
?>