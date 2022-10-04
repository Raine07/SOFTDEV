
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php include"include/breadcrumb.php"; ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">


          <?php if (settings()->type == 'demo'): ?>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-8">
              <div class="card p-2 mr-2 bg-danger-soft">
                <span><i class="fas fa-info-circle"></i> Payment gateways are only available with Extended License</span>
              </div>
            </div>
          <?php endif ?>
          
          <!-- .col-md-12 -->
          <div class="col-lg-12">
            <div class="card p-2">

              <form method="post" action="<?php echo base_url('admin/payment/update') ?>" role="form" class="form-horizontal pr-20">
                <div class="row mb-4">
                  <div class="col-md-6">
                      <div class="card-body">
                        <h6 class="mb-2"><?php echo trans('currency') ?></h6>
                        <select class="form-control single_select" id="country" name="country">
                            <option value=""><?php echo trans('select') ?></option>
                            <?php foreach ($currencies as $currency): ?>
                                <?php if (!empty($currency->currency_name)): ?>
                                  <option value="<?php echo html_escape($currency->id); ?>" 
                                    <?php echo (settings()->country == $currency->id) ? 'selected' : ''; ?>>
                                    <?php echo html_escape($currency->name.'  -  '.$currency->currency_code.' ('.$currency->currency_symbol.')'); ?>
                                  </option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                </div>


                <div class="row mb-4">
                  <div class="col-md-6 mb-4">
                      <div class="card-body">
                          
                          <div class="d-flex justify-content-between mb-2">
                            <div>
                              <img width="100px" src="<?php echo base_url() ?>assets/images/payments/paypal.svg">
                            </div>

                            <div>
                              <div class="form-group">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox" value="1" name="paypal_payment" class="custom-control-input" id="switch-1" <?php if(settings()->paypal_payment == 1){echo "checked";} ?>>
                                      <label class="custom-control-label font-weight-bold" for="switch-1"> </label>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('paypal-mode') ?> </label>
                              <select class="form-control" name="paypal_mode">
                                  <option value=""><?php echo trans('select') ?></option>
                                  <option value="sandbox" <?php echo (settings()->paypal_mode == 'sandbox') ? 'selected' : ''; ?>>Sandbox</option>
                                  <option value="live" <?php echo (settings()->paypal_mode == 'live') ? 'selected' : ''; ?>>Live</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label> <?php echo trans('paypal-account') ?></label>
                              <input type="text" name="paypal_email" value="<?php echo html_escape(settings()->paypal_email); ?>" class="form-control" >
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6 mb-4">
                      <div class="card-body">

                          <div class="d-flex justify-content-between mb-2">
                            <div>
                              <img width="80px" src="<?php echo base_url() ?>assets/images/payments/stripe.svg">
                            </div>

                            <div>
                              <div class="form-group">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox" value="1" name="stripe_payment" class="custom-control-input" id="switch-2" <?php if(settings()->stripe_payment == 1){echo "checked";} ?>>
                                      <label class="custom-control-label font-weight-bold" for="switch-2"> </label>
                                  </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                              <label><?php echo trans('publish-key') ?></label>
                              <input type="text" name="publish_key" value="<?php echo html_escape(settings()->publish_key); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('secret-key') ?> </label>
                            <input type="text" name="secret_key" value="<?php echo html_escape(settings()->secret_key); ?>" class="form-control">
                        </div>
                      </div>
                  </div>
                
                  <div class="col-md-6 mb-4">
                      <div class="card-body">
                          <div class="d-flex justify-content-between mb-2">
                            <div>
                              <img width="100px" src="<?php echo base_url() ?>assets/images/payments/paystack.svg">
                            </div>

                            <div>
                              <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" value="1" name="paystack_payment" class="custom-control-input" id="switch-5" <?php if(settings()->paystack_payment == 1){echo "checked";} ?>>
                                    <label class="custom-control-label font-weight-bold" for="switch-5"> </label>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                              <label><?php echo trans('publish-key') ?></label>
                              <input type="text" name="paystack_public_key" value="<?php echo html_escape(settings()->paystack_public_key); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('secret-key') ?> </label>
                            <input type="text" name="paystack_secret_key" value="<?php echo html_escape(settings()->paystack_secret_key); ?>" class="form-control">
                        </div>
                      </div>
                  </div>
                
                  <div class="col-md-6 mb-4">
                      <div class="card-body">
                          <div class="d-flex justify-content-between mb-2">
                            <div>
                              <img width="100px" src="<?php echo base_url() ?>assets/images/payments/razorpay.svg">
                            </div>

                            <div>
                              <div class="form-group">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox" value="1" name="razorpay_payment" class="custom-control-input" id="switch-3" <?php if(settings()->razorpay_payment == 1){echo "checked";} ?>>
                                      <label class="custom-control-label font-weight-bold" for="switch-3"> </label>
                                  </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                              <label><?php echo trans('kay-id') ?></label>
                              <input type="text" name="razorpay_key_id" value="<?php echo html_escape(settings()->razorpay_key_id); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('key-secret') ?> </label>
                            <input type="text" name="razorpay_key_secret" value="<?php echo html_escape(settings()->razorpay_key_secret); ?>" class="form-control">
                        </div>
                      </div>
                  </div>

                  <div class="col-md-6 mb-4">
                      <div class="card-body">
                          <div class="d-flex justify-content-between mb-2">
                            <div>
                              <img width="120px" src="<?php echo base_url() ?>assets/images/payments/flutterwave.svg">
                            </div>

                            <div>
                              <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" value="1" name="flutterwave_payment" class="custom-control-input" id="switch-fw" <?php if(settings()->flutterwave_payment == 1){echo "checked";} ?>>
                                    <label class="custom-control-label font-weight-bold" for="switch-fw"> </label>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                              <label><?php echo trans('publish-key') ?></label>
                              <input type="text" name="flutterwave_public_key" value="<?php echo html_escape(settings()->flutterwave_public_key); ?>" class="form-control">
                          </div>

                          <div class="form-group">
                            <label><?php echo trans('secret-key') ?> </label>
                            <input type="text" name="flutterwave_secret_key" value="<?php echo html_escape(settings()->flutterwave_secret_key); ?>" class="form-control">
                        </div>
                      </div>
                  </div>



                
                  <div class="col-md-6 mb-4">
                      <div class="card-body">
                          <div class="form-group">
                              <div class="custom-control custom-switch">
                                  <input type="checkbox" value="1" name="enable_offline_payment" class="custom-control-input" id="switch-4" <?php if(settings()->enable_offline_payment == 1){echo "checked";} ?>>
                                  <label class="custom-control-label font-weight-bold" for="switch-4">  <?php echo trans('offline-payment') ?></label>
                              </div>
                          </div>

                          <div class="form-group">
                              <label><?php echo trans('offline-payment-instructions') ?></label>
                              <p class="small"><?php echo trans('offline-payment-suggestions') ?>.</p>
                              <textarea id="summernote" name="offline_details" placeholder="Provide your offline payment instructions here"><?php echo settings()->offline_details; ?></textarea>
                              
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card-footers mt-4">
                        <!-- csrf token -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <button type="submit" class="btn btn-primary btn-lgs"> <?php echo trans('save-changes') ?></button>
                      </div>
                  </div>
                </div>


              </form>
        
            </div>
          </div>
          <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
