
	<?php echo $__env->make('home/assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="auth-page" style="background-color:#e9e9e9;">
	
    <!-- Wrapper Starts -->
    <div class="wrapper">
        <div class="container user-auth" style="padding:40px;">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-md-5 col-lg-5" style="background:#fff; padding:40px;">
				<!-- Logo Starts -->
				<a class="visible-xs" href="<?php echo e(url('/')); ?>" style="text-align:center; color:#555;">
				<h3><?php echo e($settings->site_name); ?></h3>
				<!-- <img id="logo" class="img-responsive" src="<?php echo e(asset('images/'.$settings->logo)); ?>" alt="logo">-->
				</a>
				<!-- Logo Ends -->
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
				<?php if($rmessage!=""): ?>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-ok"></i> <?php echo e($rmessage); ?>

                        </div>
                    </div>
                </div>
				<?php endif; ?>
				<div class="form-container">
					<div>
						<!-- Section Title Starts -->
						<div class="row text-center">
							<h2 class="title-head" style="font-size:1.5em; color:#555;">member login</h2>
						</div>
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						<form  class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
							<?php echo e(csrf_field()); ?>	
						<!-- Input Field Starts -->
							<div class="form-group">
							<?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
								<input style="background:transparent; color:#555;" class="form-control" name="email" id="email" placeholder="ENTER YOUR EMAIL" name="email" type="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            
                               
                            </div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
								<input style="background:transparent; color:#555;" class="form-control" id="password" name="password" id="password" placeholder="ENTER PASSWORD" type="password" required>
								<input name="status"  type="hidden" value="active">
							</div>
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="btn btn-primary" type="submit">login</button>
								<a href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>

								<p class="text-center">Don't have an account?  <a href="<?php echo e(route('register')); ?>">register now</a></p>
							</div>
							<!-- Submit Form Button Ends -->
                        </form>
                        
						<!-- Form Ends -->
					</div>
				</div>
				<!-- Copyright Text Starts -->
				<p class="text-center copyright-text">Copyright © 2019 <?php echo e($settings->site_name); ?> All Rights Reserved</p>
				<!-- Copyright Text Ends -->
			</div>
			</div>
		</div>
    </div>
    <!-- Wrapper Ends -->
</body>

</html>
