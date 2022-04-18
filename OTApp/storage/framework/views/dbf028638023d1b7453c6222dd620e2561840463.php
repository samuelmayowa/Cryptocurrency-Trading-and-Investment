  <?php echo $__env->make('trade.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $rates = app('App\Http\Controllers\GetRates'); ?>
  
  <?php
if(!empty(Session::get('base_c'))){
    $base=Session::get('base_c');
}else{
    $base="BTC";
}

if(!empty(Session::get('quote_c'))){
    $quote=Session::get('quote_c');
}else{
    $quote="USD";
}
  $data=$rates->get_rate($base,$quote,"data");
  $price = $data["ticker"]["price"];
  ?>
  
    <div class="container-fluid">
        <div class="row sm-gutters">
            <?php echo $__env->make('trade.cryptopairs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <div class="col-md-6 col-lg-6 col-xl-7 col-xxl-8">
                <div class="crypt-gross-market-cap mt-4">
                    <div class="row">
                        <div class="col-3 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>Last Price <?php echo e($base); ?>/<?php echo e($quote); ?></p>
                                    <p><?php echo e($data["ticker"]["price"]); ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p>Change <?php echo e($base); ?>/<?php echo e($quote); ?></p>
                                    <?php if($data["ticker"]["change"] < 0): ?>
                                    <p class="crypt-down"><?php echo e($data["ticker"]["change"]); ?></p>
                                    <?php else: ?>
                                    <p class="crypt-up"><?php echo e($data["ticker"]["change"]); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>High</p>
                            <p class="crypt-up"><?php echo e($data["ticker"]["price"]); ?></p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>Low</p>
                            <p class="crypt-down"><?php echo e($data["ticker"]["price"]); ?></p>
                        </div>
                        <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                            <p>Volume 24Hr</p>
                            <p class="crypt-down"><?php echo e($data["ticker"]["volume"]); ?></p>
                        </div>
                    </div>
                </div>
                
                
                <div class="tradingview-widget-container mb-3 ">
                    <?php echo $__env->make('trade.chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <!--<div id="depthchart" class="depthchart h-40"></div>-->
                <!-- this is the action controller ExchangeController@updatemarket -->
                <div class="crypt-boxed- col-xs-12 col-sm-8 col-md-7 col-lg-7 offset-2">
                    <h6 class="crypt-bg-head"><b class="crypt-up">BUY</b> / <b class="crypt-down">SELL</b></h6>
                    
                    <form id="selectform" method="post" action="javascript:void(0)">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"> <span class="input-group-text"><strong style="text-align:center;">Select Market</strong></span> </div>
                            <select class="form-control" name="market">
                            <option value="">Select market</option> 
                            <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($market->base_curr); ?>/<?php echo e($market->quote_curr); ?>"><?php echo e($market->base_curr); ?>/<?php echo e($market->quote_curr); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select> 
                        </div> 
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    </form>

                    
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="crypt-buy-sell-form">
                                <form id="buysell" role="form" method="post" action="javascript:void(0)">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" name="market_pair" value="<?php echo e($base); ?>/<?php echo e($quote); ?>">
                                <input type="hidden" name="type" id="type">
                                
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> <span class="input-group-text">Amount</span> </div>
                                        <input type="text" id="pinput1" name="base_amount" onkeyup="priceFunction1(this)" placeholder="E.g. 5" class="form-control" required>
                                        <div class="input-group-append"> <span class="input-group-text"><?php echo e($base); ?></span> </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend"> <span class="input-group-text">Amount</span> </div>
                                        <input type="text" id="pinput2" name="quote_amount" onkeyup="priceFunction2(this)" placeholder="E.g. 45" class="form-control" required>
                                        <div class="input-group-append"> <span class="input-group-text"><?php echo e($quote); ?></span> </div>
                                    </div>
                                    <div>
                                        <p>
                                            Fee: 
                                            <?php if($settings->commission_type == "Percentage"): ?>
                                            <span class="fright"><?php echo e($settings->commission_fee); ?>%</span>
                                            <?php else: ?>
                                            <span class="fright"><?php echo e($settings->currency.$settings->commission_fee); ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" name="type1" onclick="javascript:document.getElementById('type').value='Buy'" class="btn btn-success btn-lg" value="Buy">
                                        <input type="submit" name="type" onclick="javascript:document.getElementById('type').value='Sell'" class="btn btn-danger btn-lg" value="Sell">
                                    </div>
                                    </div>
                            
                            </form>

                        </div>
                    </div>
                </div>
                
            </div>
            
            
            <div class="col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                <?php echo $__env->make("trade.orderbook", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid">
        <div class="row sm-gutters">
            <div class="col-xl-12">
               <?php echo $__env->make("trade.accounthistory", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
    <footer>
    <script type="text/javascript">
  function priceFunction1(input1) {
    var input2 = document.getElementById('pinput2');
    var c_price = '<?php echo $price; ?>';
    input2.value = input1.value*c_price;
  }

  function priceFunction2(input2) {
    var input1 = document.getElementById('pinput1');
    var c_price = '<?php echo $price; ?>';
    input1.value = input2.value/c_price;
  }
</script>

<script type="text/javascript">

    $('#selectform').on('change',function(){
        $.ajax({
            url: '/trade/changemarket',
            type: 'POST',
            data:$('#selectform').serialize(),
            success: function (data) {
                swal({
                icon: "success",
                text: "Market changed successfully",
                timer:3000,
                });
                location.reload(true);
            },
            error: function (data) {
                swal({
                icon: "error",
                text: "Something went wrong", 
                timer:3000,
                });
            },

            // frm.submit(function (e) {}
        });
    });

    $('#buysell').on('submit',function(){
        $.ajax({
            url: '/trade/exchange',
            type: 'POST',
            data:$('#buysell').serialize(),
            success: function (response) {
                if(response.status ===200){
                    swal({
                    icon: "success",
                    text: response.message,
                    timer:3000,
                    });
                    location.reload(true);
                    }
                    else{
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
    
</script>

<?php echo $__env->make('trade.assetsf', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </footer>
</body>

</html>