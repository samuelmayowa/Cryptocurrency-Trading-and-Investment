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
        <div class="main-panel bg-<?php echo e($bg); ?>">
			<div class="content bg-<?php echo e($bg); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>">Subscription Trade</h1>
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
						<div class="col-lg-8 offset-lg-2 card bg-<?php echo e($bg); ?> shadow-lg p-5">
						<h2 class="text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> Account manager</h2> <br>
							<div clas="well">
							<p class="text-justify text-<?php echo e($text); ?>">Don’t have time to trade or learn how to trade? 
							Our Account Management Service is The Best Profitable Trading Option for you, 
							We can help you to manage your account in the financial MARKET with a simple subscription model.<br>
							<small>Terms and Conditions apply</small><br>Reach us at <?php echo e($settings->contact_email); ?> 
							for more info.</p>
							</div>
							<br>
							<div>
								<a type="button" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#SubpayModal">
								Subscribe Now
								</a> &nbsp; &nbsp; &nbsp;
								<a type="button" class="btn btn-danger text-white mb-2" data-toggle="modal" data-target="#submitmt4modal">
								Submit MT4 Details
								</a>	
							</div>
							
						</div>
					</div>
				</div>	
			</div>
			<?php echo $__env->make('user.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>