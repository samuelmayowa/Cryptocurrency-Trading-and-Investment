<?php echo $__env->make('home.assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="d-flex flex-column h-100 auth-page">
    <!-- ======= Loginup Section ======= -->
    <section class="auth">
        <div class="container">
            <div class="row justify-content-center user-auth">
                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6 ">
                    <div class="text-center">
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(Session::get('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        </div>
                        <?php endif; ?>

                        <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('status')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <?php endif; ?>   
                    </div>
                        
                    <div class="card ">
                        <h1 class="text-center mt-3">Password Reset</h1>
                        <form method="POST" action="<?php echo e(route('password.email')); ?>" class="mt-5 card__form">
                            <?php echo e(csrf_field()); ?> 
                            
                            <div class="form-group ">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="email">Email address</label>
                                <small>The email address used in registration</small> <br>
                                <input type="email" class="form-control <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" name ="email" value="<?php echo e(old('email')); ?>" id="email" placeholder="name@example.com" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary mt-4" type="submit" >Send Reset Link</button>
                            </div>
                            <div class="text-center mb-3">
                                <small class=" text-center mb-2"> <a href="<?php echo e(route('login')); ?>">Repeat Login.</a> </small>
                            </div>

                            <div class="text-center">
                                <hr>
                                <small class=" text-center">&copy; Copyright  <?php echo e(date('Y')); ?> &nbsp; <?php echo e($settings->site_name); ?> <br> All Rights Reserved.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
</body>
</html>