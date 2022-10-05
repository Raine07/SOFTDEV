  <div data-bss-disabled-mobile="true" data-aos="fade-right" data-aos-once="true" style="margin-bottom: 2%;padding-top: 2%;padding-bottom: 2%;background: #ffffff;width: 100%;border-top-style: solid;border-top-color: rgba(116,114,120,0.12);border-bottom-style: none;border-bottom-color: rgba(58,59,69,0.23);">
        <h1 style="text-align: center;font-family: Roboto, sans-serif;"><strong>Assessment Form</strong></h1>
    <div class="row">
        <div class="col" style="margin: 9%;">
            <h4 style="font-family: Roboto, sans-serif;">Resiliency Self-Assessment Form</h4>
            <p style="font-family: 'Open Sans', sans-serif;text-align: justify;">In accordance to the Republic Act No. 10173, known as the Data Privacy Act, 
                    is a law that seeks to protect all forms of information, be it private, personal, or sensitive. It is meant to cover both natural and juridical 
                    persons involved in the processing of personal information. Therefore, the results and inputs from this assessment form will be kept confident
            </p>
        </div>
    </div>
</div>
 <!-- test -->

    <!-- Tabs -->
    <div class="container" style="width: 90%;background: #ffffff;padding: 60px;padding-top: 41px;padding-right: 70px;padding-left: 71px;padding-bottom: 118px;margin-bottom: 80px;box-shadow: 0px 0px 5px 1px #bdb1b1;">
        <div>
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item" role="presentation"><a href="<?php echo base_url('assessment/step1')?>" class="nav-link <?php echo ($this->uri->segment(2) == 'step1' ? 'active' : null); ?>"  id ="tab1nav" style="color: var(--bs-gray-800);">Step 1: Hotel Information</a></li>
                <li class="nav-item" role="presentation"><a href="<?php echo base_url('assessment/step2')?>" class="nav-link <?php echo ($this->uri->segment(2) == 'step2' ? 'active' : null); ?>" id ="tab2nav" style="color: var(--bs-gray-800);">Step 2: Risk Profiling</a></li>
                <li class="nav-item" role="presentation"><a href="<?php echo base_url('assessment/step3')?>"class="nav-link <?php echo ($this->uri->segment(2) == 'step3' ? 'active' : null); ?>" id ="tab3nav" style="color: var(--bs-gray-800);">Step 3: Inventory</a></li>
                <li class="nav-item" role="presentation"><a href="<?php echo base_url('assessment/step4')?>" class="nav-link <?php echo ($this->uri->segment(2) == 'step4' ? 'active' : null); ?>" id ="tab4nav" style="color: var(--bs-gray-800);">Step 4: Final Step - Documents</a></li></ul>
            
            <div class="tab-content">
                <div class="tab-pane  <?php echo ($this->uri->segment(2) == 'step1' ? 'active' : null); ?>" role="tabpanel" id="tab-1">
                    
                        <?php echo form_open_multipart('AssessmentController/assessmentStore'); ?>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    
                        <div class="alert alert-danger" style="<?php echo (!empty($this->session->flashdata('error'))? 'display: block;' : 'display: none;' )?> ">
                            <?php echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' ); ?>
                        </div>

                        <div class="alert alert-success" style="<?php echo (!empty($this->session->flashdata('success'))? 'display: block;' : 'display: none;' )?> ">
                            <?php echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' ); ?>
                        </div>


                        <h3 style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;font-weight: bold;">Step 1: Hotel Information</h3>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;">
                            <label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Hotel Name:&nbsp;</label>
                            <input name="hotel-name" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['hotel_name'] ) ?>" placeholder="Hotel Name" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;">
                        </div>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;">
                            <label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Hotel Type:</label>
                            <input name="hotel-type" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['hotel_type'] ) ?>" placeholder="Hotel Type" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;">
                        </div>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;">
                            <label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Hotel Address:</label>
                            <input name="hotel_address" id="hotel_address" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['hotel_address'] ) ?>" placeholder="Hotel Address" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-center" style="min-width: 127px;font-family: Roboto, sans-serif;">DOT Star Rating:&nbsp;</label><select name="dot-rating" class="form-select" value="DOT Star Rating" style="margin-bottom: 15px;font-family: 'Open Sans', sans-serif;">
                                        <optgroup>
                                            <option value="" <?php echo (empty($this->session->userdata('hotelInfo')) ? 'selected' : null)?> >Select Option</option>
                        
                                            <?php if (!empty($this->session->userdata('hotelInfo'))){ ?> 

                                                <option value="1" <?php echo ($this->session->userdata('hotelInfo')['dot_star_rate'] == "1" ? 'selected' : null) ?>>1</option>
                                                <option value="2" <?php echo ($this->session->userdata('hotelInfo')['dot_star_rate'] == "2" ? 'selected' : null) ?>>2</option>
                                                <option value="3" <?php echo ($this->session->userdata('hotelInfo')['dot_star_rate'] == "3" ? 'selected' : null) ?>>3</option>
                                                <option value="4" <?php echo ($this->session->userdata('hotelInfo')['dot_star_rate'] == "4" ? 'selected' : null) ?>>4</option>
                                                <option value="5" <?php echo ($this->session->userdata('hotelInfo')['dot_star_rate'] == "5" ? 'selected' : null) ?>>5</option>

                                                <?php } else { ?>

                                                    <option value="1">1</option>
                                                    <option value="2"> 2</option>
                                                    <option value="3"> 3</option>
                                                    <option value="4"> 4</option>
                                                    <option value="5"> 5</option>

                                                <?php } ?>

                                        </optgroup>
                                    </select></div>
                                <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-center" style="min-width: 127px;font-family: Roboto, sans-serif;">Affiliation:</label><input name="affiliation" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['affiliation'] ) ?>" placeholder="Affiliation" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;"></div>
                            </div>
                            <div class="col">
                                <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-center" style="min-width: 127px;font-family: Roboto, sans-serif;">Owner / Corporate Entity:</label><input name="corp-entity" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['corp_entity'] ) ?>" placeholder="Owner / Corporate Entity" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;margin-bottom: 15px;"></div>
                                <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-center" style="min-width: 127px;font-family: Roboto, sans-serif;">Years of Operation:</label><input name="years-operation" class="form-control" value="<?php echo (empty($this->session->userdata('hotelInfo')) ? null : $this->session->userdata('hotelInfo')['year_of_operation'] ) ?>" style="font-family: 'Open Sans', sans-serif;margin-bottom: 15px;" type="date"></div>
                            </div>
                        </div>
                        <h3 style="text-align: center;margin-top: 24px;font-family: Roboto, sans-serif;font-weight: bold;">Contact Person Information</h3>
                        <p class="text-center" style="font-style: italic;font-size: 13px;">The person answering Assessment Form.</p>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Full Name:&nbsp;</label><input name="rep_name" id="rep_name" value="<?php echo (empty($this->session->userdata('contactPers')) ? null : $this->session->userdata('contactPers')['rep_name'] ) ?>" placeholder="Full Name" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;"></div>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Designation:</label><input name="designation" id="designation" value="<?php echo (empty($this->session->userdata('contactPers')) ? null : $this->session->userdata('contactPers')['designation'] ) ?>" placeholder="Designation" class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;"></div>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Contact Number:</label><input name="contact_no" id="contact_no" value="<?php echo (empty($this->session->userdata('contactPers')) ? null : $this->session->userdata('contactPers')['contact_no'] ) ?>" placeholder="Contact Number"  class="form-control" type="text" style="font-family: 'Open Sans', sans-serif;"></div>
                        <div class="align-items-baseline" style="width: 100%;margin-top: 2%;"><label class="form-label d-xl-flex justify-content-xl-start align-items-xl-end" style="min-width: 100px;font-family: Roboto, sans-serif;">Email Address:</label><input name="email" id="email" value="<?php echo (empty($this->session->userdata('contactPers')) ? null : $this->session->userdata('contactPers')['email'] ) ?>" placeholder="Email Address" class="form-control" type="email" style="font-family: 'Open Sans', sans-serif;"></div>
                         <!--Submit for 1st step -->
                        <button class="btn btn-primary float-end" type="submit" style="margin-top: 25px;margin-botom: 25px;">Next Step</button>
                        <?php echo form_close() ?>
                    <!--</form>-->
                </div>
                <div class="tab-pane  <?php echo ($this->uri->segment(2) == 'step2' ? 'active' : null); ?>" role="tabpanel" id="tab-2">
                    <!--<form action="<?php echo base_url('assessmentController/step2Store'); ?>" method="post">-->
                    
                    <?php echo form_open_multipart('AssessmentController/step2Store'); ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <h3 style="text-align: center;margin-top: 30px;font-weight: bold;">Step 2: Risk Profiling</h3>
                        <div class="d-xxl-flex justify-content-xxl-center">
                            <div class="row d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="margin-top: 20px;margin-bottom: 20px;">
                                <div class="col">
                                    <p class="text-center d-xxl-flex" style="margin-bottom: 0px; color:black;background: #db5f6b;padding: 8px;border-top-style: solid;border-right-style: solid;border-left-style: solid;"><strong>Almost Certain</strong>: Will undoubtedly happen/recur possibly frequently</p>
                                    <p class="text-center d-xxl-flex" style="margin-bottom: 0px; color:black;background: #f4c639;text-align: left;padding: 8px;border-right-style: solid;border-left-style: solid;"><strong>Likely</strong>: Will probably happen/recur but it's not a persisting issue</p>
                                    <p class="text-center d-xxl-flex" style="margin-bottom: 0px; color:black;background: #3f88bd;text-align: left;padding: 8px;border-right-style: solid;border-left-style: solid;"><strong>Possible</strong>: Might happen or recur occasionally</p>
                                    <p class="text-center d-xxl-flex" style="margin-bottom: 0px; color:black;background: #95ed5f; padding: 8px;border-right-style: solid;border-left-style: solid;"><strong>Unlikely</strong>: Don't expect it to happen/recur but it's possible it may do so</p>
                                    <p class="text-center d-xxl-flex" style="margin-bottom: 0px; color:black;background: var(--bs-light); padding: 8px;border-right-style: solid;border-bottom-style: solid;border-left-style: solid;"><strong>Rare</strong>: This will probably never happen/recur</p>
                                </div>
                            </div>
                            <p class="text-center d-xxl-flex" style="color:black;margin-top: -20px;margin-bottom: 19px;"><em>Use this as basis for the&nbsp;</em><strong><em>Likelihood</em></strong><em>&nbsp;of each</em><strong><em>&nbsp;Phenomenon</em></strong><em>.</em></p>
                        </div>
                        
                        <div class="m-auto">
                            <h5 style="text-align: center;margin-top: 16px;font-family: Roboto, sans-serif;font-weight: bold;">A. Geological Hazards</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="font-family: Roboto, sans-serif;">Phenomenon</th>
                                            <th style="font-family: Roboto, sans-serif;">Likelihood</th>
                                            <th style="font-family: Roboto, sans-serif;">Impact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Ground Shaking</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                                <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[0]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>

                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                                <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[0]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[0]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[0]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[0]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[0]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                    
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Liquefaction</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[1]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                                <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[1]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[1]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[1]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[1]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[1]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Ground Rupture</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[2]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                                <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[2]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[2]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[2]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[2]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[2]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Tsunami</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[3]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[3]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[3]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[3]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[3]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[3]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Volcanic Hazards</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[4]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                                <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[4]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[4]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[4]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[4]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[4]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Landslides</td>
                                            <td><select name="dropdownAL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[5]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownAI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[5]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[5]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[5]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[5]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[5]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="m-auto">
                            <h5 style="text-align: center;margin-top: 16px;font-family: Roboto, sans-serif;font-weight: bold;">B.&nbsp;Hydro meteorological</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="font-family: Roboto, sans-serif;">Phenomenon</th>
                                            <th style="font-family: Roboto, sans-serif;">Likelihood</th>
                                            <th style="font-family: Roboto, sans-serif;">Impact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Tropical Cyclone</td>
                                            <td><select name="dropdownBL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[0]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownBI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownAdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownAdata')); ?>
                                                    <option <?php echo ($list[0]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[0]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[0]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[0]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[0]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Floods</td>
                                            <td><select name="dropdownBL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[1]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownBI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                                <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[1]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[1]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[1]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[1]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[1]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Storm Surge</td>
                                            <td><select name="dropdownBL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[2]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownBI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[2]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[2]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[2]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[2]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[2]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Rain Induced Landslide</td>
                                            <td><select name="dropdownBL[]" class="form-select"> 
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[3]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownBI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownBdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownBdata')); ?>
                                                    <option <?php echo ($list[3]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[3]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[3]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[3]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[3]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="m-auto">
                            <h5 style="text-align: center;margin-top: 16px;font-family: Roboto, sans-serif;font-weight: bold;">C. Man-made Hazards</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="font-family: Roboto, sans-serif;">Phenomenon</th>
                                            <th style="font-family: Roboto, sans-serif;">Likelihood</th>
                                            <th style="font-family: Roboto, sans-serif;">Impact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Terrorism</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                                    <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[0]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[0]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[0]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[0]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[0]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[0]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[0]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Civil Disturbance</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[1]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[1]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[1]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[1]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[1]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[1]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[1]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Gas Leak</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[2]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[2]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[2]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[2]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[2]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[2]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[2]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Cyber Attack</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[3]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[3]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[3]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[3]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[3]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[3]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[3]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Hazardous Material Exposure</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[4]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[4]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[4]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[4]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[4]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[4]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[4]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Chemical Spills</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[5]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[5]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[5]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[5]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[5]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[5]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[5]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>Oil Spills</td>
                                            <td><select name="dropdownCL[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[6]->Likelyhood == "Almost Certain" ? 'selected' : null) ?> value="Almost Certain">Almost Certain</option>
                                                    <option <?php echo ($list[6]->Likelyhood == "Likely" ? 'selected' : null) ?> value="Likely">Likely</option>
                                                    <option <?php echo ($list[6]->Likelyhood == "Possible" ? 'selected' : null) ?> value="Possible">Possible</option>
                                                    <option <?php echo ($list[6]->Likelyhood == "Unlikely" ? 'selected' : null) ?> value="Unlikely">Unlikely</option>
                                                    <option <?php echo ($list[6]->Likelyhood == "Rare" ? 'selected' : null) ?> value="Rare">Rare</option>

                                                <?php } else { ?>

                                                    <option value="Almost Certain">Almost Certain</option>
                                                    <option value="Likely">Likely</option>
                                                    <option value="Possible">Possible</option>
                                                    <option value="Unlikely">Unlikely</option>
                                                    <option value="Rare">Rare</option>

                                                <?php } ?>
                                                </select></td>
                                            <td><select name="dropdownCI[]" class="form-select">
                                            <?php if (!empty($this->session->userdata('dropdownCdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('dropdownCdata')); ?>
                                                    <option <?php echo ($list[6]->Impact == "Severe" ? 'selected' : null) ?> value="Severe">Severe</option>
                                                    <option <?php echo ($list[6]->Impact == "Significant" ? 'selected' : null) ?> value="Significant">Significant</option>
                                                    <option <?php echo ($list[6]->Impact == "Moderate" ? 'selected' : null) ?> value="Moderate">Moderate</option>
                                                    <option <?php echo ($list[6]->Impact == "Minor" ? 'selected' : null) ?> value="Minor">Minor</option>
                                                    <option <?php echo ($list[6]->Impact == "Negligible" ? 'selected' : null) ?> value="Negligible">Negligible</option>

                                                <?php } else { ?>

                                                    <option value="Severe">Severe</option>
                                                    <option value="Significant">Significant</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Minor">Minor</option>
                                                    <option value="Negligible">Negligible</option>

                                                <?php } ?>
                                                </select></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-end">
                            
                            <button class="btn btn-primary" type="button" style="margin-right: 10px;border-bottom-style: none;" onClick="document.getElementById('tab-2').setAttribute('class', 'tab-pane'); document.getElementById('tab-1').setAttribute('class', 'tab-pane active'); document.getElementById('tab2nav').setAttribute('class', 'nav-link'); document.getElementById('tab1nav').setAttribute('class', 'nav-link active');">Previous Step</button>
                            <!-- Submit for 2nd step -->
                            <button class="btn btn-primary" type="submit" style="border-bottom-style: none; ">Next Step</button></div>
                    </form>
                </div>
                <div class="tab-pane <?php echo ($this->uri->segment(2) == 'step3' ? 'active' : null); ?>" role="tabpanel" id="tab-3">
                    <!--<form action="<?php echo base_url('index.php/assessmentController/step3Store'); ?>" method="post">-->
                        
                        <?php echo form_open_multipart('AssessmentController/step3Store'); ?>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <h3 style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;font-weight: bold;">Step 3: Inventory</h3>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Paintings / Sculptures / Artworks</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Paintings" name="Paintings" value="Paintings" style="width: 105.9404px;"><select name="PSAOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                    <?php if (!empty($this->session->userdata('PSAdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('PSAdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:
                                    </label><input name="PSAQty[]" class="form-control" value="<?php if (!empty($this->session->userdata('PSAdata'))) { $list=json_decode($this->session->userdata('PSAdata')); echo $list[0]->Qty; }?>" min="0" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" name="Sculptures" value="Sculptures" style="width: 105.9404px;" placeholder="Sculptures"><select name="PSAOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('PSAdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('PSAdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:
                                    </label><input class="form-control" name="PSAQty[]" value="<?php if (!empty($this->session->userdata('PSAdata'))) { $list=json_decode($this->session->userdata('PSAdata')); echo $list[1]->Qty; }?>" min="0" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Artworks" name="Artworks" value="Artworks" style="width: 105.9404px;"><select name="PSAOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <?php if (!empty($this->session->userdata('PSAdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('PSAdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:
                                    </label><input name="PSAQty[]"  class="form-control" value="<?php if (!empty($this->session->userdata('PSAdata'))) { $list=json_decode($this->session->userdata('PSAdata')); echo $list[2]->Qty; }?>" min="0" type="number" style="width: 100%;"></div>
                            </div>
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Buildings</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Buildings" name="Buildings" value="Buildings" style="width: 100.9404px;"><select name="BLDOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('BLDdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('BLDdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="BLDQty[]" value="<?php if (!empty($this->session->userdata('BLDdata'))) { $list=json_decode($this->session->userdata('BLDdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Engineering Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Paintings" name="Generators" value="Generators" style="width: 110.9404px;"><select name="EEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('EEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('EEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;"
                                    >Qty:</label>
                                    <input name="EEQty[]" value="<?php if (!empty($this->session->userdata('EEdata'))) { $list=json_decode($this->session->userdata('EEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" name="Vehicle" value="Vehicle" style="width: 110.9404px;" placeholder="Vehicle"><select name="EEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('EEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('EEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="EEQty[]" value="<?php if (!empty($this->session->userdata('EEdata'))) { $list=json_decode($this->session->userdata('EEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Hammer" name="Hammer" value="Hammer" style="width: 110.9404px;"><select name="EEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('EEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('EEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="EEQty[]" value="<?php if (!empty($this->session->userdata('EEdata'))) { $list=json_decode($this->session->userdata('EEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Axe" name="Axe" value="Axe" style="width: 110.9404px;"><select name="EEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('EEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('EEdata')); ?>
                                                    <option <?php echo ($list[3]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[3]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="EEQty[]" value="<?php if (!empty($this->session->userdata('EEdata'))) { $list=json_decode($this->session->userdata('EEdata')); echo $list[3]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">I.T. Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Desktops" name="Desktops" value="Desktops" style="width: 100.9404px;"><select name="ITEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('ITEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('ITEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="ITEQty[]" value="<?php if (!empty($this->session->userdata('ITEdata'))) { $list=json_decode($this->session->userdata('ITEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Laptops" name="Laptops" value="Laptops" style="width: 100.9404px;"><select name="ITEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('ITEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('ITEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="ITEQty[]" value="<?php if (!empty($this->session->userdata('ITEdata'))) { $list=json_decode($this->session->userdata('ITEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Printers" name="Printers" value="Printers" style="width: 100.9404px;"><select name="ITEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('ITEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('ITEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="ITEQty[]" value="<?php if (!empty($this->session->userdata('ITEdata'))) { $list=json_decode($this->session->userdata('ITEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Routers" name="Routers" value="Routers" style="width: 100.9404px;"><select name="ITEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('ITEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('ITEdata')); ?>
                                                    <option <?php echo ($list[3]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[3]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="ITEQty[]"  value="<?php if (!empty($this->session->userdata('ITEdata'))) { $list=json_decode($this->session->userdata('ITEdata')); echo $list[3]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Kitchen Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Paintings" name="Stoves" value="Stoves" style="width: 125.9404px;"><select name="KEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('KEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('KEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="KEQty[]" value="<?php if (!empty($this->session->userdata('KEdata'))) { $list=json_decode($this->session->userdata('KEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" name="Oven" value="Oven" style="width: 125.9404px;" placeholder="Oven"><select name="KEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('KEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('KEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="KEQty[]" value="<?php if (!empty($this->session->userdata('KEdata'))) { $list=json_decode($this->session->userdata('KEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Refrigerators" name="Refrigerators" value="Refrigerators" style="width: 125.9404px;"><select name="KEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('KEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('KEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="KEQty[]" value="<?php if (!empty($this->session->userdata('KEdata'))) { $list=json_decode($this->session->userdata('KEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Freezers" name="Freezers" value="Freezers" style="width: 125.9404px;"><select name="KEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('KEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('KEdata')); ?>
                                                    <option <?php echo ($list[3]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[3]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="KEQty[]" value="<?php if (!empty($this->session->userdata('KEdata'))) { $list=json_decode($this->session->userdata('KEdata')); echo $list[3]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Office Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Desktops" name="Chairs" value="Chairs" style="width: 146.9404px;"><select name="OEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('OEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('OEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="OEQty[]" value="<?php if (!empty($this->session->userdata('OEdata'))) { $list=json_decode($this->session->userdata('OEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Tables" name="Tables" value="Tables" style="width: 146.9404px;"><select name="OEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('OEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('OEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="OEQty[]" value="<?php if (!empty($this->session->userdata('OEdata'))) { $list=json_decode($this->session->userdata('OEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="File Cabinets" name="File Cabinets" value="File Cabinets" style="width: 146.9404px;"><select name="OEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('OEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('OEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="OEQty[]" value="<?php if (!empty($this->session->userdata('OEdata'))) { $list=json_decode($this->session->userdata('OEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Xerox Machines" name="Xerox Machines" value="Xerox Machines" style="width: 146.9404px;"><select name="OEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('OEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('OEdata')); ?>
                                                    <option <?php echo ($list[3]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[3]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="OEQty[]" value="<?php if (!empty($this->session->userdata('OEdata'))) { $list=json_decode($this->session->userdata('OEdata')); echo $list[3]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Housekeeping Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Brooms" name="Brooms" value="Brooms" style="width: 153.9404px;"><select name="HEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('HEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('HEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="HEQty[]" value="<?php if (!empty($this->session->userdata('HEdata'))) { $list=json_decode($this->session->userdata('HEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" name="Dust Pans" value="Dust Pans" style="width: 153.9404px;" placeholder="Vehicle"><select name="HEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('HEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('HEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="HEQty[]" value="<?php if (!empty($this->session->userdata('HEdata'))) { $list=json_decode($this->session->userdata('HEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Vacuum Cleaner" name="Vacuum Cleaner" value="Vacuum Cleaner" style="width: 153.9404px;"><select name="HEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('HEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('HEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="HEQty[]" value="<?php if (!empty($this->session->userdata('HEdata'))) { $list=json_decode($this->session->userdata('HEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Floor Polisher" name="Floor Polisher" value="Floor Polisher" style="width: 153.9404px;"><select name="HEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('HEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('HEdata')); ?>
                                                    <option <?php echo ($list[3]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[3]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="HEQty[]" value="<?php if (!empty($this->session->userdata('HEdata'))) { $list=json_decode($this->session->userdata('HEdata')); echo $list[3]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                            <div class="col">
                                <h5 class="text-start" style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;">Security Equipments</h5>
                                <p style="font-style: italic;color: rgb(163,168,173);">Select all that applies:</p>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Desktops" name="CCTV Cameras" value="CCTV Cameras" style="width: 147.9404px;"><select name="SEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('SEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('SEdata')); ?>
                                                    <option <?php echo ($list[0]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[0]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="SEQty[]" value="<?php if (!empty($this->session->userdata('SEdata'))) { $list=json_decode($this->session->userdata('SEdata')); echo $list[0]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Security Alarms" name="Security Alarms" value="Security Alarms" style="width: 147.9404px;"><select name="SEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('SEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('SEdata')); ?>
                                                    <option <?php echo ($list[1]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[1]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="SEQty[]" value="<?php if (!empty($this->session->userdata('SEdata'))) { $list=json_decode($this->session->userdata('SEdata')); echo $list[1]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" placeholder="Security Vehicle" name="Security Vehicle" value="Security Vehicle" style="width: 147.9404px;"><select name="SEOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                <?php if (!empty($this->session->userdata('SEdata'))){ ?>
                                            <?php $list=json_decode($this->session->userdata('SEdata')); ?>
                                                    <option <?php echo ($list[2]->Option == "Yes" ? 'selected' : null) ?> value="Yes">Yes</option>
                                                    <option <?php echo ($list[2]->Option == "No" ? 'selected' : null) ?> value="No">No</option>


                                                <?php } else { ?>

                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>

                                                <?php } ?>
                                    </select><label class="form-label d-inline-flex d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 0px;margin-right: 11px;margin-left: 11px;">
                                    Qty:</label>
                                    <input name="SEQty[]" value="<?php if (!empty($this->session->userdata('SEdata'))) { $list=json_decode($this->session->userdata('SEdata')); echo $list[2]->Qty; }?>" class="form-control" type="number" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="text-end" style="width: 100%;">
                        <button class="btn btn-primary" type="button" style="margin-top:20px; margin-right: 19px; border-bottom-style: none;" onClick="document.getElementById('tab-3').setAttribute('class', 'tab-pane'); document.getElementById('tab-2').setAttribute('class', 'tab-pane active'); document.getElementById('tab3nav').setAttribute('class', 'nav-link'); document.getElementById('tab2nav').setAttribute('class', 'nav-link active');">Previous Step</button>
                        <!-- Submit for 3nd step -->
                        <button class="btn btn-primary" type="submit" style="margin-top:20px; border-bottom-style: none;">Next Step</button></div>
                    </form>
                </div>
                
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="tab-pane <?php echo ($this->uri->segment(2) == 'step4' ? 'active' : null); ?>" role="tabpanel" id="tab-4">

                        <div class="alert alert-danger" style="<?php echo (!empty($this->session->flashdata('word_error'))? 'display: block;' : 'display: none;' )?> ">
                            <?php echo $this->session->flashdata('word_error'); $this->session->unset_userdata ( 'word_error' ); ?>
                        </div>

                        <div class="alert alert-success" style="<?php echo (!empty($this->session->flashdata('word'))? 'display: block;' : 'display: none;' )?> ">
                            <?php echo $this->session->flashdata('word'); $this->session->unset_userdata ( 'word' ); ?>
                        </div>
                        
                    <?php echo form_open_multipart('AssessmentController/step4Store'); ?>
                    <!-- <form action="<?php echo base_url('index.php/assessmentController/step4Store'); ?>" method="post" enctype="multipart/form-data"> -->
                    
                    <div>
                        <h3 style="text-align: center;margin-top: 30px;font-family: Roboto, sans-serif;font-weight: bold;">Final Step</h3>
                        <div class="row">
                            <div class="col" style="padding: 81px;padding-bottom: 66px;">
                                <h4 style="font-family: Roboto, sans-serif;font-weight: bold;">Check the following documents you have in place.</h4>
                                <p5 style="font-family: Roboto, sans-serif;">Do you have:</p5></br></br>
                                <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Asset Protection" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Asset Protection" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Risk Management Plan" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Risk Management Plan" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Business Continuity Plan" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Business Continuity Plan" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Crisis Management Plan" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Crisis Management Plan" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Opportunity Management Plan" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Opportunity Management Plan" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Resilience Communication Plan" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Resilience Communication Plan" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                                    <div class="d-inline-flex float-start" style="width: 100%;margin-bottom: 11px;"><input class="form-control" type="text" disabled="" readonly="" value="Crisis Communication" style="width: 255px;">
                                    <select name="docOpt[]" class="form-select" style="width: 75.9897px;margin-left: 11px;">
                                        <option value="Crisis Communication" selected="">Yes</option>
                                        <option value="No">No</option>
                                    </select></div>

                            </div>
                            <div class="col" style="padding: 81px;padding-bottom: 66px;">
                                <h4 style="font-family: Roboto, sans-serif;font-weight: bold;">Notice Before Uploading</h4>
                                <p>The contents of the .zip file to be uploaded should have the Plan Documents you selected as Yes. DRRH will consider this as a failed assessment if there are missing documents among those you selected Yes.<br><br>It is also recommended to name your .zip file with this format "(Hotelname).zip".</p>
                                
                                <label class="form-label">Upload the .zip file here:</label><input class="form-control" type="file" name="attachment" id="attachment">

                            </div>
                        </div>
                        <p>Date of Assessment: <input class="form-control" id="DOS" name="DOS" type="date" value ="<?php date_default_timezone_set("Asia/Manila"); echo date("Y-m-d"); ?>" readonly="" disabled=""><br></p>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">I hereby certify that the given information are true and correct to the best of my knowledge and the documents submitted were not falsified in any way.</label></div>
                        <div class="text-end" style="width: 100%;margin-top: 25px;"><button class="btn btn-primary" type="button" style="margin-right: 19px;border-bottom-style: none;" onClick="document.getElementById('tab-4').setAttribute('class', 'tab-pane'); document.getElementById('tab-3').setAttribute('class', 'tab-pane active'); document.getElementById('tab4nav').setAttribute('class', 'nav-link'); document.getElementById('tab3nav').setAttribute('class', 'nav-link active');">Previous Step</button>
                        <!-- Submit for Last step -->
                        <button class="btn btn-primary" type="submit" value="upload" style="border-style: none;border-top-style: none;border-bottom-style: none;">Submit</button></div>
                    <?php echo form_close();?>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/drrh/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="/drrh/assets/js/Scroll-to-top.js"></script>
</body>

</html>