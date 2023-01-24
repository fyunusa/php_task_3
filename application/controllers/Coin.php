
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coin extends CI_Controller
{
    public function calculate()
    {
        // $amount = $this->input->post('amount');
        $amount = $this->input->get('amount');

        $bills = [20, 10, 5, 1];
        $coins = [0.25, 0.1, 0.05, 0.01];
        $result = array();

        // Calculate the number of bills
        foreach ($bills as $bill) {
            $count = floor($amount / $bill);
            $result[strval($bill)] = $count;
            $amount = round($amount - $count * $bill, 2);
            // if ($count > 0) {
            //     $result[$bill] = $count;
            //     $amount = round($amount - $count * $bill, 2);
            // }
        }

        // Calculate the number of coins
        foreach ($coins as $coin) {
            $count = floor($amount / $coin);
            $result[strval($coin)] = $count;
            $amount = round($amount - $count * $coin, 2);
            // if ($count > 0) {
            //     $result[$coin] = $count;
            //     $amount = round($amount - $count * $coin, 2);
            // }
        }



        // Return the result
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
        // return $result;
        // $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
}
