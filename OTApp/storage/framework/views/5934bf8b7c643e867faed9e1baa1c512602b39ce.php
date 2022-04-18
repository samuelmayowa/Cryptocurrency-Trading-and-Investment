<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $rates = app('App\Http\Controllers\GetRates'); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				
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

                <div class="container">
                <h3 class="text-center">Diversify your investment accross various assets</h3><br>
                    
                    <div class="well" style=" max-height:400px; overflow: auto;">

                        <ul class="nav nav-tabs" style="margin-top:20px;">
                            <li class="active"><a data-toggle="tab" href="#assets">Investment Assets</a></li>
                            <li><a data-toggle="tab" href="#mixed_packs">Mixed investment packs</a></li>
                        </ul>

                        <div class="tab-content">
                        <div id="assets" class="tab-pane fade in active">
                        <div class="row rower" >
                        <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                    $price = round($rates->get_rate($asset->symbol, $settings->s_currency,"price"), 3 );
                                ?>

                             <div class="col-lg-4">
                            
                            <div class="card cardi text-center" style="">
                                <h2 class="card-title"><?php echo e($asset->symbol); ?></h2>
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo e($asset->name); ?></h5>
                                    <p><?php echo e($settings->currency . $price); ?></p> <br>
                                </div>
                                <div class="card-body">
                                    <a href="#" data-toggle="modal" data-target="#investModal<?php echo e($asset->symbol); ?>" class="btn btn-success inbtn btn-block rounded-0" style="border-radius: none;">Invest</a>
                                </div>
                            </div>
                            <br>


                                    <!-- Invest Modal -->
                        <div id="investModal<?php echo e($asset->symbol); ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align:center;"><?php echo e($settings->site_name); ?> Invest</h4>
                            </div>
                            <div class="modal-body">
                                    <form style="padding:3px;" id="investform<?php echo e($asset->symbol); ?>" role="form" method="post" action="javascript:void(0)">
                                        
                                        <label>Amount to invest (<?php echo e($settings->s_currency); ?>)</label>
                                        <input class="form-control" id="pinput1<?php echo e($asset->symbol); ?>" onkeyup="priceFunction<?php echo e($asset->symbol); ?>(this)" placeholder="Enter amount here" type="number" name="amount" required><br/>

                                        <label>Value</label>
                                        <input class="form-control" id="pinput2<?php echo e($asset->symbol); ?>" placeholder="Value in selected asset" type="text" disabled><br/>
                                        
                                        <input type="hidden" name="asset" value="<?php echo e($asset->symbol); ?>">
                                        <input type="hidden" name="amount2" id="pinput3<?php echo e($asset->symbol); ?>">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" class="btn btn-default" value="Invest now">
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- /Invest Modal -->

                        <script type="text/javascript">

                            //create investment
                                $("#investform<?php echo $asset->symbol; ?>").on('submit',function(){
                                $.ajax({
                                    url: "<?php echo e(url('/dashboard/invest')); ?>",
                                    type: 'POST',
                                    data:$("#investform<?php echo $asset->symbol; ?>").serialize(),
                                    success: function (response) {
                                        if(response.status ===200){
                                            swal({
                                        icon: "success",
                                        text: response.message,
                                        timer:3000,
                                        });
                                        location.reload(true);
                                        }
                                        if(response.status ===201){
                                            swal({
                                        icon: "error",
                                        text: response.message,
                                        timer:3000,
                                        });
                                        location.reload(true);
                                        }
                                        console.log(response)
                                    },
                                    error: function (data) {
                                        swal({
                                        icon: "error",
                                        text: "Something went wrong", 
                                        timer:3000,
                                        });
                                    },

                                });
                            });
    
                            //calculate investment value
                            function priceFunction<?php echo"$asset->symbol"; ?>(input2) {
                                var input1 = document.getElementById('pinput2<?php echo"$asset->symbol"; ?>');
                                var input3 = document.getElementById('pinput3<?php echo"$asset->symbol"; ?>');
                                var c_price = '<?php echo $price; ?>';
                                var calculated_price = input2.value/c_price;
                                input1.value = "<?php echo"$asset->symbol"; ?> "+ calculated_price;
                                input3.value = calculated_price;
                            }
                        </script>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                        </div>
                        </div>

                        <div id="mixed_packs" class="tab-pane fade">
                        <div class="row rower" >
                        <?php $__currentLoopData = $mix_packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                             <div class="col-lg-4">
                            <div class="card cardi text-center" style="">
                                <h2 class="card-title"><?php echo e($plan->name); ?></h2>
                                <div class="card-body">
                                    <p><?php echo e($settings->currency . $plan->price); ?></p> <br>
                                </div>
                                <div class="card-body">
                                <form style="padding:3px;" role="form" method="post" action="#">
					                        <label>View currency and % share</label><br/>
											<select class="form-control" name="" style="border:0px solid #fff; height:50px; font-weight:bold;">
                                                <?php if($plan->cur_1 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_1, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_1); ?> (Rate: <?php echo e($price); ?>) - Share: <?php echo e($plan->share_1); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_2 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_2, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_2); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_2); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_3 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_3, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_3); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_3); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_4 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_4, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_4); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_4); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_5 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_5, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_5); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_5); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_6 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_6, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_6); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_6); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_7 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_7, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_7); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_7); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_8 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_8, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_8); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_8); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_9 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_9, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_9); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_9); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_10 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_10, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_10); ?>  (Rate: <?php echo e($price); ?>) - Share: - <?php echo e($plan->share_10); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_11 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_11, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_11); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_11); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_12 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_12, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_12); ?>  (Rate: <?php echo e($price); ?>) - Share: - <?php echo e($plan->share_12); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_13 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_13, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_13); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_13); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_14 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_14, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_14); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_14); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_15 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_15, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_15); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_15); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_16 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_16, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_16); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_16); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_17 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_17, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_17); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_17); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_18 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_18, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_18); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_18); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_19 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_19, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_9); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_19); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_20 != NULL): ?>
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_20, $settings->s_currency,"price"), 4 );
                                                ?>	
												<option><?php echo e($plan->cur_20); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_20); ?>%</option>
												<?php endif; ?>
                                                <?php if($plan->cur_21 != NULL): ?>	
                                                <?php
                                                    $price = round($rates->get_rate($plan->cur_21, $settings->s_currency,"price"), 4 );
                                                ?>
												<option><?php echo e($plan->cur_21); ?>  (Rate: <?php echo e($price); ?>) - Share:  <?php echo e($plan->share_21); ?>%</option>
												<?php endif; ?>
												
            								</select><br>
            					   </form>
                                    <a href="<?php echo e(url('dashboard/buypack')); ?>/<?php echo e($plan->id); ?>" class="btn btn-success inbtn btn-block rounded-0" style="border-radius: none;">Buy pack</a>
                                </div>
                            </div>
                            <br>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                        </div>
                        </div>
                        </div>

                    </div>
					

                    <div class="well">
                    <ul class="nav nav-tabs" style="margin-top:20px;">
                        <li class="active"><a data-toggle="tab" href="#open">Open investments</a></li>
                        <li><a data-toggle="tab" href="#closed">Closed investments</a></li>
                        <li><a data-toggle="tab" href="#openpacks">Open packs</a></li>
                        <li><a data-toggle="tab" href="#closedpacks">Closed packs</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="open" class="tab-pane fade in active">
                            
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                            <table class="table table-striped"> 
                                <thead> 
                                    <tr> 
                                        <th>Asset</th> 
                                        <th>Amount (<?php echo e($settings->s_currency); ?>)</th>
                                        <th>Open price</th>
                                        <th>Status</th> 
                                        <th>Date started</th>
                                        <th>Action(s)</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($inv->status == "active"): ?>
                                    <tr> 
                                        <th scope="row"><?php echo e($inv->asset); ?></th>
                                        <td><?php echo e($inv->amount); ?></td> 
                                        <td><?php echo e($inv->open_price); ?></td> 
                                        <td><?php echo e($inv->status); ?></td> 
                                        <td><?php echo e($inv->created_at); ?></td> 
                                        <td><a href="<?php echo e(url('dashboard/closeinvest')); ?>/<?php echo e($inv->id); ?>" class="btn btn-danger">close</a></td> 
                                    </tr>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody> 
                            </table>
                        </div>

                        </div>
                        <div id="closed" class="tab-pane fade">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                            <table class="table table-striped"> 
                            <thead> 
                                    <tr> 
                                        <th>Asset</th> 
                                        <th>Amount (<?php echo e($settings->s_currency); ?>)</th>
                                        <th>Open price</th>
                                        <th>Closed price</th>
                                        <th>Status</th> 
                                        <th>Profit/Loss</th>
                                        <th>Date started</th>
                                        <th>Date closed</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php $__currentLoopData = $investments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($inv->status == "closed"): ?>
                                    <tr> 
                                        <th scope="row"><?php echo e($inv->asset); ?></th>
                                        <td><?php echo e($inv->amount); ?></td> 
                                        <td><?php echo e(round($inv->open_price,3)); ?></td> 
                                        <td><?php echo e(round($inv->close_price,3)); ?></td>
                                        <td><?php echo e($inv->status); ?></td>
                                        <?php if($inv->p_l > $inv->amount): ?>
                                        <td class="text-success"><?php echo e($settings->currency.round($inv->p_l,3)); ?></td>
                                        <?php else: ?>
                                        <td class="text-danger"><?php echo e($settings->currency.round($inv->p_l,3)); ?></td>
                                        <?php endif; ?> 
                                        <td><?php echo e($inv->created_at); ?></td> 
                                        <td><?php echo e($inv->closed_at); ?></td> 
                                    </tr>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody> 
                            </table>
                        </div>
                        </div>

                        <div id="closedpacks" class="tab-pane fade">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                            <table class="table table-striped"> 
                                <thead> 
                                    <tr> 
                                        <th>Pack name</th> 
                                        <th>Price (<?php echo e($settings->s_currency); ?>)</th>
                                        <th>Duration</th>
                                        <th>Status</th> 
                                        <th>Profit/Loss</th>
                                        <th>Date started</th>
                                        <th>Date closed</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php $__currentLoopData = $user_packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($inv->status == "closed"): ?>
                                    <tr> 
                                        <th scope="row"><?php echo e($inv->dpack->name); ?></th>
                                        <td><?php echo e($inv->dpack->price); ?></td> 
                                        <td><?php echo e($inv->duration); ?> Hours</td> 
                                        <td><?php echo e($inv->status); ?></td>
                                        <?php if($inv->p_l > $inv->dpack->price): ?>
                                        <td class="text-success"><?php echo e($settings->currency.round($inv->p_l,3)); ?></td>
                                        <?php else: ?>
                                        <td class="text-danger"><?php echo e($settings->currency.round($inv->p_l,3)); ?></td>
                                        <?php endif; ?> 
                                        <td><?php echo e($inv->created_at); ?></td> 
                                        <td><?php echo e($inv->closed_at); ?></td> 
                                    </tr>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody> 
                            </table>
                        </div>
                        </div>

                        <div id="openpacks" class="tab-pane fade">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                            <table class="table table-striped"> 
                                <thead> 
                                    <tr> 
                                        <th>Pack name</th> 
                                        <th>Price (<?php echo e($settings->s_currency); ?>)</th>
                                        <th>Duration</th>
                                        <th>Status</th> 
                                        <th>Date started</th>
                                        <th>Action(s)</th>
                                    </tr> 
                                </thead>  
                                <tbody> 
                                    <?php $__currentLoopData = $user_packs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($inv->status == "active"): ?>
                                    <tr> 
                                        <th scope="row"><?php echo e($inv->dpack->name); ?></th>
                                        <td><?php echo e($inv->dpack->price); ?></td> 
                                        <td><?php echo e($inv->duration); ?> Hours</td> 
                                        <td><?php echo e($inv->status); ?></td> 
                                        <td><?php echo e($inv->created_at); ?></td> 
                                        <td><a href="<?php echo e(url('dashboard/closepack')); ?>/<?php echo e($inv->id); ?>" class="btn btn-danger">close</a></td> 
                                    </tr>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody> 
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                    
			</div>
        </div>
        
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>