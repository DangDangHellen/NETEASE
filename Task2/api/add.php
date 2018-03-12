<?php

/**
 * @Author: hellen
 * @Date:   2018-01-31 09:56:34
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-03-12 22:26:23
 */
	/*
	获取参数
	 */
	$val = $_POST['value'];
	$date = $_POST['date'];
	$status = $_POST['status'];
	$count = $_POST['count'];
	/*
	获取QueryString,可知当前是在什么状态
	 */
	$queryString = $_SERVER["QUERY_STRING"];
	$res = explode('=', $queryString)[1];

	//连接服务器数据库
	$sql_con = mysql_connect('localhost', 'root', 'hellen123');

	if(!$sql_con)
	{
		die("Can not connect to localhost database");
	}

	//选择要连接的数据库
	$con_mysql = mysql_select_db('mysql');

	/*echo $con_mysql;*/
	if(!$con_mysql)
	{
		die("Can not connect to the database selected");
	}

	/*连接上数据库之后，先判断itemall表是否存在；如果不存在，创建itemall表；
	如果存在，访问表itemall*/
	$res = mysql_list_tables("mysql");
	$i=0; 
	while($i<mysql_num_rows($res))
	{
	    if ('itemall' == mysql_tablename($res,$i)) {
		  	$mysql1 = "insert into `itemall` (`value`, `date`, `status`, `count`) VALUES ('$val', '$date', '$status', $count)";
			$result = mysql_query($mysql1);
			$mysql1 = "select * from itemall";
			$result = mysql_query($mysql1);
		    break;
		}
		$i++;   
	}
	if($i == mysql_num_rows($res)) {
		/*表格不存在时，先创建表格，再添加数据*/
		$mysql_createtable = 'CREATE TABLE `mysql`.`itemall` ( `id` INT NOT NULL AUTO_INCREMENT , `value` TEXT NOT NULL , `date` DATE NOT NULL , `status` TEXT NOT NULL , `count` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB';
		$res_create = mysql_query($mysql_createtable);
		$mysql1 = "insert into `itemall` (`value`, `date`, `status`, `count`) VALUES ('$val', '$date', '$status', $count)";
		$result = mysql_query($mysql1);
		$mysql1 = "select * from itemall";
		$result = mysql_query($mysql1);
	}
?>