<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1">Available Plans</h1>
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
				<div class="col-lg-12 mt-2">
					<a class="btn btn-light" href="#" data-toggle="modal" data-target="#plansModal"><i class="fa fa-plus"></i> New plan</a> <br> <br>
					<h2>Main plans</h2>
				</div>
				<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 p-3">
					<div class="card-body shadow rounded">
						<h3 class="bg-primary text-white"style="padding:20px;">
						<?php echo e($plan->name); ?>

						<?php if(Auth::user()->type=="1"): ?>
						<a href="#" data-toggle="modal" data-target="#editplansModal<?php echo e($plan->id); ?>" class="btn btn-dark" style="color:white"><i class="fa fa-paint-brush text-white" style="color:white"></i></a>&nbsp; &nbsp;
						<a href="<?php echo e(url('dashboard/trashplan')); ?>/<?php echo e($plan->id); ?>" class="btn btn-dark text-white"><i class="text-white fa fa-times"></i></a>
						<?php endif; ?>
						</h3>
						<div style="padding:20px; text-align:center;">
						<h4><strong><?php echo e($settings->currency); ?><?php echo e($plan->price); ?>+</strong><br><br><small> <b>Min. Possible deposit:</b>  <?php echo e($settings->currency); ?><?php echo e($plan->min_price); ?> <br><b>Max. Possible deposit:</b> <?php echo e($settings->currency); ?><?php echo e($plan->max_price); ?></small></h4>
							<hr>
							<p><i class="fa fa-star"></i><?php echo e($settings->currency); ?><?php echo e($plan->minr); ?> Minimum return</p>
							<hr>
							<p><i class="fa fa-star"></i><?php echo e($settings->currency); ?><?php echo e($plan->maxr); ?> Maximum return</p>
							<hr>
							<p><i class="fa fa-gift"></i> <?php echo e($settings->currency); ?><?php echo e($plan->gift); ?> Gift Bonus</p>
							<hr>
							<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Controller@joinplan')); ?>">
								<label>Amount to invest: (<?php echo e($settings->currency); ?><?php echo e($plan->price); ?> default)</label><br><br>
								<input type="number" min="<?php echo e($plan->min_price); ?>" max="<?php echo e($plan->max_price); ?>" name="iamount" placeholder="<?php echo e($settings->currency.$plan->price); ?>" class="form-control">
								<hr>
									<label>Select investment duration</label><br/>
									<select class="form-control" name="" style="border:0px solid #fff; height:50px; font-weight:bold;" disabled>
										<option><?php echo e($plan->expiration); ?></option>
									</select><br>
									<input type="hidden" name="duration" value="<?php echo e($plan->expiration); ?>">
									<input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<input type="submit" class="btn btn-default bg-primary btn-block" value="Join plan">
							</form>
						</div>
					</div>
					<!-- Edit plan modal -->
					<div id="editplansModal<?php echo e($plan->id); ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header bg-dark">
								<h4 class="modal-title" style="text-align:center;">Update plan / package</h4>
								<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body bg-dark">
								<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Controller@updateplan')); ?>">
								<label>Plan name</label><br/>	   
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->name); ?>" type="text" name="name" required><br/>
								<label>Plan price</label><br/>		 
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->price); ?>" type="text" name="price" required><br/>
								<label>Plan MIN. price</label><br/>		 
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->min_price); ?>" type="text" name="min_price" required><br/>
								<label>Plan MAX. price</label><br/>		 
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->max_price); ?>" type="text" name="max_price" required><br/>
								<label>Minimum return</label><br/>
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->minr); ?>" placeholder="Enter minimum return" type="text" name="minr" required><br/>
								<label>Maximum return</label><br/>
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->maxr); ?>"  placeholder="Enter maximum return" type="text" name="maxr" required><br/>
								<label>Gift Bonus</label><br/>
								<input style="padding:5px;" class="form-control" value="<?php echo e($plan->gift); ?>"  placeholder="Enter Additional Gift Bonus" type="text" name="gift" required><br/>
								
								
								
											<label>top up interval</label><br/>
										<select class="form-control" name="t_interval">
												<option><?php echo e($plan->increment_interval); ?></option>
												<option>Monthly</option>
												<option>Weekly</option>
												<option>Daily</option>
												<option>Hourly</option>
											</select><br>
											<label>top up type</label><br/>
										<select class="form-control" name="t_type">
												<option><?php echo e($plan->increment_type); ?></option>
												<option>Percentage</option>
												<option>Fixed</option>
											</select><br>
											<label>top up amount (in % or $ as specified above)</label><br/>
										<input style="padding:5px;" class="form-control" value="<?php echo e($plan->increment_amount); ?>" placeholder="top up amount" type="text" name="t_amount" required><br/>
										<label>Investment duration</label><br/>
										<select class="form-control" name="expiration">
												<option><?php echo e($plan->expiration); ?></option>
												<option>One week</option>
												<option>One month</option>
												<option>Three months</option>
												<option>Six months</option>
												<option>One year</option>
											</select><br>
										<input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
										<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
										<input type="submit" class="btn btn-primary" value="Submit">
								</form>
							</div>
							</div>
						</div>
						</div>
						<!-- /edit plans Modal -->
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
            
	</div>
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>