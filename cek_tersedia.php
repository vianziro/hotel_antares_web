<?php require_once('Connections/antares_conn.php'); ?><?php include('php-engine/foto_hotel.php'); ?><?php	$rand_1 = rand(00,99);	$tgl_tahun = gmdate("mYd", time()+60*60*7); //mmyyyydd	$id_cust = $tgl_tahun.$rand_1;	//ss	$_SESSION['id_cust'] = $id_cust;	$check_in = $_GET['check-in'];	$check_out = $_GET['check-out'];	$room = $_GET['room-num'];	//$room_type = $_GET['room-type'];	$person_num = $_GET['person-num'];if (!function_exists("GetSQLValueString")) {function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {  if (PHP_VERSION < 6) {    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;  }  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);  switch ($theType) {    case "text":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;        case "long":    case "int":      $theValue = ($theValue != "") ? intval($theValue) : "NULL";      break;    case "double":      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";      break;    case "date":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;    case "defined":      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;      break;  }  return $theValue;}}mysql_select_db($database_antares_conn, $antares_conn);//$query_kamar_rs = "SELECT * FROM kamar WHERE status <> 'Booked' AND tipe = '".$room_type."' LIMIT " . $room;$query_kamar_rs = "SELECT * FROM kamar WHERE status <> 'Booked' GROUP BY tipe ORDER BY harga " ;$kamar_rs = mysql_query($query_kamar_rs, $antares_conn) or die(mysql_error());$row_kamar_rs = mysql_fetch_assoc($kamar_rs);$totalRows_kamar_rs = mysql_num_rows($kamar_rs);?><!DOCTYPE html><html lang="en">  <head>		<meta charset="utf-8">		<meta http-equiv="X-UA-Compatible" content="IE=edge">	  	<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" />		<meta name="description" content="">		<meta name="author" content="">	  	  	<!-- Utk icon browser -->		<link rel="shortcut icon" href="favicon.ico">		<link rel="icon" href="favicon.png">				<!-- Utk iPad -->		<link rel="apple-touch-icon" href="img/icon/icon-144.png" sizes="144x144">		<link rel="apple-touch-icon" href="img/icon/icon-72.png" sizes="72x72">				<!-- Utk iPhone -->		<link rel="apple-touch-icon" href="img/icon/icon-57.png" sizes="57x57">		<link rel="apple-touch-icon" href="img/icon/icon-114.png" sizes="114x114">	  	 		<title>Kamar yang tersedia</title>			<!-- Bootstrap core CSS -->		<link href="css/bootstrap.css" rel="stylesheet">			<!-- Just for debugging purposes. Don't actually copy this line! -->		<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->		<!--[if lt IE 9]>		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>		<![endif]-->			<link href="css/cek_tersedia.css" rel="stylesheet"> 		<link href="css/datepicker.css" rel="stylesheet"> 	</head><!-- NAVBAR================================================== -->  <body>    <div class="navbar-wrapper">      <div class="container">        <div class="navbar navbar-inverse navbar-static-top" role="navigation">          <div class="container">            <div class="navbar-header">              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                <span class="sr-only">Toggle navigation</span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>              </button>              <a class="navbar-brand visible-lg visible-md" href="index.php"><img src="img/logo-antares.svg"><span id="hotel_name">Grand Antares Medan</span></a>              <a class="navbar-brand visible-sm" href="index.php" style="width:80px;"><img src="img/logo-antares.svg"></a>              <a class="navbar-brand visible-xs" href="index.php"><img src="img/logo-antares.svg" style="height:50px;"><span id="hotel_name"></span></a>            </div>            <div class="navbar-collapse collapse">              <ul class="nav navbar-nav">				                  <li><a href="index.php">Home</a></li>                <!--<li><a href="search.php">Search</a></li>-->                <li class="active"><a href="#">Rooms</a></li>                <li><a href="gallery.php">Gallery</a></li>                <li><a href="reservation.php">Reservation</a></li>                <li><a href="info.php">Information</a></li>				                </ul>							             </div>					            </div>        </div>      </div>    </div>	  	 <!-- /Navbar -->	  	  	      <!-- Wrap the rest of the page in another container to center all the content. -->    <div class="container marketing" style="margin-top:20px;padding-left:10px;padding-right:10px;">						<h1 id="judul_halaman">Available Rooms</h1>						<!-- Desktop UI -->		<div id="pcGallery" class="row" >						<div id="info_kamar" class="col-sm-3">				<h3>Current Room Info</h3>				<div id="info_container">										<div id="total_harga" style="padding:0px 0px 20px 0px;">						<span>							Total Charge <span id="for_days"><!-- Total Harga Utk--></span> : <br>							<h3 class="text-info" style="line-height:100%;">Rp <span id="nominal"> 0 </span><span id="ket_nominal"> /night</span></h3>						</span>					</div>											<div id="tipe_terpilih" style="padding:0px 0px 20px 0px;" >						<p>Selected Room : </p>						<div style="height:auto; padding:0px;">							<!-- Kontainer Untuk Tipe dang jumlah masing'' kamar -->						</div>											</div>					<a href="#" class="btn btn-success" id="continue">Continue Reservation</a>					<p id="pesan_no_kamar"> No Selected Room  </p>				</div>			</div>						<div id="list_kamar" class="col-sm-9" style="border-left:1px solid #ccc;">				<h3>Room List</h3>								<div class="" id="item_container">									<?php do { 						$no_kamar = $row_kamar_rs['no_kamar'];						$foto_kamar = pilih_foto($row_kamar_rs['tipe']);						$tipe_kamar = $row_kamar_rs['tipe'];						$harga_kamar = $row_kamar_rs['harga'];																?>					<div  class="item_kamar col-sm-4" >																				<div class="info" >																<img class="img-responsive" src="<?php echo $foto_kamar; ?>">																<p style="padding:5px;">									<span class="tipe_kamar text-info"><?php echo $tipe_kamar; ?></span><br>									<strong>Rp <?php echo $harga_kamar; ?> /night</strong>								</p>																<span>																		<div id="kontrol" style="">																					<div id="pilih_kamar" class="col-sm-4 col-xs-4 btn-group" data-toggle="buttons" style="height:50px;">													<label class="btn btn-default">														<input tipe="<?php echo $tipe_kamar; ?>" id="<?php echo $no_kamar; ?>" value="<?php echo $harga_kamar; ?>" type="checkbox">Choose													</label>												</div>																					<div class="col-sm-8 col-xs-8" id="<?php echo $no_kamar; ?>">												<select class="form-control" name="jlh_kamar" id="jlh_kamar">													<option value="0">Room(s)</option>													<option value="1">1</option>													<option value="2">2</option>													<option value="3">3</option>													<option value="4">4</option>												</select>																							</div>																															</div>																	</span>								<div class="clear-fix">&nbsp;</div>															</div>					</div>										<?php } while ($row_kamar_rs = mysql_fetch_assoc($kamar_rs)); ?>																	</div>							</div>																		<!-- Bagian Reservasi Kamar -->									<div id="reservation_container" class="col-md-9" style="display:none;">									<!-- Bagian Data Check IN Hotel -->						<div  class="col-md-12">						  	<h2 class="step">Step 1 <span class="text-muted"> Room</span></h2>			  	<a href="#edit" class="btn btn-info hidden" id="edit_step1">Edit</a>			  <!-- Bagian utk Form Data check in -->			  <div id="reservasi_step1" class="col-md-12" >			  		<form class="form-horizontal" name="formReservasiKamar" id="formReservasiKamar" method="POST" action="#">											<input type="hidden" name="id_cust" id="id_cust" value="<?php echo $id_cust; ?>">																							  		<fieldset class="form-group">							<label class="col-md-2 text-left control-label" for="arrival">								Arrival							</label>							<div class="col-md-6">																								<div class="input-group input-append date" id="arrival" data-date="" data-date-format="yyyy-mm-dd">							  		<input id="arrival" name="arrival" class="form-control" type="text" value="">							  		<span class="input-group-btn">										<button class="add-on btn btn-default" type="button" id="ck_in_date"><span class="glyphicon glyphicon-calendar"></span></button>							  		</span>																	</div>																																							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="checkout">								Check Out							</label>							<div class="col-md-6">																<div class="input-group input-append date" id="ck_out" data-date="" data-date-format="yyyy-mm-dd">							  		<input id="checkout" name="checkout" class="form-control" type="text" value="">							  		<span class="input-group-btn">										<button class="add-on btn btn-default " type="button" id="ck_out_date"><span class="glyphicon glyphicon-calendar"></span></button>							  		</span>																	</div>															</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="tipe_booking">								Promo Code							</label>							<div class="col-md-6">								<div class="input-group ">							  		<input type="text" class="form-control" name="tipe_booking" id="tipe_booking" placeholder="Skip, without promo code">							  		<span class="input-group-btn">										<button class="btn btn-default" type="button" id="cek_promo"><span class="glyphicon glyphicon-search"></span></button>							  		</span>																	</div>								<span id="konfirmasi_promo" class="message">Promo Confirmation</span>							</div>													</fieldset>																		<fieldset id="submit" class="text-center">							<button id="simpan_data_kamar" type="submit" class="btn btn-success">Save Data</button>						</fieldset>						<br>																  	</form>			  </div>			  <!-- Bagian utk Form Data check in -->        		  </div>						<!-- /Bagian Data Check IN Hotel -->							<!-- Bagian utk : Input Data Pribadi -->		  	<div  class="col-md-12" >						  	<h2 class="step">Step 2 <span class="text-muted"> Personal Identity</span></h2>			  	<a href="#edit" class="btn btn-info hidden" id="edit_step2">Edit</a>			  <div id="reservasi_step2" class="col-md-12" >			  		<form class="form-horizontal" name="formIdPelanggan" id="formIdPelanggan" method="POST" action="#">															  		<fieldset class="form-group">							<label class="col-md-2 control-label" for="nama">								Name							</label>							<div class="col-md-6">								<input id="nama" name="nama" class="form-control" type="text" >								<span class="message hidden">Invalid Data</span>							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="tgl_lahir">								Bith Day							</label>														<div class="col-md-6">																<div class="input-group input-append date" id="tgl_lahir" data-date-format="yyyy-mm-dd" data-date="10/2000" data-date-viewmode="years">							  		<input id="tgl_lahir" name="tgl_lahir" class="form-control" type="text">							  		<span class="input-group-btn">										<button class="add-on btn btn-default " type="button" id="ck_out_date"><span class="glyphicon glyphicon-calendar"></span></button>							  		</span>																	</div>															</div>																																		</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="telepon">								Telephone 							</label>							<div class="col-md-6">								<input id="telepon"  name="telepon" class="form-control" type="tel">							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="telepon">								Email 							</label>							<div class="col-md-6">								<input id="email"  name="email" class="form-control" type="text">							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="negara">								Country 							</label>							<div class="col-md-6">								<input id="negara" name="negara" class="form-control" type="text">							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="kota">								City 							</label>							<div class="col-md-6">								<input id="kota" name="kota" class="form-control"  type="text">							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="alamat">								Address 							</label>							<div class="col-md-6">								<input id="alamat" name="alamat" class="form-control" ></input>							</div>						</fieldset>												<fieldset id="submit" class="text-center">							<button id="simpan_data_personal" type="submit"  class="btn btn-success">Save Data</button>						</fieldset>						<br>										  	</form>			  </div>        		  </div>		  		  <!-- /.col-lg-4 -->		  		<!-- Bagian utk data Pembayaran -->        <div class="col-md-12">          			<h2 class="step">Step 3 <span class="text-muted"> Payment Information</span></h2>			<a href="#edit" class="btn btn-info hidden" id="edit_step3">Edit</a>			<div id="reservasi_step3" class="container col-md-12" >			  		<form class="form-horizontal" name="formPembayaran" id="formPembayaran" method="POST" action="#">												<!-- Cari cara background tipe credit card -->						<fieldset class="form-group">							<label class="col-md-2 control-label" for="card-number">								Card Number 							</label>							<div class="col-md-6">								<input id="card_number" name="card_number" class="form-control" type="text" >							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="name-on-card">								Name on Card 							</label>							<div class="col-md-6">								<input id="name_on_card" name="name_on_card" class="form-control" type="text">							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="expire">								Expiration Date  							</label>							<div class="col-md-6">																<div class="input-group input-append date" id="expire" data-date-format="mm-yyyy" data-date="1/2014" data-date-viewmode="years"  data-date-minviewmode="months">							  		<input id="expire" name="expire" class="form-control" type="text">							  		<span class="input-group-btn">										<button class="add-on btn btn-default " type="button" id="ck_out_date"><span class="glyphicon glyphicon-calendar"></span></button>							  		</span>																	</div>																<!--								<input id="expire" name="expire" class="form-control" type="date">-->							</div>						</fieldset>												<fieldset class="form-group">							<label class="col-md-2 control-label" for="security-code">								Security Code 							</label>							<div class="col-md-6">								<input id="security_code" name="security_code" class="form-control" type="number" aria-required>							</div>													</fieldset>												<fieldset  class="text-center">							<button id="simpan_data_pembayaran" type="submit" class="btn btn-success">Save Data</button>						</fieldset>						<br>				  	</form>			  </div>			  			  <div class="col-md-12">			  	<hr>			  					<button id="kirimData" type="button" class="btn btn-primary" data-loading-text="Mengirim ...">Kirim Data</button>				<hr>				  <p id="pesanKiriman" class="text-danger hidden text-center">Silahkan periksa form kembali, dengan mengklik tombol Edit</p>			  </div>			        </div>		</div>												<!-- /Bagian Reservasi Kamar -->								</div>							<!-- Akhir bagian Gallery -->			      <!-- FOOTER -->      <footer>        <p class="pull-right"><a href="#">Back to top</a></p>        <p>			&copy; 2013 Hotel Grand ANTARES <br>			Jalan Sisingamangaraja <br>			No. 328 Medan 20152 <br>			North Sumatera, Indonesia <br>			Telp : (62-61) 788 3555 <br>		</p>      </footer>    </div><!-- /.container -->	  <script src="js/jquery.js"></script><script src="js/bootstrap.min.js"></script><script src="js/olah_data_kamar.js" type="text/javascript"></script><script src="js/lakukan_reservasi.js" type="text/javascript"></script><script src="js/lakukan_reservasi_asli.js" type="text/javascript"></script>  <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>  <script src="js/ambil_tanggal.js" type="text/javascript"></script>  <script src="js/money.min.js" type="text/javascript"></script>  			<script>		</script>	    </body></html><?phpmysql_free_result($kamar_rs);?>