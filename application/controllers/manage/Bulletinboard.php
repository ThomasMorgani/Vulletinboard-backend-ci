<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bulletinboard extends CI_Controller
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
       echo 'Hi BULLETINBOARD';
       //$response = ['status' => 'success', 'message' => 'Record ' . $action . 'd.', 'data' => $response['data']];
       
      }
      
      public function delete() {
        
        $id = $this->uri->segment('4');
        if ($this->Item->testExist($id)) {
          $response = ['status' => 'success', 'message' => 'Item deleted', 'data' => $id];
        } else {
          $response = ['status' => 'error', 'message' => 'Item it not found', 'data' => $id];
        }

        echo json_encode($response);
    }

    public function update() {
        //_POST
        //_FILES
      // var_dump((array) $_POST); //itemData
      // if (isset($_FILES['mediaFile'])) {
      //   var_dump($_FILES['mediaFile']); //file

      // }
      // if ($this->Item->testExist($id)) {
      //   $response = ['status' => 'success', 'message' => 'Item deleted', 'data' => $id];
      // } else {
      //   $response = ['status' => 'error', 'message' => 'Item it not found', 'data' => $id];
      // }

      $response = ['status' => 'success', 'message' => 'Item Save', 'data' => (array) $_POST];
      echo json_encode($response);
  }

   

}