<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends Home_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!is_customer()) {
            redirect(base_url());
        }
    }

    public function appointments()
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Appointments';
        $data['page_lang'] = 'appointments';
        $data['menu'] = FALSE;
        $data['appointments'] = $this->common_model->get_customer_appointments();
        $data['customer'] = $this->common_model->get_by_id(customer()->id, 'customers');
        $data['company'] = $this->common_model->get_by_uid($data['customer']->business_id, 'business');
        $data['main_content'] = $this->load->view('customers/appointments', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function payment($id)
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Payment';
        $data['page_lang'] = 'payment';
        $data['menu'] = FALSE;
        $data['appointment'] = $this->common_model->get_appointment_md5($id);
        $data['company'] = $this->common_model->get_by_uid($data['appointment']->business_id, 'business');
        $data['appointment_id'] = $data['appointment']->user_id;
        $this->session->set_userdata('appointment_id', $data['appointment']->id);
        $this->session->set_userdata('company_slug', $data['company']->slug);
        $data['user'] = $this->common_model->get_by_id($data['appointment']->user_id, 'users');
        $data['main_content'] = $this->load->view('customers/payment', $data, TRUE);
        $this->load->view('index', $data);
    }

    public function payment_msg($type, $id){
        $data = array();
        $data['menu'] = FALSE;
        $data['type'] = ucfirst($type);
        $data['id'] = $id;
        $data['main_content'] = $this->load->view('customers/payment_msg',$data,TRUE);
        $this->load->view('index',$data);
    }


    public function account()
    {   
        $data = array();
        $data['page'] = 'Customers';
        $data['page_title'] = 'Account';
        $data['page_lang'] = 'account';
        $data['menu'] = FALSE;
        $data['customer'] = $this->common_model->get_by_id(customer()->id, 'customers');
        $data['main_content'] = $this->load->view('customers/account', $data, TRUE);
        $this->load->view('index', $data);
    }


    //update user profile
    public function update(){
        
        check_status();

        if ($_POST) {

            $id = $this->input->post('id', true);
            $data = array(
                'name' => $this->input->post('name', true),
                'phone' => $this->input->post('phone', true),
                'email' => $this->input->post('email', true)
            );

            // insert photos
            if($_FILES['photo']['name'] != ''){
                $up_load = $this->admin_model->upload_image('800');
                $data_img = array(
                    'image' => $up_load['images'],
                    'thumb' => $up_load['thumb']
                );
                $this->admin_model->edit_option($data_img, $id, 'customers');   
            }

            $data = $this->security->xss_clean($data);
            $this->admin_model->edit_option($data, $id, 'customers');
            $this->session->set_flashdata('msg', 'Updated Successfully'); 
            redirect(base_url('customer/account'));
        }
    }


    //cancel appointment
    public function cancel_appointment($status, $id){
        $data = array(
            'status' => $status
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option($data, $id, 'appointments');
        $this->session->set_flashdata('msg', 'Updated Successfully'); 
        redirect(base_url('customer/appointments'));
    }


    public function cancel($id)
    {
        $data = array(
            'status' => 2
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option_md5($data, $id, 'appointments');


        $status_text = trans('cancelled');
        $appointment = $this->admin_model->get_by_md5_id($id, 'appointments');
  
        $company = $this->admin_model->get_business($appointment->business_id);
        //notify customer
        $customer = $this->admin_model->get_by_id($appointment->customer_id, 'customers');
        $service = $this->admin_model->get_by_id($appointment->service_id, 'services');

        $subject = trans('appointment').' - '.$status_text;
        $msg = trans('appointment').' '.$service->name.' '.trans('at').' '.my_date_show($appointment->date).' '.trans('at').' '.$appointment->time.' '.trans('is').' '.$status_text;
        $this->email_model->send_email($customer->email, $subject, $msg);


        $user_msg = trans('customer').' '.$customer->name.', '.$status_text.' '.trans('appointment').' '.$service->name.' '.trans('at').' '.my_date_show($appointment->date).' '.trans('at').' '.$appointment->time;

        //notify user
        $user = $this->admin_model->get_by_id($appointment->user_id, 'users');
        $this->email_model->send_email($user->email, $subject, $user_msg);

        if ($appointment->staff_id != 0) {
            $staff = $this->admin_model->get_by_id($appointment->staff_id, 'staffs');
            $this->email_model->send_email($staff->email, $subject, $user_msg);
        }

        // send sms to customer
        if ($user->enable_sms_notify == 1) {
            $this->load->model('sms_model');
            $response = $this->sms_model->send_user($customer->phone, $msg, $user->id);
        }

        echo json_encode(array('st' => 1));
    }



    public function change_password()
    {
        $data = array();
        $data['page'] = 'Customers';
        $data['menu'] = FALSE;
        $data['page_title'] = 'Change Password';
        $data['page_lang'] = 'change-password';
        $data['customer'] = $this->common_model->get_by_id($this->session->userdata('id'), 'customers');
        $data['main_content'] = $this->load->view('customers/account', $data, TRUE);
        $this->load->view('index', $data);
    }


    public function customer_receipt($puid)
    {
        $data = array();
        $data['page_title'] = 'Payment Receipt'; 
        $data['user'] = $this->admin_model->get_customer_payment_details($puid);
        $this->load->view('admin/payment/customer_invoice_receipt',$data);
    }


    public function add_rating() 
    {
        if ($_POST) {
            
            $id = $this->input->post('appointment_id');
            $appointment = $this->common_model->get_by_id($id, 'appointments');
          
            $data = array(
                'user_id' => $appointment->user_id,
                'business_id' => $appointment->business_id,
                'service_id' => $appointment->service_id,
                'appointment_id' => $id,
                'customer_id' => $appointment->customer_id,
                'rating' => $this->input->post('rating'),
                'feedback' => $this->input->post('feedback'),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            $this->admin_model->insert($data, 'ratings');
            $this->session->set_flashdata('msg', trans('inserted-successfully')); 
            redirect(base_url('customer/appointments'));
        }
    }
    

    //change password
    public function change()
    {   
        check_status();

        if($_POST){
            
            $id = $this->session->userdata('id');
            $user = $this->admin_model->get_by_id($id, 'customers');

            if(password_verify($this->input->post('old_pass', true), $user->password)){
                if ($this->input->post('new_pass', true) == $this->input->post('confirm_pass', true)) {
                    $data=array(
                        'password' => hash_password($this->input->post('new_pass', true))
                    );
                    $data = $this->security->xss_clean($data);
                    $this->admin_model->edit_option($data, $id, 'customers');
                    echo json_encode(array('st'=>1));
                } else {
                    echo json_encode(array('st'=>2));
                }
            } else {
                echo json_encode(array('st'=>0));
            }
        }
    }



}