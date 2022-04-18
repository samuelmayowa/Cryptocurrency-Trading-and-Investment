<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Add/Edit trading Packs</h3>
				
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
                		<div class="col-lg-6">
							<div class="sign-up-row widget-shadow" style="width:100%; padding:0px;">
                                
                                <?php if($pack == "new"): ?>
                                <div style="padding:20px;">
                                    <h3 class="text-center">Add new pack</h3>
									<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('InvestmentsController@addpack')); ?>">
                                        
                                        <label>Pack name</label><br/>
                                        <input type="text" name="name" class="form-control" placeholder="Enter pack name" required><br>
                                        <label>Pack price</label><br/>
                                        <input type="text" name="price" class="form-control" min="1" placeholder="Enter pack price in <?php echo e($settings->currency); ?>" required><br>
                                        
                                        <label>Duration (in hours)</label><br/>
                                        <input type="text" name="duration" class="form-control" min="1" placeholder="Enter duration in hours E.g. 4" required><br>

                                        <div id="cur_fields">
                                            <label>Add currency</label><br/>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_1" size="33" placeholder="Enter currency symbol only. E.g. BTC" required> &nbsp;  
                                                <input type="text" name="share_1" size="25" placeholder="Currency % share" required>
                                            </div>
                                            <button type="button" class="btn btn-success btn-sm" onclick="add_fields();">Add new</button><br><br>
                                        </div>

            					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            					   		<input type="submit" class="btn btn-default" value="Submit">
                                   </form>
                                   <script type="text/javascript">
                                        var field = 1;
                                        function add_fields() {
                                            field++;
                                            var objTo = document.getElementById('cur_fields')
                                            var divtest = document.createElement("div");
                                            divtest.innerHTML = '<div class="cur_box"><input type="text" name="cur_'+field+'" size="33" placeholder="Enter currency symbol only. E.g. BTC" required> &nbsp;  <input type="text" name="share_'+field+'" size="25" placeholder="Currency % share" required></div><br>';
                                            
                                            objTo.appendChild(divtest);
                                            //uncomment to debug/inspect new field name
                                            //alert('cur_'+field+' added');
                                        }
                                   </script>
                                </div>
                                <?php else: ?>

                                <div style="padding:20px;">
                                    <h3 class="text-center">Edit <?php echo e($pack->name); ?> pack</h3>
									<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('InvestmentsController@updatepack')); ?>">
                                        
                                        <label>Pack name</label><br/>
                                        <input type="text" name="name" class="form-control" value="<?php echo e($pack->name); ?>" required><br>
                                        <label>Pack price</label><br/>
                                        <input type="text" name="price" class="form-control" min="1" value="<?php echo e($pack->price); ?>" required><br>
                                        
                                        <label>Duration (in hours)</label><br/>
                                        <input type="text" name="duration" class="form-control" min="1" value="<?php echo e($pack->duration); ?>" required><br>

                                        <div id="cur_fields">
                                            <label>Add currency</label><br/>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_1" size="33" value="<?php echo e($pack->cur_1); ?>" required> &nbsp;  
                                                <input type="text" name="share_1" size="25" value="<?php echo e($pack->share_1); ?>" required><br><br>
                                            </div>

                                            <?php if($pack->cur_2 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_2" size="33" value="<?php echo e($pack->cur_2); ?>" required> &nbsp;  
                                                <input type="text" name="share_2" size="25" value="<?php echo e($pack->share_2); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_3 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_3" size="33" value="<?php echo e($pack->cur_3); ?>" required> &nbsp;  
                                                <input type="text" name="share_3" size="25" value="<?php echo e($pack->share_3); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_4 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_4" size="33" value="<?php echo e($pack->cur_4); ?>" required> &nbsp;  
                                                <input type="text" name="share_4" size="25" value="<?php echo e($pack->share_4); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_5 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_5" size="33" value="<?php echo e($pack->cur_5); ?>" required> &nbsp;  
                                                <input type="text" name="share_5" size="25" value="<?php echo e($pack->share_5); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_6 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_6" size="33" value="<?php echo e($pack->cur_6); ?>" required> &nbsp;  
                                                <input type="text" name="share_6" size="25" value="<?php echo e($pack->share_6); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_7 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_7" size="33" value="<?php echo e($pack->cur_7); ?>" required> &nbsp;  
                                                <input type="text" name="share_7" size="25" value="<?php echo e($pack->share_7); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_8 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_8" size="33" value="<?php echo e($pack->cur_8); ?>" required> &nbsp;  
                                                <input type="text" name="share_8" size="25" value="<?php echo e($pack->share_8); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_9 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_9" size="33" value="<?php echo e($pack->cur_9); ?>" required> &nbsp;  
                                                <input type="text" name="share_9" size="25" value="<?php echo e($pack->share_9); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_10 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_10" size="33" value="<?php echo e($pack->cur_10); ?>" required> &nbsp;  
                                                <input type="text" name="share_10" size="25" value="<?php echo e($pack->share_10); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_11 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_11" size="33" value="<?php echo e($pack->cur_11); ?>" required> &nbsp;  
                                                <input type="text" name="share_11" size="25" value="<?php echo e($pack->share_11); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_12 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_12" size="33" value="<?php echo e($pack->cur_12); ?>" required> &nbsp;  
                                                <input type="text" name="share_12" size="25" value="<?php echo e($pack->share_12); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_13 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_13" size="33" value="<?php echo e($pack->cur_13); ?>" required> &nbsp;  
                                                <input type="text" name="share_13" size="25" value="<?php echo e($pack->share_13); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_14 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_14" size="33" value="<?php echo e($pack->cur_14); ?>" required> &nbsp;  
                                                <input type="text" name="share_14" size="25" value="<?php echo e($pack->share_14); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_15 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_15" size="33" value="<?php echo e($pack->cur_15); ?>" required> &nbsp;  
                                                <input type="text" name="share_15" size="25" value="<?php echo e($pack->share_15); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_16 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_16" size="33" value="<?php echo e($pack->cur_16); ?>" required> &nbsp;  
                                                <input type="text" name="share_16" size="25" value="<?php echo e($pack->share_16); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_17 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_17" size="33" value="<?php echo e($pack->cur_17); ?>" required> &nbsp;  
                                                <input type="text" name="share_17" size="25" value="<?php echo e($pack->share_17); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_18 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_18" size="33" value="<?php echo e($pack->cur_18); ?>" required> &nbsp;  
                                                <input type="text" name="share_18" size="25" value="<?php echo e($pack->share_18); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_19 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_19" size="33" value="<?php echo e($pack->cur_19); ?>" required> &nbsp;  
                                                <input type="text" name="share_19" size="25" value="<?php echo e($pack->share_19); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_20 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_20" size="33" value="<?php echo e($pack->cur_20); ?>" required> &nbsp;  
                                                <input type="text" name="share_20" size="25" value="<?php echo e($pack->share_20); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>

                                            <?php if($pack->cur_21 != NULL): ?>
                                            <div style="display:inline" class="cur_box">
                                                <input type="text" name="cur_21" size="33" value="<?php echo e($pack->cur_21); ?>" required> &nbsp;  
                                                <input type="text" name="share_21" size="25" value="<?php echo e($pack->share_21); ?>" required><br><br>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                        <input type="hidden" name="pack" value="<?php echo e($pack->id); ?>">
            					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            					   		<input type="submit" class="btn btn-default" value="Submit">
                                   </form>
                                    </div>

                                <?php endif; ?>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>