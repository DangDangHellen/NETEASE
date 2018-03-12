<?php

/**
 * @Author: hellen
 * @Date:   2018-02-01 21:37:59
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-03-12 22:26:42
 */
	$id = $_POST['id'];
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
	$mysql1 = 'select * from itemall where `id` = '.$id;
	$res = mysql_query($mysql1);
	$result = mysql_fetch_array($res);
	$setNum = $result['count'] + 1;
	if($setNum % 2 == 0) {
		//是偶数，说明status为active
		$setStatus = 'active';
	} else {
		$setStatus = 'completed';
	}
	$mysql = 'UPDATE `itemall` SET `status` = "'.$setStatus.'", `count` = "'. $setNum .'" WHERE `id` ='.$id;
	mysql_query($mysql);
	echo '修改状态成功';
?>