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
</style>
<div class="content-wrapper">
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Stok Bahan Baku</h5>
                    <div class="logo-adilaya">
                        <img src="<?php echo base_url('assets/image/adilaya.png')?>" width="144" height="135">
                    </div>
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nm_tim">Brand</label>
                                    <select class="form-control" name="in_nm_produk" id="in_nm_produk" style="width: 80%">
                                    <option value="0">Pilih</option>
                                    <?php
                                    foreach ($dd_pro as $row) {  
                                        echo "<option value='".$row->kd_produk."' >".$row->nm_produk."</option>";
                                        }
                                        echo"
                                    </select>"
                                    ?>
                                </div>
                            </td>
                            <td>
                                <button style="height: 36px; margin-top: 10px" class="btn btn-dark" id="tampil_data">Tampilkan Data</button>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataBB" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Bahan Baku</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <script>

                        $('#tampil_data').click(function(){
                            $('#dataBB').DataTable().ajax.reload();
                            // $('#dataTim').DataTable().draw(true);                            
                        })

                        $(document).ready(function(){
                                var table=$('#dataBB').DataTable({
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
                                    'url':'<?php echo base_url().'Vendorbb/dt_stok'?>',
                                    'data': function(data){
                                        var nm_produk = $('#in_nm_produk option:selected').val();

                                        data.nm_produk = nm_produk;
                                    }
                                },
                                'columns': [
                                    { data: 'nm_barang' },
                                    { data: 'jml_stok' },
                                    { data: 'satuan' },
                                    { data: 'action' }
                                ]
                                });
                                $('#tampil_data').on('click', function(){
                                    table.draw(true);
                                });
                            });
                    </script>
                </div>
            </div>
            <div class="modal fade" id="editStok" tabindex="-1" role="dialog" aria-labelledby="editStokLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="editStokLabel">Edit Jumlah Stok</h5>
                            <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="jml_stok">Jumlah Stok</label>
                                <input class="form-control" type="text" name="jml_stok" id="jml_stok" style="width: 80%;">
                            </div>
                            <input type="hidden" name="kd_order" id="kd_order">
                            <button type="submit" class="btn btn-success" id="kirimOrder" style="color: white;">Kirim Order</button>
                            <button type="button" id="close" class="btn btn-danger" onclick="wis()">Batal</button>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function ttp(){
                    $('#editStok').modal('hide');
                }
            </script>
        </div>
    </div>
</div>