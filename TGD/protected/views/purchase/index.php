
<script>
function create_donate_url(gateway, currency, amount) {

  <?php 

  $param = array(
      'transaction_id'=>$transaction_id,
      'type'=>PurchaseController::TYPE_DONATION,
      'status'=>PurchaseController::TRANSACTION_OK
  );
  
  $param_json=json_encode($param);
  $param_b64 = base64_encode($param_json);

  $url=Yii::app()->controller->createAbsoluteUrl('purchase/index').'?token='.$param_b64.'&gateway=[gateway]&currency=[currency]&amount=[amount]';

  ?>
  
  var url='<?php echo $url; ?>';
  
  url = url.replace("[gateway]",gateway);
  url = url.replace("[currency]",currency);
  url = url.replace("[amount]",amount);
  
  return url;
}
</script>

<?php if ($state == PurchaseController::RETURN_FROM_GATEWAY && $status == PurchaseController::TRANSACTION_OK) { ?>   
    <div class="alert alert-success">SUCCESS</div>
<?php } ?>

<?php if ($state == PurchaseController::RETURN_FROM_GATEWAY && $status == PurchaseController::TRANSACTION_ERROR) { ?>   
    <div class="alert alert-danger">
    <p>ERROR</p>
    <?php if (is_array($errors) && count($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    </div>
<?php } ?>

<div class="wrapper">
<div id="tgd-page-content" class="container">
    <div class="row">
        <div class="col-sm-16 col-md-10 col-lg-10 tgd-no-horizontal-padding">
            <section id="descriptions" class="bitcoin-1p">
                <div>
                    <h2>Your membership application has been accepted!</h2>
                    <p>To comply with UK Industrial and Provident Society rules, you need to
                        buy one share of TheGoodData to become a full right member.</p>
                </div>
                <div class="section clearfix">
                    <div class='text'>
                        But don't worry! it doesn't mean that you need to pay us anything if you
                        don't want to! To avoid payments we made up a work-around. A 1 UK pence loan
                        that will be cancelled when you end our membership at no cost.
                    </div>
                    <div class="button">
                        <button class="btn loan" data-toggle="loan-agreement">show me the<br> 1 UK pence loan <br>(1.7 US cents)</button>
                    </div>
                </div>
                <div class="section clearfix selected">
                    <div class="text">
                        Do you still want to pay us that 1 little pence?<br>
                        You can do it via Bitcoin.
                    </div>
                    <div class="button">
                        <button class="btn share" data-toggle="bitcoin-1p">buy my share<br>with bitcoins</button>
                    </div>
                </div>
                <div class="section clearfix">
                    <div class='text'>
                        Are you a generous person that want to take the opportunity 
                        to support us with a donation? Don't be shy! We accept credit cards :)
                    </div>
                    <div class="button">
                        <button class="btn support" data-toggle="donation">support you<br>with a donation</button>
                    </div>
                </div>
                <div id="questions">
                    <a href="<?php echo Yii::app()->controller->createAbsoluteUrl("/site/faq")?>">Have questions?</a>
                </div>
            </section>
        </div>
        <div class="col-sm-16 col-md-6 col-lg-6 tgd-no-horizontal-padding">
            <section id="form">
                <div id="loan-agreement" style="display:block;">
                
                
                    <h2>Loan Agreement</h2>
                    
                    <div style="height:430px; padding-right: 10px; overflow: auto;">
                    <p>
                      For value received, <?php echo $user[0]->firstname; ?> <?php echo $user[0]->lastname; ?> (the “Borrower”) at 
                      <?php echo $user[0]->streetname; ?> <?php echo $user[0]->streetnumber; ?> <?php echo $user[0]->streetdetails; ?>, <?php echo $user[0]->city; ?>, <?php echo $user[0]->country; ?> 
                      promises to pay to the order of The Good Data Cooperative Ltd (the “Lender”) at 
                      Unit 1, 82 Clerkenwell Road, London UK, the sum of $0.01 with no interest.
                    </p>
                    <ol type="I">
                        <li>
                            <h3>Destination of the amount lent</h3>
                            <p>
                                The amount lent will be exclusively used for the purchase of one membership share of The Good Data Cooperative Ltd.
                            </p>
                        </li>
                        <li>
                            <h3>
                                Terms of repayment
                            </h3>
                            <p>
                                The amount lent shall be payable to the Lender in full on any future date on which the Borrower sells or transfers its membership share.
                            </p>
                        </li>
                        <li>
                            <h3>
                                Security
                            </h3>
                            <p>
                                This Note will be secured by the membership share of The Good data Cooperative Ltd to be purchased by the Borrower.
                            </p>
                        </li>
                        <li>
                            <h3>
                                Default        
                            </h3>
                            <p>
                                If any of the following events occur, this Note and any other obligations of the Borrower to the Lender, shall become due immediately, without demand or notice:
                            </p>
                            <ul>
                                <li>
                                    <p>the absence of purchase by the Borrower of one membership share of The Good Data Cooperative Ltd. in the same event of the signature of this Loan agreement;</p>
                                </li>
                                <li>
                                    <p>the failure of the Borrower to pay the amount lent when due;</p>
                                </li>
                                <li>
                                    <p>the death or insolvency of the Borrower;</p>
                                </li>
                                <li>
                                    <p>the filing of bankruptcy of the Lender</p>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3>
                                Governing law
                            </h3>
                            <p>
                                This Note shall be construed in accordance to the English law 
                            </p>
                        </li>
                    </ol>

                    Signed by <?php echo $user[0]->firstname; ?> <?php echo $user[0]->lastname; ?>
                    <br>
                    <br>
                    <?php $date=new DateTime(); echo $date->format('jS F Y'); ?>
                    <br>
                    <br>

                      
                      
                      
                    </div>  
                      
                      

                    <button id="btnProceed1pLoan" type="submit" class="btn btn-primary" style="margin:10px 0 0 0;">I AGREE</button>

                    <script>
                    $( document ).ready(function() {
                        $( "#btnProceed1pLoan" ).click(function() {
                            window.location.href = "<?php 

                            $param = array(
                                'transaction_id'=>$transaction_id,
                                'type'=>PurchaseController::TYPE_LOAN,
                                'status'=>PurchaseController::TRANSACTION_OK
                            );
                            
                            $param_json=json_encode($param);
                            $param_b64 = base64_encode($param_json);

                            echo Yii::app()->controller->createAbsoluteUrl('purchase/index').'?token='.$param_b64.'&currency=USD&amount=1';

                            ?>";
                        });
                    });
                    </script>
                </div>
                <div id="donation" style="display:none;">
                    <strong>Support us and get your share</strong>
                    Please choose the amount and payment method. <br />
                    1 UK pence will be used to buy your share. <br />
                    The rest will be donated to The Good Data Cooperative Ltd.
                    <form id="donate" action="https://bitpay.com/checkout" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#donate'));">
                        <input name="action" type="hidden" value="checkout">
                        <div class="form-group row">
                            <div class="col-md-8 tgd-no-left-padding">
                                <input class="form-control" name="price" type="number" id="amount" placeholder="Amount" value="10.00" />
                            </div>
                            <div class="col-md-8 tgd-no-right-padding">
                                <select class="form-control" name="currency" id="currency" value="" >
                                    <option value="USD" selected="selected">USD</option>
                                    <option value="BTC">BTC</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="redirectURL" value="" />
                        <input type="hidden" name="data" value="i+8wYLNGk9LIgh913da5SgG/GA7jj8JhA0LTzmCuHJ2A1xPgE/JABmoEwVawN+bsUjzwXKkU5syz/IelMYuZhsb5J6oKZ6n2CQ+hWvueNa4vp3vH7dx9PPgD5/KRTGkqSP568lr7CJ3UecrKSbQpBY0UT6wVK17gIVG98wp8Ld0hEcf0dFKpN/ZFk8T75wsDfnk0dCvnUnDOdEmdWS0aCg52y8OKJJzLNq+o2OaM8Kw=">
                        
                        <button id="btnProceedDonationStripe" type="button" class="btn btn-primary">pay with credit card <span class="fa fa-credit-card"></span></button>
                        <div class="form-separator"><span>or</span></div>
                        <button id="btnProceedDonationBitcoin" type="submit" class="btn btn-primary">pay with bitcoins <span class="fa fa-bitcoin"></span></button>
                        
                        
                        
                        
                        
                        

                            
                            <script src="https://checkout.stripe.com/checkout.js"></script>
                            <script>
                              var stripeHandler = StripeCheckout.configure({
                                key: '<?php echo Yii::app()->stripe->getPublishableKey(); ?>',
                                image: '/themes/tgd/img/logo-big.png',
                                token: function(token) {
                                  // Use the token to create the charge with a server-side script.
                                  // You can access the token ID with `token.id`
                                  // console.log(token);
                                  
                                  // This time we create a new form since we're already inside bitcoin form
                                  // this way everything will work independently.
                                  var $form = jQuery('<form>', {
                                      'action': '',
                                      'method': 'POST'
                                  });
                                  
                                  $form.append($('<input type="hidden" name="stripeToken" />').val(token.id));
                                  
                                  var currency=$('#currency').val();
                                  var amount=parseFloat($('#amount').val()) * 100;
                                  
                                  $form.attr('action', create_donate_url('stripe', currency, amount));
                                  $form.appendTo("body").submit();
                                }
                              });
                            </script>
                            <?php
                            
                            

                            $stripeHandlerOptions=array(
                              'name'=>'The Good Data',
                              'description'=>'Make a donation',
                              'panelLabel'=>'Donate {{amount}}',
                            );
                            
                            if ($user_model != null) {
                              $stripeHandlerOptions['email']=$user_model->email;
                            }
                            
                            Yii::app()->clientScript->registerScript('stripe_checkout_button', "
                            $('#btnProceedDonationStripe').click(function () {
                            
                              var currency=$('#currency').val();
                              
                              if (currency=='BTC') {
                                alert('Please choose other currency than BTC for credit card payment or use the pay with bitcoins button.');
                                return;
                              }
                              
                              var amount=parseFloat($('#amount').val()) * 100;
                              
                              var stripeHandlerOptions=".CJSON::encode($stripeHandlerOptions)."
                              stripeHandlerOptions.currency=currency;
                              stripeHandlerOptions.amount=amount;
                              
                              // Open Checkout with further options
                              stripeHandler.open(stripeHandlerOptions);

                            });
                            ");
                            ?>
                        
                        
                        
                        
                        
                        
                        <script>
                        $( document ).ready(function() {

                            $( "#btnProceedDonationBitcoin" ).click(function() {
                            
                            
                              var currency=$('#currency').val();
                              var amount=parseFloat($('#amount').val()) * 100;
                              $('#donate input:hidden[name="redirectURL"]').val(create_donate_url('bitcoin', currency, amount));
                    

                            });
                        });
                        </script>
                    </form>
                </div>
                <div id="bitcoin-1p" style="display:none;">
                    <strong>Make a 1-pence payment</strong>
                    Upon clicking the button below, you will be redirected to a Bitpay platform page, where you'll be able to complete the payment process 
                    using your Bitcoin wallet application and scanning a QR code or clicking on a "Pay with Bitcoin" button.
                    <form id='formShare' action="https://bitpay.com/checkout" method="post" >
                        <input type="hidden" name="action" value="checkout" />
                        <input type="hidden" name="posData" value="" />
                        <input type="hidden" name="redirectURL" value="" />
                        <input type="hidden" name="data" value="i+8wYLNGk9LIgh913da5SgG/GA7jj8JhA0LTzmCuHJ2A1xPgE/JABmoEwVawN+bsp7DjS+An+ATbMzhpkB6ZHzuuKxHRHnjN2f785x2ENejcv/x1lXq06axFiaAMkw1o8T1uTY7O2UpV1zKo1R7mR5Hds9iiOgRLW9ZItMP7p0wa07EFcardTCTPaxq0Upv5p9eGF8pypHVvrNfvzMjhs3kLI4bf9X9hOwMrA0i898FVHQ+L66xstqBs2+6WDzUH" />
<!--                        <input type="image" src="https://bitpay.com/img/donate-md.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >-->
                        <button id="btnProceedShare" type="submit" class="btn btn-primary">Pay with Bitcoins <span class="fa fa-bitcoin"></span></button>
                        
                        <script>
                        $( document ).ready(function() {
                            $( "#btnProceedShare" ).click(function() {
                                
                               $('#formShare input:hidden[name="redirectURL"]').val('<?php 

                                $param = array(
                                    'transaction_id'=>$transaction_id,
                                    'type'=>PurchaseController::TYPE_SHARE,
                                    'status'=>PurchaseController::TRANSACTION_OK
                                );
                                
                                $param_json=json_encode($param);
                                $param_b64 = base64_encode($param_json);

                                echo Yii::app()->controller->createAbsoluteUrl('purchase/index').'?token='.$param_b64.'&currency=GBP&amount=1';

                                ?>');  

                            });
                        });
                        </script>

                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
<script>
    $('#descriptions button').not(':disabled').click(function() {
        var targetId = '#' + $(this).data('toggle'),
                $target = $(targetId),
                $parent = $target.parent();

        if (!$target.is(':visible')) {
            // hide the rest
            $parent.children().not(targetId).hide();
            // show the target
            $target.show();
        }
    });
</script>
