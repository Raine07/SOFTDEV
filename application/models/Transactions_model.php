<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model {

    private $cptable = "contact_pers";
    private $hitable = "hotel_information";
    private $invtable = "inventory";
    private $rptable = "risk_profiling";
    private $sdtable = "submitted_docs";

    public function trans($cpdata = [], $hidata = [], $invdata = [], $rpdata = [], $sddata = [], $allid = [])
    {  
        $this->db->trans_begin();
        
        $this->db->insert('hotel_information', $hidata);
        $this->db->insert('contact_pers', $cpdata);
        $this->db->insert('inventory', $invdata);
        $this->db->insert('risk_profiling', $rpdata);
        $this->db->insert('submitted_docs', $sddata);
        
        $this->db->where('id', $allid['id'])->update('hotel_information', $allid);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
        }
    }
}

    // public function getRecord(){
    //     return $this->db->select('*')->from('hotel_information')->get()->result();
    // }
