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

            <div class="portfolioContainer  margin-b-50" id="cervecerias">

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
    <script src="js/cervecerias.js"></script>

</body>

</html>