<?php
include "phpqrcode.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QRcode</title>
<style>
img{
	border: 1px solid #CCCCCC;
}
</style>
</head>

<body>
<div id="wrap">
<div id="main">
    <h1>PHP QR Code</h1><hr/>
    <form method="post" action="">Data:<br><textarea name="data" cols="80" rows="10"><?php echo isset($_POST["content"])?$_POST['content']:"PHP QR Code :)"; ?></textarea><br />
        ECC:&nbsp;<select name="level">
            <option value="L" <? echo $_POST["level"]=="L"?"selected":"";?>>L - smallest</option>
            <option value="M" <? echo $_POST["level"]=="M"?"selected":"";?>>M</option>
            <option value="Q" <? echo $_POST["level"]=="Q"?"selected":"";?>>Q</option>
            <option value="H" <? echo $_POST["level"]=="H"?"selected":"";?>>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size"><option value="1" <? echo $_POST["size"]==1?"selected":"";?>>1</option><option value="2" <? echo $_POST["size"]==2?"selected":"";?>>2</option><option value="3" <? echo $_POST["size"]==3?"selected":"";?>>3</option><option value="4" <? echo $_POST["size"]==4?"selected":"";?>>4</option><option value="5" <? echo $_POST["size"]==5?"selected":"";?>>5</option><option value="6" <? echo $_POST["size"]==6?"selected":"";?>>6</option><option value="7" <? echo $_POST["size"]==7?"selected":"";?>>7</option><option value="8" <? echo $_POST["size"]==8?"selected":"";?>>8</option><option value="9" <? echo $_POST["size"]==9?"selected":"";?>>9</option><option value="10" <? echo $_POST["size"]==10?"selected":"";?>>10</option></select>&nbsp;
        <input type="submit" value="GENERATE"></form>
</div>

<?php 
$filename = 'qr.png';

$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    $errorCorrectionLevel = $_REQUEST['level'];    

$matrixPointSize = 4;
if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

if($_POST['data']){
	$c = $_POST['data'];


	QRcode::png($c, $filename, $errorCorrectionLevel, $matrixPointSize);
	
	$sc = urlencode($c);
	echo '<div id="view"><img src="qr.png"></div>'; 
	
}
	?>

</span>
</body>
</html>
