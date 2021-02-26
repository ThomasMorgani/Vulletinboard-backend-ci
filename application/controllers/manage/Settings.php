<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
  
      parent::__construct();
      $this->load->database();
      $this->load->model('setting');
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
      //MODEL SETTINGS
      //GET SETTINGS
      echo json_encode($this->setting->getAll(false, true));
       
    }
      

}