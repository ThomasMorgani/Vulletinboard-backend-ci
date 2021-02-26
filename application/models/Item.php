<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Item extends CI_Model
{
  /**
   * __construct function.
   *
   * @access public
   * @return void
   */


  public function __construct()
  { }

  function getAll()
  {
    return $this->db->get(ITEM_TABLE)->result_array();
  }
  
  function getMany($where = [])
  {
    return true;
  }
  
  function getOne($id = null)
  {
    return true;
  }
  
  function testExist($id = null)
  {
    return true;
  }

}