<?php 
include_once('db.php');

// echo strposs();  
error_reporting(0);
// echo $_SESSION['d'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Title</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
</head>

<body>

    <div class="content">
 

    				<p>用户</p>
                    <input type="text" name="user"id='user' placx	eholder="请输入您的用户" value='<?php echo  strposs(); ?>'>
                    <p>密码</p>
                    <input type="pwd" name="pwd"id='pwd' placeholder="请输入您的密码">
                    <p>手机号码</p>
                    <input type="text" name="tel"id='tel' placeholder="请输入您的联系电话">
                    <p>验证码</p>
                    <input type="text" name="yz" id='yz'placeholder="请输入您的手机验证码">
					<input type="button" id="btn" value="免费获取验证码" />
					<script type="text/javascript">	
					var wait=60;
					function time(o) {
					  if (wait == 0) {
					   o.removeAttribute("disabled");   
					   o.value="免费获取验证码";
					   wait = 60;
					  } else { 
					 
					   o.setAttribute("disabled", true);
					   o.value="重新发送(" + wait + ")";
					   wait--;
					   setTimeout(function() {
					    time(o)
					   },
					   1000)
					  }
					 }
					document.getElementById("btn").onclick=function(){time(this);}
					</script>
                    <p>图片验证码</p>
                     <input type="text" name="tyz" id='tyz'placeholder="请输入您的验证码">
                    <img src="./image.php" onClick="javascript:this.src=this.src+'#';" id='ttyz'>
                    <input type="submit" id='sub' name="sub" >
                
<script type="text/javascript">
    
  $('#sub').click(function(){

        var user=$('#user').val();//用户
        var pwd = $('#pwd').val();//密码
        var tel = $('#tel').val();//孩手机号码
        var yz = $('#yz').val();//手机验证码
        var tyz = $('#tyz').val();//输入的图片验证码
        var ttyz = $('#ttyz').val();//图片验证码


        
         $.post('ajax.php?t=sub',{pwd:pwd,user:user,tel:tel,yz:yz,tyz:tyz,ttyz:ttyz},function(A){
                 if(A.status==0){
                     alert(A.info);
                     // $('#error').text(A.info);
                 }
                 if(A.status==1){
                     alert(A.info);
                     window.location.href="index.php" 
                    // $('#error').text(A.info);
             }
         },'json');
     });
  
window.onbeforeunload=function(){
       
        var user=$('#user').val();//用户
        var pwd = $('#pwd').val();//密码
        var tel = $('#tel').val();//孩手机号码
        var yz = $('#yz').val();//手机验证码
        var tyz = $('#tyz').val();//输入的图片验证码
        var ttyz = $('#ttyz').val();//图片验证码


        
         $.post('ajax.php?t=sua',{pwd:pwd,user:user,tel:tel,yz:yz,tyz:tyz,ttyz:ttyz},function(A){
                 if(A.status==0){
                     alert(A.info);
                     // $('#error').text(A.info);
                 }
                 if(A.status==1){
                     alert(A.info);
                     window.location.href="index.php" 
                    // $('#error').text(A.info);
             }
         },'json');
            // return "我在这写点东西";
        }
        // window.onunload=function(){
        //      var user=$('#user').val();//用户
        // var pwd = $('#pwd').val();//密码
        // var tel = $('#tel').val();//孩手机号码
        // var yz = $('#yz').val();//手机验证码
        // var tyz = $('#tyz').val();//输入的图片验证码
        // var ttyz = $('#ttyz').val();//图片验证码


        
        //  $.post('ajax.php?t=sua',{pwd:pwd,user:user,tel:tel,yz:yz,tyz:tyz,ttyz:ttyz},function(A){
        //          if(A.status==0){
        //              alert(A.info);
        //              // $('#error').text(A.info);
        //          }
        //          if(A.status==1){
        //              alert(A.info);
        //              window.location.href="index.php" 
        //             // $('#error').text(A.info);
        //      }
        //  },'json');
        //     // return "我在这写点东西";
        // }
        // // 
        // window.onload=function(){
        // var user=$('#user').val();//用户
        // var pwd = $('#pwd').val();//密码
        // var tel = $('#tel').val();//孩手机号码
        // var yz = $('#yz').val();//手机验证码
        // var tyz = $('#tyz').val();//输入的图片验证码
        // var ttyz = $('#ttyz').val();//图片验证码


        
        //  $.post('ajax.php?t=sua',{pwd:pwd,user:user,tel:tel,yz:yz,tyz:tyz,ttyz:ttyz},function(A){
        //          if(A.status==0){
        //              alert(A.info);
        //              // $('#error').text(A.info);
        //          }
        //          if(A.status==1){
        //              alert(A.info);
        //              window.location.href="index.php" 
        //             // $('#error').text(A.info);
        //      }
        //  },'json');
        // }
    
    
</script> 



    </div>

</body>
</html>