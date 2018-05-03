<?php
include_once('db.php');



$type=$_GET['t'];



if ($type =='sub') {
	$return=array('status'=>'','type'=>'','info'=>'');
	
	$user = $_POST['user'];//用户
	$pwd = $_POST['pwd'];//密码
	$tel = $_POST['tel'];//手机号码
	$yz = $_POST['yz'];//验证
	$tyz = $_POST['tyz'];//验证


/*用户名验证*/
	if (!$user) {
		$return['status']=0;
		$return['info']='用户名不能为空';
		die(json_encode($return));
	}

	$rule="/^\d{6,}$/";
	if(!preg_match($rule, $user) ){
		$return['status']=0;
		$return['info']='用户名不能少于6位';
		die(json_encode($return));
	}

	$query="SELECT `user` FROM `a_user` where `user`=$user";
	$res = select_single_log($query);
	if($res){
		$return['status']=0;
		$return['info']='用户名不能重复';
		die(json_encode($return));
	}

/*密码验证*/

	if(!$pwd){
		$return['status']=0;
		$return['info']='密码不能为空';
		die(json_encode($return));
	}

	// $pwd_rule="/^[\da-zA-Z!@#$%^&*]*$/";
	// if(!preg_match($rule, $pwd) ){
	// 	$return['status']=0;
	// 	$return['info']='密码是字母+数字+符号';
	// 	die(json_encode($return));
	// }
	


/*验证手机号码*/
	if (! $tel) {
		$return['status']=0;
		$return['info']='*联系电话不能为空！';
		die(json_encode($return));
	}
	$reg = '/[^0-9+]*(?P<tel>(\+86[1][368][0-9]{9})|([1][368][0-9]{9}))[^0-9+]*/';
	if (!preg_match($reg, $tel)) {
		$return['status']=0;
		$return['info']='*联系电话格式错误！';
		die(json_encode($return));
	}

	/*验证图片验证码*/

	if ($tyz !=$_SESSION['code']) {
		$return['status']=0;
		$return['info']='*验证码错误';
		die(json_encode($return));
	}


	/*写入数据库*/
	$pwd=md5($pwd);
	#时间
	$date=date('Y-m-d H:i:s');

	$query="INSERT into `a_user` (`user`,`pwd`) VALUES ('{$user}','{$pwd}' )";
	$insert_user=insert_single_log($query);

	$session_id = session_id();
	$query="DELETE FROm `temp_user` where `aaaa` = '{$session_id}' ";
	$delete_sessionid = delete_single_log($query);
	if ($user || $pwd ) {
		$return['status']=1;
		$return['info']='注册成功';
		die(json_encode($return));
	}
}




/*离开页面时候*/

$type=$_GET['t'];



if ($type =='sua') {
	$return=array('status'=>'','type'=>'','info'=>'');
	
	$user = $_POST['user'];//用户
	$pwd = $_POST['pwd'];//密码
	$tel = $_POST['tel'];//手机号码
	$yz = $_POST['yz'];//验证
	$tyz = $_POST['tyz'];//验证

	// $query="INSERT into `a_user` (`user`,`pwd`) VALUES ('1','2' )";
	// $insert_user=insert_single_log($query);


	$session_id = session_id();
	
	
	$query="DELETE FROM `temp_user` where `aaaa`='{$session_id}' ";
	$delete_res = delete_single_log($query);

		
	// $query="DELETE FROM `temp_user` where `te_user`='{$strposs}' ";
	// $delete_res = delete_single_log($query);


	// $strposs= strposs();


}



?>