<?php
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>CV - Portfolio</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/ionicons.css" rel="stylesheet">

    <link href="css/fluidbox.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">

    <?php include('header.php')?>
</head>

<body>
    <?php include('navbar.php')?>
    <input hidden type="text" id="id" value="<?php echo $_GET['id']?>">
    <section class="intro-section">
        <div class="container">

            <div class="heading-wrapper">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="info">
                            <i class="icon ion-ios-location-outline"></i>
                            <div class="right-area">
                                <h5 id="direccion">3008 Sarah Drive</h5>
                                <h5 id="ciudad">Franklin,LA 70538</h5>
                            </div><!-- right-area -->
                        </div><!-- info -->
                    </div><!-- col-sm-4 -->

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="info">
                            <i class="icon ion-ios-telephone-outline"></i>
                            <div class="right-area">
                                <h5 id="telefono">337-4139538</h5>
                                
                            </div><!-- right-area -->
                        </div><!-- info -->
                    </div><!-- col-sm-4 -->

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="info">
                            <i class="icon ion-ios-chatboxes-outline"></i>
                            <div class="right-area">
                                <h5 id="correo">contact@colorlib.com</h5>
                                
                            </div><!-- right-area -->
                        </div><!-- info -->
                    </div><!-- col-sm-4 -->
                </div><!-- row -->
            </div><!-- heading-wrapper -->



            <div class="intro">
                <div class="row">

                    <div class="col-sm-8 col-md-4 col-lg-3">
                        <div class="profile-img margin-b-30"><img id="foto" src="images/profile-1-250x250.jpg" alt=""></div>
                    </div><!-- col-sm-8 -->

                    <div class="col-sm-10 col-md-5 col-lg-6">
                        <h2><b id="nombre">Michel SMith</b></h2>
                        <!-- <h4 class="font-yellow">Key Account Manager</h4> -->
                        <ul class="information margin-tb-30">
                            <li><b class="font-yellow">BORN</b> : August 25, 1987</li>
                            <li><b class="font-yellow">EMAIL</b> : mymith@mywebpage.com</li>
                            <li><b class="font-yellow">MARITAL STATUS</b> : Married</li>
                        </ul>
                        <ul class="social-icons">
                            <li><a id="instagram" href="#"><i class="ion-social-instagram"></i></a></li>
                            <li><a id="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a id="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                        </ul>
                    </div><!-- col-sm-8 -->

                    <!-- <div class="col-sm-10 col-md-3 col-lg-3">
						<a class="downlad-btn" href="#">Download CV</a>
					</div>col-lg-2 -->

                </div><!-- row -->

            </div><!-- intro -->
        </div><!-- container -->
    </section><!-- intro-section -->


    <section class="about-section section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="heading">
                        <h3><b>About me</b></h3>
                        <h6 class="font-lite-black"><b>PROFESSIONAL PATH</b></h6>
                    </div>
                </div><!-- col-sm-3 -->
                <div class="col-sm-12 col-md-9">
                    <p id="descripcion" class="margin-b-50">Duis non volutpat arcu, eu mollis tellus. Sed finibus aliquam neque
                        sit amet sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nulla maximus pellentes que velit, quis consequat nulla effi citur at.
                        Maecenas sed massa tristique.Duis non volutpat arcu, eu mollis tellus.
                        Sed finibus aliquam neque sit amet sodales. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Nulla maximus pellentes que velit, quis consequat nulla
                        effi citur at.Maecenas sed massa tristique.</p>

                </div><!-- col-sm-9 -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- about-section -->


    <section class="portfolio-section section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="heading">
                        <h3><b>Productos</b></h3>
                        <h6 class="font-lite-black"><b>MY WORK</b></h6>
                    </div>
                </div><!-- col-sm-3 -->

                <div class="col-sm-12 col-md-9">
                    <div class="portfolioFilter clearfix margin-b-80">
                        <a href="#" data-filter="*" class="current"><b>ALL</b></a>
                        <a href="#" data-filter=".web-design"><b>WEB DESIGN</b></a>
                        <a href="#" data-filter=".branding"><b>BRANDING</b></a>
                        <a href="#" data-filter=".graphic-design"><b>GRAPHIC DESIGN</b></a>
                    </div><!-- portfolioFilter -->
                </div><!-- col-sm-8 -->
            </div><!-- row -->

            <div class="portfolioContainer  margin-b-50">

                <div class="p-item web-design">
                    <a href="images/portfolio-13-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-13-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item branding graphic-design">
                    <a href="images/portfolio-14-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-14-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item web-design">
                    <a href="images/portfolio-15-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-15-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item graphic-design">
                    <a class="img" href="images/portfolio-16-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-16-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item branding graphic-design">
                    <a href="images/portfolio-17-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-17-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item graphic-design web-design">
                    <a href="images/portfolio-18-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-18-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item  graphic-design branding">
                    <a href="images/portfolio-19-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-19-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

                <div class="p-item web-design branding">
                    <a href="images/portfolio-20-400x400.jpg" data-fluidbox>
                        <img src="images/portfolio-20-400x400.jpg" alt=""></a>
                </div><!-- p-item -->

            </div><!-- portfolioContainer -->
        </div><!-- container -->
    </section><!-- portfolio-section -->


    <!-- 
	<footer>
		<p class="copyright">
		
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

		</p>
	</footer> -->
    <?php include('footer.php')?>

    <!-- SCIPTS -->

    <script src="js/profile/jquery-3.2.1.min.js"></script>

    <script src="js/profile/tether.min.js"></script>

    <script src="js/profile/bootstrap.js"></script>

    <script src="js/profile/isotope.pkgd.min.js"></script>

    <script src="js/profile/jquery.waypoints.min.js"></script>

    <script src="js/profile/progressbar.min.js"></script>

    <script src="js/profile/jquery.fluidbox.min.js"></script>

    <script src="js/profile/scripts.js"></script>
	<script src="js/profile.js"></script>
</body>

</html>