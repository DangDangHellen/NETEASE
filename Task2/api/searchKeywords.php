<?php

/**
 * @Author: hellen
 * @Date:   2018-02-01 22:21:32
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-02-02 11:27:20
 */
	$key = $_POST['key'];

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

	$mysql1 = 'select * from `itemall` where `value`="'.$key.'"';
	$res = mysql_query($mysql1);
	$array = array();
	while($result = mysql_fetch_array($res)) {
		array_push($array, json_decode('{"id":"'.$result['id'].'","value":"'.$result['value'].'", "date":"'.$result['date'].'", "status":"'.$result['status'].'", "count":'.$result['count'].'}'));
	}
	echo json_encode($array);
?>