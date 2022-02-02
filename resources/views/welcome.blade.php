        <!-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
-->
        <!-- Fonts  
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        -->
        <!-- Styles
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">            
                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
                       Welcome to Dressaholicph Alteration
                       
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Dressaholic Alteration to provide online appointments for your desired designs of fashion.">
    <meta name="author" content="Dressaholic Web Dev">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Webpage Title -->
    <title>Dressaholic Alteration</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/HomePageCss/bootstrap.css" rel="stylesheet">
    <link href="css/HomePageCss/fontawesome-all.css" rel="stylesheet">
    <link href="css/HomePageCss/swiper.css" rel="stylesheet">
	<link href="css/HomePageCss/magnific-popup.css" rel="stylesheet">
	<link href="css/HomePageCss/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
<link rel="icon" href="img/HomePageImg/Logo_2.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sync</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="#"> <img src="img/HomePageImg/Dressaholic_logo.png" ></a> 
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#description">MISSION & VISION <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">OUR SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#screens">LOCATION</a>
                    </li>

                    <!-- Dropdown Menu -->          
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">START APPOINTMENT</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('login') }}" class="dropdown-item" href="article-details.html"><span class="item-text">LOGIN</span></a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('register') }}" class="dropdown-item" href="terms-conditions.html"><span class="item-text">REGISTER</span></a> 
                        </div>
                    </li>
                    <!-- end of dropdown menu -->
                </ul>
                <!-- <span class="nav-item">
                    <a class="btn-outline-sm page-scroll" href="#download">DOWNLOAD</a>
                </span> -->
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h1>Dressaholic Alteration</h1>
                        <p class="p-large p-heading">
                            
                            Dressaholicph Alteration started in the year 2020, our small business is run and owned by our family who are in line and has a professional background in the alteration industry. 
                        </p>
                      
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            
            <!-- 
            <div class="row">
                <div class="col-lg-12">
                    <div class="image-container">
                        <img class="img-fluid" src="images/header-iphone.png" alt="alternative">
                    </div>  
                </div> 
            </div> end of row -->


        </div> <!-- end of container -->
        <div class="deco-white-circle-1">
            <img src="img/HomePageImg/decorative-white-circle.svg" alt="alternative">
        </div> <!-- end of deco-white-circle-1 -->
        <div class="deco-white-circle-2">
            <img src="img/HomePageImg/decorative-white-circle.svg" alt="alternative">
        </div> <!-- end of deco-white-circle-2 -->
       
        <div class="deco-yellow-circle">
            <img src="img/HomePageImg/decorative-yellow-circle.svg" alt="alternative">
        </div> <!-- end of deco-yellow-circle -->
        <div class="deco-green-diamond">
            <img src="img/HomePageImg/decorative-green-diamond.svg" alt="alternative">
        </div> <!-- end of deco-yellow-circle -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Small Features -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Register</h5>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image green">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Satisfy Your Fashion</h5>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image red">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Create Appointment</h5>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <!-- <div class="card">
                        <div class="card-image yellow">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Get your dress done</h5>
                        </div>
                    </div> -->
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image blue">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Get Things Done</h5>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of small features -->


    <!-- Description 1 -->
    <div id="description" class="basic-1">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6" >
                    <div class="text-container" >
                        <h2>Mission</h2>
                        <!-- <p>Sync is the first mobile app on the market to harness the power of social connections to help you stop procrastinating and start getting things done. Give it a try and see the changes right away</p> -->
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Dressaholicph Alteration Vision
                                    To be recognize in the local industry as a provider of high-quality garment clothing alteration and custom-made clothing.
                                    To strive to exceed our customers' expectations in our services.</div>
                            </li>
                            <!-- <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Begin monitoring your day to day routine with Sync app</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">See the improved results in no more than a couple of weeks</div>
                            </li> -->
                        </ul>
                        
                        <div class="cards-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-image red">
                                                <i class="fas fa-bullseye"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"></br></h5>
                                            </div>
                                        </div>
                                        <!-- end of card -->  
                                    </div> <!-- end of col -->
                                </div> <!-- end of row -->
                            </div> <!-- end of container -->
                        </div> <!-- end of cards-1 -->
                        <!-- end of small features -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                
                <div class="col-lg-6">
                    <div class="text-container" >
                        <h2>Vision</h2>
                        <!-- <p>Sync is the first mobile app on the market to harness the power of social connections to help you stop procrastinating and start getting things done. Give it a try and see the changes right away</p> -->
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">We are passionate to our customers in providing them an outstanding alteration service on clothes. 
                                    We also want to provide them a quality garments and clothes with best value pricing. 
                                </div>
                            </li>
                            <!-- <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Begin monitoring your day to day routine with Sync app</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">See the improved results in no more than a couple of weeks</div>
                            </li> -->
                        </ul>

                        <div class="cards-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-image black">
                                                <i class="fas fa-binoculars"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"></br></h5>
                                            </div>
                                        </div>
                                        <!-- end of card -->  
                                    </div> <!-- end of col -->
                                </div> <!-- end of row -->
                            </div> <!-- end of container -->
                        </div> <!-- end of cards-1 -->
                        <!-- end of small features -->
                         
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of description 1 -->

    
    <!-- Description 1 Details Lightbox -->
	<!-- Details Lightbox --> 

    <!-- Description 2 --> 

    <!-- Features -->
    <div id="features" class="basic-2" > 
        <div class="ex-basic-2" >
        <h2>Our services</h2>
        <p class="p-heading">We offer clothes repair, made to order/custom made, and e-commerce on the following:</p>
      
            <div class="container" style="margin-top:-130px;">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="text-container">
                         
                            <div class="row justify-content-md-center">
                                <div class="col-md-2">
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Barong</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Blouse</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Dress</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Gown</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Slacks</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Polo</div>
                                        </li>
                                    </ul>
                                </div> <!-- end of col -->
    
                                <div class="col-md-2">
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Uniform</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Costume</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Jacket/Hoodie</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Pants/Jeans</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Shirt</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Short</div>
                                        </li>
                                    </ul>
                                </div> <!-- end of col -->

                                <div class="col-md-2">
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Skirt</div>
                                        </li> 
                                    </ul>
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of text-container--> 
                    </div> <!-- end of col-->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of ex-basic-2 -->
       
    </div> <!-- end of basic-2 -->
    <!-- end of features -->


    <!-- Screenshots -->
    <div id="screens" class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Our Location</h3>
                    <!--Google map-->
                    <div class="container-fluid">
                    <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d760.3311149856376!2d121.08177998504299!3d14.678883555978262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba002b20d355%3A0x9edddc49a129ce5c!2sDon%20Antonio%20Heights%20North!5e0!3m2!1sen!2sph!4v1643530550008!5m2!1sen!2sph"   frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    </div>

<!--Google Maps-->
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d760.3311149856376!2d121.08177998504299!3d14.678883555978262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba002b20d355%3A0x9edddc49a129ce5c!2sDon%20Antonio%20Heights%20North!5e0!3m2!1sen!2sph!4v1643530550008!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                    <!-- Image Slider -->
                 
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider -->
    <!-- end of screenshots -->
 

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="footer-col first">
                        <h5>About Sync</h5>
                        <p class="p-small">Sync is a landing page HTML template built with Bootstrap 4 for presenting mobile apps</p>
                    </div>  -->
                    <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li class="media">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="media-body">Dona Isidora St. Don Antonio Quezon City</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-envelope"></i>
                                <div class="media-body"><a href="#your-link">dressaholic@gmail.com</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-phone-alt"></i>
                                <div class="media-body"><a href="#your-link">+63 995 270 6395 </a></div>
                            </li>
                        </ul>
                    </div> <!-- end of footer-col -->
                    <!-- <div class="footer-col third">
                        <h5>Value Links</h5>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="article-details.html">Article Details</a></li>
                        </ul>
                    </div>  -->
                    <!-- end of footer-col -->
                    <!-- <div class="footer-col fourth">
                        <h5>Other Apps</h5>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li><a href="#your-link">Scientific Calculator</a></li>
                            <li><a href="#your-link">Advanced Timer</a></li>
                            <li><a href="#your-link">Music Store</a></li>
                        </ul>
                    </div>  -->
                    <!-- end of footer-col -->
                    <div class="footer-col fifth">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of footer-col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2021 <a href="#">Dressaholic Alteration PH</a> - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/HomePageJS/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/HomePageJS/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/HomePageJS/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/HomePageJS/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/HomePageJS/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/HomePageJS/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/HomePageJS/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/HomePageJS/scripts.js"></script> <!-- Custom scripts -->

    <script>



    </script>
</body>
</html>