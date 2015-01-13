<!DOCTYPE html><html lang="en">  <head>		<meta charset="utf-8">		<meta http-equiv="X-UA-Compatible" content="IE=edge">	  <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0" />		<meta name="description" content="">		<meta name="author" content="">	  	  	<!-- Utk icon browser -->		<link rel="shortcut icon" href="favicon.ico">		<link rel="icon" href="favicon.png">				<!-- Utk iPad -->		<link rel="apple-touch-icon" href="img/icon/icon-144.png" sizes="144x144">		<link rel="apple-touch-icon" href="img/icon/icon-72.png" sizes="72x72">				<!-- Utk iPhone -->		<link rel="apple-touch-icon" href="img/icon/icon-57.png" sizes="57x57">		<link rel="apple-touch-icon" href="img/icon/icon-114.png" sizes="114x114">	  	 		<title>Hotel Photo Gallery</title>			<!-- Bootstrap core CSS -->		<link href="css/bootstrap.css" rel="stylesheet">			<!-- Just for debugging purposes. Don't actually copy this line! -->		<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->		<!--[if lt IE 9]>		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>		<![endif]-->			<!-- Custom styles for this template -->		<link href="css/carousel.css" rel="stylesheet">		<link href="css/gallery.css" rel="stylesheet">		<link href="css/photoswipe.css" rel="stylesheet">	  	  	  <script src="js/jquery.js"></script>	  	  <!-- JS utk Photoswipe -->	  <script src="js/klass.min.js" type="text/javascript"></script>	  <script src="js/code.photoswipe-3.0.5.min.js" type="text/javascript"></script>	  	  <script>	  	// Set up PhotoSwipe with all anchor tags in the Gallery container 		$(document).ready(function(){												var myPhotoSwipe = $("div#phoneGallery div a").photoSwipe({ enableMouseWheel: false , enableKeyboard: true, zoom:true });			var myPhotoSwipe = $("div#tabGallery div a").photoSwipe({ enableMouseWheel: false , enableKeyboard: true, zoom:true });			var myPhotoSwipe = $("div#pcGallery div a").photoSwipe({ enableMouseWheel: false , enableKeyboard: true, zoom:true });		//			$(window).on('resize', function(e){//				var wDoc = this.innerWidth;//				//				if(wDoc < 768) {//					$('.navbar-brand').width(100);//				} else {//					$('.navbar-brand').width(266);//				}//			});		});	  </script>  		  	</head><!-- NAVBAR================================================== -->  <body>    <div class="navbar-wrapper">      <div class="container">        <div class="navbar navbar-inverse navbar-static-top" role="navigation">          <div class="container">            <div class="navbar-header">              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                <span class="sr-only">Toggle navigation</span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>                <span class="icon-bar"></span>              </button>              <a class="navbar-brand visible-lg visible-md" href="index.php"><img src="img/logo-antares.svg"><span id="hotel_name">Grand Antares Medan</span></a>              <a class="navbar-brand visible-sm" href="index.php" style="width:80px;"><img src="img/logo-antares.svg"></a>              <a class="navbar-brand visible-xs" href="index.php"><img src="img/logo-antares.svg" style="height:50px;"><span id="hotel_name"></span></a>            </div>            <div class="navbar-collapse collapse">              <ul class="nav navbar-nav">				                  <li><a href="index.php">Home</a></li>                <!--<li><a href="search.php">Search</a></li>-->                <li><a href="rooms.php">Rooms</a></li>                <li class="active"><a href="gallery.php">Gallery</a></li>                <li><a href="reservation.php">Reservation</a></li>                <li><a href="info.php">Information</a></li>				                </ul>							             </div>					            </div>        </div>      </div>    </div>	  	 <!-- /Navbar -->    <!-- Marketing messaging and featurettes    ================================================== -->    <!-- Wrap the rest of the page in another container to center all the content. -->	  <div class="visible-sm" style="height:60px">&nbsp;</div>	  <div class="visible-lg visible-md" style="height:50px">&nbsp;</div>    <div class="container marketing" style="margin-top:50px;padding-left:10px;padding-right:10px;">				<h1>Business Room</h1>						<!-- Phone UI -->				<div id="phoneGallery" class="row visible-xs" >				<div class="col-xs-6" >					<a href="img/room-img/1.jpg">						<img class="img-thumbnail img-responsive " src="img/gallery/1%20copy.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-6" >					<a href="img/room-img/2.jpg">						<img class="img-thumbnail img-responsive " src="img/gallery/2%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-6" >					<a href="img/room-img/3.jpg">						<img class="img-thumbnail img-responsive " src="img/gallery/3%20copy.jpg" alt="Kamar 3">					</a>				</div>				<div class="col-xs-6" >					<a href="img/room-img/4.jpg">						<img class="img-thumbnail img-responsive " src="img/gallery/4.jpg" alt="Kamar 4">					</a>				</div>								</div>				<!-- Tablet UI -->		<div id="tabGallery" class="row visible-sm" >				<div class="col-xs-3" >					<a href="img/business/1.jpg">						<img class="img-thumbnail img-responsive " src="img/business/1%20copy.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-3" >					<a href="img/business//2.jpg">						<img class="img-thumbnail img-responsive " src="img/business/2%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/3.jpg">						<img class="img-thumbnail img-responsive " src="img/business/3%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/4.jpg">						<img class="img-thumbnail img-responsive " src="img/business/4.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/5.jpg">						<img class="img-thumbnail img-responsive " src="img/business/5%20copy.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/6.jpg">						<img class="img-thumbnail img-responsive " src="img/business/6%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/7.jpg">						<img class="img-thumbnail img-responsive " src="img/business/7%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/8.jpg">						<img class="img-thumbnail img-responsive " src="img/business/8.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/9.jpg">						<img class="img-thumbnail img-responsive " src="img/business/9%20copy.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/10.jpg">						<img class="img-thumbnail img-responsive " src="img/business/10%20copy.jpg" alt="Kamar 2">					</a>				</div>				<div class="col-xs-3" >					<a href="img/business/11.jpg">						<img class="img-thumbnail img-responsive " src="img/business/11%20copy.jpg" alt="Kamar 2">					</a>				</div>		</div>				<!-- Desktop UI -->		<div id="pcGallery" class="row visible-md visible-lg" >				<div class="col-xs-2" >					<a href="img/business/1.jpg">						<img class="img-thumbnail img-responsive " src="img/business/1.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-2" >					<a href="img/business/2.jpg">						<img class="img-thumbnail img-responsive " src="img/business/2.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/3.jpg">						<img class="img-thumbnail img-responsive " src="img/business/3.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/4.jpg">						<img class="img-thumbnail img-responsive " src="img/business/4.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/5.jpg">						<img class="img-thumbnail img-responsive " src="img/business/5.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-2" >					<a href="img/business/6.jpg">						<img class="img-thumbnail img-responsive " src="img/business/6.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/7.jpg">						<img class="img-thumbnail img-responsive " src="img/business/7.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/8.jpg">						<img class="img-thumbnail img-responsive " src="img/business/8.jpg" alt="Kamar 2">					</a>				</div>								<div class="col-xs-2" >					<a href="img/business/9.jpg">						<img class="img-thumbnail img-responsive " src="img/business/9.jpg" alt="Kamar 1" >					</a>				</div>				<div class="col-xs-2" >					<a href="img/business/10.jpg">						<img class="img-thumbnail img-responsive " src="img/business/10.jpg" alt="Kamar 2">					</a>				</div>							<div class="col-xs-2" >					<a href="img/business/11.jpg">						<img class="img-thumbnail img-responsive " src="img/business/11.jpg" alt="Kamar 2">					</a>				</div>		</div>							<!-- Akhir bagian Gallery -->			      <!-- FOOTER -->      <footer>        <p class="pull-right"><a href="#">Back to top</a></p>        <p>			&copy; 2013 Hotel Grand ANTARES <br>			Jalan Sisingamangaraja <br>			No. 328 Medan 20152 <br>			North Sumatera, Indonesia <br>			Telp : (62-61) 788 3555 <br>		</p>      </footer>    </div><!-- /.container -->    <!-- Bootstrap core JavaScript    ================================================== -->    <!-- Placed at the end of the document so the pages load faster -->    <script src="js/bootstrap.min.js"></script>	  	    </body></html>