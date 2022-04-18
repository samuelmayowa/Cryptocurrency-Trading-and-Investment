<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $uc = app('App\Http\Controllers\UsersController'); ?>
<?php
$array = \App\users::all();
$usr = Auth::user()->id;
?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
                <h1 class="title1">Refer users to <?php echo e($settings->site_name); ?> community</h1>
			</div>
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

			<?php if(count($errors) > 0): ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="alert alert-danger alert-dismissable" role="alert" >
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<i class="fa fa-warning"></i> <?php echo e($error); ?>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="row mb-5">
				<div class="col-lg-8 offset-lg-2 card p-3">
                    <?php if(Auth::user()->type =="1"): ?>
                    <h2 style="text-align:center;">Add users</h2><br>
                    <form method="POST" action="<?php echo e(url('dashboard/saveuser')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name">Full Name</label>
                            <div>
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email">Phone number</label>

                            <div>
                                <input id="phone" type="number" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required>

                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password">Password</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
				</div>
			</div>
            <div class="row">
                <div class="col-12 text-center">
                    <strong>You can refer users by sharing your referral link:</strong><br>
					<h4 style="color:green;"> <?php echo e(Auth::user()->ref_link); ?></h4> <br>
                    <h3 class="title1">
                    <small>Your sponsor</small><br>
                    <i class="fa fa-user fa-2x"></i><br>
                    <small><?php echo e($uc->getUserParent($usr)); ?></small>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col card p-3">
                    <h3 class="title1">Your clients.</h3>
                    <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                        <table class="table table-hover"> 
                            <thead> 
                                <tr> 
                                    <th>Client name</th>
                                    <th>Ref. level</th>
                                    <th>Parent</th>
                                    <th>Client status</th>
                                    <th>Date registered</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                <?php echo $uc->getdownlines($array,$usr); ?>

                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
            
	</div>
		
	<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	