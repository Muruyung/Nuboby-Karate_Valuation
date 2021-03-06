<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class PilihAtlit extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    $turnamen = $this->db->get_where('tb_atlit', $data)->result();
    $this->response($turnamen, 200);
  }

  function index_post() {
    $data = array(
      'id'=>  $this->post('id')
    );
    $insert = $this->db->get_where('tb_atlit', $data)->result()[0];
    $this->response($insert, 200);
    // if ($insert) {
    // } else {
    //   $this->response(array('status' => 'fail', 502));
    // }
  }
}
?>
