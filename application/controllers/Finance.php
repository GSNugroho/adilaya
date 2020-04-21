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
            $data = array(
                'dd_jns' => $this->M_finance->jns_pengeluaran()
            );
            $this->load->view('finance/finance', $data);
        }

        function simpanPengeluaran(){
            $data = array(
                'jns_pengeluaran' => $this->input->post('jns_pengeluaran', TRUE),
                'ket_pengeluaran' => $this->input->post('ket_pengeluaran', TRUE),
                'jns_pembayaran' => $this->input->post('jns_pembayaran', TRUE),
                'jml_pengeluaran' => $this->input->post('jml_pengeluaran', TRUE),
                'kd_pengeluaran' => $this->get_kode(),
                'dt_create' => date('Y-m-d'),
                'dt_aktif' => 1
            );
            $this->M_finance->insert_pengeluaran($data);
        }

        function get_kode(){
            $kode = $this->M_finance->get_kode_pengeluaran();
            foreach($kode as $row){
                $data = $row->maxkode;
            }

            $kodeinv = $data;
            $noUrut = (int) substr($kodeinv, 3, 6);
            $noUrut++;
            $char = "PB";
            $kodebaru = $char.sprintf("%06s", $noUrut);
            return $kodebaru;
        }

        function get_data_pengeluaran(){
            $id = $this->input->get('id', TRUE);
            $data = $this->M_finance->get_dt_pengeluaran($id);
            echo json_encode($data);
        }

        function trans_hri(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 0";
            $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <i class="fa fa-flag-checkered"></i>
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
                "action"=>$cek
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

        function tunai_hri(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 1";
            $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <i class="fa fa-flag-checkered"></i>
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
                "action"=>$cek
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

        function trans_sm(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 0";
            // $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <i class="fa fa-flag-checkered"></i>
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
                "action"=>$cek
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

        function tunai_sm(){
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
            $searchQuery .= " AND adilaya_finance_out.jns_pembayaran = 1";
            // $searchQuery .= " and DAY(dt_create) = DAY(GETDATE()) and MONTH(dt_create) = MONTH(GETDATE()) and YEAR(dt_create) = YEAR(GETDATE()) ";
             
            if($searchValue != ''){
            $searchQuery .= " and (
                nm_jns like '%".$searchValue."%'  ) ";
            }
    
            ## Total number of records without filtering
            $sel = $this->M_finance->get_total_dt();
            // $records = sqlsrv_fetch_array($sel);
            foreach($sel as $row){
                $totalRecords = $row->allcount;
            }
            
    
            ## Total number of record with filtering
            $sel = $this->M_finance->get_total_fl($searchQuery);
            // $records = sqlsrv_fetch_assoc($sel);
            foreach($sel as $row){
                $totalRecordwithFilter = $row->allcount;
            }
            
    
            ## Fetch records
            $empQuery = $this->M_finance->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
            $empRecords = $empQuery;
            $data = array();
    
            foreach($empRecords as $row){
                $cek = '
                <button value="'.$row->kd_pengeluaran.'" type="button" class="btn btn-light" data-toggle="modal" data-target="#edinputPengeluaran" data-whatever="'.$row->kd_pengeluaran.'" data-keyboard="false" data-backdrop="static">
                <i class="fa fa-flag-checkered"></i>
                </button>
                ';
            $data[] = array( 
                "jns_pengeluaran"=>$row->nm_jns,
                "ket_pengeluaran"=>$row->ket_pengeluaran,
                "jml_pengeluaran"=>$row->jml_pengeluaran,
                "action"=>$cek
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
    }
?>