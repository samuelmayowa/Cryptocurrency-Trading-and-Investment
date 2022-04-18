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
						<h1 class="title1 text-<?php echo e($text); ?>">Make Payment</h1>
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
					<div class="row">
						<div class="col card bg-<?php echo e($bg); ?> shadow-lg p-4">
							<?php if($title=="Complete Payment"): ?>
								<div class="alert-success text-center p-5">
									<h4 class="text-<?php echo e($text); ?>">You are to send <strong><?php echo e($amount); ?> <?php echo e($coin); ?></strong> to the address below or scan the QR code to complete payment.</h4>
									<h4 class="text-<?php echo e($text); ?>"><strong><?php echo e($p_address); ?></strong></h4><br>
									<img width="220" height="220" alt="Payment QR code" src="<?php echo e($p_qrcode); ?>">
								</div>
							<?php elseif($title == "Pay with card"): ?>
								<form action="charge" method="post">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
										data-key="<?php echo e($settings->s_p_k); ?>"
										data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
										data-name="<?php echo e($settings->site_name); ?>"
										data-description="Account fund"
										data-amount="<?php echo e($t_p); ?>"
										data-locale="auto">
									</script>
								</form>
							<?php else: ?>
							<div class="mb-3 text-<?php echo e($text); ?>">
								<h4>You are to make payment of <strong><?php echo e($settings->currency); ?><?php echo e($amount); ?></strong> using your preferred mode of payment below.</h4>
								<?php 
									$pmodes = str_split($settings->payment_mode);
								?>
							</div>
							<div class="row">
								<?php $__currentLoopData = $pmodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($pmode==1): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
													<strong>Bank deposit/transfer </strong>
													<img src="<?php echo e(asset('home/images/bank-transfer.png')); ?>" width="70px;" height="40px;"> 
													</a>
												</h4>
												<div id="bank" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-<?php echo e($text); ?>"><strong>Bank name:</strong> <?php echo e($settings->bank_name); ?>.</h4>
														<h4 class="text-<?php echo e($text); ?>"><strong>Account name:</strong> <?php echo e($settings->account_name); ?>.</h4>
														<h4 class="text-<?php echo e($text); ?>"><strong>Account number:</strong> <?php echo e($settings->account_number); ?>.</h4>
													</div>
												</div>	
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==2): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
													<strong>Bitcoin</strong>
													<img src="<?php echo e(asset('home/images/btc.png')); ?>" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="btc" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-<?php echo e($text); ?>">
														<strong>BTC Address:</strong> <?php echo e($settings->btc_address); ?>

														
														<br/><br/>
														<?php if($settings->withdrawal_option != "manual"): ?>
														<a href="<?php echo e(url('dashboard/cpay')); ?>/<?php echo e($amount); ?>/BTC/<?php echo e(Auth::user()->id); ?>/new" class="btn btn-<?php echo e($text); ?>">Automatic payment method</a>
														<?php endif; ?>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==3): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
													<strong>Ethereum</strong>
													<img src="<?php echo e(asset('home/images/eth.png')); ?>" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="eth" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-<?php echo e($text); ?>">
														<strong>ETH Address:</strong> <?php echo e($settings->eth_address); ?>

														
														<br/><br/>
														<?php if($settings->withdrawal_option != "manual"): ?>
														<a href="<?php echo e(url('dashboard/cpay')); ?>/<?php echo e($amount); ?>/ETH/<?php echo e(Auth::user()->id); ?>/new" class="btn btn-<?php echo e($text); ?>">Automatic payment method</a>
														<?php endif; ?>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==4): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
													<strong>Litecoin</strong>
													<img src="<?php echo e(asset('home/images/ltc.png')); ?>" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="ltc" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-<?php echo e($text); ?>">
														<strong>LTC Address:</strong> <?php echo e($settings->ltc_address); ?>

														<br/><br/>
														<?php if($settings->withdrawal_option != "manual"): ?>
														<a href="<?php echo e(url('dashboard/cpay')); ?>/<?php echo e($amount); ?>/LTC/<?php echo e(Auth::user()->id); ?>/new" class="btn btn-<?php echo e($text); ?>">Automatic payment method</a>
														<?php endif; ?>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==5): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4 class="text-<?php echo e($text); ?>">
													<a style="text-decoration:none;"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#stripe">
													<strong>Credit card 
													<img src="<?php echo e(asset('home/images/c3.jpg')); ?>" width="70px;" height="40px;"> 
													<img src="<?php echo e(asset('home/images/c2.jpg')); ?>" width="70px;" height="40px;">
													</strong>
													</a>
												</h4>
												<div id="stripe" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-<?php echo e($text); ?>"> <br>
														<a href="<?php echo e(url('dashboard/paywithcard')); ?>/<?php echo e($amount); ?>" class="btn btn-<?php echo e($text); ?>">Pay with card</a>
														
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==6): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4 class="text-<?php echo e($text); ?>">
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paypal">
													<strong>PayPal</strong> <img src="<?php echo e(asset('home/images/pp.png')); ?>" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="paypal" class="panel-collapse collapse">
													<h4 class="text-<?php echo e($text); ?>">
														<?php echo $__env->make('includes.paypal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
													</h4>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php if($pmode==7): ?>
									<div class="col-lg-4">
										<div class="card bg-<?php echo e($bg); ?> shadow text-<?php echo e($text); ?>">
											<div class="card-body">
												<h4 class="text-<?php echo e($text); ?>">
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paystack">
													<strong>Paystack</strong> <img src="<?php echo e(asset('home/images/paystack.png')); ?>" width="100px;">
													</a>
												</h4>
												<?php $payamount = $amount * 100  ?>
												<div id="paystack" class="panel-collapse collapse pt-3">
													<form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
														<input type="hidden" name="email" value="<?php echo e(auth::user()->email); ?>">
														<input type="hidden" name="amount" value="<?php echo e($payamount); ?>">
														<input type="hidden" name="currency" value="<?php echo e($settings->s_currency); ?>">
														<input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',])); ?>" > 
														<input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
														<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
														<p>
														<button class="btn btn-primary py-2" type="submit" value="Pay Now!">
														<i class="fa fa-credit-card fa-lg"></i> Pay with Card
														</button>
														</p>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div> <br> <br>
							
							<div>
								<form method="post" action="<?php echo e(action('SomeController@savedeposit')); ?>" enctype="multipart/form-data">
										<h5 class="text-<?php echo e($text); ?>">Upload Payment proof after payment. (Ignore if paid with card).</h5>
										<input type="file" name="proof" class="form-control col-lg-4 bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" required>
									<br>
									
									<h5 class="text-<?php echo e($text); ?>">Payment Mode Used:</h5>
									<select name="payment_mode" class="form-control col-lg-4 bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" required>
										<option>Bank transfer</option>
										<option>Ethereum</option>
										<option>Bitcoin</option>
										<option>Credit card</option>
									</select>
									<br> <br>
									<div >
										<input type="submit" class="btn btn-<?php echo e($text); ?>" value="Submit payment">
									</div> 
									<input type="hidden" name="amount" value="<?php echo e($amount); ?>">
									<input type="hidden" name="pay_type" value="<?php echo e($pay_type); ?>">
									<input type="hidden" name="plan_id" value="<?php echo e($plan_id); ?>">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								</form>
							</div>
							<?php endif; ?>
						</div>
					</div>







				</div>
			</div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>