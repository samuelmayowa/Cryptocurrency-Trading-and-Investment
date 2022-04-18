				<!-- send all users email -->
			<div id="sendmailModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">This message will be sent to all your users.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('UsersController@sendmail')); ?>">
					   		
					   		<textarea class="form-control" name="message" row="3" required=""></textarea><br/>
                               
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-default" value="Send">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /send all users email Modal -->
			
			
			<!-- Deposit Modal -->
			<div id="depositModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Make new deposit</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@deposit')); ?>">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /deposit Modal -->
			
			
			<!-- Withdrawal method Modal -->
			<div id="wmethodModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new withdrawal method</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@addwdmethod')); ?>">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter method name" type="text" name="name" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Minimum amount $" type="text" name="minimum" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Maximum amount $" type="text" name="maximum" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Charges (Percentage %)" type="text" name="charges_percentage" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Payout duration" type="text" name="duration" required><br/>
					   		<select name="status" class="form-control">
					   		    <option value="">Select action</option> 
					   		    <option value="enabled">Enable</option> 
					   		    <option value="disabled">Disable</option> 
					   		</select><br/>
                             <input type="hidden" name="type" value="withdrawal">
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /withdrawal method Modal -->


            			<!-- Withdrawal Modal -->
			<div id="withdrawalModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Payment will be sent to your recieving address.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@withdrawal')); ?>">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /Withdrawals Modal -->

			       			<!-- Plans Modal -->
			<div id="plansModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new plan / package</h4>
			      </div>
			      <div class="modal-body">
              <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Controller@addplan')); ?>">
							<label>Plan name</label><br/>	
							<input style="padding:5px;" class="form-control" placeholder="Enter Plan name" type="text" name="name" required><br/>
								 <label>Plan price</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter Plan price" type="text" name="price" required><br/>
								 <label>Plan MIN. price</label><br/>		 
            					  <input style="padding:5px;" placeholder="Enter Plan minimum price" class="form-control" type="text" name="min_price" required><br/>
            					  <label>Plan MAX. price</label><br/>		 
            					  <input style="padding:5px;" class="form-control" placeholder="Enter Plan maximum price" type="text" name="max_price" required><br/>
								 <label>Plan expected return (ROI)</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter expected return for this plan" type="text" name="return" required><br/>						 
															 <label>top up interval</label><br/>
                               <select class="form-control" name="t_interval">
																		<option>Monthly</option>
																		<option>Weekly</option>
																		<option>Daily</option>
																		<option>Hourly</option>
															 </select><br>
															 <label>top up type</label><br/>
                               <select class="form-control" name="t_type">
																		<option>Percentage</option>
																		<option>Fixed</option>
															 </select><br>
															 <label>top up amount (in % or $ as specified above)</label><br/>
															 <input style="padding:5px;" class="form-control" placeholder="top up amount" type="text" name="t_amount" required><br/>
															 <label>Investment duration</label><br/>
                               <select class="form-control" name="expiration">
																		<option>One week</option>
																		<option>One month</option>
																	<option>Three months</option>	
																		<option>Six months</option>
																		<option>One year</option>
															 </select><br>
					   		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->

			<!-- settings update Modal -->
			<div id="s_updModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">This settings page was last updated by</h4>
			      </div>
			      <div class="modal-body">
                        <h3><?php echo e($settings->updated_by); ?></h3>
                        
                        <h4 class="modal-title" style="text-align:center;">Date/Time</h4>
                        
                        <h3><?php echo e($settings->updated_at); ?></h3>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /settings update Modal -->
