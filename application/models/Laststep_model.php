<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laststep_model extends CI_Model {

    private $table = "submitted_docs";
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
                'constraint' => 50
                ),

                'docs' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'file_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                )

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