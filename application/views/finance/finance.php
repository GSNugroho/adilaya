<?php
	$this->load->view('mainmenu');
?>
	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
    
<!-- <script src="<?php echo base_url('assets/datepicker/js/jquery-1.11.3.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
    
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
<style>
    input[type=number] {
        -moz-appearance: textfield;
        padding-left: 6px;
        padding-right: 6px;
    }
    .card{
        border-radius: 30px;
    }
    .logo-adilaya{
        position: relative;
        float: right;
    }
</style>
<div class="content-wrapper">
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Pengeluaran</h5>
                    <div class="logo-adilaya">
                        <img src="<?php echo base_url('assets/image/adilaya.png')?>" width="144" height="135">
                    </div>
                    <table>
						<tr>
						    <td>
						        <input type="text" class="form-control" name="rtm_waktu" id="tgl1"placeholder="dd-mm-yyyy"/>
						    </td>
						    <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
						    <td>
						        <input type="text" class="form-control" name="rta_waktu" id="tgl2" placeholder="dd-mm-yyyy"/>	
						    </td>
						</tr>
                    </table>                    
                    <br>
                    
                    <br>
                    <br>
                    <div id="dynamic-tabs">
                        <ul>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_hri')?>" data-table="hri-table"><a href="#tab-hri">Hari ini (Transfer)</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_hri')?>" data-table="hri-table"><a href="#tab-hri">Hari ini (Tunai)</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_sm')?>" data-table="sm-table"><a href="#tab-sm">Semua (Transfer)</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Vendorbb/dt_sm')?>" data-table="sm-table"><a href="#tab-sm">Semua (Tunai)</a>
                            </li>
                        </ul>
                        <div id="tab-hri" class="table-responsive">
                            <table id="hri-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Order</th>
                                        <th>Alamat Kirim</th>
                                        <th>Kota</th>
                                        <th style="width:16%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="tab-sm" class="table-responsive">
                            <table id="sm-table" class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Order</th>
                                        <th>Alamat Kirim</th>
                                        <th>Kota</th>
                                        <th style="width:16%;">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                        <script>
                            $(function() {
                                $(".tabs").click(function(){
                                var source = $(this).data("source");
                                var tableId = $(this).data("table");
                                console.log(tableId);
                                initiateTable(tableId,source);
                                });

                                function initiateTable(tableId, source) {
                                    var table = $("#" + tableId).DataTable({
                                        language: {
                                            "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                                            "sProcessing":   "Sedang memproses...",
                                            "sLengthMenu":   "Tampilkan _MENU_ entri",
                                            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                                            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                                            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                                            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                                            "sInfoPostFix":  "",
                                            "sSearch":       "Cari:",
                                            "sUrl":          "",
                                            "oPaginate": {
                                                "sFirst":    "Pertama",
                                                "sPrevious": "Sebelumnya",
                                                "sNext":     "Selanjutnya",
                                                "sLast":     "Terakhir"
                                            }
                                            },
                                            'order': [[ 0, "desc" ]],
                                            'processing': true,
                                            'serverSide': true,
                                            'serverMethod': 'post',
                                        "ajax": {
                                            'url' : source,
                                            'data' : function(data){
                                                var awal = $('#tgl1').val();
                                                var akhir = $('#tgl2').val();

                                                data.searchByAwal = awal;
                                                data.searchByAkhir = akhir;
                                            }
                                        },
                                        'columns': [
                                            { data: 'nm_mitra' },
                                            { data: 'tgl_order'},
                                            { data: 'almt_kirim' },
                                            { data: 'kota' },
                                            { data: 'action'}
                                        ],
                                        "destroy": true,
                                        "bFilter": true
                                        // "bLengthChange": false,
                                        // "bPaginate": false
                                    });
                                    $('#tgl2').on('dp.change', function(){
                                        table.draw(true);
                                    });
                                }
                                initiateTable("hri-table", "<?php echo base_url('Vendorbb/dt_hri')?>");
                                $("#dynamic-tabs").tabs();

                            });
                            $('#tgl1').datetimepicker({
                                locale: 'id',
                                format: 'DD-MM-YYYY'
                            });

                            $('#tgl2').datetimepicker({
                                locale: 'id',
                                format: 'DD-MM-YYYY'
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>