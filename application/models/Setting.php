<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Setting extends CI_Model
{
  /**
   * __construct function.
   *
   * @access public
   * @return void
   */


  public function __construct()
  { }

  function getAll($byId = false, $byName = false)
  {
  
    $settings = [
      [
        'description' => 'The amount of time it takes to show the next item on the bulletinboard.',
        'id' => 1,
        'label' => 'Item cycle timeout',
        'name' => 'itemTimeout',
        'type' => 'int',
        'value' => 7000
      ],
      [
        'description' => 'The background color of the bulletinboard.',
        'id' => 2,
        'label' => 'Background color',
        'name' => 'backgroundColor',
        'type' => 'text',
        'value' => '#A1B2CC'
      ],
      [
        'description' => 'RSS feed source.',
        'id' => 3,
        'label' => 'Feed',
        'name' => 'tickerFeed',
        'type' => 'text',
        'value' => 'http://abcnews.go.com/abcnews/topstories'
      ],
      [
        'description' => 'Toggle to hide or show ticker.',
        'id' => 7,
        'label' => 'Display',
        'name' => 'tickerShow',
        'type' => 'Boolean',
        'value' => true
      ],
      [
        'description' => 'Any items containing the following words will be filtered from the feed.',
        'id' => 4,
        'label' => 'Filter',
        'name' => 'tickerFilter',
        'type' => 'text',
        'value' => ''
      ],
      [
        'description' => 'Speed in which the ticker scrolls.',
        'id' => 5,
        'label' => 'Speed',
        'name' => 'tickerSpeed',
        'type' => 'int',
        'value' => 200
      ],
      [
        'description' => 'Toggle to hide or show header.',
        'id' => 6,
        'label' => 'Display',
        'name' => 'headerShow',
        'type' => 'Boolean',
        'value' => true
      ],
      [
        'description' => 'Set style of the header',
        'id' => 7,
        'label' => 'Style',
        'name' => 'headerType',
        'type' => 'text',
        'value' => 'text'
      ],
      [
        'description' => 'Content displayed in header',
        'id' => 8,
        'label' => 'Content',
        'name' => 'headerContent',
        'type' => 'text',
        'value' => 'text'
      ],
      [
        'description' => 'Color of the header',
        'id' => 9,
        'label' => 'Color',
        'name' => 'headerColor',
        'type' => 'text',
        'value' => 'primary'
      ],
    ];

    if ($byId || $byName) {
      $settingsKeyed = [];
      foreach($settings as $setting) {
        $key = $byId ? $setting['id'] : $setting['name'];
        $settingsKeyed["$key"] = $setting;
      }
      return $settingsKeyed;
    } else {
      return $settings;
    }
  
  
    // return $this->db->get(SETTING_TABLE)->result_array();
  
  }
  
  function getMany($where = [])
  {
    return true;
  }
  
  function getOne($id = null)
  {
    return true;
  }

  function board($settings = null, $details = false){
    if (!$settings) {
      $settings = $this->Setting->getAll(false, true);
    }

    $names = ['backgroundColor', 'itemTimeout'];
    $board = [];
    foreach($names as $name) {
      $board["$name"] = $details ? $settings["$name"] : $settings["$name"]['value'];
    }

    return $board;
    
  }

  function header($settings = null, $details = false){
    if (!$settings) {
      $settings = $this->Setting->getAll(false, true);
    }

    $names = ['headerColor', 'headerContent', 'headerShow', 'headerType'];
    $header = [];
    foreach($names as $name) {
      $header["$name"]  = $details ? $settings["$name"] : $settings["$name"]['value'];
    }

    return $header;
    
  }

  function ticker($settings = null, $details = false){
    if (!$settings) {
      $settings = $this->Setting->getAll(false, true);
    }

    $names = ['tickerFeed', 'tickerFilter', 'tickerShow', 'tickerSpeed'];
    $ticker = [];
    foreach($names as $name) {
      $ticker["$name"]  = $details ? $settings["$name"] : $settings["$name"]['value'];
    }

    return $ticker;
    
  }
  
  function testExist($id = null)
  {
    return true;
  }

}