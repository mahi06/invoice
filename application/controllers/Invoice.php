<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function index()
    {
        $this->load->view('invoice/index');
    }
    public function uploadExcel()
    {
    	$this->load->view('invoice/uploadExcel');	
    }
    public function chequeTransactions()
    {
    	$this->load->view('invoice/chequeTransactions');
    }
    public function transactions()
    {
    	$this->load->view('invoice/transactions');
    }
}
