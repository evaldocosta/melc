<p><font face="Arial" size="4">
<center>

<?php

echo '<p align="center"><img border="0" src="../figure/accept.png" width="128" height="128"></p>';

if(isset($_POST['submit']))
{
    $foldername=$_POST['foldername'];

    $filename=$_FILES['file']['name'];

    $tmpname=$_FILES['file']['tmp_name'];

    $result = "mkdir -p /var/www/html/melc/data/files/$foldername";
    shell_exec($result);

    if($result)
    {
        echo "Created dataset $foldername and ";
    }
    else
    {
        echo "Not created dataset and ";
    }

    $row=move_uploaded_file($tmpname,"/var/www/html/melc/data/files/$foldername/$filename");

    $unzip = "cd files/$foldername/;unzip $filename;rm -rf $filename";
    shell_exec($unzip);



    if($row)
    {
        echo "file $filename successfully uploaded";
    }
    else
    {
        echo "failed to upload";
    }

echo '<p align="center"><font face="Arial" size="4">Please go to <font color="#0000FF"><b>DATA FILE > LIST AND DELETE </b></font> page and see the dataset '.$foldername.'.</font></p>';

}
?>
