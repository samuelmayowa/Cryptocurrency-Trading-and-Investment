<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";

}
?> 

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('user.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $uc = app('App\Http\Controllers\UsersController'); ?>
        <?php
        $array = \App\users::all();
        $usr = Auth::user()->id;
        ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
            <div class="content bg-<?php echo e($bg); ?>">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        <h1 class="title1 text-<?php echo e($text); ?>">Refer users to <?php echo e($settings->site_name); ?> community</h1>
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
                    
                    <div class="row">
                        <div class="col-12 text-center card bg-<?php echo e($bg); ?> shadow-lg p-3 text-<?php echo e($text); ?>">
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
                        <div class="col card p-3 shadow-lg bg-<?php echo e($bg); ?>">
                            <h2 class="title1 text-<?php echo e($text); ?>">Your Referrals.</h2>
                            <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                <table class="table UserTable table-hover text-<?php echo e($text); ?>"> 
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
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>