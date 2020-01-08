<?php
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . 'libraries/REST_Controller.php';
    include APPPATH .'libraries/PHPExcel_1.7.9_doc/Classes/PHPExcel/IOFactory.php';
    // require APPPATH . 'libraries/Format.php';

    class Example extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->database();

    }

    public function invoice_get()
    {
        $data = $this->db->get("tbl_invoice")->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }
    public function invoice_post()
    {
        $file_name = $_FILES['file']['name'];
        $move = $_SERVER['DOCUMENT_ROOT']."/codeig/uploads/";
        $inputFileName = $move.$file_name;
        move_uploaded_file($_FILES['file']['tmp_name'],$move.$file_name);
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $arrayCount = count($allDataInSheet);
        for($i=2;$i<=$arrayCount;$i++){
            $sql="INSERT INTO tbl_invoice(dealer_name,bill_date,invoice_number,amount,due_date,credit_period,dealer_email)
                    VALUES('".$allDataInSheet[$i]["B"]."',
                    '".$allDataInSheet[$i]["C"]."',
                    '".$allDataInSheet[$i]["D"]."',
                    '".$allDataInSheet[$i]["E"]."',
                    '".$allDataInSheet[$i]["F"]."',
                    '".$allDataInSheet[$i]["G"]."',
                    '".$allDataInSheet[$i]["I"]."'

                    )
                ";
            $this->db->query($sql);
        }
    }
    public function invoices_get($dealer_name){
        $data = $this->db->get_where("tbl_invoice",array("dealer_name"=>$dealer_name))->result();
        $this->response($data, REST_Controller::HTTP_OK);   
    }
}
