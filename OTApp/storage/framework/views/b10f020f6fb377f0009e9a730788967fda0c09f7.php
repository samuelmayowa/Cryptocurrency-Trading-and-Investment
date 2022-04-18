<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="main-panel bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
			<div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> account verification list</h1>
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
						<div class="col card p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> shadow">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								<table class="table table-hover  text-<?php echo e($text); ?>"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Full name</th> 
											<th>Email</th> 
											<th>KYC Status</th>
											<th>Action</th> 
										</tr> 
									</thead> 
									<tbody> 
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<th scope="row"><?php echo e($list->id); ?></th>
											 <td><?php echo e($list->name); ?> <?php echo e($list->l_name); ?> </td> 
											 <td><?php echo e($list->email); ?></td> 
											 
											 <td><?php echo e($list->account_verify); ?></td> 
											 <td>
											<a href="#"  data-toggle="modal" data-target="#viewkycIModal<?php echo e($list->id); ?>" class="btn btn-<?php echo e($text); ?> btn-sm"><i class="fa fa-eye"></i> ID</a>
											<a href="#" data-toggle="modal" data-target="#viewkycPModal<?php echo e($list->id); ?>" class="btn btn-<?php echo e($text); ?> btn-sm"><i class="fa fa-eye"></i> Passport</a>
											
											<a href="<?php echo e(url('admin/dashboard/acceptkyc')); ?>/<?php echo e($list->id); ?>" class="btn btn-primary btn-sm">Accept</a>
											 <a href="<?php echo e(url('admin/dashboard/rejectkyc')); ?>/<?php echo e($list->id); ?>" class="btn btn-danger btn-sm">Reject</a>
											 </td> 
										</tr> 
			
										<!-- View KYC ID Modal -->
									<div id="viewkycIModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
						
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
											<h4 class="modal-title text-<?php echo e($text); ?>">KYC verification - ID card view</h4>
											<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
										  </div>
										  <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
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
										  <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> ">
											<h4 class="modal-title text-<?php echo e($text); ?>">KYC verification - Passport view</h4>
											<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
										  </div>
										  <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
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
				</div>
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>