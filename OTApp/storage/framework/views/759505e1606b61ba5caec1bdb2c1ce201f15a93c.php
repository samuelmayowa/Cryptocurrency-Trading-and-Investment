
	<?php echo $__env->make('home/assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="auth-page" >
	
    <!-- Wrapper Starts -->
    <div class="limiter">
        <div class="container-form user-auth">
				
				<?php if(Session::has('message')): ?>
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-warning"></i> <?php echo e(Session::get('message')); ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
				
				<div class="section-form-box">
					<div>
                        <a href="<?php echo e(url('/')); ?>" class="text-center"><img  src="<?php echo e(asset('temp/img/'.$settings->logo)); ?>" alt="<?php echo e($settings->site_name); ?>" class="text-center"> </a>
						<!-- Section Title Starts -->
					    <h3 class="mb-3 mt-2">Password reset</h3>
					
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						 <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                        <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="form">
                        <?php echo e(csrf_field()); ?>


                        <div class="form__group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                            <input  id="email" type="email" class="form__input" name="email" value="<?php echo e(old('email')); ?>" required>

                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                            <label for="email" class="form__label">Email Address</label>
                        </div>

                        <div class="form__group text-center">
                            <button type="submit" class="btn btn__login mb-4">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
						<!-- Form Ends -->
                    </div>
                    <div class="form__footer text-center">
                        <p class="mt-2">  &copy; Copyright  <?php echo e(date('Y')); ?> &nbsp; <?php echo e($settings->site_name); ?> &nbsp; All Rights Reserved.</p>
                    </div>
				</div>
				
		</div>
    </div>
    <!-- Wrapper Ends -->
</body>

</html>

