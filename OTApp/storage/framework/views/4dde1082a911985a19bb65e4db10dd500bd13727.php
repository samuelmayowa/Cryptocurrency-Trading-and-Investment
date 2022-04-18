<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- main content start-->
		<div id="page-wrapper" style="padding-left:0px; padding-right:5px;">
			<div class="main-page mp">
				<div class="sign-u" style="background-color:#fff; padding:0px 15px 5px 15px;">
						<div class="sign-up1">
							<h4><i class="fa fa-bell"></i> <?php echo e($settings->update); ?></h4>
						</div>
					<div class="clearfix"> </div>
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
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <i class="fa fa-warning"></i> <?php echo e($error); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>


				<div class="row-one" style="margin-top:20px; text-align:center;">
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-briefcase fa-stack-1x"></i>
                        </span>
					    DEPOSITED
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
						    <?php $__currentLoopData = $deposited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						    <?php if(!empty($deposited->count)): ?>
							<?php echo e($settings->currency); ?><?php echo e($deposited->count); ?>

							<?php else: ?>
							<?php echo e($settings->currency); ?>0.00
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</h3>
					</div>
					
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon2-background"></i>
                          <i class="fa fa-lock fa-stack-1x"></i>
                        </span>
					    PROFIT
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							<?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?>

						</h3>
					</div>
					
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon3-background"></i>
                          <i class="fa fa-gift fa-stack-1x"></i>
                        </span>
					    BONUS
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							<?php echo e($settings->currency); ?> <?php echo e(number_format($total_bonus->bonus, 2, '.', ',')); ?>

						</h3>
					</div>
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon3-background"></i>
                          <i class="fa fa-bullhorn fa-stack-1x"></i>
                        </span>
					    REF. BONUS
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							<?php echo e($settings->currency); ?><?php echo e(number_format($ref_earnings, 2, '.', ',')); ?>

						</h3>
					</div>

					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-money fa-stack-1x"></i>
                        </span>
					    BALANCE
					    </h4>
						<h3 style="color:green; margin-top:20px; text-align:center;" title="Your account balance">
							<?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?>

						</h3>
					</div>

					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-unlock fa-stack-1x"></i>
                        </span>
					    TOTAL PACKAGES
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
						<?php if(count($user_plan)>0): ?>
						   <?php echo e($user_plan->count()); ?>

						<?php else: ?>
							0
						<?php endif; ?>
						</h3>
					</div>
					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-unlock-alt fa-stack-1x" ></i>
						</span>
						ACTIVE PACKAGES
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
							<?php if(count($user_plan_active)>0): ?>
						   <?php echo e($user_plan_active->count()); ?>

							<?php else: ?>
								0
							<?php endif; ?>
						</h3>
					</div>
					<!--
					<?php if(empty($uplan)): ?>
					<div class="col-md-3 rp" style="text-align:center; color:#fa3425;">
					<h4>Activate account!<br>
					<small>
					<a style="background-color:#fa3425; color:#fff; padding:4px;" href="<?php echo e(url('dashboard/mplans')); ?>">Join a plan</a> 
					</small>
					</h4>
					</div>
					<?php else: ?>
					<div class="col-md-3 rp">
						<h4>
						    <small>Current plan</small><br>
						    <strong><?php echo e($uplan->name); ?></strong>
							 
						</h4>
					</div>
					<?php endif; ?>	
					-->
				</div>
				<div class="row">
					
				</div>
				<div class="clearfix"> </div>
			</div>
			
			<div id="chart-page">
                <?php echo $__env->make('chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        	</div>
		</div>	
	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	