<?php
    $this->load->view('mainmenu');
?>
   	
<link href="<?php echo base_url('assets/nav-pill/nav-pill.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/ilmudetil.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/css/bootstrap-datetimepicker.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/themes/blitzer/jquery-ui.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ?>" />
    

<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/swal/sweetalert2.all.min.js')?>"></script>

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
                    <h5 class="card-title mb-4">Data Order</h5>
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
                            <li class="tabs" data-source="<?php echo base_url('Avbb/dt_hri')?>" data-table="hri-table"><a href="#tab-hri">Hari ini</a>
                            </li>
                            <li class="tabs" data-source="<?php echo base_url('Avbb/dt_sm')?>" data-table="sm-table"><a href="#tab-sm">Semua</a>
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
                                initiateTable("hri-table", "<?php echo base_url('Avbb/dt_hri')?>");
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
                    <div class="modal fade" id="cekModal" tabindex="-1" role="dialog" aria-labelledby="cekModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="cekModalLabel">Rincian Mitra Order</h5>
                                    <button type="button" onclick="ttp()" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th style="width: 25%">Nama Mitra</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="nm_mitra_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Alamat Kirim</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="almt_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Provinsi</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="prov_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kota</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kota_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kecamatan</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kec_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Kelurahan</th>
                                            <td style="width: 5%">:</td>
                                            <td><p id="kel_kirimm_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Rincian</th>
                                            <td style="width: 5%">:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan='3'>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody id="isirinci">
                                                    <tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Total Order</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="total_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Ekspedisi</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="ekspedisi_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Berat</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="berat_cek"></p></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%">Biaya Kirim</th>
                                            <td style="width: 5%">:</td>
                                            <td ><p id="biaya_kirim_cek"></p></td>
                                        </tr>
                                    </table>
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
                        function uang(uang){
                            var reverse = uang.toString().split('').reverse().join(''),
                            ribuan = reverse.match(/\d{1,3}/g);
                            ribuan = 'Rp '+ribuan.join('.').split('').reverse().join('');
                            return ribuan
                        }

                        $('#cekModal').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this);
                            var dataString = 'id=' + recipient
                            $.get("<?php echo base_url()?>Avbb/get_dt_order", dataString, function(data){
                                $('#nm_mitra_cek').html(data.dt_mitra[0].nm_mitra);
                                $('#kd_order').val(data.dt_mitra[0].kd_order);
                                $('#almt_kirimm_cek').html(data.dt_mitra[0].almt_kirim);
                                $('#prov_kirimm_cek').html(data.dt_mitra[0].almt_prov_kirim);
                                $('#kota_kirimm_cek').html(data.dt_mitra[0].almt_kt_kirim);
                                $('#kec_kirimm_cek').html(data.dt_mitra[0].almt_kec_kirim);
                                $('#kel_kirimm_cek').html(data.dt_mitra[0].almt_kel_kirim);
                                var table ='';
                                for(var i = 0; i < data.dt_order.length; i++){
                                    table += '<tr><td>'+data.dt_order[i].nm_barang+'</td><td>'+data.dt_order[i].jml_barang+'</td><td>'+uang(data.dt_order[i].harga_barang)+'</td><td>'+uang(data.dt_order[i].jml_barang * data.dt_order[i].harga_barang)+'</td></tr>'
                                }
                                $('#isirinci').html(table);
                                $('#total_cek').html(uang(data.dt_mitra[0].total_order));
                                $('#ekspedisi_cek').html(data.dt_mitra[0].ekspedisi);
                                $('#berat_cek').html(data.dt_mitra[0].berat+' kg');
                                $('#biaya_kirim_cek').html(data.dt_mitra[0].biaya_kirim);
                            }, "json")
                        })
                        
                        $('#kirimOrder').click(function(event){
                            var kd_order = $('#kd_order').val()
                            dataString = 'kd_order='+kd_order;
                            $.post("<?php echo base_url()?>Avbb/updatekirim", dataString, function(data){
                                $('#cekModal').modal('hide');
                                Swal.fire({
                                        title: 'Sukses',
                                        text: "Data Berhasil Dikirm!",
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'OK'
                                        })
                            })
                        })
                    </script>
            </div>
        </div>
    </div>
</div>