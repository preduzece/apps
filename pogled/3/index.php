<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pogled DOO</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet" />

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="css/front-color.css" rel="stylesheet">

    <!-- Prettify -->
    <link href="css/prettify.css" rel="stylesheet">

    <script src="js/jquery-1.10.2.js"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

	<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['geochart']}]}"></script>
    <script type="text/javascript">

      	var map; google.setOnLoadCallback(drawRegionsMap);

      	function drawRegionsMap() {

	        var data = google.visualization.arrayToDataTable([
	          ['Country', 'Popularity'],
	          ['Germany', 200],
	          ['Spain', 300],
	          ['Sweden', 400],
	          ['Austria', 500],
	          ['France', 600],
	          ['Romania', 700]
	        ]);

	        var options = { region: '150' ,
		        colorAxis: {colors: ['#e33825']}
	        };

	        var chart = new google.visualization
	        	.GeoChart(document.getElementById('regions_div'));

	        chart.draw(data, options);

	        initialize();
      	}

      	function initialize() {

      		var myLatlng = new google.maps.LatLng(42.526005, 21.90823);

      		var pogled_map_type = 'custom_style';

	        var mapOptions = {
	          	zoom: 12, 
	          	center: myLatlng,
	          	zoomControl: true, 
	          	scrollwheel: false, 

	          	mapTypeControlOptions: {
		      		mapTypeIds: [
		      			google.maps.MapTypeId.ROADMAP, 
		      			pogled_map_type
		      		]
			   	},
			    mapTypeId: pogled_map_type
	        };

	        var featureOpts = [
			    {
			      stylers: [
			        { hue: '#890000' },
			        { visibility: 'simplified' },
			        { gamma: 0.5 }, { weight: 1 }
			      ]
			    },
			    {
			      elementType: 'labels.text',
			      stylers: [
			        { color: '#890000' }
			      ]
			    },
			    {
			      elementType: 'labels.text.stroke',
			      stylers: [
			        { weight: 50 }
			      ]
			    },
			    {
			      featureType: 'water',
			      stylers: [
			        { color: '#890000' }
			      ]
			    }
			];

	        map = new google.maps.Map(
	        	document.getElementById('map'), mapOptions);

	        var styledMapOptions = {
		    	name: 'Pogled Style'
		  	};

	        var marker = new google.maps.Marker({
			    position: myLatlng,  map: map,
			    title: 'Pogled DOO Vranje'
			});

			var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  			map.mapTypes.set(pogled_map_type, customMapType);
      	}
    </script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom" >

	<!-- Modal -->
	<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" style="margin-top: 150px">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        		<span aria-hidden="true">&times;</span></button>
		        	<h3 class="modal-title" id="myModalLabel">Zakazivanje transporta</h3>
		      	</div>
			    <form action="transport.php" method="POST" role="form">
			    	<div class="modal-body has-error">

				    	<div class="form-group">
				    		<div class="row" style="margin:0px">
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<input type="text" class="form-control" name="start" placeholder="Polaziste" required>
				    			</div>
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<input type="text" class="form-control" name="destin" placeholder="Odrediste" required>
				    			</div>
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<input type="date" class="form-control" name="date" placeholder="Datum" required>
				    			</div>
				    		</div>
				    	</div>

				    	<div class="form-group">
				    		<div class="row">
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<select class="form-control" name="cargo" required>
				    					<option value="Cvrsti teret">Cvrsti teret</option>
				    					<option value="Tekucine">Tekucine</option>
				    					<option value="Gas">Gas</option>
				    				</select>
				    			</div>
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<input type="text" class="form-control" name="client" placeholder="Firma" required>
				    			</div>
				    			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				    				<input type="email" class="form-control" name="contact" placeholder="Kontakt" required>
				    			</div>
				    		</div>
				    	</div>
				    
				    	<div class="form-group" style="margin: 0 15px 0 15px">
				    		<textarea rows="3" class="form-control" name="remark" placeholder="Napomena..." required></textarea>
				    	</div>
			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
				        <button type="submit" class="btn btn-skin">Posalji</button>
			      	</div>
			    </form>
		    </div>
	  	</div>
	</div>

	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" 
                	data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <h1>Pogled doo</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		      	<ul class="nav navbar-nav">
			        <li class="active"><a href="#intro">Početna</a></li>
			        <li><a href="#about">O nama</a></li>
					<li><a href="#services">Usluge</a></li>
					<li><a href="#team">Nas tim</a></li>
					<li><a href="#partners">Partneri</a></li>
					<li><a href="#contact">Kontakt</a></li>
					<li><a href="#order" data-toggle="modal">Transport</a></li>
			        <li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jezik<b class="caret"></b></a>
			          	<ul class="dropdown-menu">
				            <li><a href="#"><img src="img/lang/rs.png"/> Srpski</a></li>
				            <li><a href="#"><img src="img/lang/gb.png"/> English</a></li>
				            <li><a href="#"><img src="img/lang/de.png"/> Deutsch</a></li>
				            <li><a href="#"><img src="img/lang/it.png"/> Italiano</a></li>
			          	</ul>
			        </li>
		      	</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>"Pogled DOO" Export-Import </h2>
			<h4>WE ARE GROUP OF GENTLEMEN MAKING AWESOME WEB WITH BOOTSTRAP</h4>
		</div>
		<div class="page-scroll">
			<a href="#about" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->


	<!-- Section: about -->
    <section id="about" class="home-section text-center" >
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
							<div class="section-heading">
							<h2>O nama</h2>
							<a href="#services">
								<i class="fa fa-2x fa-angle-down"></i>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col-lg-2 col-lg-offset-5">
						<hr class="marginbot-50">
					</div>
				</div>
		        <div class="row">
		            <div class="col-sm-8 col-md-8">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia quas totam debitis consectetur, ex saepe vero itaque culpa. Accusantium architecto nobis autem veniam, blanditiis quibusdam explicabo laboriosam in repudiandae aspernatur</p>
							<br>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi quaerat tempore, odio molestias asperiores aliquid deleniti numquam quae inventore eveniet doloribus laboriosam in, maiores, esse unde necessitatibus dignissimos fuga.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vitae, inventore soluta, reprehenderit modi quia aliquam culpa, quas voluptates hic perferendis quidem quo molestiae dolorem. Ad, neque ratione delectus aperiam!</p>
					</div>

		            <div class="col-xs-6 col-sm-3 col-md-3 col-md-offset-1">
						<div class="wow bounceInUp" data-wow-delay="0.2s">
			                <div class="team boxed-grey">
			                    <div class="inner">
									<h5>Sladjan Bogatinovic</h5>
			                        <p class="subtitle">Generalni direktor</p>
			                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>
			                    </div>
			                </div>
						</div>
		            </div>

		        </div>		
			</div>
		</div>
	</section>
	<!-- /Section: about -->


	<!-- Section: servicess -->
    <section id="services" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
						<h2>Usluge</h2>
						<a href="#partners">
							<i class="fa fa-2x fa-angle-down"></i>
						</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container" style="margin-bottom: 50px">
			<div class="row">
				<div class="col-lg-2 col-lg-offset-5">
					<hr class="marginbot-50">
				</div>
			</div>
	        <div class="row">
				<div class="col-sm-4 col-md-4">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
	                <div class="service-box">
						<div class="service-icon">
							<img src="img/icons/service-icon-2.png" alt="" />
						</div>
						<div class="service-desc">
							<h5>Pouzdan</h5>
							<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
						</div>
	                </div>
					</div>
	            </div>
				<div class="col-sm-4 col-md-4">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
	                <div class="service-box">
						<div class="service-icon">
							<img src="img/icons/service-icon-3.png" alt="" />
						</div>
						<div class="service-desc">
							<h5>Bezbedan</h5>
							<p>Vestibulum tincidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
						</div>
	                </div>
					</div>
	            </div>
	            <div class="col-sm-4 col-md-4">
					<div class="wow fadeInLeft" data-wow-delay="0.2s">
	                <div class="service-box">
						<div class="service-icon">
							<img src="img/icons/service-icon-1.png" alt="" />
						</div>
						<div class="service-desc">
							<h5>Brz transport</h5>
							<p>Vestibulum tin cidunt enim in pharetra malesuada. Duis semper magna metus electram accommodare.</p>
						</div>
	                </div>
					</div>
	            </div>
	        </div>		
		</div>
		
		<div class="heading-about">
			<a name="coverage"></a>
			<!-- Mesto za mapu pokrivenosti-->
			<div id="regions_div" style="width: 100%; height: 100%;"></div>
		</div>
	</section>
	<!-- /Section: usluge -->


	<!-- Section: nas tim -->
	<section id="team" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
						<h2>Nas tim</h2>
						<a href="#contact">
							<i class="fa fa-2x fa-angle-down"></i>
						</a>
						</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2 col-lg-offset-5">
						<hr class="marginbot-50">
					</div>
				</div>

		        <div class="row">

		            <div class="col-sm-4 col-md-4">
						<div class="wow bounceInUp" data-wow-delay="0.2s">
			                <div class="team boxed-grey">
			                    <div class="inner">
			                        <div class="avatar">
			                        	<img src="img/team/4.jpg" alt="" class="img-responsive img-circle" />
			                        </div>
									<h5>Sladjan Bogatinovic</h5>
			                        <p class="subtitle">Generalni direktor</p>
			                    </div>
			                </div>
						</div>
		            </div>

		            <div class="col-sm-4 col-md-4">
						<div class="wow bounceInUp" data-wow-delay="0.2s">
			                <div class="team boxed-grey">
			                    <div class="inner">
			                        <div class="avatar">
			                        	<img src="img/team/4.jpg" alt="" class="img-responsive img-circle" />
			                        </div>
									<h5>Sladjan Bogatinovic</h5>
			                        <p class="subtitle">Generalni direktor</p>
			                    </div>
			                </div>
						</div>
		            </div>

		            <div class="col-sm-4 col-md-4">
						<div class="wow bounceInUp" data-wow-delay="0.2s">
			                <div class="team boxed-grey">
			                    <div class="inner">
			                        <div class="avatar">
			                        	<img src="img/team/4.jpg" alt="" class="img-responsive img-circle" />
			                        </div>
									<h5>Sladjan Bogatinovic</h5>
			                        <p class="subtitle">Generalni direktor</p>
			                    </div>
			                </div>
						</div>
		            </div>

		        </div>
			</div>
		</div>
	</section>


	<!-- Section: partneri -->
	<section id="partners" class="home-section text-center" style="margin-bottom: 10%">
		<div class="heading-contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
						<h2>Partneri</h2>
						<a href="#contact">
							<i class="fa fa-2x fa-angle-down"></i>
						</a>
						</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2 col-lg-offset-5">
						<hr class="marginbot-50">
					</div>
				</div>
			</div>
		</div>

		<div class="container">

            <div id="slider" class="carousel slide" data-ride="carousel" style="margin-top: 5%">

			  	<!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox">

				    <div class="item active">
				    	<div class="row">
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/1.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/2.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/3.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/4.png" alt="...">
				    		</div>
				    	</div>
				  	</div>

				    <div class="item">
				    	<div class="row">
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/5.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/6.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/7.png" alt="...">
				    		</div>
				    		<div class="col-sm-3 col-md-3 col-lg-3">
				    			<img src="img/slider/8.png" alt="...">
				    		</div>
				    	</div>
				  	</div>
			  	</div>

			  	<!-- Indicators -->
			  	<ol class="carousel-indicators" style="top: 95%">
				    <li data-target="#slider" data-slide-to="0" class="active"></li>
				    <li data-target="#slider" data-slide-to="1"></li>
			  	</ol>
			</div>
		</div>
	</section>


	<!-- Section: contact -->
    <section id="contact" class="home-section text-center bg-gray" style="padding-bottom: 12%">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
						<div class="section-heading">
						<h2>Kontakt</h2>
							<a href="#map">
								<i class="fa fa-2x fa-angle-down"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>

		<div class="container">

			<div class="row">
				<div class="col-md-4">
				  	<h5><i class="fa fa-map-marker"></i> Adresa</h5>
				  	<p>Partizanski put bb, RS 17500 
				  	<br/>Vranje, Serbia</p>
				</div>
				<div class="col-md-4">
					<h5><i class="fa fa-envelope-o"></i> Email</h5>
					<p>pogled.rs@gmail.com </p>
				</div>
				<div class="col-md-4">
					<h5><i class="fa fa-phone"></i> Telefon</h5>
					+381-17-442-550 <br/>
					+381-62-289-867
				</div>
			</div>

		    <div class="row">
		      	<div class="col-lg-12">
			        <form method="POST" action="contact.php">
			          <div class="row">
			            <div class="col-md-6">

			              <div class="form-group has-error">
			                <input type="text" class="form-control" placeholder="Vase Ime *" name="name" required>
			              </div>

			              <div class="form-group has-error">
			                <input type="email" class="form-control" placeholder="Vas Email *" name="email" required>
			              </div>

			              <div class="form-group has-error">
			                <input type="text" class="form-control" placeholder="Telefon *" name="phone" required>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group has-error">
			                <textarea class="form-control" rows="6" placeholder="Vasa poruka *" name="message" required></textarea>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="col-lg-12 text-center">

			              <div id="success" style="margin-bottom: 30px"><?php if(isset($status)) echo $status; ?></div>
			              <button type="submit" class="btn btn-skin pull-center">Posalji poruku</button>
			            </div>
			          </div>
			        </form>
		      	</div>
		    </div>
		</div>
	</section>
	<!-- /Section: contact -->


	<!-- Section: map -->
    <section class="home-section text-center" 
    	style="padding-top: 0px; padding-bottom: 0px">
		<div class="heading-about" id="map" style="height: 500px">
		</div>
	</section>
	<!-- /Section: map -->
	

	<footer>
		<div class="container">
			<div class="wow shake" data-wow-delay="0.4s">
				<div class="page-scroll marginbot-30">
					<a href="#intro" id="totop" class="btn btn-circle">
						<i class="fa fa-angle-double-up animated"></i>
					</a>
				</div>
			</div>
			<p>&copy;Copyright 2014 - "Pogled DOO". All rights reserved.</p>
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/prettify.js"></script>
	<script src="js/application.js"></script>
	
</body>
</html>