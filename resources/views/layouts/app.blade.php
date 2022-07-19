<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mophy.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jul 2022 09:40:54 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta property="og:image" content="social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    <title>Yassir | Admin </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assests/images/favicon.png">

    <link href="/assests/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/assests/vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
    <link href="/assests/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    
	<link href="/assests/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="/assests/vendor/datatables/css/dataTables.bootstrap.css" />
    <link href="/assests/css/pages/tables.css" rel="stylesheet" type="text/css" />
    <link href="/assests/vendor/daterangepicker/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/assests/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

    <link href="/assests/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/assests/css/style.css" rel="stylesheet">
    <link href="/assests/css/custom.css" rel="stylesheet">

</head>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="/assests/images/logo.png" alt="">
                <!-- <img class="logo-compact" src="/assests/images/logo-text.png" alt="">
                <img class="brand-title" src="/assests/images/logo-text.png" alt="">-->
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
            @include('layouts.header')
        <!--**********************************
            Header end
        ***********************************-->
        
        <!--**********************************
            Sidebar start
        ***********************************-->
            @include('layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- centre Part -->
                @yield('content')
            <!-- centre Part -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
            @include('layouts.footer')
        <!--**********************************
            Footer end
        ***********************************-->

    </div>

    <script src="/assests/vendor/global/global.min.js"></script>
	<script src="/assests/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/assests/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="/assests/vendor/owl-carousel/owl.carousel.js"></script>		
	
	<!-- Chart piety plugin files -->
    <script src="/assests/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<!-- <script src="/assests/vendor/apexchart/apexchart.js"></script> -->
	
	<!-- Dashboard 1 -->
	<!-- <script src="/assests/js/dashboard/dashboard-1.js"></script>-->
	
    <script src="/assests/js/custom.min.js"></script>
	<script src="/assests/js/deznav-init.js"></script>

    <script src="/assests/vendor/moment/moment.min.js" type="text/javascript"></script>
    <script src="/assests/vendor/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
    <script src="/assests/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assests/vendor/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="/assests/js/pages/datepicker.js" type="text/javascript"></script>

    <script src="/assests/vendor/iCheck/js/icheck.js"></script>
    <script src="/assests/vendor/jasny-bootstrap/js/jasny-bootstrap.js"  type="text/javascript"></script>
    <!-- <script src="/assests/vendor/select2/js/select2.full.min.js" type="text/javascript"></script>-->
    <script src="/assests/vendor/bootstrapwizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="/assests/vendor/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="/assests/js/pages/adduser.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        @yield('customjs')
    </script>

	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				center:true,
				dots: false,
				navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
				responsive:{
					0:{
						items:2
					},
					400:{
						items:3
					},	
					700:{
						items:5
					},	
					991:{
						items:6
					},			
					
					1200:{
						items:4
					},
					1600:{
						items:5
					}
				}
			})	
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>

</html>