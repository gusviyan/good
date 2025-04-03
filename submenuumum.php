<!DOCTYPE html>

<?php
include "koneksi.php";
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>ANTRIAN RS PERMATA PAMULANG</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="10;url=index.html" />
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">

  	<link rel="stylesheet" href="css/et-line-font.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<!-- <link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'> -->

<script>
var n;
var x;
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    today.toDateString() + " " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function myFunction() {
	window.location.assign("index.htm");
}
function openWin(n,x) {
		var rawat;
		date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'Desember');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+', '+d+' '+months[month]+' '+year+', '+h+':'+m+':'+s;
    if (x == 1){
		rawat = "Rawat Inap";
	} else if (x == 2){
		rawat = "Rawat Jalan";
	}
	
    myWindow = window.open("", "myWindow", "width=2,height=1");
    myWindow.document.write("<center><h3>" + rawat + " Umum/Jaminan</h3> <h1 style='font-size:500%;'>A" + n +"</h1>" + "<p> Jika nomor terlewat akan dipanggil setelah 3 nomor</p>" + result + "</center>");
    myWindow.print();
    myWindow.close();
}
</script>
</head>
<body  id="feature" onload="startTime()">

  <svg preserveAspectRatio="none" viewBox="0 0 100 100" height="150" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="svgcolor-light">
        <path d="M0 0 L50 100 L100 0 Z"></path>
      </svg>

  <div class="w3-display-middleleft" id="feature"> 
	<a href="submenuumum.php?act=rajal" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" >
		<h1>RAWAT JALAN</h1>
	</a>
  </div>

   <div class="w3-display-middleright" id="feature"> 
	<a href="submenuumum.php?act=ranap" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" >
		<h1>RAWAT INAP</h1>
	</a>
  </div>

  <div class="w3-display-topmiddle w3-container">
   <div class="w3-xxxlarge" id="txt"></div>   
  </div>
  
  <div class="w3-display-bottommiddle w3-container homebtn" style="padding-bottom:5px;">
		<a href="index.html" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs">Kembali</a>
	</div>


<?php
// Rajal Modal
if ($_GET['act'] == "rajal") {
$cek = mysql_query("SELECT * FROM tbl_umum");
$numrow = mysql_num_rows($cek);
$tambah = $numrow + 1;
//if ($tambah <= 10) {

 mysql_query("INSERT INTO tbl_umum (id,keterangan) VALUES ($tambah,'Umum/Jaminan Rawat Jalan')");

 echo "
 <div id='rajal' class='w3-modal' style='display: block;'>
<center>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black w3-display-container'>
      <h1>Antrian</h1>
    </div>
    <div class='w3-container'>
	<h1 style='color:black;'>Rawat Jalan</h1>
      <h1 style='font-size:800%;color:black;'><b>A$tambah</b></h1>
      <h2 style='color:black;'>Umum / Jaminan </h2> 
    </div>
  </div>
  </center></div>
  <script type='text/javascript'>
	openWin($tambah,2);
	setTimeout(function () { window.location.href = 'index.html'; }, 3000);
  </script>
  "; 
} else if ($_GET['act'] == "ranap") {

// Ranap Modal
$cek = mysql_query("SELECT * FROM tbl_umum");
$numrow = mysql_num_rows($cek);
$tambah = $numrow + 1;
mysql_query("INSERT INTO tbl_umum (id,keterangan) VALUES ($tambah,'Umum/Jaminan Rawat Inap')");
echo "
<div id='ranap' class='w3-modal' style='display: block;'>
<center>
  <div class='w3-modal-content w3-animate-zoom'>
    <div class='w3-container w3-black w3-display-container'>
      <h1>Antrian</h1>
    </div>
    <div class='w3-container'>
	<h1 style='color:black;'>Rawat Inap</h1>
      <h1 style='font-size:500%;color:black;'><b>A$tambah</b></h1>
      <h2 style='color:black;'>Umum / Jaminan </h2> 
    </div>
  </div>
  </center>
  </div>
  <script type='text/javascript'>
	openWin($tambah,1);
	setTimeout(function () { window.location.href = 'index.html'; }, 3000);
  </script>
  ";
}
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/vegas.min.js"></script>

<script src="js/wow.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>


</body>

</html>