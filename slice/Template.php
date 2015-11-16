<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo $title ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="css/rucni.css">

    <body>
        <section>

            <header id="header "><!--header-->

                <div class="header_top navbar-fixed-top"><!--header_top-->
                    <div class="container ">
            
                        <div class="row fixed-top">
                        <!-- <img  style="text-center"  src="images/topbanner.png"> -->
                            <div class="col-sm-2">
                                <div class="contactinfo">
                                    <ul class="nav nav-pills ">
                                        <li><img src="images/home/logonovi.png" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="social-icons">
                                    <ul class="nav nav-pills">
                                        <li><a href=""><i class="fa fa-home"> Pocetna |</i></a></li>
                                        <li><a href=""><i class="fa fa-globe"> Ponuda |</i></a></li>
                                        <li><a href=""><i class="fa fa-user"> O nama |</i></a></li>
                                        <li><a href=""><i class="fa fa-phone"> Kontakt</i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 search_box">
                                <form id="w1" action="/vikend/web/site/offers" method="post">
                                    <input type="hidden" name="_csrf" value="amZNdkQzbkcwAT0UFmA.clkLfx8ORxkuWisdGAcBWgg7PgcCDVY.NQ==">
                                    <input type="text" name="descript" placeholder="Brza pretraga...">
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <div class="social-icons pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!--/header_top-->
            </header>
        </section>    <br><br><br><br><br><br>


        <section>
            <div class="container pozadina">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar"><br><br>
                            <h2>Kategorije</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                                <span class="badge pull-right"><i class="fa fa-plane"></i></span>
                                                <i class="fa fa-plane"></i> Putovanje (13)
                                            </a>
                                        </h4>
                                    </div>

                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                <i class="fa fa-globe"></i> Sport i avantura (9)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="womens" class="panel-collapse ">
                                    <!-- za slucaj da hocemo da bude zatvorena podkategorija dodati colapse -->
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Plivanje</a></li>
                                                <li><a href="#">Bazen</a></li>
                                                <li><a href="#">Odbojka</a></li>
                                                <li><a href="#">Fudbal</a></li>
                                                <li><a href="#">Odbojka</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Aqua park</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Vikendice - etno sela</a></h4>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="#">Kulturni zivot</a></h4>
                                    </div>
                                </div>
                            </div><!--/category-products-->

                            <br><h2>Newsletter</h2><br>
                            <div class=" text-center"><!--shipping-->
                                <img src="images/newsletter.png" alt="" height="150px" /><br><br>
                                <form>
                                    <input type="text" name="naziv" class="form-control" placeholder="Vaša e-mail adresa"><br>
                                    <button type="submit" class="btn btn-primary">Prijavi se</button><br>
                                </form>
                            </div><!--/shipping-->

                            <br><br><h2>Pratite nas na FB</h2>
                            <div class="shipping text-center"><!--shipping-->
                                <img src="images/home/shipping.jpg" alt="" />
                            </div><!--/shipping-->

                        </div>
                    </div>

                    <!--Sadrzaj-->
                    <div class="col-sm-9 padding-right">
                        <?php echo $content ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <footer id="footer"><!--Footer-->
                <div class="footer-widget">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="companyinfo">
                                    <img src="images/home/umestomapu.png" alt="gde  za vikend logo">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget companyinfo">

                                    <h2>Servisi</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Gde za vikend servis</a></li>
                                        <li><a href="#">Android aplikacija</a></li>
                                        <li><a href="#">IOS aplikacija</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget companyinfo">
                                    <h2>Informacije</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">O nama</a></li>
                                        <li><a href="#">Kontakt</a></li>
                                        <li><a href="#">Marketing</a></li>
                                        <li><a href="#">Prijatelji sajta</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="single-widget companyinfo">
                                    <h2>Zabava</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Online Help</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Change Location</a></li>
                                        <li><a href="#">FAQ’s</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="single-widget companyinfo">
                                    <h2>Uputstva i uslovi</h2>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="#">Najcesca pitanja</a></li>
                                        <li><a href="#">Uslovi koriscenja</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

            </footer>
        </div>

        <div class="footer-bottom">
            <div class="row">
                <p class="pull-left">Copyright © gdezavikend.rs</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.gdezavikend.rs">gdezavikend.rs</a></span></p>
            </div>
        </div>


        



        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
        <script src="js/rucni.js"></script>
        <script src="js/jquery.zaccordion.js"></script>
    </body>
</html>
