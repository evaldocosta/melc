
  <?php

    $outname=$_REQUEST['outname'];
    $file1=$_REQUEST['file1'];


if (($outname=="")||($file1==""))
        {
        echo '<p align="center"><img border="0" src="../../figure/error.png" width="128" height="128"></p>';
        echo '<p align="center"><font face="Arial" size="4">There are empty fields or fields with duplicate values, please fill again.</font></p>';
        }
    else{

$dir = "mkdir -p /var/www/html/melc/quality/results/results/DATA/$outname";
shell_exec($dir);

$quality = "../../prog/fastqc/fastqc -o /var/www/html/melc/quality/results/results/DATA/$outname -f fastq /var/www/html/melc/data/files/$file1 > /var/www/html/melc/quality/results/results/DATA/$outname-log.txt &";

shell_exec($quality);

echo '<p align="center"><img border="0" src="../../figure/accept.png" width="128" height="128"></p>';
echo '<p align="center"><font face="Arial" size="4">Quality is running. Please go to <font color="#0000FF"><b>QUALITY > RESULTS > DATA</b></font> page and see the file '.$outname.'-log.txt.</font></p>';

  }
  ?>

<br>
