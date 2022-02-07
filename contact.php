<!DOCTYPE HTML>  
<html>
<head>
<title>MELC Genomics - Framework for DNA Assembly</title>
</head>
<body>  

<center><p><font face="Arial" size="4">Got a question? Send us a message and we'll respond as soon possible.</font></p></center>
<br>

<?php

$email = shell_exec('head .contact.txt');
echo '<a href="mailto:'.$email.'?subject=Information"><p align="center"><img border="0" src="figure/contact.png" width="128" height="128"></p></a>';

?>

</body>
</html>
