<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step2_model extends CI_Model {

    private $table = "risk_profiling";
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
                'Geological' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'Hydrometeorological' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'ManmadeHazards' => array(
                'type' => 'VARCHAR',
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
    //     return $this->db->select('*')->from('risk_profiling')->get()->result();
    // }
}