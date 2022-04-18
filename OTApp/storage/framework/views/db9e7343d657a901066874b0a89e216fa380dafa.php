 <div>
                    <div class="crypt-market-status">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation"><a href="#active-orders" class="active" data-toggle="tab">Active Orders</a></li>
                                <li role="presentation"><a href="#closed-orders" data-toggle="tab">Closed Orders</a></li>
                                <li role="presentation"><a href="#balance" data-toggle="tab">Balance</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="active-orders">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Opened at</th>
                                                <th scope="col">Buy/sell</th>
                                                <th scope="col">Base price</th>
                                                <th scope="col">Quote price</th>
                                                <th scope="col">Asset</th>
                                                <th scope="col">Now</th>
                                                <th scope="col">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($order->status=="active"): ?>
                                            <tr>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td><?php echo e($order->type); ?></td>
                                                <td><?php echo e(round($order->base_amount,5)); ?> <?php echo e($order->base_c); ?></td>
                                                <td><?php echo e(round($order->quote_amount,5)); ?> <?php echo e($order->quote_c); ?></td>
                                                <td><?php echo e(round($order->base_amount,5)); ?> <?php echo e($order->base_c); ?></td>
                                                <td><?php echo e(round($order->base_amount,5)); ?></td>
                                                <td><?php echo e($order->base_c); ?>/<?php echo e($order->quote_c); ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" id="closeorder<?php echo e($order->id); ?>" class="btn btn-danger btn-sm">close</a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <script type="text/javascript">
                                            $("#closeorder<?php echo e($order->id); ?>").on('click',function(){
                                                    $.ajax({
                                                        url: "<?php echo e(url('trade/closeorder')); ?>/<?php echo e($order->id); ?>",
                                                        type: 'GET',
                                                        data:$("#closeorder<?php echo e($order->id); ?>").serialize(),
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
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <!--<div class="no-orders text-center"><img src="images/empty.png" alt="no-orders"></div>-->
                                </div>
                                <div role="tabpanel" class="tab-pane" id="closed-orders">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">Opened at</th>
                                            <th scope="col">Closed at</th>
                                                <th scope="col">Buy/sell</th>
                                                <th scope="col">Base price</th>
                                                <th scope="col">Quote price</th>
                                                <th scope="col">Closed price</th>
                                                <th scope="col">Asset</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($order->status=="closed"): ?>
                                            <tr>
                                                <td><?php echo e($order->created_at); ?></td>
                                                <td><?php echo e($order->closed_at); ?></td>
                                                <td><?php echo e($order->type); ?></td>
                                                <td><?php echo e(round($order->base_amount,5)); ?> <?php echo e($order->base_c); ?></td>
                                                <td><?php echo e(round($order->quote_amount,5)); ?> <?php echo e($order->quote_c); ?></td>
                                                <td><?php echo e(round($order->closed_amount,5)); ?> <?php echo e($order->quote_c); ?></td>
                                                <td><?php echo e($order->base_c); ?>/<?php echo e($order->quote_c); ?></td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="balance">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Wallet</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Last updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th><?php echo e($balance->wallet); ?></th>
                                                <td><?php echo e(round($balance->balance,5)); ?></td>
                                                <td><?php echo e(date_format($balance->updated_at,"Y/M/d H:i")); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>