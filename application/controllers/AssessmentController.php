<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AssessmentController extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->model('Step1_model');
            $this->load->model('Step2_model');
            $this->load->model('Step3_model');
            $this->load->model('Laststep_model');

            $this->load->model('Contactpers_model');
            $this->load->helper(array('form', 'url')); 
            $this->load->helper('date');
        }

        public function view($page = 'home') 
        {
            $this->load->database();
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');
            $this->load->helper('url'); 
            $this->load->model('Step1_model');
            $this->load->model('Step2_model');
            $this->load->model('Step3_model');
            $this->load->model('Laststep_model');

            $this->load->model('Contactpers_model');
        }
        
        public function assessmentStore() {

            $this->load->model('Step1_model');
            
            $this->load->library('session');
            $this->load->library('form_validation');
            
            //STEP1 
            //STEP1 
            //STEP1 
            //STEP1 
            $this->form_validation->set_rules('hotel-name', 'Hotel Name', 'required');
            $this->form_validation->set_rules('hotel-type', 'Hotel Type', 'required');
            $this->form_validation->set_rules('hotel_address', 'Hotel Address', 'required');
            $this->form_validation->set_rules('dot-rating', 'DOT Rating', 'required');
            $this->form_validation->set_rules('affiliation', 'Affiliation', 'required');
            $this->form_validation->set_rules('corp-entity', 'Owner/Corporate Entity', 'required');
            $this->form_validation->set_rules('years-operation', 'Years of Operation', 'required');
            $this->form_validation->set_rules('rep_name', 'Representatives full name', 'required');
            $this->form_validation->set_rules('designation', 'Designation', 'required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required');

            
          

            $hotelInfo = [
                
                'hotel_name' => $this->input->post('hotel-name'),
                'hotel_type' => $this->input->post('hotel-type'),
                'hotel_address' => $this->input->post('hotel_address'),
                'dot_star_rate' => $this->input->post('dot-rating'),
                'corp_entity' => $this->input->post('corp-entity'),
                'affiliation' => $this->input->post('affiliation'),
                'year_of_operation' => $this->input->post('years-operation'),
            ];

            

            $contactPers = [
                
                'rep_name' => $this->input->post('rep_name'),
                'designation' => $this->input->post('designation'),
                'contact_no' => $this->input->post('contact_no'),
                'email' => $this->input->post('email'),
            ];

            $this->session->set_userdata([
                'hotelInfo'     => $hotelInfo,
                'contactPers' => $contactPers,
            ]);

            
            // //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            // //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            // //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            if($this->form_validation->run() === TRUE ) {

            //     // if($this->Step2_model->create($this->session->userdata('contactPers'))) {
            //     //     $this->session->set_flashdata('success','Success Creating Record!');
            //     // }
            //     // else {
            //     //     $this->session->set_flashdata('error','Error Creating Record!');
          
            //     // }
                redirect('assessment/step2');
            }

            else {
                $this->session->set_flashdata('error',validation_errors());
                redirect('assessment/step1');
            }

        }

            //STEP2 
            //STEP2 
            //STEP2 
            //STEP2 
        public function step2Store() {
            $this->load->model('Step2_model');
            $this->load->library('session');

            $dropdownALdata = $this->input->post('dropdownAL');
            $dropdownAIdata = $this->input->post('dropdownAI');

            $dropdownBLdata = $this->input->post('dropdownBL');
            $dropdownBIdata = $this->input->post('dropdownBI');

            $dropdownCLdata = $this->input->post('dropdownCL');
            $dropdownCIdata = $this->input->post('dropdownCI');

            $dropdownAdataContainer = array();
            for($x = 0 ; $x < sizeof($dropdownALdata) ; $x++ ) {
                $dropdownAdataContainer[$x] = array(
                    'Likelyhood' => $dropdownALdata[$x],
                    'Impact' => $dropdownAIdata[$x],
                );
            }

            $dropdownBdataContainer = array();
            for($x = 0 ; $x < sizeof($dropdownBLdata) ; $x++ ) {
                $dropdownBdataContainer[$x] = array(
                    'Likelyhood' => $dropdownBLdata[$x],
                    'Impact' => $dropdownBIdata[$x],
                );
            }

            $dropdownCdataContainer = array();
            for($x = 0 ; $x < sizeof($dropdownCLdata) ; $x++ ) {
                $dropdownCdataContainer[$x] = array(
                    'Likelyhood' => $dropdownCLdata[$x],
                    'Impact' => $dropdownCIdata[$x],
                );
            }

            //JSON
            //JSON
            //JSON
            $dropdownAJson = json_encode($dropdownAdataContainer);
            $dropdownBJson = json_encode($dropdownBdataContainer);
            $dropdownCJson = json_encode($dropdownCdataContainer);


            //UPLOAD TO USER DATA
            //UPLOAD TO USER DATA
            //UPLOAD TO USER DATA
            $this->session->set_userdata([
                'dropdownAdata'     => $dropdownAJson,
                'dropdownBdata'     => $dropdownBJson,
                'dropdownCdata'     => $dropdownCJson,
            ]);

            $rpdata = array(
                "Geological" => $this->session->userdata('dropdownAdata'),
                "Hydrometeorological" => $this->session->userdata('dropdownBdata'),
                "ManmadeHazards" => $this->session->userdata('dropdownCdata'),
            );

            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
                // if($this->Step2_model->create($data)) {
                //     $this->session->set_flashdata('success','Success Creating Record!');
                // }
                // else {
                //     $this->session->set_flashdata('error','Error Creating Record!');
          
                // }
                redirect('assessment/step3');

        }

        //STEP3
        //STEP3
        //STEP3
        public function step3Store() {
            $this->load->model('Step3_model');
            $this->load->library('session');

            $PSAOpt = $this->input->post('PSAOpt');
            $PSAQty = $this->input->post('PSAQty');

            $BLDOpt = $this->input->post('BLDOpt');
            $BLDQty = $this->input->post('BLDQty');

            $EEOpt = $this->input->post('EEOpt');
            $EEQty = $this->input->post('EEQty');

            $ITEOpt = $this->input->post('ITEOpt');
            $ITEQty = $this->input->post('ITEQty');

            $KEOpt = $this->input->post('KEOpt');
            $KEQty = $this->input->post('KEQty');

            $OEOpt = $this->input->post('OEOpt');
            $OEQty = $this->input->post('OEQty');

            $HEOpt = $this->input->post('HEOpt');
            $HEQty = $this->input->post('HEQty');

            $SEOpt = $this->input->post('SEOpt');
            $SEQty = $this->input->post('SEQty');

          
            $PSAdataContainer = array();
            for($x = 0 ; $x < sizeof($PSAOpt) ; $x++ ) {
                $PSAdataContainer[$x] = array(
                    'Option' => $PSAOpt[$x],
                    'Qty' => $PSAQty[$x],
                );
            }

            $BLDdataContainer = array();
            for($x = 0 ; $x < sizeof($BLDOpt) ; $x++ ) {
                $BLDdataContainer[$x] = array(
                    'Option' => $BLDOpt[$x],
                    'Qty' => $BLDQty[$x],
                );
            }

            $EEdataContainer = array();
            for($x = 0 ; $x < sizeof($EEOpt) ; $x++ ) {
                $EEdataContainer[$x] = array(
                    'Option' => $EEOpt[$x],
                    'Qty' => $EEQty[$x],
                );
            }

            $ITEdataContainer = array();
            for($x = 0 ; $x < sizeof($ITEOpt) ; $x++ ) {
                $ITEdataContainer[$x] = array(
                    'Option' => $ITEOpt[$x],
                    'Qty' => $ITEQty[$x],
                );
            }

            $KEdataContainer = array();
            for($x = 0 ; $x < sizeof($KEOpt) ; $x++ ) {
                $KEdataContainer[$x] = array(
                    'Option' => $KEOpt[$x],
                    'Qty' => $KEQty[$x],
                );
            }

            $OEdataContainer = array();
            for($x = 0 ; $x < sizeof($OEOpt) ; $x++ ) {
                $OEdataContainer[$x] = array(
                    'Option' => $OEOpt[$x],
                    'Qty' => $OEQty[$x],
                );
            }

            $HEdataContainer = array();
            for($x = 0 ; $x < sizeof($HEOpt) ; $x++ ) {
                $HEdataContainer[$x] = array(
                    'Option' => $HEOpt[$x],
                    'Qty' => $HEQty[$x],
                );
            }

            $SEdataContainer = array();
            for($x = 0 ; $x < sizeof($SEOpt) ; $x++ ) {
                $SEdataContainer[$x] = array(
                    'Option' => $SEOpt[$x],
                    'Qty' => $SEQty[$x],
                );
            }

            //JSON
            //JSON
            //JSON
            $PSAdataJson = json_encode($PSAdataContainer);
            $BLDdataJson = json_encode($BLDdataContainer);
            $EEdataJson = json_encode($EEdataContainer);
            $ITEdataJson = json_encode($ITEdataContainer);
            $KEdataJson = json_encode($KEdataContainer);
            $OEdataJson = json_encode($OEdataContainer);
            $HEdataJson = json_encode($HEdataContainer);
            $SEdataJson = json_encode($SEdataContainer);

            //UPLOAD TO USER DATA
            //UPLOAD TO USER DATA
            //UPLOAD TO USER DATA
            $this->session->set_userdata([
                'PSAdata'     => $PSAdataJson,
                'BLDdata'     => $BLDdataJson,
                'EEdata'     => $EEdataJson,
                'ITEdata'     => $ITEdataJson,
                'KEdata'     => $KEdataJson,
                'OEdata'     => $OEdataJson,
                'HEdata'     => $HEdataJson,
                'SEdata'     => $SEdataJson,
            ]);

            $invdata = [
                "PSA" => $this->session->userdata('PSAdata'),
                "BLD" => $this->session->userdata('BLDdata'),
                "EE" => $this->session->userdata('EEdata'),
                "ITE" => $this->session->userdata('ITEdata'),
                "KE" => $this->session->userdata('KEdata'),
                "OE" => $this->session->userdata('OEdata'),
                "HE" => $this->session->userdata('HEdata'),
                "SE" => $this->session->userdata('SEdata'),
            ];

            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
                // if($this->Step3_model->create($data)) {
                //     $this->session->set_flashdata('success','Success Creating Record!');
                // }
                // else {
                //     $this->session->set_flashdata('error','Error Creating Record!');
          
                // }
                redirect('assessment/step4');

        }


        //STEP4
        //STEP4
        //STEP4
        public function step4Store() {
            $this->load->model('Laststep_model');
            $this->load->model('Transactions_model');
            $this->load->library('session');
            $this->load->library('upload');
            $this->load->helper(array('form', 'url'));

            $config['upload_path']   = APPPATH.'/Attachments/';
            $config['allowed_types'] = 'zip';
            $config['max_size']      = 0;
            $config['max_width']     = 0;
            $config['max_height']    = 0;
            $config['overwrite']     = true;
        
            // Helpers
            $this->load->helper('url');
            $this->load->library('upload');
            $this->upload->initialize($config);

            $name = 'attachment';

            if (empty($_FILES['attachment']['name'])) {
                $this->form_validation->set_rules('attachment','attachment','required');
            }
            $this->form_validation->set_rules('sample','sample','max_length[30]');
            

            // FILE OPTIONS
            $docOpt = $this->input->post('docOpt');

            $docOptdatacontainer = array();
            for($x = 0 ; $x < sizeof($docOpt) ; $x++ ) {
                $docOptdatacontainer[$x] = array(
                    'Option' => $docOpt[$x],
                );
            }

            //JSON
            //JSON
            //JSON
            $docOptdataJson = json_encode($docOptdatacontainer);

            // UPLOAD TO USER DATA
            // UPLOAD TO USER DATA
            // UPLOAD TO USER DATA
            $this->session->set_userdata([
                'docOpt'     => $docOptdataJson,
            ]);

            $data = [
                "docs" => $this->session->userdata('docOpt'),
            ];

            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            //UPLOAD TO DATABASE ALWAYS COMMENT,,, ONLY UNCOMMENT TO TEST UPLOAD FUNCTION
            if($this->form_validation->run() === TRUE ) {

                if ( ! $this->upload->do_upload($name))

                {
                        // $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('word_error', $this->upload->display_errors());
                        
                }
               
                else
                {

                    $cpdata = [];
                    $hidata = [];
                    $invdata = [];
                    $rpdata = [];
                    $sddata = [];

                    $contactPers = array(
                        'rep_name' => $this->session->userdata('rep_name'),
                        'designation' => $this->session->userdata('designation'),
                        'contact_no' => $this->session->userdata('contact_no'),
                        'email' => $this->session->userdata('email'),
                    );  

                    $this->load->helper('string');
                    $prefix = 'CP-';
                    $cpuniqueid = $prefix . random_string('unique');

                    $contactPers = array(
                        'id' => $cpuniqueid,
                        'rep_name' =>$this->session->userdata('contactPers')['rep_name'],
                        'designation' =>$this->session->userdata('contactPers')['designation'],
                        'contact_no' =>$this->session->userdata('contactPers')['contact_no'],
                        'email' =>$this->session->userdata('contactPers')['email'],
                       
                    );  

                    $this->load->helper('string');
                    $prefix = 'HI-';
                    $hiuniqueid = $prefix . random_string('unique');
                    date_default_timezone_set("Asia/Manila");
                    $date = date('y-m-d');
                    $hotelInfo = array(
                        'id' => $hiuniqueid,
                        'hotel_name' => $this->session->userdata('hotelInfo')['hotel_name'],
                        'hotel_type' => $this->session->userdata('hotelInfo')['hotel_type'],
                        'hotel_address' => $this->session->userdata('hotelInfo')['hotel_address'],
                        'dot_star_rate' => $this->session->userdata('hotelInfo')['dot_star_rate'],
                        'corp_entity' => $this->session->userdata('hotelInfo')['corp_entity'],
                        'affiliation' => $this->session->userdata('hotelInfo')['affiliation'],
                        'year_of_operation' => $this->session->userdata('hotelInfo')['year_of_operation'],
                        'dos' => $date,
                        
                    );

                    $this->load->helper('string');
                    $prefix = 'INV-';
                    $invuniqueid = $prefix . random_string('unique');

                    $invdata = array(
                        'id' => $invuniqueid,
                        "PSA" => $this->session->userdata('PSAdata'), 
                        "BLD" => $this->session->userdata('BLDdata'), 
                        "EE" => $this->session->userdata('EEdata'), 
                        "ITE" => $this->session->userdata('ITEdata'), 
                        "KE" => $this->session->userdata('KEdata'), 
                        "OE" => $this->session->userdata('OEdata'), 
                        "HE" => $this->session->userdata('HEdata'),
                        "SE" => $this->session->userdata('SEdata'), 
                    );

                    $prefix = 'RP-';
                    $rpuniqueid = $prefix . random_string('unique');
                    $rpdata = array(
                        'id' => $rpuniqueid,
                        "Geological" => $this->session->userdata('dropdownAdata'),
                        "Hydrometeorological" => $this->session->userdata('dropdownBdata'),
                        "ManmadeHazards" => $this->session->userdata('dropdownCdata'),
                    );

                    $prefix = 'SD-';
                    $sduniqueid = $prefix . random_string('unique');
                    $sddata = array(
                        'id' => $sduniqueid,
                        "docs" => $this->session->userdata('docOpt'),
                    );

                    $allid = array(
                        'id' => $hiuniqueid,
                        'contact_pers_id' => $cpuniqueid,
                        'inventory_id' => $invuniqueid, 
                        'risk_profiling_id' => $rpuniqueid, 
                        'submitted_docs_id' => $sduniqueid,
                        'hrep_id' => $this->session->userdata('id'), 
                    );

                    $upload = $this->upload->data();
                    $sddata ['file_name'] = $upload ['file_name'];
                    if($this->Transactions_model->trans($contactPers, $hotelInfo, $invdata, $rpdata, $sddata, $allid)) {

                        $this->session->set_flashdata('word_error','Assessment Submission Failed!');
                        

                    }
                    else {
                        
                        $this->session->set_flashdata('word','Assessment Submission Success!');
                        $this->session->unset_userdata(['hotelInfo', 'contactPers', 'dropdownAdata', 'dropdownBdata', 'dropdownCdata', 'PSAdata', 'BLDdata', 'EEdata', 'ITEdata', 'KEdata', 'OEdata', 'HEdata', 'SEdata']);
              
                    }
                    
                }
                
                redirect('assessment/step4');
    
            }
            else {
                $this->session->set_flashdata('word_error', validation_errors());

                redirect('assessment/step4');
            }

            
                

        }

 }
