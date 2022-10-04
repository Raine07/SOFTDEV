<?php  
  
class Hotelinfo_model extends CI_Model {  
    private $table='hotel_information';

    public function checkCredentials($data=[]) {  

        return $this->db->select('*')->from($this->table)->where('email',$data['email']) ->where('passw',$data['passw'])->get()->result();
  
       
    }  

    public function getUsersList()
    {
        $this->db->select('*');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getHotels()
    {
        return $this->db->select('*')->get('hotel_information')->result();
    }

    public function getHotel($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from($this->table)->where('id',$id)->get()->row();
    }

    public function getAssessmentAns($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from($this->table)->where('id',$id)->get()->row();
    }
    public function getDocs($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from('submitted_docs')->where('id',$id)->get()->row();
    }

    public function getContactPers($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from('contact_pers')->where('id',$id)->get()->row();
    }

    public function getInv($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from('inventory')->where('id',$id)->get()->row();
    }

    public function getRP($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from('risk_profiling')->where('id',$id)->get()->row();
    }

    public function getSD($id)
    {
        // return $this->db->select('*, CONCAT(fname," ",lname) as fullname')->get('users')->result();
        // return $this->db->select('*')->get('users')->result();
        // return $this->db->where('id',$id)->get('users')->result();\
        return $this->db->select('*')->from('submitted_docs')->where('id',$id)->get()->row();
    }

    public function update($id, $data = [])
    {  
       
        // $this->db->where('id', 1);
        // $this->db->update($this->table, $data);
        return $this->db->where('id',$id)->update($this->table,$data);
        // return $this->db->update($this->table, $data);
    }
      
}  
?>  