<html>
<head>
<title>MELC Genomics - Framework for DNA Assembly</title>
</head>
<body>

<br>
<font face="Arial">You can upload files, either uncompressed or compressed. Typically the sequence identifiers for two matching paired-end sequences in separate files can be marked by /1 and /2, or _L and _R, or _left and _right.</font>

<br>
<br>
<br>
<br>

<center>
<table border=1>
<td width=500 height=200>
<center>

<form enctype="multipart/form-data" action="run.php" method="POST">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p><font face="Arial" size="4">

<p align="center"><img border="0" src="../figure/upload.png" width="128" height="128"></p>

<br>
<label>Dataset Name:</label>
<input type="text" name="foldername">
<br>
<br>
<input type="file" name="file">
<br>
<br>
<input type="submit" name="submit" value="Upload">

</form>
<br>
<br>

</center>
</td>
</table>
</center>

<br>
<br>
<br>
<br>

<p><font face="Arial" size="4"><b>Parameter Descriptions</b></font></p>
<table>
        <td align="right">
        <p><font face="Arial" size="4">Dataset Name:</font></p>
        </td>
        <td>
        <p><font face="Arial" size="4">directory name for sequences files</font></p>
        </td>
</table>

</body>
