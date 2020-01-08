<?php
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . 'libraries/REST_Controller.php';
    include APPPATH .'libraries/PHPExcel_1.7.9_doc/Classes/PHPExcel/IOFactory.php';
    // require APPPATH . 'libraries/Format.php';

    class Transaction extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();

    }

    public function transactions_get()
    {
        $data = $this->db->query("
        		SELECT t.*,(SELECT i.amount from tbl_invoice i WHERE i.invoice_id = t.invoice_id)invoice_amount FROM tbl_cheque_transactions t 
        	")->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }
    public function transaction_post()
    {
        $date=date_create($_POST['cheque_date']);
        $date = date_format($date,'Y-m-d');
        $sql="INSERT INTO tbl_cheque_transactions(cheque_no,cheque_date,bank_name,cheque_amount,invoice_id)
                    VALUES(".$_POST['cheque_no'].",'".$date."','".$_POST['bank_name']."',
                    	".$_POST['cheque_amount'].",".$_POST['invoice_id']."
                    )
                ";
        $this->db->query($sql);
        $this->response("Success", REST_Controller::HTTP_OK);

    }
}