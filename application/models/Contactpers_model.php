<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactpers_model extends CI_Model {

    private $table = "contact_pers";
    public function __construct() {
        parent::__construct();

        //create table if it doesn't exist
        if (!$this->db->table_exists($this->table) )
        {
            $this->load->dbforge();
            // define table fields
            $fields = array(
                'id' => array(
                    'type' => 'varchar',
                    'auto_increment' => TRUE,
                    'constraint' => 50
                    ),
                'rep_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
                ),
                'designation' => array(
                'type' => 'VARCHAR',
                'constraint' =>255,
                ),
                'contact_no' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
                ),
                'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
                ),
            );
                
            $this->dbforge->add_field($fields);
            // define primary key
            $this->dbforge->add_key('id', TRUE);
            // create table
            $this->dbforge->create_table($this->table);
        }
    }

    public function create($data = [])
    {  
        return $this->db->insert($this->table, $data);
    }

    // public function getRecord(){
    //     return $this->db->select('*')->from('hotel_information')->get()->result();
    // }
}