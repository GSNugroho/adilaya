<?php
    class M_finance extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }
    }
?>