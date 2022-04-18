<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
			<h3 class="title1">Agents</h3>
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
				<div class="col-12 card p-3">
					<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<a href="#" data-toggle="modal" data-target="#addagentModal" class="btn btn-light btn-lg" style="margin:10px;"> <i class="fa fa-plus"></i> Add agent</a>
						<table class="table table-hover"> 
							<thead> 
								<tr> 
									<th>Agent name</th>
									<th>Clients referred</th>
									<!--<th>Clients activated</th>
									<th>Earnings</th>-->
									<th>Option(s)</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr> 
									<td><?php echo e($agent->duser->name); ?></td> 
									<td><?php echo e($agent->total_refered); ?></td> 
									<!--<td><?php echo e($agent->total_activated); ?></td> 
									<td><?php echo e($agent->earnings); ?></td>-->
									<td>
										<a href="<?php echo e(url('dashboard/viewagent')); ?>/<?php echo e($agent->agent); ?>" title="View agent clients">
										<i class="fa fa-eye"></i>
										</a> | 
										
										<a href="<?php echo e(url('dashboard/delagent')); ?>/<?php echo e($agent->id); ?>" style="color:red;" title="Remove agent clients">
										<i class="fa fa-times"></i>
										</a>
									</td> 
								</tr> 
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody> 
							<!-- Add agent Modal -->
									<div id="addagentModal" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header bg-dark">
										
										<h4 class="modal-title" style="text-align:center;"><strong>Add agent.</strong></h4>
										<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body bg-dark">
											<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('UsersController@addagent')); ?>">
												<select class="form-control" name="user">
													<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select><br>	    
												<input style="padding:5px;" class="form-control" placeholder="Increment referred users" type="number" min="0" name="referred_users" value="0"><br/>
												<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
												<input type="submit" class="btn btn-light" value="Submit">
										</form>
									</div>
									</div>
								</div>
								</div>
								<!-- /Add agent Modal -->
						</table>
					</div>
				</div>
			</div>
	</div>
<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>