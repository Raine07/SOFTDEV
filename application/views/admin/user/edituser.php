
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php $this->load->view('admin/include/breadcrumb'); ?>

    <!-- Main content -->
    <div class="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">User Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 1100px;">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Information</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo base_url(); ?>index.php/edituser/updateme/<?php echo $info->id; ?>" method="post">
                                                <div class="alert alert-danger" style="<?php echo (!empty($this->session->flashdata('error'))? 'display: block;' : 'display: none;' )?> ">
                                                    <?php echo $this->session->flashdata('error'); $this->session->unset_userdata ( 'error' ); ?>
                                                </div>
                                                <div class="alert alert-success" style="<?php echo (!empty($this->session->flashdata('success'))? 'display: block;' : 'display: none;' )?> ">
                                                    <?php echo $this->session->flashdata('success'); $this->session->unset_userdata ( 'success' ); ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="full_name">Name:</label><input maxlength="100" class="form-control" type="text" id="full_name" value="<?php echo $info->full_name; ?>" name="full_name"></div>
                                                    </div>
                                                    <div class="col">
                                                    <div><label class="form-label">Email Address:</label><input class="form-control" value="<?php echo $info->email; ?>" name="email" id="email" type="text" readonly=""></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name">Contact No:</label><input class="form-control" type="text" maxlength="25" id="contact_number" value="<?php echo $info->contact_number ?>" name="contact_number" placeholder="This user has no set contact number."></div>
                                                    </div>
                                                    <!-- <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Password</strong></label><input class="form-control" type="password" id="passw" value="1234567" name="passw"></div>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label">Password:&nbsp;</label><input class="form-control" value="<?php echo $info->passw; ?>" name="passw" id="passw" type="password">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div>
                                                            <label class="form-label">Repeat Password:&nbsp;</label><input class="form-control" value="<?php echo $info->passw; ?>" name="passw2" id="passw2" type="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:5px;">
                                                    <div class="col">
                                                        
                                                        <div class="mb-3"><label class="form-label" for="last_name">Role</label>
                                                            <select class="form-select" id="role" name="role">
                                                                <option value="Admin" <?php if($info->role=="Admin"){echo 'selected';}?>>Admin</option>
                                                                <option value="Hotel Representative" <?php if($info->role=="Hotel Representative"){echo 'selected';}?>>Hotel Representative</option>
                                                            </select>
                                                        </div>
                                                            <div class="mb-3"><label class="form-label" for="address">Address</label><input class="form-control" type="text" id="user_address" value="<?php echo $info->user_address ?>" placeholder="This user has no set address." name="user_address"></div>
                                                <div class="row">
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" placeholder="Sunset Blvd, 38" name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" placeholder="Los Angeles" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" placeholder="USA" name="country"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>