<?php
	$this->load->view('mainmenu');
?>
	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/dropzone/dropzone.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/dropzone/basic.min.css') ?>" />
    

<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>

<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/dropzone/dropzone.min.js')?>"></script>

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
    .dropzone{
        margin-top: 5px;
        width: 80%;
	    border: 2px dashed #d9d9d9;
    }
    .ed_foto{
        margin-top: 5px;
        width: 80%;
	    border: 2px dashed #d9d9d9;
        transition: transform .2s;
        padding: 5px;
    }
    .ed_foto img:hover{
        transition: transform .2s;
        border: 1px solid #777;
        transform: scale(1.5);
    }
    div.gallery {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 48%;
        height: 50%;
        transition: transform .2s;
    }

    div.gallery:hover {
        border: 1px solid #777;
        transform: scale(1.5);
    }

    div.gallery img {
        width: 100%;
        height: 100%;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        text-align: left;
        border: none;
        outline: none;
        transition: 0.4s;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    .active, .accordion:hover {
        background-color: #ccc;
    }

    /* Style the accordion panel. Note: hidden by default */
    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    .accordion:after {
        content: '\02795'; /* Unicode character for "plus" sign (+) */
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2796"; /* Unicode character for "minus" sign (-) */
    }
</style>
<div class="content-wrapper">
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tim Medsos</h5>
                    <div class="logo-adilaya">
                        <img src="<?php echo base_url('assets/image/adilaya.png')?>" width="144" height="135">
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nm_tim">Nama</label>
                                    <input class="form-control" type="text" name="nm_tim" id="nm_tim" style="width: 100%;">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="tgl_tim">Bulan</label>
                                    <input class="form-control" type="text" name="tgl_tim" id="tgl_tim" style="width: 100%;">
                                </div>
                            </td>
                            <td>
                                <button style="height: 36px; margin-top: 15px" class="btn btn-dark" id="tampil_data">Tampilkan Data</button>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTim" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Brand</th>
                                    <th>Tanggal</th>
                                    <th>Konsep Foto</th>
                                    <th>Hasil Foto</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <script>
                        $('#tgl_tim').datetimepicker({
                            locale: 'id',
                            format: 'MM-YYYY'
                        });

                        $('#tampil_data').click(function(){
                            $('#dataTim').DataTable().ajax.reload();
                            // $('#dataTim').DataTable().draw(true);                            
                        })

                        $(document).ready(function(){
                                var table=$('#dataTim').DataTable({
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
                                'ajax': {
                                    'url':'<?php echo base_url().'Desain/dt_tim'?>',
                                    'data': function(data){
                                        var nm_tim = $('#nm_tim').val();
                                        var tgl_tim = $('#tgl_tim').val();

                                        data.nm_tim = nm_tim;
                                        data.tgl_tim = tgl_tim;
                                    }
                                },
                                'columns': [
                                    { data: 'pro_medsos' },
                                    { data: 'tgl_medsos' },
                                    { data: 'konsep_medsos' },
                                    { data: 'hasil_medsos' }
                                ]
                                });
                                $('#tampil_data').on('click', function(){
                                    table.draw(true);
                                });
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>