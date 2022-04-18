<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta charset="utf-8" />
    <title>2FA Authentication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicons -->
    <link href="<?php echo e(asset('temp/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('temp/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS File -->
    <link href="<?php echo e(asset ('temp/lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Libraries CSS Files -->
        <link href="<?php echo e(asset ('temp/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('temp/lib/animate/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('temp/lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('temp/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('temp/lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('temp/lib/jquery/magnific-popup.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('temp/css/frontend_style_blue.css')); ?>" rel="stylesheet">

</head>


<body class="d-flex flex-column h-100 auth-page">
    <!-- ======= Loginup Section ======= -->
    <section class="auth">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6 ">
                    <div class="text-center">
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <?php echo e(Session::get('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card text-left">
                        <h2 class="text-center mt-3"> A 2FA authentication code has been sent to your email, kindly check your email and enter code below to continue.</h2>
                        <form method="POST" action="<?php echo e(route('2fa')); ?>" class="mt-5 card__form">
                            <?php echo e(csrf_field()); ?> 
                            
                            
                            <div class="form-group">
                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('2fa')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <label for="password">Two Factor Authentication</label>
                                <input type="text" class="form-control"name="2fa" id="2fa" placeholder="Enter the code you receive here" required>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success mt-4" type="submit" data-loading-text="<i class='fa fa-refresh fa-spin '></i> Processing Order">Login</button>
                            </div>
    
                            
                            <div class="text-center mb-1">
                                <small class=" text-center">Are you Stucked Here ?<a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="">
                                    Repeat login
                                    </a>
                                </small>
                            </div>
                            
                        </form>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    
    </section>
</body>
</html>

</html>
