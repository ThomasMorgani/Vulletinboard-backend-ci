<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bulletinboard extends CI_Controller
{
    public function __construct()
    {
  
      parent::__construct();
      $this->load->model('Item');
      $this->load->model('Setting');
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
       //$response = ['status' => 'success', 'message' => 'Record ' . $action . 'd.', 'data' => $response['data']];
       $allSettings =  $this->Setting->getAll(false, true);
       $data = [];
       $data['items'] = $this->Item->getAll();
       $data['board'] = $this->Setting->board($allSettings);
       $data['header'] = $this->Setting->header($allSettings);
       $data['ticker'] = $this->Setting->ticker($allSettings);

       echo json_encode($data);
      }

   

}