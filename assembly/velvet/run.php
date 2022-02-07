
  <?php

    $kmer=$_REQUEST['kmer'];
    $outname=$_REQUEST['outname'];
    $file1=$_REQUEST['file1'];
    $file2=$_REQUEST['file2'];
    $max_rd_len=$_REQUEST['max_rd_len'];
    $avg_ins=$_REQUEST['avg_ins'];
    $min_contig=$_REQUEST['min_contig'];
    $threads=$_REQUEST['threads'];
    $ftypes=$_REQUEST['ftypes'];

if (($outname=="")||($file1=="")||($file2=="")||($max_rd_len=="")||($avg_ins=="")||($min_contig=="")||($file1==$file2)||($file2==$file1))
        {
        echo '<p align="center"><img border="0" src="../../figure/error.png" width="128" height="128"></p>';
        echo '<p align="center"><font face="Arial">There are empty fields or fields with duplicate values, please fill again.</font></
p>';
        }
    else{

$dir = "mkdir -p /var/www/html/melc/assembly/results/results/$outname";
shell_exec($dir);

$proc = "export OMP_NUM_THREADS=$threads";
shell_exec($proc);

$assemby = "/var/www/html/melc/prog/velvet/velveth /var/www/html/melc/assembly/results/results/$outname $kmer -$ftypes -shortPaired /var/www/html/melc/data/files/$file1 -shortPaired2 /var/www/html/melc/data/files/$file2 > /var/www/html/melc/assembly/results/results/$outname-log.out; /var/www/html/melc/prog/velvet/velvetg /var/www/html/melc/assembly/results/results/$outname -cov_cutoff $max_rd_len -exp_cov $avg_ins -min_contig_lgth $min_contig >> /var/www/html/melc/assembly/results/results/$outname-log.out";

shell_exec($assemby);


echo '<p align="center"><img border="0" src="../../figure/accept.png" width="128" height="128"></p>';
echo '<p align="center"><font face="Arial">Assembly is running. Please go to <font color="#0000FF"><b>ASSEMBLY > RESULTS</b></font> page and see the file '.$outname.'-log.txt.</font></p>';

  }
  ?>

<br>
