<?php

/**
 * @Author: hellen
 * @Date:   2018-02-01 20:58:25
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-03-12 22:26:51
 */
	/*
	获取参数
	 */
	$id = $_POST['id'];

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

	if(!$con_mysql)
	{
		die("Can not connect to the database selected");
	}

	$mysql1 = "delete from `itemall` where id=$id";
	$result = mysql_query($mysql1);
	echo '删除成功';
?>