<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seat_reservation {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Login_model'); // Load your model
    }

    public function generateSeatCheckbox($showDate, $showTime, $movieName, $SitStartFrom, $totalSit, $sitNum) {
        $output = '';

        for ($i = $SitStartFrom; $i <= $totalSit; $i++) {
            $sitNumbers = $sitNum . $i;
            $reserveSit = $this->CI->Login_model->checkReservations($sitNumbers, $showDate, $showTime, $movieName);

            $output .= '<div class="col">';
            if (!empty($reserveSit)) {
                $output .= '<p class="card-text text-danger">
                                 <input type="checkbox" name="seatcheckbox[]" id="' . $sitNumbers . '" value="' . $sitNumbers . '" disabled>
                                 <i class="fa-solid fa-chair"></i>' . $sitNumbers . '
                             </p>';
            } else {
                $output .= '<p class="card-text text-primary">
                                 <input type="checkbox" name="seatcheckbox[]" id="' . $sitNumbers . '" value="' . $sitNumbers . '" >
                                 <i class="fa-solid fa-chair"></i>' . $sitNumbers . '
                             </p>';
            }
            $output .= '</div>';
        }

        return $output;
    }

}
