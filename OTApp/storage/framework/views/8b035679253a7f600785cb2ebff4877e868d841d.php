<div class="col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                <div class="crypt-market-status mt-4">
                    <div>
                        <ul class="nav nav-tabs" id="crypt-tab">
                            <li role="presentation"><a href="#usd" class="active" data-toggle="tab">CRYPTOCURRENCY MARKET</a></li>
                            <!-- <li role="presentation"><a href="#btc" data-toggle="tab">btc</a></li>
                            <li role="presentation"><a href="#eth" data-toggle="tab">eth</a></li> -->
                        </ul>
                        <div class="tab-content crypt-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="usd">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="crypt-table-hover">
                                        <?php $__currentLoopData = $cryptopairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cryptopair): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php
                                        $data=$rates->get_rate($cryptopair->base_curr,$cryptopair->quote_curr,"data");
                                        $price = round($data["ticker"]["price"],4);
                                        $change = round($data["ticker"]["change"],4);
                                        
                                       ?>
                                            <tr>
                                                <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> <?php echo e($cryptopair->base_curr); ?>/<?php echo e($cryptopair->quote_curr); ?></td>
                                                <td> 
                                                    <span class="d-block"><?php echo e($price); ?></span> 
                                                    <?php if($change < 0): ?>
                                                    <span class="crypt-down"><?php echo e($change); ?></span>
                                                    <?php else: ?>
                                                    <span class="crypt-up"><?php echo e($change); ?></span> 
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> LTC/USD</td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="btc">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> ETH/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> EOS/BTC</td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> LTC/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XMR/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span>3.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> LINK/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> FTN/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> RIF/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> NEO/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> TRX/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> LSK/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XRP/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> CNB/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> VEN/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DASH/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="eth">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> BTC/ETH</td>
                                            <td> <span class="d-block">5.3424984</span> <b class="crypt-down">-5.4%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> LTC/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> ETH/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-down">-7.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/ETH</td>
                                            <td> <span class="d-block">6.6768876</span> <b class="crypt-up">+3.7%</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XMR/USTD</td>
                                            <td> <span class="d-block">6.6768876</span> <span>3.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/USTD</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XMR/USTD</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XMR/USTD</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> PQR/STU</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/BTC</td>
                                            <td> <span class="d-block">6.6768876</span> <span class="crypt-up"><b>+3.7%</b></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> XMR/USTD</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> DOGE/BTC</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><img class="crypt-star pr-1" alt="star" src="<?php echo e(asset('trade/images/star.svg')); ?>" width="15"> PQR/STU</td>
                                            <td> <span class="d-block">9.34546</span> <span>6.7%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            