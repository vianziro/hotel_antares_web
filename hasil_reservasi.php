<?php require_once('Connections/antares_conn.php'); ?><?php require_once('php-engine/tgl_indo.php'); ?><?phpif (!function_exists("GetSQLValueString")) {function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {  if (PHP_VERSION < 6) {    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;  }  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);  switch ($theType) {    case "text":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;        case "long":    case "int":      $theValue = ($theValue != "") ? intval($theValue) : "NULL";      break;    case "double":      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";      break;    case "date":      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";      break;    case "defined":      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;      break;  }  return $theValue;}}if (isset($_GET['id_cust'])) {  $cust_aktif_summary = $_GET['id_cust'];}$cust_aktif_summary = "0";if (isset($_GET['id_cust'])) {  $cust_aktif_summary = $_GET['id_cust'];}mysql_select_db($database_antares_conn, $antares_conn);$query_summary = sprintf("SELECT * FROM customer, booking, kamar WHERE booking.id_cust =  %s AND kamar.no_kamar = booking.no_kamar AND customer.id_cust = booking.id_cust", GetSQLValueString($cust_aktif_summary, "int"));$summary = mysql_query($query_summary, $antares_conn) or die(mysql_error());$row_summary = mysql_fetch_assoc($summary);$totalRows_summary = mysql_num_rows($summary);?><!DOCTYPE html><html lang="en"><head>	<meta charset="utf-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge">	<meta name="viewport" content="width=device-width, maximum-scale=1.5, minimum-scale=1.0, initial-scale=1.0" />	<meta name="description" content="">	<meta name="author" content="">	<!-- Utk icon browser -->	<link rel="shortcut icon" href="favicon.ico">	<link rel="icon" href="favicon.png">	<!-- Utk iPad -->	<link rel="apple-touch-icon" href="img/icon/icon-144.png" sizes="144x144">	<link rel="apple-touch-icon" href="img/icon/icon-72.png" sizes="72x72">	<!-- Utk iPhone -->	<link rel="apple-touch-icon" href="img/icon/icon-57.png" sizes="57x57">	<link rel="apple-touch-icon" href="img/icon/icon-114.png" sizes="114x114">	<title>Reservation Summary</title>	<!-- Bootstrap core CSS -->	<link href="css/bootstrap.css" rel="stylesheet">	<!-- Just for debugging purposes. Don't actually copy this line! -->	<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->	<!--[if lt IE 9]>		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>		<![endif]-->	<!-- Custom styles for this template -->	<link href="css/carousel.css" rel="stylesheet">	<style>				dl.dl-horizontal dt {					border-bottom:1px solid #ccc;				}				dl.dl-horizontal dd {					border-bottom:1px solid #ccc;				}				@media only screen and (max-width: 768px){					dl.dl-horizontal * {						text-align:left;						padding-left:0px;						border:none;					}				}	</style></head><!-- NAVBAR================================================== --><body>	<div class="navbar-wrapper">		<div class="container">			<div class="navbar navbar-inverse navbar-static-top" role="navigation">				<div class="container">					<div class="navbar-header">						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">							<span class="sr-only">Toggle navigation</span>							<span class="icon-bar"></span>							<span class="icon-bar"></span>							<span class="icon-bar"></span>						</button>						<a class="navbar-brand visible-lg visible-md" href="index.php">							<img src="img/logo-antares.svg">							<span id="hotel_name">Grand Antares Medan</span>						</a>						<a class="navbar-brand visible-sm" href="index.php" style="width:80px;">							<img src="img/logo-antares.svg">						</a>						<a class="navbar-brand visible-xs" href="index.php">							<img src="img/logo-antares.svg" style="height:50px;">							<span id="hotel_name"></span>						</a>					</div>					<div class="navbar-collapse collapse">						<ul class="nav navbar-nav">							<li>								<a href="index.php">Home</a>							</li>							<!--<li><a href="search.php">Search</a></li>-->							<li>								<a href="rooms.php">Rooms</a>							</li>							<li>								<a href="gallery.php">Gallery</a>							</li>							<li class="active">								<a href="reservation.php">Reservation</a>							</li>							<li>								<a href="info.php">Information</a>							</li>						</ul>					</div>				</div>			</div>		</div>	</div>	<!-- Bagian utk membuat jarak dari navbar ke konten pada Tablet dan Phone -->	<div class="visible-md visible-lg" style="height:5px">&nbsp;</div>	<div class="visible-sm" style="height:25px">&nbsp;</div>	<div class="visible-xs" style="height:0px">&nbsp;</div>	<div class="container" style="margin-top:100px;">		<!-- Kontainer Utama pencarian -->		<div class="container">			<div class="row">				<div class="col-lg-12">					<div class="col-lg-12">						<div class="row" id="result">							<div class="col-lg-12" style="padding:0px; margin:0px;">								<h2 align="left">									<span class="text-left">Hasil Reservasi</span></h2>							</div>														<span class="text-left">														<p class="text-left">Berikut rangkuman informasi reservasi yang anda lakukan</p>														<div class="col-lg-12" style="padding:0px; margin-top:30px;">																								<div class="col-sm-2 col-md-2" >										<input id="nilai_id" type="hidden" value="<?php echo $cust_aktif_summary; ?>">										<div id="id_barcode">																					</div>																	</div>																															<div class="col-sm-4 col-md-4" >																									<?php									/*$i = 1;									while($data_cust = mysql_fetch_array($summary)){									$id_cust = $data_cust['id_cust'];										$nama = $data_cust['nama'];										$tgl_lahir = $data_cust['tgl_lahir'];										$telepon = $data_cust['telepon'];										$negara = $data_cust['negara'];										$kota = $data_cust['kota'];										$alamat = $data_cust['alamat'];																				$tipe = $data_cust['tipe'];										$no_kamar = $data_cust['no_kamar'];										$arrival = $data_cust['arrival'];										$checkout = $data_cust['checkout'];										$harga = $data_cust['harga'];	*/																	?>								<DL class="dl-horizontal"  >									<dt>ID</dt>									<dd><?php echo $row_summary['id_cust']; ?></dd>									<dt>Nama</dt>									<dd><?php echo $row_summary['nama']; ?></dd>									<dt>Tgl. Lahir</dt>									<dd><?php echo $row_summary['tgl_lahir']; ?></dd>									<dt>Telepon</dt>									<dd><?php echo $row_summary['telepon']; ?></dd>																		<dt>Email</dt>									<dd><?php echo $row_summary['email']; ?></dd>									<dt>Negara</dt>									<dd><?php echo $row_summary['negara']; ?></dd>									<dt>Kota</dt>									<dd><?php echo $row_summary['kota']; ?></dd>									<dt>Alamat</dt>									<dd><?php echo $row_summary['alamat']; ?></dd>								</DL>																		</div>																							<div class="col-lg-12" style="padding:0px; margin-top:30px;">																<p>Dengan perincian kamar sebagai berikut</p>								<table class="table table-condensed ">									<thead>										<tr>											<th>No.</th>											<th>Tipe Kamar</th>											<th>No. Kamar</th>											<th>Arrival</th>											<th>Check Out</th>											<th>Harga/night(s)</th>										</tr>									</thead>									<tbody>																				<tr>											<td>1</td>											<td><?php echo $row_summary['tipe']; ?></td>											<td><?php echo $row_summary['no_kamar']; ?></td>											<td><?php echo tgl_indo($row_summary['arrival']); ?></td>											<td><?php echo tgl_indo($row_summary['checkout']); ?></td>											<td>Rp <?php echo number_format($row_summary['harga']); ?></td>										</tr>																				<?php												$total_harga_per_malam = 0;												$i = 2;												while($data_cust = mysql_fetch_array($summary)){													$id_cust = $data_cust['id_cust'];														$nama = $data_cust['nama'];														$tgl_lahir = $data_cust['tgl_lahir'];														$telepon = $data_cust['telepon'];														$negara = $data_cust['negara'];														$kota = $data_cust['kota'];														$alamat = $data_cust['alamat'];																												$tipe = $data_cust['tipe'];														$no_kamar = $data_cust['no_kamar'];														$arrival = $data_cust['arrival'];														$checkout = $data_cust['checkout'];														$harga = $data_cust['harga'];																										$total_harga_per_malam += $harga;													?>																														<tr>											<td><?php echo $i; ?></td>											<td><?php echo $tipe; ?></td>											<td><?php echo $no_kamar; ?></td>											<td><?php echo tgl_indo($arrival); ?></td>											<td><?php echo tgl_indo($checkout); ?></td>											<td>Rp <?php echo number_format($harga); ?></td>										</tr>																														<?php													$i++;												}										?>																																								<tr>											<td colspan="5">												<strong>Total Harga</strong>											</td>											<td>Rp <strong><?php echo number_format($row_summary['harga_multi_hari']); ?></strong></td>										</tr>									</tbody>								</table>								<!-- /.table-responsive -->																<?php									//}								?>																	</div>						</span></div>					</div>				</div>			</div><span class="text-left">			<!-- /.row -->			<!-- FOOTER -->			<footer>				<p class="pull-right">					<a href="#">Back to top</a>				</p>				<p>					&copy; 2013 Hotel Grand ANTARES					<br>Jalan Sisingamangaraja					<br>No. 328 Medan 20152					<br>North Sumatera, Indonesia					<br>Telp : (62-61) 788 3555					<br>				</p>			</footer>		</span></div><span class="text-left">		<!-- /.container -->		<!-- Bootstrap core JavaScript    ================================================== -->		<!-- Placed at the end of the document so the pages load faster -->		<script src="js/jquery.js"></script>		<script src="js/bootstrap.min.js"></script>		<script src="js/jquery.qrcode-0.7.0.min.js"></script>		<script>			$(document).ready(function(e) {					var id_aktif = $('input#nilai_id').val();					$('div#id_barcode').qrcode({						width: 100,						height: 100,						size : 150,						text: ''+id_aktif,						render:'image'					});			});		</script></span></div></body></html><?phpmysql_free_result($summary);?>