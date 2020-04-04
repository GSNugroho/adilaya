<?php
    class Home extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            if($this->session->userdata('login') != TRUE){
                $url = base_url();
                redirect($url);
            }
        }

        function index(){
            $this->load->view('login/dashboard');
        }

        // function marketing(){
        //     if($this->session->userdata('level')=='1'){
        //         $this->load->view('marketing');
        //     }
        // }
    }
?>