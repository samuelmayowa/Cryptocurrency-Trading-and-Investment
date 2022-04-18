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
					<div class="mt-2 mb-4">
					<h1 class="title1 text-<?php echo e($text); ?>">Notification</h1>
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
						<div class="col card bg-<?php echo e($bg); ?> shadow-lg">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								<table class="table table-hover  text-<?php echo e($text); ?>"> 
									<thead> 
										<tr> 
											<th>Message</th>
											<th>Recieve Date</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										<?php $__currentLoopData = $Notif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<td> <a href="#" data-toggle="modal" data-target="#message<?php echo e($notification->id); ?>" class=" "> <?php echo e(substr($notification->message,0,85)); ?> </a> </td> 
											<td> <?php echo e(\Carbon\Carbon::parse($notification->created_at)->toDayDateTimeString()); ?></td> 
											<td> <a href="<?php echo e(url('dashboard/delnotif')); ?>/<?php echo e($notification->id); ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a> 
											</td>
										</tr> 
		
										<div id="message<?php echo e($notification->id); ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
													<div class="modal-header .modal-dialog-centered bg-<?php echo e($bg); ?>">
														<button type="button" class="close  text-<?php echo e($text); ?>" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body bg-<?php echo e($bg); ?>">
														<div class="font-italic">
															<p class="text-<?php echo e($text); ?>"><?php echo e($notification->message); ?></p>
														</div>
													</div>
													</div>
												</div>
												</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
				
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>