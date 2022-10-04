<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step3_model extends CI_Model {

    private $table = "inventory";
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

                'PSA' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'BLD' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'EE' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'ITE' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'KE' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),
                
                'OE' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'HE' => array(
                'type' => 'VARCHAR',
                'constraint' => 1000
                ),

                'SE' => array(
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
    //     return $this->db->select('*')->from('inventory')->get()->result();
    // }
}