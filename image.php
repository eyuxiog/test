<?php
	header("content-type: image/jpeg");
	$width  = 70;
	$height = 28;

	$size   = 20;
	$fontfile = 'comic.ttf';

/*******************/
	$text_array = array(
		'1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
		'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
		'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
		'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N',
		'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X',
		'Y', 'Z'
	);

//循环产生每个数字
	$text = array();
	$i=0;
	do {
		$text[$i]   = $text_array[rand(0, 61)];
		$i++;
	} while ($i<4);

	$x = -11;
	$y = rand(20, 25);

	$im = imagecreate($width, $height);
	$background_color = imagecolorallocate($im, 250, 232, 223);
	$text_color  = imagecolorallocate($im, 23, 149, 15);
	$line_color  = imagecolorallocate($im, 230, 19, 15);
	//循环写入文字,使每个都旋转
	$i=0;
	do {
		//97-122 小写  65-90 大写
		$ascii = ord($text[$i]);
		if ($ascii>64 && $ascii<91) {
			$t_size = $size-5;
		} else {
			$t_size = $size;
		}

		$x = $x + rand(11, 18);
		$angle  = rand(-16, 16);

		imagettftext($im, $t_size, $angle, $x, $y, $text_color, $fontfile, $text[$i]);
		
		//如果是M m将$x加大
		if ($ascii==77 || $ascii==109) {
			$x = $x + 8;
		}
		
		$i++;
	} while ($i<4);
	
	
	if (!isset($_SESSION)) {
		session_start();
	}
	$_SESSION['code'] = '';
	foreach ($text as $t) {
		$_SESSION['code'] .= $t;
	}

	imagejpeg($im);
	imagedestroy($im);

	
