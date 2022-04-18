<h3 style="text-align:center; margin:10px 0px 10px 0px;">Withdrawal methods</h3>

<a class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#wmethodModal"><i class="fa fa-plus"></i> Add new</a> <br>

<?php $__currentLoopData = $wmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="panel panel-default" style="border:0px solid #fff;">
		<!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method<?php echo e($method->id); ?>">
                <?php echo e($method->name); ?> <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
											
        <div id="method<?php echo e($method->id); ?>" class="panel-collapse collapse">
            <div class="sign-u">
                <br/>
                <a class="btn btn-dark btn-sm" href="#" data-toggle="modal" data-target="#wmethodModal<?php echo e($method->id); ?>"><i class="fa fa-pencil"></i> Edit</a> &nbsp; &nbsp;
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('dashboard/deletewdmethod')); ?>/<?php echo e($method->id); ?>"><i class="fa fa-trash"></i></a> 
            </div>
        </div>
	</div>
									
    <!-- Edit Withdrawal method Modal -->
    <div id="wmethodModal<?php echo e($method->id); ?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" style="text-align:center;">Edit withdrawal method</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@updatewdmethod')); ?>">
                        <label>Enter method name</label>
                        <input class="form-control" placeholder="Enter method name" type="text" name="name" value="<?php echo e($method->name); ?>" required>
                        <label>Minimum amount $</label>
                        <input class="form-control" placeholder="Minimum amount $" type="text" name="minimum" value="<?php echo e($method->minimum); ?>" required>
                        <label>Maximum amount $</label>
                        <input class="form-control" placeholder="Maximum amount $" type="text" name="maximum" value="<?php echo e($method->maximum); ?>" required>
                        <label>Charges (Fixed amount $)</label>
                        <input class="form-control" placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed" value="<?php echo e($method->charges_fixed); ?>" required>
                        <label>Charges (Percentage %)</label>
                        <input class="form-control" placeholder="Charges (Percentage %)" type="text" name="charges_percentage" value="<?php echo e($method->charges_percentage); ?>" required>
                        <label>Duration</label>
                        <input  class="form-control" placeholder="Payout duration" type="text" name="duration" value="<?php echo e($method->duration); ?>" required>
                        <label>Method status</label>
                        <select name="status" class="form-control">
                            <option><?php echo e($method->status); ?></option> 
                            <option value="enabled">Enable</option> 
                            <option value="disabled">Disable</option> 
                        </select><br/>
                        <input type="hidden" name="type" value="withdrawal">
                        <input type="hidden" name="id" value="<?php echo e($method->id); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Continue">
                    </form>
                </div>
			</div>
		</div>
	</div>
<!-- /edit withdrawal method Modal -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <br> 

 <div>
     
<form method="post" action="<?php echo e(action('SomeController@updatesettings')); ?>" enctype="multipart/form-data">
    <div class="sign-up1">
        <h2>Deposit/Withdrawal option:</h2>
    </div>
    <div class="form-group">
       <select name="withdrawal_option" class="form-control">
            <option value="<?php echo e($settings->withdrawal_option); ?>">Currently (<?php echo e($settings->withdrawal_option); ?>)</option>
            <option>manual</option>
            <option>auto</option>
        </select>
    </div> <br>

    <!-- Payment info and methods -->
    <h3>Payment methods</h3>
    <a class="btn btn-light btn-lg" href="#" data-toggle="modal" data-target="#cpdModal"> Set up Coinpayments</a><br/> <br>
    

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
                Bank deposit or transfer <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="bank" class="panel-collapse collapse">
            <div class="sign-u">
        <div class="sign-up1">
            <h4>Bank name :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="bank_name" class="form-control" value="<?php echo e($settings->bank_name); ?>">
        </div>
    </div>

    <div class="sign-u">
        <div class="sign-up1">
            <h4>Account name :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="account_name" class="form-control" value="<?php echo e($settings->account_name); ?>">
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="sign-u">
        <div class="sign-up1">
            <h4>Account number :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="account_number" class="form-control" value="<?php echo e($settings->account_number); ?>">
        </div>
    </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
                Bitcoin <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="btc" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4>BTC address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="btc_address" class="form-control" value="<?php echo e($settings->btc_address); ?>">
        </div>
    </div>
        </div>
    </div>
    
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
                Litecoin <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="ltc" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4>LTC address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="ltc_address" class="form-control" value="<?php echo e($settings->ltc_address); ?>">
        </div>
    </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
                Ethereum <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="eth" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>ETH address :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="eth_address" class="form-control" value="<?php echo e($settings->eth_address); ?>">
            </div>
        </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#card">
                Credit Card (Stripe) <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="card" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Stripe secret key :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="s_s_k" class="form-control" value="<?php echo e($settings->s_s_k); ?>">
            </div>
        </div>

        <div class="sign-u">
            <div class="sign-up1">
                <h4>Stripe publishable key :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="s_p_k" class="form-control" value="<?php echo e($settings->s_p_k); ?>">
            </div>
        </div>
        </div>
    </div>
    
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pp">
                PayPal <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="pp" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4>Paypal client ID :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="pp_ci" class="form-control" value="<?php echo e($settings->pp_ci); ?>">
            </div>
        </div>

        <div class="sign-u">
            <div class="sign-up1">
                <h4>Paypal client secret :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="pp_cs" class="form-control" value="<?php echo e($settings->pp_cs); ?>">
            </div>
        </div>
        </div>
    </div> <br> <br>
    
    <div class="sign-u">
        <div class="sign-up1">
            <h2>System Payment Mode:</h2>
        </div> <br>
        <div class="sign-up2">
        <input type="checkbox" id="check1" value="1" name="payment_mode1"> Bank transfer &nbsp; &nbsp;
        <input type="checkbox" id="check3" value="3" name="payment_mode3"> Ethereum &nbsp; &nbsp;
        <input type="checkbox" id="check2" value="2" name="payment_mode2"> Bitcoin <br>
        <input type="checkbox" id="check4" value="4" name="payment_mode4"> Litecoin &nbsp; &nbsp;
        <input type="checkbox" id="check6" value="6" name="payment_mode6"> Paypal &nbsp; &nbsp;
        <input type="checkbox" id="check5" value="5" name="payment_mode5"> Credit card (Stripe) 
        &nbsp; &nbsp; <br> <br>
        
        </div>
    </div>
    <?php 
        $pmodes = str_split($settings->payment_mode);
        foreach($pmodes as $pmode){
            if($pmode==1){
            echo'
            <script>document.getElementById("check1").checked= true;</script>
            ';
            }
            if($pmode==2){
                echo'
                <script>document.getElementById("check2").checked= true;</script>
                ';
            }
            if($pmode==3){
                echo'
                <script>document.getElementById("check3").checked= true;</script>
                ';
            }
            if($pmode==4){
                echo'
                <script>document.getElementById("check4").checked= true;</script>
                ';
            }
            if($pmode==5){
                echo'
                <script>document.getElementById("check5").checked= true;</script>
                ';
            }
            if($pmode==6){
                echo'
                <script>document.getElementById("check6").checked= true;</script>
                ';
            }
        }
    ?>

    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>

</div>
	<!-- set up coinpayments Modal -->
<div id="cpdModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title" style="text-align:center;">Coinpayments set up</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body bg-dark">
                <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@updatecpd')); ?>">
                    <label>Merchant ID</label>
                    <input style="padding:5px;" class="form-control" placeholder="Merchant ID" type="text" name="cp_m_id" value="<?php echo e($cpd->cp_m_id); ?>" required><br/>
                        
                    <label>CoinPayment IPN Secret</label>
                    <input style="padding:5px;" class="form-control" placeholder="CoinPayment IPN Secret" type="text" name="cp_ipn_secret" value="<?php echo e($cpd->cp_ipn_secret); ?>" required><br/>
                        
                    <label>CoinPayments debug email</label>
                    <input style="padding:5px;" class="form-control" placeholder="CoinPayments debug email" type="text" name="cp_debug_email" value="<?php echo e($cpd->cp_debug_email); ?>" required><br/>
                        
                    <label>Public key</label>
                    <input style="padding:5px;" class="form-control" placeholder="Public key" type="text" name="cp_p_key" value="<?php echo e($cpd->cp_p_key); ?>" required><br/>
                        
                    <label>Private key</label>
                    <input style="padding:5px;" class="form-control" placeholder="Private key" type="text" name="cp_pv_key" value="<?php echo e($cpd->cp_pv_key); ?>" required><br/>
                
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /set up coinpayments Modal -->