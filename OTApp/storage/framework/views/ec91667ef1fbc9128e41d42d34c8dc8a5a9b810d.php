<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Trading Packs</h3>
				
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

				<a class="btn btn-lg btn-default" href="<?php echo e(url('dashboard/addeditpack')); ?>/new"><i class="fa fa-plus"></i> Add new pack</a>

                <div class="containter">
						<div class="row">
						<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<div class="col-lg-4">
							<div class="sign-up-row widget-shadow" style="width:100%;">
								<span style="padding:2px;">
								<?php if(Auth::user()->type=="1"): ?>
								<a href="<?php echo e(url('dashboard/addeditpack')); ?>/<?php echo e($plan->id); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>&nbsp; &nbsp;
								<a href="<?php echo e(url('dashboard/trashpack')); ?>/<?php echo e($plan->id); ?>" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
								<?php endif; ?>
								</span>
								
								<hr>

								<h3 class="text-center"><?php echo e($plan->name); ?></h3>
								<hr>
								<h3 class="text-center"><?php echo e($settings->currency.$plan->price); ?></h3>
								<hr>

								<div style="padding:20px;" class="text-center">
									<form style="padding:3px;" role="form" method="post" action="#">
					                        <label>View currency and % share</label><br/>
											<select class="form-control" name="" style="border:0px solid #fff; height:50px; font-weight:bold;">
												<?php if($plan->cur_1 != NULL): ?>	
												<option><?php echo e($plan->cur_1); ?> - <?php echo e($plan->share_1); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_2 != NULL): ?>	
												<option><?php echo e($plan->cur_2); ?> - <?php echo e($plan->share_2); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_3 != NULL): ?>	
												<option><?php echo e($plan->cur_3); ?> - <?php echo e($plan->share_3); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_4 != NULL): ?>	
												<option><?php echo e($plan->cur_4); ?> - <?php echo e($plan->share_4); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_5 != NULL): ?>	
												<option><?php echo e($plan->cur_5); ?> - <?php echo e($plan->share_5); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_6 != NULL): ?>	
												<option><?php echo e($plan->cur_6); ?> - <?php echo e($plan->share_6); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_7 != NULL): ?>	
												<option><?php echo e($plan->cur_7); ?> - <?php echo e($plan->share_7); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_8 != NULL): ?>	
												<option><?php echo e($plan->cur_8); ?> - <?php echo e($plan->share_8); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_9 != NULL): ?>	
												<option><?php echo e($plan->cur_9); ?> - <?php echo e($plan->share_9); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_10 != NULL): ?>	
												<option><?php echo e($plan->cur_10); ?> - <?php echo e($plan->share_10); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_11 != NULL): ?>	
												<option><?php echo e($plan->cur_11); ?> - <?php echo e($plan->share_11); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_12 != NULL): ?>	
												<option><?php echo e($plan->cur_2); ?> - <?php echo e($plan->share_2); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_13 != NULL): ?>	
												<option><?php echo e($plan->cur_13); ?> - <?php echo e($plan->share_13); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_14 != NULL): ?>	
												<option><?php echo e($plan->cur_14); ?> - <?php echo e($plan->share_14); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_15 != NULL): ?>	
												<option><?php echo e($plan->cur_15); ?> - <?php echo e($plan->share_15); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_16 != NULL): ?>	
												<option><?php echo e($plan->cur_16); ?> - <?php echo e($plan->share_16); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_17 != NULL): ?>	
												<option><?php echo e($plan->cur_17); ?> - <?php echo e($plan->share_17); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_18 != NULL): ?>	
												<option><?php echo e($plan->cur_18); ?> - <?php echo e($plan->share_18); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_19 != NULL): ?>	
												<option><?php echo e($plan->cur_9); ?> - <?php echo e($plan->share_19); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_20 != NULL): ?>	
												<option><?php echo e($plan->cur_20); ?> - <?php echo e($plan->share_20); ?>%</option>
												<?php endif; ?>
												<?php if($plan->cur_21 != NULL): ?>	
												<option><?php echo e($plan->cur_21); ?> - <?php echo e($plan->share_21); ?>%</option>
												<?php endif; ?>
												
            								</select><br>
            					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
										   <a href="<?php echo e(url('dashboard/buypack')); ?>/<?php echo e($plan->id); ?>" class="btn btn-success btn-lg">Buy investment pack</a>
            					   </form>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>