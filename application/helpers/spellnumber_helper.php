<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('spell_number_to_english')) {

    function spell_number_to_english($pNumber) {
        $CI = &get_instance();
        $CI->load->helper('inflector');

        $Dollars = '';
        $Cents = '';

        $arr = array("", "", " Thousand ", " Million ", " Billion ", " Trillion ");
        $pNumber = trim(strval($pNumber));

        $xDecimal = strpos($pNumber, ".");
        if ($xDecimal !== false) {
            $Cents = get_tens(substr(str_pad(substr($pNumber, $xDecimal + 1) . "00", 2), 0, 2));
            $pNumber = trim(substr($pNumber, 0, $xDecimal - 1));
        }

        $xIndex = 1;
        while (!empty($pNumber)) {
            $xHundred = "";
            $xValue = strrev(substr(str_pad(strrev($pNumber), 3, "0"), 0, 3));

            if (intval($xValue) !== 0) {
                if ($xValue[0] !== "0") {
                    $xHundred = get_digit($xValue[0]) . " Hundred ";
                }

                if ($xValue[1] !== "0") {
                    $xHundred .= get_tens($xValue[1]);
                } else {
                    $xHundred .= get_digit($xValue[2]);
                }
            }

            if (!empty($xHundred)) {
                $Dollars = $xHundred . $arr[$xIndex] . $Dollars;
            }

            if (strlen($pNumber) > 3) {
                $pNumber = substr($pNumber, 0, -3);
            } else {
                $pNumber = "";
            }

            $xIndex++;
        }

        switch ($Dollars) {
            case "":
                $Dollars = "No Taka";
                break;
            case "One":
                $Dollars = "One Taka";
                break;
            default:
                $Dollars .= " Taka";
                break;
        }

        switch ($Cents) {
            case "":
                $Cents = " and No Paisa";
                break;
            case "One":
                $Cents = " and One Paisa";
                break;
            default:
                $Cents = " and " . $Cents . " Paisa";
                break;
        }

        return $Dollars . $Cents;
    }

    function get_tens($pTens) {
        $result = "";

        if (intval(substr($pTens, 0, 1)) == 1) {
            switch (intval($pTens)) {
                case 10:
                    $result = "Ten";
                    break;
                case 11:
                    $result = "Eleven";
                    break;
                case 12:
                    $result = "Twelve";
                    break;
                case 13:
                    $result = "Thirteen";
                    break;
                case 14:
                    $result = "Fourteen";
                    break;
                case 15:
                    $result = "Fifteen";
                    break;
                case 16:
                    $result = "Sixteen";
                    break;
                case 17:
                    $result = "Seventeen";
                    break;
                case 18:
                    $result = "Eighteen";
                    break;
                case 19:
                    $result = "Nineteen";
                    break;
            }
        } else {
            switch (intval(substr($pTens, 0, 1))) {
                case 2:
                    $result = "Twenty ";
                    break;
                case 3:
                    $result = "Thirty ";
                    break;
                case 4:
                    $result = "Forty ";
                    break;
                case 5:
                    $result = "Fifty ";
                    break;
                case 6:
                    $result = "Sixty ";
                    break;
                case 7:
                    $result = "Seventy ";
                    break;
                case 8:
                    $result = "Eighty ";
                    break;
                case 9:
                    $result = "Ninety ";
                    break;
            }

            $result .= get_digit(substr($pTens, 1, 1));
        }

        return $result;
    }

    function get_digit($pDigit) {
        switch (intval($pDigit)) {
            case 1:
                return "One";
            case 2:
                return "Two";
            case 3:
                return "Three";
            case 4:
                return "Four";
            case 5:
                return "Five";
            case 6:
                return "Six";
            case 7:
                return "Seven";
            case 8:
                return "Eight";
            case 9:
                return "Nine";
            default:
                return "";
        }
    }
}
