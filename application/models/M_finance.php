<?php
    class M_finance extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_total_dt(){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_finance_out
            JOIN adilaya_finance_jns ON adilaya_finance_out.jns_pengeluaran = adilaya_finance_jns.kd_jns WHERE 1=1 ");
            return $query->result();
        }
    
        function get_total_fl($searchQuery){
            $query = $this->db->query("SELECT count(*) as allcount FROM adilaya_finance_out
            JOIN adilaya_finance_jns ON adilaya_finance_out.jns_pengeluaran = adilaya_finance_jns.kd_jns WHERE 1=1 ".$searchQuery);
            return $query->result();
        }
    
        function get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $query = $this->db->query("SELECT TOP ".$rowperpage."
            kd_pengeluaran, ket_pengeluaran, jml_pengeluaran, nm_jns             
            FROM adilaya_finance_out
            JOIN adilaya_finance_jns ON adilaya_finance_out.jns_pengeluaran = adilaya_finance_jns.kd_jns
            WHERE 1=1 ".$searchQuery." and kd_pengeluaran NOT IN (
                SELECT TOP ".$baris." kd_pengeluaran FROM adilaya_finance_out 
                WHERE 1=1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder.") 
            order by ".$columnName." ".$columnSortOrder);
            return $query->result();
        }

        function jns_pengeluaran(){
            $query = $this->db->query("SELECT * FROM adilaya_finance_jns ORDER BY kd_jns asc");
		    return $query->result();
        }

        function get_kode_pengeluaran(){
            $query = $this->db->query('SELECT MAX(kd_pengeluaran) AS maxkode FROM adilaya_finance_out');
		    return $query->result();
        }

        function insert_pengeluaran($data){
            $this->db->insert('adilaya_finance_out', $data);
        }

        function get_dt_pengeluaran($id){
            $query = $this->db->query("SELECT * FROM adilaya_finance_out WHERE kd_pengeluaran = '$id'");
            return $query->result();
        }
    }

    
?>