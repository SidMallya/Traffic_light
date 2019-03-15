<html>
<head>
<title>Animation Page</title>
<?php
$v = $_POST['speed_limit'];
$G = $_POST['percent_grade'] / 100;

if($v == 0) {
	echo "Please select a speed limit";
	exit();
}

$Y = 1 + ( (1.47 * $v) / (2 * ( 10 + ( $G * 32.2 ) ) ) );

echo '<script type="text/javascript">';
echo "\n";
echo 'var time = 0;';
echo "\n";
echo "var Y = $Y;";

echo "\n";
echo 'function play_animation()';
echo "\n";
echo '{';
echo "\n";
echo 'var image_number = time % 3 + 1; ';
echo "\n";
echo 'document.light.src = "images/"+image_number +"_';
echo $v;
echo '.PNG";';
echo "\n";
echo 'time=time+1;';
echo "\n";
echo 'var y;';
echo "\n";
echo 'switch(image_number)';
echo "\n";
echo '{';
echo "\n";
echo 'case 1:';
echo "\n";
echo 'y = 3000;';
echo "\n";
echo 'break;';
echo "\n";
echo 'case 2:';
echo "\n";
echo 'y = Y * 1000;';
echo "\n";
echo 'break;';
echo "\n";
echo 'case 3:';
echo "\n";
echo 'y = 5000;';
echo "\n";
echo 'break;';
echo "\n";
echo '}';
echo "\n";
echo 'var t=setTimeout("play_animation()", y);';
echo "\n";
echo '}';
echo "\n";
echo '</script>';
?>
</head>
<body onload="return play_animation()">
<?php
echo "Speed Limit = ";
echo $v;
echo " mph<br/>";
echo "Percent Grade = ";
echo ($G * 100);
echo " %<br/>";
echo "Yellow Light Change Interval = ";
echo $Y;
echo " second(s)<br/>";
echo "Below traffic light is set to a Yellow Light Change Interval of ";
echo $Y;
echo " second(s)<br/>";
echo "<br/>";
echo '<img src="images/1_';
echo $v;
echo '.PNG" name="light"/>';
?>
</body>
</html>