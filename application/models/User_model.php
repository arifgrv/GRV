<?php
class User_model extends CI_Model {

    public function LgoCheck($e,$p){
        $query = $this->db->get_where('users', 
            array(
            	'email'=> $e,
            	'password'=> $p,
                'accstatus'=> 1,
            )
        );
        
        // Check if the query was successful before returning the result
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array(); // Return an empty array if no data is found
        }
    }

    public function RegSave($data){

        $this->db->insert('users', $data);
        return $this->db->insert_id(); 
    }


    
}
?>