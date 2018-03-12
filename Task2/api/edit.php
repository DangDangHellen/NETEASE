<?php

/**
 * @Author: hellen
 * @Date:   2018-02-01 21:38:28
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-03-12 22:26:59
 */
	/*获取参数*/
	$id = $_POST['id'];
	$val = $_POST['value'];
	echo $id.$val;

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

	$mysql1 = 'select * from itemall where `id` = '.$id;
	$res = mysql_query($mysql1);
	$result = mysql_fetch_array($res);
	$mysql = 'UPDATE `itemall` SET `value` = "'.$val.'" WHERE `id` ='.$id;
	mysql_query($mysql);
?>