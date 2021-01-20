<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Sahabat extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sahabat_model','shbt');
    }

    public function index_get()
    {
        $id = $this->get('id');   //ambil data tergantung apa parameter yg ingin dipakai//
        if ($id === null){
            $sahabat = $this->shbt->getSahabat();     
        } else {
            $sahabat = $this->shbt->getSahabat($id);    
        }

        
        if ($sahabat){
            $this->response([
                'status' => true,
                'message' => $sahabat       //respon jika benar
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id tidak ada'  //respon jika error
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    
}