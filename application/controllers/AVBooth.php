<?php
    class Avbooth extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_avbooth');
            $this->load->model('M_monitor');
            $this->load->library('form_validation');
            $this->load->helper(array('url', 'file', 'form'));
        }

        public function index(){
            $this->load->view('avbooth/avbooth');
        }

        function dt_tbl(){
            ## Read value
            $draw = $_POST['draw'];
            $baris = $_POST['start'];
            $rowperpage = $_POST['length']; // Rows display per page
            $columnIndex = $_POST['order'][0]['column']; // Column index
            $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
            $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
            $searchValue = $_POST['search']['value']; // Search value
    
            ## Search 
            $searchQuery = " ";
            if($this->input->post('searchByAwal') != '' && $this->input->post('searchByAkhir') != ''){
                $searchByAwal = date('Y-m-d', strtotime($this->input->post('searchByAwal')));
                $searchByAkhir = date('Y-m-d', strtotime($this->input->post('searchByAkhir')));
                $searchQuery .= " and (dt_create BETWEEN '".$searchByAwal."' AND '".$searchByAkhir."' ) ";
             }
            if($searchValue != ''){
            $searchQuery .= " and (
            nm_mitra like '%".$searchValue."%' ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_monitor->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_monitor->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_monitor->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
            
            $button = '<button>Rinci</button>';
            $button = '<button value="'.$row->kd_mitra.'" type="button" class="btn btn-white" data-toggle="modal" data-target="#rinciVendor" data-whatever="'.$row->kd_mitra.'" data-keyboard="false" data-backdrop="static">Input Rincian</button>';

            $data[] = array( 
                
                "nm_mitra"=>$row->nm_mitra,
                "almt_kirim"=>$row->almt_kirim,
                "kota"=>$row->nama_kota,
                "nm_produk"=>$row->nm_produk,
                "paket"=>$row->nm_paket,
                "tambahan"=>$row->tambahan,
                "action"=>$button
            );
            }
    
            ## Response
            $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
            );
    
            echo json_encode($response);
        }

        function get_data_mitra(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_avbooth->get_data_mitra($id);
            echo json_encode($data);
        }
    }
?>