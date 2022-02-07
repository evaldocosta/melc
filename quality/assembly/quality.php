<!DOCTYPE HTML>  
<html>
<head>
<title>MELC Genomics - Framework for DNA Assembly</title>
</head>
<body>  

<?php
// define variables and set to empty values
$threads = $outname = $file1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $threads = test_input($_POST["threads"]);
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
<font face="Arial" size="4"><b>QUAST: Quality Assessment Tool for Genome Assemblies</b></font>
<br>
<font face="Arial"><a target="_blank" href="http://bioinf.spbau.ru/quast">QUAST</a> stands for Quality Assessment Tool. The tool evaluates genome assemblies by computing various metrics.</font>

<br>
<br>
<br>
<br>

<center>

<table border=1>
<td width=500 height=200>
<center>
<br>
<img border="0" src="../../../melc/figure/datacheck.png" width="128" height="128"></p>
<br>
  <p><font face="Arial" size="4">Threads: </font</p><select size="1" name="threads">
  <?php
  $cpu= shell_exec('more /proc/cpuinfo | grep processor | wc -l');
  for ($num=1; $num<=$cpu; $num++){
  echo '<option>' .$num. '</option>';
  }
  ?>
  </select>
  
  <br><br>

<?php

shell_exec('rm -rf list.txt');

shell_exec('find /var/www/html/melc/assembly/results/results -name contigs.fa -print | cut -d/ -f 9,10,11 > list.txt');

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
  Output Name: <input type="text" name="outname">



  <br><br>

  <center><input type="submit" name="submit" value="Run"></center>  
  <br>
  </fieldset>

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
        <p><font face="Arial" size="4">Threads:</font></p>
        <p><font face="Arial" size="4">Input File:</font></p>
        <p><font face="Arial" size="4">Output Name:</font></p>
        </td>
        <td>
        <p><font face="Arial" size="4">use of multiple CPU cores</font></p>
        <p><font face="Arial" size="4">path of the output assembly file</font></p>
        <p><font face="Arial" size="4">directory name for output files</font></p>
        </td>
</table>

</body>
</html>
