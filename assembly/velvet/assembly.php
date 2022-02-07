<!DOCTYPE HTML>  
<html>
<head>
<title>MELC Genomics - Framework for DNA Assembly</title>
</head>
<body>  

<?php
// define variables and set to empty values
$kmer = $outname = $file1 = $file2 = $max_rd_len = $avg_ins = $min_contig = $threads = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kmer = test_input($_POST["kmer"]);
  $outname = test_input($_POST["outname"]);
  $file1 = test_input($_POST["file1"]);
  $file2 = test_input($_POST["file2"]);
  $max_rd_len = test_input($_POST["max_rd_len"]);
  $avg_ins = test_input($_POST["avg_ins"]);
  $min_contig = test_input($_POST["min_contig"]);
  $threads = test_input($_POST["threads"]);
  $ftypes = test_input($_POST["ftypes"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<center>

<img border="0" src="../../figure/dataprocess.png" width="128" height="128"></p>

<form enctype="multipart/form-data" action="run.php" method="POST">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<table>
<tr>
<td>

<table border=1 bgcolor="black">
<td width=500>
<center>

<font face="Arial" color="white" ><b>Input Files</b></font>

</center>
</td>
</table>

<table border=1>
<td width=500 height=250>
<center>

  <p><font face="Arial">Threads: </font</p><select size="1" name="threads">
  <?php
  $cpu= shell_exec('more /proc/cpuinfo | grep processor | wc -l');
  for ($num=1; $num<=$cpu; $num++){
  echo '<option>' .$num. '</option>';
  }
  ?>
  </select>

<p><font face="Arial">K-mer Size: </font</p><select size="1" name="kmer">
  <?php
  for ($num=5; $num<193; $num+=2){
  echo '<option>' .$num. '</option>';
  }
  ?>
  </select>

  <p><font face="Arial">Format Type: </font</p><select size="1" name="ftypes">
  <?php
  echo '<option>fmtAuto</option>';
  echo '<option>fasta</option>';
  echo '<option>fastq</option>';
  echo '<option>fasta.gz</option>';
  echo '<option>fastq.gz</option>';
  echo '<option>bam</option>';
  echo '<option>sam</option>';
  ?>
  </select>
  <br><br>

<?php

shell_exec('rm -rf .list.txt');
shell_exec('find ../../data/files/ -name "*.fast*" -print | cut -d/ -f5,6 > .list.txt');

$arquivo = fopen ('.list.txt', 'r');
echo 'Input File 1 / Left: <select name="file1">';
while(false != ($file = fgets($arquivo,4096)))
  {
   if(($file != ".") and ($file != ".."))
   {
         echo "<option value=".$file.">$file</option>";
     }
  }
  echo '</select>';
?>

  <br><br>

<?php

shell_exec('rm -rf .list.txt');
shell_exec('find ../../data/files/ -name "*.fast*" -print | cut -d/ -f5,6 > .list.txt');

$arquivo = fopen ('.list.txt', 'r');
echo 'Input File 2 / Right: <select name="file2">';
while(false != ($file = fgets($arquivo,4096)))
  {
   if(($file != ".") and ($file != ".."))
     {
         echo "<option value=".$file.">$file</option>";
     }
  }
  echo '</select>';
?>

  <p><font face="Arial">Output Name:</font</p> <input type="text" name="outname">

</center>
</td>
</table>

</td>
<td>

<table border=1 bgcolor="black">
<td width=500>
<center>

<font face="Arial" color="white"><b>Advanced Options</b></font>

</center>
</td>
</table>

<table border=1>
<td width=500 height=250>
<center>

  Coverage Cutoff: <input type="text" name="max_rd_len" value="auto">
  <br><br>
  Expected Coverage: <input type="text" name="avg_ins" value="auto">
  <br><br>
  Min. Contig Length: <input type="text" name="min_contig" value="auto">
<br>
<br>
</center>
</td>
</table>

</td>
  </tr>
</table>

<br>

<table border=1>
<td width=1015>
<center>

  <center><input type="submit" name="submit" value="Execute"></center>

</center>
</td>
</table>

</form>
</center>

<br>
<br>
<br>
<br>


<p><font face="Arial" size="4"><b>Parameter Descriptions</b></font></p>

<table>
        <td align="right">
        <p><font face="Arial" size="4">Threads:</font></p>
        <p><font face="Arial" size="4">K-mer Size:</font></p>
        <p><font face="Arial" size="4">Format Type:</font></p>
        <p><font face="Arial" size="4">Input File 1 / Left:</font></p>
        <p><font face="Arial" size="4">Input File 2 / Right:</font></p>
        <p><font face="Arial" size="4">Output Name:</font></p>
        <p><font face="Arial" size="4">Coverage Cutoff:</font></p>
        <p><font face="Arial" size="4">Expected Coverage:</font></p>
        <p><font face="Arial" size="4">Min. Contig Length:</font></p>
        </td>
        <td>
        <p><font face="Arial" size="4">use of multiple CPU cores</font></p>
        <p><font face="Arial" size="4">length in base pairs of the words being hashed</font></p>
        <p><font face="Arial" size="4">file format (note: -fmtAuto will detect fasta or fastq)</font></p>
        <p><font face="Arial" size="4">path to sequence file</font></p>
        <p><font face="Arial" size="4">path to sequence file</font></p>
        <p><font face="Arial" size="4">directory name for output files</font></p>
        <p><font face="Arial" size="4">removal of low coverage nodes AFTER tour bus or allow the system to infer it (default: auto - no removal)</font></p>
        <p><font face="Arial" size="4">expected coverage of unique regions or allow the system to infer it (default: auto - no long or paired-end read resolution)</font></p>
        <p><font face="Arial" size="4">minimum contig length exported to contigs.fa file (default: auto - hash length * 2)</font></p>
        </td>
</table>

</body>
</html>
