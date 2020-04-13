<?php
    class M_avbooth extends CI_Model{
        function __construct()
        {
            parent::__construct();
            $this->load->database('default', TRUE);
        }

        function get_data_mitra($id){
            $query = $this->db->query("SELECT kd_mitra, nm_mitra, almt_kirim, adilaya_produk.nm_produk as nm_produk, nm_paket, tambahan, nama_ekspedisi, name as nama_kota
            FROM adilaya_dt_mitra 
            JOIN tb_kota ON adilaya_dt_mitra.almt_kt_kirim = tb_kota.id
            LEFT JOIN adilaya_paket on paket = kd_paket 
            LEFT JOIN adilaya_produk on adilaya_dt_mitra.nm_produk = adilaya_produk.kd_produk 
            LEFT JOIN a_ekspedisi ON adilaya_dt_mitra.ekspedisi = a_ekspedisi.kd_ekspedisi
            WHERE kd_mitra = '$id'");
            return $query->result();
        }
    }
?>