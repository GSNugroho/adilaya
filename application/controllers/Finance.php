<?php
    class Finance extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_finance');
            $this->load->library('form_validation');
			$this->load->helper('form');
        }

        public function index(){
            $this->load->view('finance/finance');
        }
    }
?>