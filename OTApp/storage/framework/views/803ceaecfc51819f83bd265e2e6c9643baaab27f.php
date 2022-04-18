<?php
	if (Auth::user()->dashboard_style == "light") {
		$bg="light";
		$text = "dark";
	} else {
		$bg="dark";
		$text = "light";
	}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('user.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
            <div class="content bg-<?php echo e($bg); ?>">
                <div class="page-inner">
                    <div class="mt-2 mb-5">
                        <h1 class="title1 text-<?php echo e($text); ?>">Change Your password</h1> <br> <br>
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
                                <button type="button" clsass="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <i class="fa fa-warning"></i> <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row mb-5">
                        <div class="col-lg-8 offset-lg-2 card p-4 shadow-lg bg-<?php echo e($bg); ?>">
                            <form method="post" action="<?php echo e(action('UsersController@updatepass')); ?>">
                                <div class="form-control bg-<?php echo e($bg); ?> mb-2">
                                    <h5 class="text-<?php echo e($text); ?>">Old Password</h5>
                                    <input type="password" name="old_password" class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" required>
                                </div>
                                <div class="form-control bg-<?php echo e($bg); ?> mb-2">
                                    <h5 class="text-<?php echo e($text); ?>">New Password* :</h5>
                                    <input type="password" name="password" class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" required>
                                </div>
                                <div class="form-control bg-<?php echo e($bg); ?> mb-2">
                                    <h5 class="text-<?php echo e($text); ?>">Confirm Password*:</h5>
                                    <input type="password" name="password_confirmation" class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" required>
                                </div> <br>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    
                                <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
                                <input type="hidden" name="current_password" value="<?php echo e(Auth::user()->password); ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>