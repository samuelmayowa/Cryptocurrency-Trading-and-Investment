<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h1 class="title1">System Settings</h1>
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
				<div class="col">
					<nav>
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

						  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> <i class="fa fa-home"></i>  Website Information</a>

						  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-desktop"></i>  Website Settings/Preference</a>

						  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="nav-contact" aria-selected="false">Bot Settings</a>

						  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#4" role="tab" aria-controls="nav-about" aria-selected="false">Bonus/Ref. commission</a>

						  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#5" role="tab" aria-controls="nav-contact" aria-selected="false">Payment/Settings</a>

						  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#6" role="tab" aria-controls="nav-about" aria-selected="false">Subscription Fees</a>

						  

						  

						</div>
					</nav>


					<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

						
						<div class="tab-pane fade show active card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
							<?php echo $__env->make('includes.webinfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade card p-3" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
							<?php echo $__env->make('includes.websettings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade card p-3" id="3" role="tabpanel" aria-labelledby="nav-contact-tab">
							<?php echo $__env->make('includes.botsettings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade card p-3" id="4" role="tabpanel" aria-labelledby="nav-about-tab">
							<?php echo $__env->make('includes.bonus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade card p-3" id="5" role="tabpanel" aria-labelledby="nav-about-tab">
							<?php echo $__env->make('includes.payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade p-4 card" id="6" role="tabpanel" aria-labelledby="nav-about-tab">
							<?php echo $__env->make('includes.subscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						</div>

						
						<div class="tab-pane fade  card" id="7" role="tabpanel" aria-labelledby="nav-about-tab">
						
						</div>

						
						<div class="tab-pane fade card" id="8" role="tabpanel" aria-labelledby="nav-about-tab">
						
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php echo $__env->make('modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<script type="text/javascript">
		var badWords = [ 
			'<!--Start of Tawk.to Script-->',
			'<script type="text/javascript">', 
			'<!--End of Tawk.to Script-->'
					];
		$(':input').on('blur', function(){
			var value = $(this).val();
			$.each(badWords, function(idx, word){
			value = value.replace(word, '');
			});
			$(this).val( value);
		});
	</script>

	<script type="text/javascript">
	// $(window).on('load',function(){
	//  $('#s_updModal').modal('show');
	// });
	</script>
	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	