<!DOCTYPE HTML>  
<html>
<head>
<title>MELC Genomics - Framework for DNA Assembly</title>
</head>
<body>  

<?php
// define variables and set to empty values
$outname = $file1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $outname = test_input($_POST["outname"]);
  $file1 = test_input($_POST["file1"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form enctype="multipart/form-data" action="run.php" method="POST">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<br>
<font face="Arial"><b>FastQC: A quality control tool for high throughput sequence data</b></font>
<br>
<font face="Arial"><a target="_blank" href="http://www.bioinformatics.babraham.ac.uk/projects/fastqc/">FastQC</a> aims to provide a simple way to do some quality control checks on raw sequence data coming from high throughput sequencing pipelines. It provides a modular set of analyses which you can use to give a quick impression of whether your data has any problems of which you should be aware before doing any further analysis.</font>

<br>
<br>
<br>
<br>

<center>
<table border=1>
<td width=500 height=200>
<center>

  <p><font face="Arial" size="4">

<img border="0" src="../../figure/datacheck.png" width="128" height="128"></p>
<br>

<?php

shell_exec('rm -rf list.txt');
shell_exec('find ../../data/files/ -name "*.fast*" -print | cut -d/ -f5,6 > list.txt');

$arquivo = fopen ('list.txt', 'r');
echo 'Input File: <select name="file1">';
while(false != ($file = fgets($arquivo,4096)))
  {
   if(($file != ".") and ($file != ".."))
   {
     echo "<option value=".$file.">$file</option>";
   }
  }
echo '</select>';
fclose($arquivo);

?>

  <br><br>

  <p><font face="Arial" size="4">Output Name: </font</p><input type="text" name="outname">

  <br><br>

  <center><input type="submit" name="submit" value="Run"></center>  
<br>
</center>
</td>
</table>

<br> 

</center>
</form>

<br>
<br>
<br>
<br>

<p><font face="Arial" size="4"><b>Parameter Descriptions</b></font></p>
<table>
        <td align="right">
        <p><font face="Arial" size="4">Input File:</font></p>
        <p><font face="Arial" size="4">Output Name:</font></p>
        </td>
        <td>
        <p><font face="Arial" size="4">path to raw sequence file</font></p>
        <p><font face="Arial" size="4">directory name for output files</font></p>
        </td>
</table>

</body>
</html>
