<?php
/**
 * @Author: hellen
 * @Date:   2018-01-30 16:45:56
 * @Last Modified by:   hellen
 * @Last Modified time: 2018-03-12 22:27:12
 */
	/*
	获取QueryString
	 */
	$queryString = $_SERVER["QUERY_STRING"];
	$status = explode('=', $queryString)[1];

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

	/*
	连接上数据库之后，根据status状态访问表itemall，进行不同操作
	*/
	if($status == "all") {
		$mysql1 = "select * from itemall";
		$result = mysql_query($mysql1);
		$array = array();
		while($res = mysql_fetch_array($result)) {
			/*JSON数据处理*/
			array_push($array, json_decode('{"id":"'.$res['id'].'","value":"'.$res['value'].'", "date":"'.$res['date'].'", "status":"'.$res['status'].'", "count":'.$res['count'].'}'));
		}
	} else if($status == "completed") {
		$mysql1 = "select * from itemall where status='completed'";
		$result = mysql_query($mysql1);
		$array = array();
		while($res = mysql_fetch_array($result)) {
			/*JSON数据处理*/
			array_push($array, json_decode('{"id":"'.$res['id'].'","value":"'.$res['value'].'", "date":"'.$res['date'].'", "status":"'.$res['status'].'", "count":'.$res['count'].'}'));
		}
	} else {
		$mysql1 = "select * from itemall where status='active'";
		$result = mysql_query($mysql1);
		$array = array();
		while($res = mysql_fetch_array($result)) {
			/*JSON数据处理*/
			array_push($array, json_decode('{"id":"'.$res['id'].'","value":"'.$res['value'].'", "date":"'.$res['date'].'", "status":"'.$res['status'].'", "count":'.$res['count'].'}'));
		}
	}
	
	echo json_encode($array);
?>
