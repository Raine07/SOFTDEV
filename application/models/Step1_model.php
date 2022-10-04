<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step1_model extends CI_Model {

    private $table = "hotel_information";
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
                'hotel_name' => array(
                'type' => 'VARCHAR',
                'constraint' =>45
                ),
                'hotel_type' => array(
                'type' => 'VARCHAR',
                'constraint' => 45
                ),
                'hotel_address' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 250
                ),
                'dot_star_rate' => array(
                'type' => 'ENUM("5 Star", "4 Star" , "3 Star", "2 Star", "1 Star", "No Rating")'
                ),
                'corp_entity' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
                ),
                'affiliation' => array(
                'type' => 'VARCHAR',
                'constraint' => 25
                ),
                'year_of_operation' => array(
                'type' => 'date'
                ),
                'dos' => array(
                    'type' => 'date'
                ),
                'contact_pers_id' => array(
                    'type' => 'varchar',
                    'constraint' => 50
                ),
                'inventory_id' => array(
                    'type' => 'varchar',
                    'constraint' => 50
                ),
                'risk_profiling_id' => array(
                    'type' => 'varchar',
                    'constraint' => 50
                ),
                'submitted_docs_id' => array(
                    'type' => 'varchar',
                    'constraint' => 50
                ),
                'rr_rating' => array(
                    'type' => 'int',
                    'constraint' => 3
                ),
                'is_rated' => array(
                    'type' => 'varchar',
                    'constraint' => 3
                ),
                'hotel_description' => array(
                    'type' => 'varchar',
                    'constraint' => 2500
                ),
                'hotel_image' => array(
                    'type' => 'varchar',
                    'constraint' => 1000
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