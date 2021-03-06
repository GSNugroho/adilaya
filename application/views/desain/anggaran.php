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
                    <h5 class="card-title mb-4">Data Pengajuan Medsos</h5>
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
                        <button style="height: 36px" class="btn btn-dark" data-toggle="modal" data-target="#inputAnggaran"  data-keyboard="false" data-backdrop="static">Input Anggaran</button>
                    <br>
                    <br>
                    <div class="table-responsive">
						<table class="table table-bordered" id="dataAnggaran" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Nama Anggaran</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Keterangan Anggaran</th>
								<th>Jumlah Anggaran</th>
								<th>Status</th>
								<th style="width:13%;">Action</th>
							</tr>
							</thead>

						</table>
                    </div>
                    <script>
                        $(document).ready(function(){
                                    var table=$('#dataAnggaran').DataTable({
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
                                        'url':'<?php echo base_url().'Desain/dt_anggaran'?>',
                                        'data': function(data){
                                            var awal = $('#tgl1').val();
                                            var akhir = $('#tgl2').val();

                                            data.searchByAwal = awal;
                                            data.searchByAkhir = akhir;
                                        }
                                    },
                                    'columns': [
                                        { data: 'nm_anggaran' },
                                        { data: 'dt_create' },
                                        { data: 'ket_anggaran' },
                                        { data: 'jml_anggaran', render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ') },
                                        { data: 'sts_anggaran' },
                                        { data: 'action'}
                                    ]
                                    });
                                    $('#tgl2').on('dp.change', function(){
                                        table.draw(true);
                                    });
                                });
                    </script>
                    <div class="modal fade" id="inputAnggaran" tabindex="-1" role="dialog" aria-labelledby="edPengeluaran" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="AnggaranLabel">Input Anggaran</h5>
                                    <button type="button" onclick="tutup()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputJns">Jenis Pengeluaran</label>
                                        <select class="form-control" name="jns_pengeluaran" id="jns_pengeluaran" style="width: 80%;" disabled>
                                            <option value="FJ000003">Medsos</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket_pengeluaran">Keterangan</label>
                                        <textarea class="form-control" name="ket_pengeluaran" id="ket_pengeluaran" style="width: 80%; height:50%"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jml_pengeluaran">Jumlah Pengeluaran</label>
                                        <div class="input-group" style="width: 80%">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control" name="jml_pengeluaran" id="jml_pengeluaran">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jns_pembayaran">Tipe Pembayaran</label>
                                        <select class="form-control" name="jns_pembayaran" id="jns_pembayaran" style="width: 80%">
                                            <option></option>
                                            <option value="0">Transfer</option>
                                            <option value="1">Tunai</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" id="simpanPengeluaran" style="color: white;">Simpan</button>
                                    <button type="button" id="close" class="btn btn-danger" onclick="tutup()">Batal</button>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function tutup(){
                            $('#inputAnggaran').modal('hide');
                        }

                        $('#simpanPengeluaran').click(function(event){
                            var jns_pengeluaran = $('#jns_pengeluaran option:selected').val();
                            var ket_pengeluaran = $('#ket_pengeluaran').val();
                            var jns_pembayaran = $('#jns_pembayaran').val();
                            var jml_pengeluaran = $('#jml_pengeluaran').val();
                            
                            var dataString = 'jns_pengeluaran='+jns_pengeluaran+'&ket_pengeluaran='+ket_pengeluaran+'&jns_pembayaran='+jns_pembayaran+'&jml_pengeluaran='+jml_pengeluaran;

                            $.post("<?php echo base_url()?>RnD/simpanAnggaran", dataString, function(data){
                                $('#jns_pengeluaran option:selected').val('');
                                $('#ket_pengeluaran').val('');
                                $('#jns_pembayaran').val('');
                                $('#jml_pengeluaran').val('');
                                $('#inputAnggaran').modal('hide');
                                $('#dataAnggaran').DataTable().ajax.reload();
                                Swal.fire({
                                        title: 'Sukses',
                                        text: "Data Berhasil Disimpan!",
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                        })
                            })
                        })
                    </script>