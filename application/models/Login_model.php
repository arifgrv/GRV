<?php
class Login_model extends CI_Model {

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

    public function homepage(){
        $query = $this->db->get_where('homepage', array('status'=> '1'))->result_array();
        return $query;
    }
    
    public function moviename(){
        $query = $this->db->get_where('moviename', array('Status'=> '1'))->result_array();
        return $query;
    }

    public function showtime(){
        $query = $this->db->get('showtime')->result_array();
        return $query;
    }

    public function movie_name($MN){
        $this->db->select('MovieName');
        $this->db->from('moviename');
        $this->db->where('id', $MN);
        $query  = $this->db->get()->row_array();
        return $query;
    }

    public function show_time($st){
        $this->db->select('ShowTime');
        $this->db->from('showtime');
        $this->db->where('id', $st);
        $query  = $this->db->get()->row_array();
        return $query;
    }

    public function checkReservations($sitNumbers, $reserveDate, $showtime, $movieName)
    {
        // Check if data in array exists in the 'reservation' table for the specified parameters
        $this->db->select('seat_number');
        $this->db->from('discountreservationrecord');
        $this->db->where_in('seat_number', $sitNumbers);
        $this->db->where('reserve_date', $reserveDate);
        $this->db->where('show_time', $showtime);
        $this->db->where('movie_name', $movieName);

        $query  = $this->db->get()->row_array();

        if ($query) {
            return $query;
        }else{
            return null;
        }
    }

    public function checkDReservations($sitNumbers, $reserveDate, $showtime, $movieName)
    {
        // Check if data in array exists in the 'reservation' table for the specified parameters
        $this->db->select('seat_number');
        $this->db->from('reservationrecord');
        $this->db->where('seat_number', $seat_number);
        $this->db->where('reserve_date', $reserveDate);
        $this->db->where('show_time', $showtime);
        $this->db->where('movie_name', $movieName);

        $this->db->or_where('seat_number', $seat_number);
        $this->db->where('reserve_date', $reserveDate);
        $this->db->where('show_time', $showtime);
        $this->db->where('movie_name', $movieName);
        $this->db->from('discountreservationrecord');

        $query  = $this->db->get()->row_array();

        if ($query) {
            return $query;
        }else{
            return null;
        }
    }

    public function getTicketPriceById($id) {
        $this->db->select('TicketPrice');
        $query = $this->db->get_where('sitcategory', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row()->TicketPrice;
        } else {
            return null; // or any default value you prefer
        }
    }

    public function GetInfoByInvoice($id) {
        $this->db->select('*');
        $query = $this->db->get_where('reservationrecord', array('invoice_number' => $id));

        if ($query->num_rows() > 0) {
            return $query->result(); // Return all columns for the matching row
        } else {
            return null; // or any default value you prefer
        }
    }

    public function GetInfoByDiscountInvoice($id) {
        $this->db->select('*');
        $query = $this->db->get_where('discountreservationrecord', array('invoice_number' => $id));

        if ($query->num_rows() > 0) {
            return $query->result(); // Return all columns for the matching row
        } else {
            return null; // or any default value you prefer
        }
    }

    public function Accounts_data_FromTO($fromDate, $toDate) {
        $this->db->where('reserve_date >=', $fromDate);
        $this->db->where('reserve_date <=', $toDate);
        $query = $this->db->get('reservationrecord');

        // Check if the query was successful before returning the result
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if no data is found
        }
    }

    public function DAccounts_data_FromTO($fromDate, $toDate) {
        $this->db->where('reserve_date >=', $fromDate);
        $this->db->where('reserve_date <=', $toDate);
        $query = $this->db->get('discountreservationrecord');

        // Check if the query was successful before returning the result
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if no data is found
        }
    }

}
?>