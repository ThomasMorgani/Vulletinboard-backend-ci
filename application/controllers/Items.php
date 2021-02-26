<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
  
      parent::__construct();
      $this->load->database();
      $this->load->model('Item');
      header('Access-Control-Allow-Methods: GET, POST, HEAD, OPTIONS');
      header('Access-Control-Allow-Credentials: true');
      header("Access-Control-Allow-Origin: http://localhost:8080");
      // header('Access-Control-Allow-Origin: http://localhost:8081');
      header('Access-Control-Allow-Headers: X-PINGOTHER, Origin, X-Requested-With, Content-Type, Accept');
  
      if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
        exit; // OPTIONS request wants only the policy, we can stop here
    }
    
      header('Content-Type: application/json');
    }
  
    public function index()
    {
       echo 'Hi BULLETINBOARDD';
       //$response = ['status' => 'success', 'message' => 'Record ' . $action . 'd.', 'data' => $response['data']];
       
    }
      
    public function items()
    {

      echo json_encode($this->Item->getAll());
      // $this->db->where('visible', (int)1);
      // $Q = $this->db->get('bulletinboard');
      // $programList = $Q->result_array();
      // //set dates to a human readable form from timestamp
      // foreach ($programList as $key => $value) {
      //   if (
      //     $value['content_scheduled_date'] != null && 
      //     $value['content_scheduled_date'] != "null" && 
      //     $value['content_scheduled_date'] != "0000-00-00 00:00:00"
      //   ) {
      //       $programList[$key]["user_friendly_scheduled_date"] =  date ("D,  M d h:iA",strtotime($value['content_scheduled_date'])) ;
      //     } else {
      //       $programList[$key]["user_friendly_scheduled_date"] = '';
      //     }
      //   }
  
      //   header('Content-Type: application/json');
      //   echo json_encode($programList);
      //     die();

    }
  
    public function allArticles()
    {
      $q = $this->db->get('bulletinboard');
      header('Content-Type: application/json');
  
             
  
            echo json_encode($q->result_array());
            die();
  
    }

   

}