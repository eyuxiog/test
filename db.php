<?php
/**
* 数据库操作函数
* lib/db.lib.php
* @date    2015-11-02 12:05:31
*/

/**
 * 查询多条记录
 * $sql string sql语句
 */
session_start();
#时区设置
date_default_timezone_set("PRC");

#主机
$db_host = "localhost";
#数据库
$db_name = "test"; 
#用户名
$db_user = "root";
#密码
$db_password = "root";

#连接数据库
@mysql_connect($db_host,$db_user,$db_password) or die("数据库连接失败");
#选择数据库
mysql_select_db($db_name);
#发送编码指令
mysql_query("SET NAMES UTF8");

function select_batch_log($sql)
{
	$data = array();
	$result = mysql_query($sql);
	if($result){
		while ($row = mysql_fetch_assoc($result)) {
			$data[] = $row;
		}
	}
    
	return $data;
}


/**
 * 查询单条记录
 * $sql string sql语句
 */
function select_single_log($sql)
{
	// $data = array();
	$result = mysql_query($sql);
    // var_dump(mysql_fetch_assoc($result));die;
	if($result){
		$data = mysql_fetch_assoc($result);
	}else{
        $data=null;
    }
	return $data;
}

/**
 * 删除单条记录
 * $sql string sql语句
 */
function delete_batch_log($sql)
{	
	
	mysql_query($sql);
	$rows =mysql_affected_rows();
	return $rows;
}

/**
 * 删除多条记录
 * $sql string sql语句
 */
function delete_single_log($sql)
{

	$rows = 0;
	mysql_query($sql);
	$rows =mysql_affected_rows();
	return $rows;
}

/**
 * 编辑单条记录
 * $sql string sql语句
 */
function update_single_log($sql)
{
	$rows = 0;
 	mysql_query($sql);
   	$rows =mysql_affected_rows();
	return $rows;

}

/**
 * 插入单条记录
 * $sql string sql语句
 */
function insert_single_log($sql)
{
	$rows = 0;
 	mysql_query($sql);
   	$rows =mysql_insert_id();
	return $rows;
}

/**
 * 统计记录数
 * $sql string sql语句
 */
function count_log($sql){
	
	$result = mysql_query($sql);
	$count_arr= array();
	if($result){
		$count_arr = mysql_fetch_row($result);
		$total=$count_arr[0];	
	}
	return $total;
	
}


/**
 * 截取UTF-8编码下字符串的函数
 * @param   string      $str        被截取的字符串
 * @param   int         $length     截取的长度
 * @param   bool        $append     是否附加省略号
 * @return  string      返回截取后的字符串
 */
function substr_cn($str, $length = 0, $append = true)
{
    $charset = "utf-8";
    $str = trim($str);
    $strlength = strlen($str);
    if ($length == 0 || $length >= $strlength)
    {
        return $str;
    }
    elseif ($length < 0)
    {
        $length = $strlength + $length;
        if ($length < 0)
        {
            $length = $strlength;
        }
    }
    #检查是否有开启mb_string扩展库,开启了才有mb_substr函数
    if (function_exists('mb_substr'))
    {
        $newstr = mb_substr($str, 0, $length, $charset);
    }
    elseif (function_exists('iconv_substr'))
    {
        $newstr = iconv_substr($str, 0, $length, $charset);
    }
    else
    {
        $newstr = substr($str, 0, $length);
    }
    #追加省略号（或其他符号）
    if ($append && $str != $newstr)
    {
        $newstr .= '...';
    }
    return $newstr;
}

/**
 * 生成密钥
 * $pwd 需要被加密的密码
 * $crypt 加密因子
 * 算法： 先将原有的密码进行md5()加密一次，截取20位，再拼接加密因子，再md5()第二次加密
 */
function create_pwd($pwd,$crypt){
    $pwd = md5($pwd);
    $pwd = substr_cn($pwd,20,false);
    $pwd = md5($pwd.$crypt);
    return $pwd;
}

/**
 * 生成随机字符串
 */
function rand_string(){
    $crypt_string = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM!@#$%^&*()_+,.?/";
    $len = 6;
    $crypt = "";
    $crypt_len = strlen($crypt_string)-1;
    for($i=0;$i<$len;$i++){
        $num = mt_rand(0, $crypt_len );
        $crypt .= $crypt_string[$num];
    }
    return $crypt;
}

function autoInc($num,$step=1){
        $count=count(str_split($num));
        $num_new=intval($num)+$step;
        if($num_new>pow(10,$count-1)){
            return $num_new;
        }
        else{
            return str_pad($num_new,$count,'0',STR_PAD_LEFT);
        }
    }


// function strposs(){
//  $a=$_SERVER['HTTP_HOST'];


  

//     if (isset($a)) {
//         $sql="SELECT `area` FROM `realmname` where `r_name`='$a' ";

//     $result = mysql_query($sql);
//     if($result){
//        $data = mysql_fetch_assoc($result);
//     }
//         $c=implode(',',$data);
     
//     }else{
//      $sql="SELECT `area` FROM `realmname` where `r_name`=='www.baidu.com' ";

//     $result = mysql_query($sql);
//     if($result){
//        $data = mysql_fetch_assoc($result);
//     }
//         $c=implode(',',$data);
//     }
  
  

//   $sql ="SELECT `user` FROM `a_user` where `user` like '$c%' order by `user` desc";
// // echo $sql;
//     $result2 = mysql_query($sql);
//     if($result2){
//        $data1 = mysql_fetch_assoc($result2);
        
//         if (isset($data1)) {
//           $b=$c.'001';  
//         }else{
//             $b=implode(',',$data1);
//         }
     
   
//    }
//    return $b;
// }

function strposs(){
    // 获取url
    $domain=$_SERVER['HTTP_HOST'];

    $sql="SELECT * FROM `realmname` where `r_name`='{$domain}' ";
    $realOne = select_single_log($sql);

    if(!strpos($domain, $realOne["r_name"])){
        $area_name = $realOne["area"];
        // var_dump($area_name);
    }else{
        $area_name = 801;
        // var_dump($area_name);

    }
    // 查询开头地区和写入开头地区
    $sql ="SELECT `user` FROM `a_user` where `user` like '$area_name%' order by `user` desc";
    $userOne = select_single_log($sql);
    if(!$userOne){
        $area_user=$area_name.'001';  
    }else{
        $area_user = $userOne["user"];

    }
    $user=$area_user+1;
    // echo $user;
    



    // 判断临时表是否有这个会员号
    $sql ="SELECT `te_user` FROM `temp_user` where `te_user`= '{$user}' ";
    $res = select_single_log($sql);
 
 $session_id=session_id();
    if (    empty($res['te_user'])) {
    $query="INSERT into `temp_user` (`te_user`,`aaaa`) VALUES ('{$user}','{$session_id}')";
    // echo '1:'.$sql;
    $res = insert_single_log($query);
    $_SESSION['d']=$user;
    // echo $lin.'<br>';
    return $user;
    }else{
         //没有旧insert上去 
    $sql ="SELECT `te_user` FROM `temp_user` where `te_user` like '$area_name%' order by `te_user` desc";
    // echo '2:'.$sql;
    $res = select_single_log($sql);
    $area_user=$res['te_user'];
    // echo $area_user;



       // 判断第二个人进来时会员账号变化
       $user=$area_user+1;
    $query="SELECT * from `temp_user` where `te_user`='{$user}'";
    $res = select_single_log($query);
    // echo $sql;
    
    /*查询临时表的session_id*/
    $sionid_query="SELECT `aaaa` FROM `temp_user` where `aaaa` ='{$session_id}' ";
     $sionid_res = select_single_log($sionid_query);
     if ($sionid_res['aaaa'] != $session_id) {
          if (empty($res['te_user'])) {
         
            $query="INSERT into `temp_user` (`te_user`,`aaaa`) VALUES ('{$user}','{$session_id}' )";
            // echo $sql;
            $res = insert_single_log($query);
            $_SESSION['d']=$user;
            return $user;
            }else{
               
            $query="INSERT into `temp_user` (`te_user`,`aaaa`) VALUES ('{$user}','{$session_id}' )";
            // echo $sql;
            $res = insert_single_log($query);
             $_SESSION['d']=$user;
            return $user;
    }

     }else{
        // echo $area_user;
        return $area_user;

     }
   

    }  

}

?>
