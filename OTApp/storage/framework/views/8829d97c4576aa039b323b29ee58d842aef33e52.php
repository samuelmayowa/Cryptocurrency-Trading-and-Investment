<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo e($settings->site_name); ?> - <?php echo e($settings->site_title); ?></title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="img/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/fav/favicon-16x16.png">
    
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../ms-icon-144x144.html">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/frontend_style_<?php echo e($settings->site_colour); ?>.css">
    <link rel="stylesheet" href="css/responsivef.css">
</head>
<body>

<div class="preloader"><div class="spinner"></div></div><!-- /.preloader -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
{<?php echo $settings->tawk_to; ?>}

</script>
<!--End of Tawk.to Script-->

<header class="header home-page-one">
    <div class="top-bar">
        <div class="thm-container clearfix">
            <div class="contact-info pull-left">
                <ul class="list-inline">
                    <li class="language-select">
                        <i class="icofont icofont-earth"></i>
                        <div class="select-box">
                            <select class="selectpicker" name="languages">
                                <option value="">English</option>
                            </select>
                        </div><!-- /.select-box -->
                    </li><!--
                    --><li class="phone"><a href="#"><i class="icofont icofont-headphone-alt-2"></i> Support</a></li><!--
                    --><li class="enquery"><a href="#"><i class="icofont icofont-envelope"></i> <?php echo e($settings->contact_email); ?></a></li>
                </ul><!-- /.list-inline -->
            </div><!-- /.contact-info pull-left -->
            <div class="social-box pull-right">
                
                <div class="social-icon">
                    <span>Follow us:</span><!--
                    --><a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                </div><!-- /.social-icon -->
            </div><!-- /.social -->
        </div><!-- /.thm-container-fluid -->
    </div><!-- /.top-bar -->
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="thm-container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="images/<?php echo e($settings->logo); ?>" alt="<?php echo e($settings->site_name); ?>"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu one-page-scroll-menu" id="main-nav-bar">
                

                <ul class="nav navbar-nav navigation-box">
                    <li class="scrollToLink current"> <a href="#minimal-bootstrap-carousel">Home</a> </li>
                    <li class="scrollToLink"> <a href="#about">About Us</a> </li>
                    <li class="scrollToLink"> <a href="#services">Services</a> </li>
                    <li class="scrollToLink"> <a href="#pricing">Pricing</a> </li>
                    <li class="scrollToLink"> <a href="#team">Team</a> </li>
                    <li class="scrollToLink"> <a href="#testimonials">Testimonials</a> </li>
                    <li class="scrollToLink"><a href="#contact">Contact</a></li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
            <div class="right-side-box">
                <?php if($settings->site_preference =="Web dashboard only"): ?>
                <a class="join-btn" href="register">JOIN US</a>
                <?php else: ?>
                <a class="join-btn" href="<?php echo e($settings->bot_link); ?>">JOIN US</a>
                <?php endif; ?>
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->

<div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one" data-ride="carousel">           
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active slide-1" style="">
            <div class="carousel-caption">
                <div class="thm-container">
                    <div class="box valign-bottom">
                        <div class="content ">
                            <h2 data-animation="animated fadeInUp">Intelligent Plan <br /> for your Money</h2>
                            <p data-animation="animated fadeInUp" class="tag-line">Put your investing ideas into action with a full range of <br /> investments.Enjoy real benefits and rewards on <br /> <?php echo e($settings->site_name); ?>.</p><!-- /.tag-line -->
                            
                             <?php if($settings->site_preference =="Web dashboard only"): ?>
                            <a data-animation="animated fadeInDown" href="register" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="login" class="thm-button borderd">Login</a>
                            <?php else: ?>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button borderd">Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="item  slide-1" style="">
            <div class="carousel-caption">
                <div class="thm-container">
                    <div class="box valign-bottom">
                        <div class="content ">
                            <h2 data-animation="animated fadeInUp">Trade in the moment, <br/> invest in the future!</h2>
                            <p data-animation="animated fadeInUp" class="tag-line">Put your investing ideas into action with a full range of <br /> investments.Enjoy real benefits and rewards on <br /> <?php echo e($settings->site_name); ?> .</p><!-- /.tag-line -->
                            
                            <?php if($settings->site_preference =="Web dashboard only"): ?>
                            <a data-animation="animated fadeInDown" href="register" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="login" class="thm-button borderd">Login</a>
                            <?php else: ?>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button borderd">Login</a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        
        <div class="item  slide-1" style="">
            <div class="carousel-caption">
                <div class="thm-container">
                    <div class="box valign-bottom">
                        <div class="content ">
                            <h2 data-animation="animated fadeInUp">We process withdrawal <br/> requests promptly!</h2>
                            <p data-animation="animated fadeInUp" class="tag-line">Put your investing ideas into action with a full range of <br /> investments.Enjoy real benefits and rewards on <br /> <?php echo e($settings->site_name); ?> .</p><!-- /.tag-line -->
                            
                             <?php if($settings->site_preference =="Web dashboard only"): ?>
                            <a data-animation="animated fadeInDown" href="register" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="login" class="thm-button borderd">Login</a>
                            <?php else: ?>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button">Get started</a>
                            <a data-animation="animated fadeInDown" href="<?php echo e($settings->bot_link); ?>" class="thm-button borderd">Login</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Next</span>
    </a>
</div>

<section class="statics-section">
    <div class="thm-container clearfix">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-statics">
                    <div class="icon-box">
                        <i class="accure-icon-team"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h2>Total User</h2>
                        <span class="counter"><?php echo e($total_users); ?></span>
                    </div><!-- /.text-box -->
                </div><!-- /.single-statics -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-statics">
                    <div class="icon-box">
                        <i class="accure-icon-safebox-1"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h2>Total deposited (<?php echo e($settings->currency); ?>)</h2>
                        <?php $__currentLoopData = $total_deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <?php if(!empty($deposited->total)): ?>
							<span class="counter"><?php echo e($deposited->total); ?></span>
							<?php else: ?>
							<span class="counter">0</span>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- /.text-box -->
                </div><!-- /.single-statics -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-statics no-border">
                    <div class="icon-box">
                        <i class="accure-icon-get-money"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h2>Total withdrawals (<?php echo e($settings->currency); ?>)</h2>
                        <?php $__currentLoopData = $total_withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <?php if(!empty($deposited->total)): ?>
							<span class="counter"><?php echo e($deposited->total); ?></span>
							<?php else: ?>
							<span class="counter">0</span>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div><!-- /.text-box -->
                </div><!-- /.single-statics -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.statics-section -->

<section class="about-section sec-pad" id="about">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-6">
                <div class="video-box clearfix">
                    <img src="img/about-moc.png" class="pull-right moc-img" alt="Awesome Image"/>
                    <a href="https://www.youtube.com/watch?v=5uViY4mqobw" class="video-btn video-popup"><i class="icofont icofont-ui-play"></i></a>
                </div><!-- /.video-box -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="title">
                    <span>Who We Are</span>
                    <h2>About <?php echo e($settings->site_name); ?></h2>
                    <p>We bring the right people together to challenge established thinking <br /> and drive transformation.We will show the way to successive.</p>
                </div><!-- /.title -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-about-box hvr-bounce-to-bottom">
                            <div class="icon-box">
                                <i class="accure-icon-idea"></i>
                            </div><!-- /.icon-box -->        
                            <h3>We Innovate</h3>
                            <p>We innovate systematically, continuously and successfully</p>
                            <a href="#" class="read-more">Read More</a>
                        </div><!-- /.single-about-box -->        
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-about-box hvr-bounce-to-bottom">
                            <div class="icon-box">
                                <i class="accure-icon-award"></i>
                            </div><!-- /.icon-box -->        
                            <h3>Licensed & certified</h3>
                            <p>We innovate systematically, continuously and successfully</p>
                            <a href="#" class="read-more">Read More</a>
                        </div><!-- /.single-about-box -->        
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-about-box hvr-bounce-to-bottom">
                            <div class="icon-box">
                                <i class="accure-icon-user"></i>
                            </div><!-- /.icon-box -->        
                            <h3>We are Professional</h3>
                            <p>We innovate systematically, continuously and successfully</p>
                            <a href="#" class="read-more">Read More</a>
                        </div><!-- /.single-about-box -->        
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single-about-box hvr-bounce-to-bottom">
                            <div class="icon-box">
                                <i class="accure-icon-dollar-3"></i>
                            </div><!-- /.icon-box -->        
                            <h3>Saving & Investments</h3>
                            <p>We innovate systematically, continuously and successfully</p>
                            <a href="#" class="read-more">Read More</a>
                        </div><!-- /.single-about-box -->        
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
                
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.about-section -->

<section class="our-philoshopy">
    <div class="thm-container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 pull-left">
                <div class="philoshopy-content">
                    <span>Our philosophy</span>
                    <h3>We were always <br /> thinking global</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div><!-- /.philoshopy-content -->
            </div><!-- /.col-md-5 -->
            <div class="col-lg-6 col-md-6 pull-right col-sm-12 col-xs-12 investing-box">
            	<div class="investing-wrap clearfix">
	                <img src="img/philoshopy.jpg" alt="Awesome Image" class="pulll-right philoshophy-img" />
	                <div class="start-investing clearfix">
	                    <h4>Start invest Now</h4>
	                    <p>Lorem ipsum ееdolor sit amet, consectetur adipiscing elit. ееdolor sit amet, consectetur adipiscing elit.</p>
	                    <a href="#" class="view-plan">View Plan</a>
	                </div><!-- /.start-investing -->
                </div><!-- /.investing-wrap -->               
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.our-philoshopy -->

<section class="process-section sec-pad">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>How it works</span>
            <h2>Three easy way to start</h2>
        </div><!-- /.sec-title -->
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-process text-center">
                    <div class="icon-box">
                        <i class="accure-icon-id-card"></i>
                        <div class="count">01</div><!-- /.count -->
                    </div><!-- /.icon-box -->
                    <h3>REgister Account</h3>
                </div><!-- /.single-process -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-process text-center">
                    <div class="icon-box">
                        <i class="accure-icon-money-2"></i>
                        <div class="count">02</div><!-- /.count -->
                    </div><!-- /.icon-box -->
                    <h3>Make Deposit</h3>
                </div><!-- /.single-process -->
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-process no-arrow text-center">
                    <div class="icon-box">
                        <i class="accure-icon-get-money"></i>
                        <div class="count">03</div><!-- /.count -->
                    </div><!-- /.icon-box -->
                    <h3>Receive Earnings</h3>
                </div><!-- /.single-process -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.process-section -->

<section class="why-choose-us sec-pad" id="services">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>OUR SERVICES</span>
            <h2>WHY YOU SHOULD CHOOSE US</h2>
        </div><!-- /.sec-title -->
        <div class="single-why-choose">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                    <div class="img-box text-right">
                        <img src="img/why-choose-1.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-left">
                    <div class="text-box">
                        <h3>Stable & Profitable</h3>
                        <p>Effective business support planning becomes one of the <br /> most critical activities within successful small business <br /> maintenance and development.Accure provides best <br /> affordable  plan to earn money.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div><!-- /.text-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->                
            </div><!-- /.row -->
        </div><!-- /.single-why-choose -->
        <div class="single-why-choose">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-left">
                    <div class="img-box text-left">
                        <img src="img/why-choose-2.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                    <div class="text-box">
                        <h3>Instant and Secure <br />withdrawals </h3>
                        <p>Effective business support planning becomes one of the <br /> most critical activities within successful small business <br /> maintenance and development.Accure provides best <br /> affordable  plan to earn money.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div><!-- /.text-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->                
            </div><!-- /.row -->
        </div><!-- /.single-why-choose -->
        <div class="single-why-choose">
            <div class="row">            
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                    <div class="img-box text-right">
                        <img src="img/why-choose-3.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-left">
                    <div class="text-box">
                        <h3>Referral Programs</h3>
                        <p>Effective business support planning becomes one of the <br /> most critical activities within successful small business <br /> maintenance and development.Accure provides best <br /> affordable  plan to earn money.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div><!-- /.text-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
            </div><!-- /.row -->
        </div><!-- /.single-why-choose -->
        <div class="single-why-choose">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-left">
                    <div class="img-box text-left">
                        <img src="img/why-choose-4.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                    <div class="text-box">
                        <h3>multi-Currency Support</h3>
                        <p>Effective business support planning becomes one of the <br /> most critical activities within successful small business <br /> maintenance and development.Accure provides best <br /> affordable  plan to earn money.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div><!-- /.text-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->                
            </div><!-- /.row -->
        </div><!-- /.single-why-choose -->
        <div class="single-why-choose">
            <div class="row">                 
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                    <div class="img-box text-right">
                        <img src="img/why-choose-5.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                </div><!-- /.col-lg-6 col-md-6 col-sm-12 col-xs-12  -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-left">
                    <div class="text-box">
                        <h3>24/7 Customer Support</h3>
                        <p>Effective business support planning becomes one of the <br /> most critical activities within successful small business <br /> maintenance and development.Accure provides best <br /> affordable  plan to earn money.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div><!-- /.text-box -->
                </div><!-- /.col-lg-6 col-md-12 col-sm-12 col-xs-12  -->               
            </div><!-- /.row -->
        </div><!-- /.single-why-choose -->
    </div><!-- /.thm-container -->
</section><!-- /.why-choose-us -->

<section class="tools-section">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-12">
                <div class="tools-content">
                    <span>Intuitive and powerful tools</span>
                    <h3>designed just for you</h3>
                    
                </div><!-- /.tools-content -->
            </div><!-- /.col-md-6 -->
            
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.tools-section -->

<section class="tools-satisfaction">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="single-tool-satisfaction">
                    <div class="icon-box">
                        <div class="inner"><i class="icofont icofont-check-alt"></i></div><!-- /.inner -->
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h3>Satisfaction guaranteed</h3>
                        <p>Our passion is your investing experience. If you ever feel we've missed the mark, let us know. We'll do everything we can to make it right.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tool-satisfaction -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="single-tool-satisfaction">
                    <div class="icon-box">
                        <div class="inner"><i class="icofont icofont-cop-badge"></i></div><!-- /.inner -->
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <h3>Advice you can trust.</h3>
                        <p>Our passion is your investing experience. If you ever feel we've missed the mark, let us know. We'll do everything we can to make it right.</p>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tool-satisfaction -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.tools-satisfaction -->

<section class="pricing-section sec-pad" id="pricing">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>Expore more features</span>
            <h2>See our investment plans</h2>
            <p>Choose How You Want to Invest With Us</p>
        </div><!-- /.sec-title -->
        <div class="tab-btn" role="tablist">
            <ul>
                <li class="active" data-tab-name="monthly-price"><a href="#monthly-price" aria-controls="monthly-price" role="tab" data-toggle="tab">Monthly</a></li><!--
                --><li data-tab-name="yearly-price"><a href="#yearly-price" aria-controls="yearly-price" role="tab" data-toggle="tab">Yearly</a></li>
            </ul>
        </div><!-- /.tab-btn -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="monthly-price">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>Basic plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Month</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>premium Plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Month</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>VIP plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Month</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div>
            <div class="tab-pane fade " id="yearly-price">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>Basic plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Year</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>premium Plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Year</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-pricing hvr-bounce-to-bottom">
                            <div class="title">
                                <h3>VIP plan</h3>
                            </div><!-- /.title -->
                            <div class="percent">
                                <span>5.50%</span>
                                <p>Per Year</p>
                            </div><!-- /.percent -->
                            <div class="info">
                                <p>Minimum  Deposit $10</p>
                                <p>Miximum  Deposit $10,000</p>
                                <p>Enhanced security</p>
                                <p>Access to all features</p>
                                <p>24/7Support</p>
                            </div><!-- /.info -->
                            <div class="btn-box">
                                <a href="#" class="sign-up">Sign up now</a>
                            </div><!-- /.btn-box -->
                        </div><!-- /.single-pricing -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.tab-content -->
    </div><!-- /.thm-container -->
</section><!-- /.pricing-section -->


<section class="team-section sec-pad" id="team">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>Think big,start small</span>
            <h2>our top investors</h2>
            <p>A look at the top ten investors of all time and the strategies <br /> they used to make their money.</p>
        </div><!-- /.sec-title -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team">
                    <div class="img-box">
                        <img src="img/team-1.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                    <h3>Daphine Nishioka</h3>
                    <p>Business Man</p>
                    <div class="social">
                        <a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                    </div><!-- /.social -->
                </div><!-- /.single-team -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team">
                    <div class="img-box">
                        <img src="img/team-2.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                    <h3>Kim Heathman</h3>
                    <p>Business Man</p>
                    <div class="social">
                        <a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                    </div><!-- /.social -->
                </div><!-- /.single-team -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team">
                    <div class="img-box">
                        <img src="img/team-3.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                    <h3>Carissa Frigo</h3>
                    <p>Business Man</p>
                    <div class="social">
                        <a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                    </div><!-- /.social -->
                </div><!-- /.single-team -->
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-team">
                    <div class="img-box">
                        <img src="img/team-4.png" alt="Awesome Image"/>
                    </div><!-- /.img-box -->
                    <h3>Euna Lucarelli</h3>
                    <p>Business Man</p>
                    <div class="social">
                        <a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                    </div><!-- /.social -->
                </div><!-- /.single-team -->
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
        <div class="view-all-box text-center">
            <a href="#">View All Investors</a>
        </div><!-- /.view-all-box -->
    </div><!-- /.thm-container -->
</section><!-- /.team-section -->

<section class="testimonial-section sec-pad gray-bg" id="testimonials">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>testimonial</span>
            <h2>What’s people say</h2>
            <p> Don't take our word for it, here's what some of our clients <br /> have to say about us.</p>
        </div><!-- /.sec-title -->
        <div class="testimonial-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="single-tesimonial">
                    <div class="img-box">
                        <div class="inner">
                            <img src="img/testimonial-1.png" alt="Awesome Image"/>
                        </div><!-- /.inner -->
                        <h3>Roxy Chanslor</h3>
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <p>"In the investment world, and business in general, an individual’s or company’s character is of the utmost importance. It is due to this trust and faith (plus the financial and deep track record) that I hold the <?php echo e($settings->site_name); ?> team in high regard. I have personally invested with <?php echo e($settings->site_name); ?> and have also referred a number of clients who, upon doing their own due diligence, have invested with <?php echo e($settings->site_name); ?> as well."</p>
                        <span>Adelaide,Australia, Apr 15, 2018</span>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tesimonial -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-tesimonial">
                    <div class="img-box">
                        <div class="inner">
                            <img src="img/testimonial-2.png" alt="Awesome Image"/>
                        </div><!-- /.inner -->
                        <h3>Roxy Chanslor</h3>
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <p>"In the investment world, and business in general, an individual’s or company’s character is of the utmost importance. It is due to this trust and faith (plus the financial and deep track record) that I hold the <?php echo e($settings->site_name); ?> team in high regard. I have personally invested with <?php echo e($settings->site_name); ?> and have also referred a number of clients who, upon doing their own due diligence, have invested with <?php echo e($settings->site_name); ?> as well."</p>
                        <span>Adelaide,Australia, Apr 15, 2018</span>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tesimonial -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-tesimonial">
                    <div class="img-box">
                        <div class="inner">
                            <img src="img/testimonial-3.png" alt="Awesome Image"/>
                        </div><!-- /.inner -->
                        <h3>Roxy Chanslor</h3>
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <p>"In the investment world, and business in general, an individual’s or company’s character is of the utmost importance. It is due to this trust and faith (plus the financial and deep track record) that I hold the <?php echo e($settings->site_name); ?> team in high regard. I have personally invested with <?php echo e($settings->site_name); ?> and have also referred a number of clients who, upon doing their own due diligence, have invested with <?php echo e($settings->site_name); ?> as well."</p>
                        <span>Adelaide,Australia, Apr 15, 2018</span>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tesimonial -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-tesimonial">
                    <div class="img-box">
                        <div class="inner">
                            <img src="img/testimonial-2.png" alt="Awesome Image"/>
                        </div><!-- /.inner -->
                        <h3>Roxy Chanslor</h3>
                    </div><!-- /.img-box -->
                    <div class="text-box">
                        <p>"In the investment world, and business in general, an individual’s or company’s character is of the utmost importance. It is due to this trust and faith (plus the financial and deep track record) that I hold the <?php echo e($settings->site_name); ?> team in high regard. I have personally invested with <?php echo e($settings->site_name); ?> and have also referred a number of clients who, upon doing their own due diligence, have invested with <?php echo e($settings->site_name); ?> as well."</p>
                        <span>Adelaide,Australia, Apr 15, 2018</span>
                    </div><!-- /.text-box -->
                </div><!-- /.single-tesimonial -->
            </div><!-- /.item -->
        </div><!-- /.testimonial-carousel -->
    </div><!-- /.thm-container -->
</section><!-- /.testimonial-section -->

<section class="transaction-performance-section">
    <div class="thm-container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="transaction-content">
                    <div class="sec-title">
                        <h2>Latest Transaction</h2>
                        <p>Our goal is to simplify investing so that anyone can be an investor. With <br /> this in mind, we hand-pick the investments we offer on our platform.</p>
                    </div><!-- /.sec-title -->
                    <div class="tab-btn" role="tablist">
                        <ul>
                            <li class="active" data-tab-name="diposited-by"><a href="#diposited-by" aria-controls="diposited-by" role="tab" data-toggle="tab">Deposits</a></li><!--
                            --><li data-tab-name="withdraw-by"><a href="#withdraw-by" aria-controls="withdraw-by" role="tab" data-toggle="tab">Withdrawals</a></li>
                        </ul>
                    </div><!-- /.tab-btn -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="diposited-by">
                            <div class="table-responsive transaction-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>DATE</th>
                                            <th>AMOUNT</th>
                                            <th>MODE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="name"><img src="images/wdby.png" alt="Awesome Image"/> <?php echo e($deposit->duser->name); ?></td>
                                            <td class="date"><?php echo e($deposit->created_at); ?></td>
                                            <td class="amount"><?php echo e($settings->currency); ?><?php echo e($deposit->amount); ?></td>
                                            <td class="currency"><?php echo e($deposit->payment_mode); ?></td>
                                            <td class="diposit-date"><?php echo e($deposit->status); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </tbody>
                                </table><!-- /.table -->
                            </div><!-- /.table-responsive -->
                        </div>
                        <div class="tab-pane fade " id="withdraw-by">
                            <div class="table-responsive transaction-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>DATE</th>
                                            <th>AMOUNT</th>
                                            <th>MODE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="name"><img src="images/wdby.png" alt="Awesome Image"/> <?php echo e($deposit->duser->name); ?></td>
                                            <td class="date"><?php echo e($deposit->created_at); ?></td>
                                            <td class="amount"><?php echo e($settings->currency); ?><?php echo e($deposit->amount); ?></td>
                                            <td class="currency"><?php echo e($deposit->payment_mode); ?></td>
                                            <td class="diposit-date"><?php echo e($deposit->status); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table><!-- /.table -->
                            </div><!-- /.table-responsive -->
                        </div>
                    </div><!-- /.tab-content -->
                </div><!-- /.transaction-content -->
            </div><!-- /.col-lg-8 -->
            
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.transaction-performance-section -->

<section class="call-to-action-style-one">
    <div class="thm-container clearfix">
        <div class="title pull-left">
            <h2>Join over 510,000 registered members</h2>
            <p>It's free, quick and easy.</p>
        </div><!-- /.title pull-left -->
        <div class="cta-btn-box pull-right">
            <a href="#" class="cta-btn">JOIN <?php echo e($settings->site_name); ?></a>
        </div><!-- /.cta-btn pull-right -->
    </div><!-- /.thm-container -->
</section><!-- /.call-to-action -->

<section class="get-in-touch" id="contact">

    <div class="google-map" id="contact-google-map"></div>

    <div class="thm-container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-content">
                    <?php if(Session::has('message')): ?>
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> <?php echo e(Session::get('message')); ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                    <div class="inner">
                        <div class="title text-center">
                            <h3>Get in touch</h3>
                            <p>Send us a message and we'll respond as <br /> soon as possible </p>
                        </div><!-- /.title -->
                        <form action="<?php echo e(action('UsersController@sendcontact')); ?>"  method="POST">
                            <div class="frm-grp">
                                <input type="text" name="name"  placeholder="Your Name" required/>
                            </div><!-- /.frm-grp -->

                            <div class="frm-grp">
                                <input type="text" name="email"  placeholder="Email Address" required/>
                            </div><!-- /.frm-grp -->
                            <div class="frm-grp">
                                <textarea  name="message" placeholder="Message" required></textarea>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            </div><!-- /.frm-grp -->
                            <div class="frm-grp">
                                <input type="submit" value="Send message" class="btn btn-default bt-lg">
                            </div><!-- /.frm-grp -->
                            
                        </form>
                    </div><!-- /.inner -->
                </div><!-- /.form-content -->
            </div><!-- /.col-md-5 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.get-in-touch -->

<section class="faq-section">
    <div class="thm-container">
        <div class="sec-title text-center">
            <span>Questions</span>
            <h2>Questions you often ask</h2>
        </div><!-- /.sec-title -->
        <div class="accrodion-grp" data-grp-name="faq-accrodion">
            <div class="accrodion ">
                <div class="accrodion-title">
                    <h4>What is the minimum amount required to open an account?</h4>
                </div>
                <div class="accrodion-content">
                    <p>You can make withdrawal at any time if there are sufficient funds on your account.Sometimes part of your funds is pending. For security reason we hold, for a while, the earnings that you received from referrals.Also we freeze funds which are received through Visa, Master Card or Paypal for 30 days. To avoid the funds freezing use Perfect Money, Bitcoin or Litecoin.</p>
                </div>
            </div>
            <div class="accrodion ">
                <div class="accrodion-title">
                    <h4>Can I have more than one account?</h4>
                </div>
                <div class="accrodion-content">
                    <p>You can make withdrawal at any time if there are sufficient funds on your account.Sometimes part of your funds is pending. For security reason we hold, for a while, the earnings that you received from referrals.Also we freeze funds which are received through Visa, Master Card or Paypal for 30 days. To avoid the funds freezing use Perfect Money, Bitcoin or Litecoin.</p>
                </div>
            </div>
            <div class="accrodion">
                <div class="accrodion-title">
                    <h4>If I change my mind, can I get refund?</h4>
                </div>
                <div class="accrodion-content">
                    <p>You can make withdrawal at any time if there are sufficient funds on your account.Sometimes part of your funds is pending. For security reason we hold, for a while, the earnings that you received from referrals.Also we freeze funds which are received through Visa, Master Card or Paypal for 30 days. To avoid the funds freezing use Perfect Money, Bitcoin or Litecoin.</p>
                </div>
            </div>
            <div class="accrodion active">
                <div class="accrodion-title ">
                    <h4>What is the minimum withdrawal amount, when can I make a request <br /> and when will I be paid?</h4>
                </div>
                <div class="accrodion-content">
                    <p>You can make withdrawal at any time if there are sufficient funds on your account.Sometimes part of your funds is pending. For security reason we hold, for a while, the earnings that you received from referrals.Also we freeze funds which are received through Visa, Master Card or Paypal for 30 days. To avoid the funds freezing use Perfect Money, Bitcoin or Litecoin.</p>
                </div>
            </div>
        </div>
    </div><!-- /.thm-container -->
</section><!-- /.faq-section -->
<br/><br/>

<section class="our-news-letter">
    <div class="thm-container">
        <div class="inner">
            <div class="sec-title text-center">
                <span>SUBSCRIBE TO</span>
                <h2>OUR NEWSLATTER</h2>
                <p>Want to receive exclusive offers? Subscribe to our newsletter!</p>
            </div><!-- /.sec-title -->
            <form action="#" class="news-letter mailchimp-form clearfix">
                <input type="text" placeholder="Name" name="name" />
                <input type="text" placeholder="Email" name="email" />
                <button type="submit">Submit</button>
            </form>
            <div class="result"></div><!-- /.result -->
        </div><!-- /.inner -->
    </div><!-- /.thm-container -->
</section><!-- /.our-news-letter -->

<footer class="footer">
    <div class="footer-top">
        <div class="thm-container clearfix">
            <a href="#" class="footer-logo pull-left"><img src="images/<?php echo e($settings->logo); ?>" alt="Awesome Image"/></a>
            <div class="footer-right pull-right">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">Home</a></li><!--
                        --><li><a href="#">ABOUT US</a></li><!--
                        --><li><a href="#">SERVICES</a></li><!--
                        --><li><a href="#">FAQ</a></li><!--
                        --><li><a href="#">SUPPORT</a></li>
                    </ul>
                </div><!-- /.footer-menu -->
                <div class="footer-social">
                    <a href="#" class="icofont icofont-social-facebook"></a><!--
                    --><a href="#" class="icofont icofont-social-twitter"></a><!--
                    --><a href="#" class="icofont icofont-brand-linkedin"></a>
                </div><!-- /.footer-social -->
            </div><!-- /.footer-right pull-right -->
        </div><!-- /.thm-container -->
    </div><!-- /.footer-top -->
    <div class="footer-bottom">
        <div class="thm-container">
            <p>Copyright © <?php echo e($settings->site_name); ?> 2019. All right reserved.</p>
        </div><!-- /.thm-container -->
    </div><!-- /.footer-bottom -->
</footer><!-- /.footer -->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>




<script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/wow.min.js"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>-->
<script src="js/gmaps.js"></script>
<!-- google map helper -->  
<script src="js/map-helper.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/customf.js"></script>

</body>

</html>