<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h3 class="title1">Available packages</h3>
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
				<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 p-4">
					<div class="card-body shadow border-danger">
							<div class="sign-up-row widget-shadow nav-pills p-0">
							<h3 style="text-align:center; color:white; padding:20px;" class="bg-primary ">
							<?php echo e($plan->name); ?>

						
							</h3>
							<div style="padding:15px; text-align:center;">
								<h4><strong><?php echo e($settings->currency); ?><?php echo e($plan->price); ?>+</strong><br><br><small> <b>Min. Possible deposit:</b>  <?php echo e($settings->currency); ?><?php echo e($plan->min_price); ?> <br><b>Max. Possible deposit:</b> <?php echo e($settings->currency); ?><?php echo e($plan->max_price); ?></small></h4>
								<hr>
								<p><i class="fa fa-star"></i><?php echo e($settings->currency); ?><?php echo e($plan->minr); ?> Minimum return</p>
								<hr>
								<p><i class="fa fa-star"></i><?php echo e($settings->currency); ?><?php echo e($plan->maxr); ?> Maximum return</p>
								<hr>
								<hr>
								<p><i class="fa fa-gift"></i> <?php echo e($settings->currency); ?><?php echo e($plan->gift); ?> Gift Bonus</p>
								<hr>
								<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Controller@joinplan')); ?>">
									<label>Amount to invest: (<?php echo e($settings->currency); ?><?php echo e($plan->price); ?> default)</label><br><br>
									<input type="number" min="<?php echo e($plan->min_price); ?>" max="<?php echo e($plan->max_price); ?>" name="iamount" placeholder="<?php echo e($settings->currency.$plan->price); ?>" class="form-control">
									<hr>
										<label>Select investment duration</label><br/>
										<select class="form-control text-white" name="" style="border:0px solid #fff; height:50px; font-weight:bold;" disabled>
											<option><?php echo e($plan->expiration); ?></option>
										</select><br>

										<input type="hidden" name="duration" value="<?php echo e($plan->expiration); ?>">

										<input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<input type="submit" class="btn btn-block pricing-action btn-primary nav-pills" value="Join plan" style=" border-radius: 40px;">
								</form>
							</div>
						</div>
					</div>
					
				</div>

					<!-- Deposit for a plan Modal -->
					<div id="depositModal<?php echo e($plan->id); ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header bg-dark">
							<h4 class="modal-title" style="text-align:center;">Make a deposit of <strong><?php echo e($settings->currency); ?><?php echo e($plan->price); ?> to join this plan</strong></h4>
								<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
							</div>
						<div class="modal-body bg-dark">
							<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@deposit')); ?>">
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->price); ?>" type="text" name="amount" required><br/>
								
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<input type="hidden" name="pay_type" value="plandeposit">
								<input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
								<input type="submit" class="btn btn-default" value="Continue">
						</form>
					</div>
					</div>
				</div>
				</div>
				<!-- /deposit for a plan Modal -->
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
            
	</div>
		
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>