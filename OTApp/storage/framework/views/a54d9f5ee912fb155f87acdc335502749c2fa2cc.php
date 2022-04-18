<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1"><?php echo e($settings->site_name); ?> account verification list</h3>
				
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

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Full name</th> 
								<th>Email</th> 
								<th>KYC tatus</th>
								<th>Action</th> 
							</tr> 
						</thead> 
						<tbody> 
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr> 
								<th scope="row"><?php echo e($list->id); ?></th>
								 <td><?php echo e($list->name); ?></td> 
								 <td><?php echo e($list->email); ?></td> 
								 
								 <td><?php echo e($list->account_verify); ?></td> 
								 <td>
								<a href="#"  data-toggle="modal" data-target="#viewkycIModal<?php echo e($list->id); ?>" class="btn btn-default"><i class="fa fa-eye"></i> ID</a>
								<a href="#" data-toggle="modal" data-target="#viewkycPModal<?php echo e($list->id); ?>" class="btn btn-default"><i class="fa fa-eye"></i> Passport</a>
								
								<a href="<?php echo e(url('dashboard/acceptkyc')); ?>/<?php echo e($list->id); ?>" class="btn btn-default">Accept</a>
								 <a href="<?php echo e(url('dashboard/rejectkyc')); ?>/<?php echo e($list->id); ?>" class="btn btn-default">Reject</a>
								 </td> 
							</tr> 

                            <!-- View KYC ID Modal -->
            			<div id="viewkycIModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
            			  <div class="modal-dialog">
            
            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title" style="text-align:center;">KYC verification - ID card view</h4>
            			      </div>
            			      <div class="modal-body">
                                    <img src="<?php echo e($settings->site_address); ?>/cloud/app/images/<?php echo e($list->id_card); ?>" style="max-width:100%; height:auto;">
            			      </div>
            			    </div>
            			  </div>
            			</div>
            			<!-- /view KYC ID Modal -->
            			
            			<!-- View KYC Passport Modal -->
            			<div id="viewkycPModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
            			  <div class="modal-dialog">
            
            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title" style="text-align:center;">KYC verification - Passport view</h4>
            			      </div>
            			      <div class="modal-body">
                                    <img src="<?php echo e($settings->site_address); ?>/cloud/app/images/<?php echo e($list->passport); ?>" style="max-width:100%; height:auto;">
            			      </div>
            			    </div>
            			  </div>
            			</div>
            			<!-- /view KYC Passport Modal -->
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>