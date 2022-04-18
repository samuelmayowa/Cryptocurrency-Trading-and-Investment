<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				
			</div>
			<div class="row mb-5">
				<div class="col text-center">
					<h1 class="title1"><?php echo e($settings->site_name); ?> Support</h1>
					<div class="sign-up-row widget-shadow">
						<h4>For inquiries, suggestions or complains. Mail us at</h4>
						<h5 style="margin-top:20px;"><?php echo e($settings->contact_email); ?>

					</div>
				</div>
			</div>
            
	</div>
		
	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	