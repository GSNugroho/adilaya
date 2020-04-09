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
                    <h5 class="card-title mb-4">Admin Vendor Booth</h5>
                    <div class="logo-adilaya">
                        <img src="<?php echo base_url('assets/image/adilaya.png')?>" width="144" height="135">
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataVMitra" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Mitra</th>
                                    <th>Alamat Kirim</th>
                                    <th>Brand</th>
                                    <th>Paket</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function(){
                            var table=$('#dataVMitra').DataTable({
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
                                'url':'<?php echo base_url().'AVBooth/dt_tbl'?>'
                            },
                            'columns': [
                                { data: 'nm_mitra' },
                                { data: 'almt_kirim' },
                                { data: 'nm_produk' },
                                { data: 'paket' },
                                { data: 'tambahan' },
                                { data: 'action'}
                            ]
                            });
                            $('#tgl2').on('dp.change', function(){
                                table.draw(true);
                            });
                        });
                    </script>
                </div>
                <div class="modal fade" id="rinciVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rincian Perlengkapan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="tutup()">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills ml-auto p-2">
                                        <li class="nav-item "><a class="nav-link" href="#tab_1" data-toggle="tab">Data Mitra</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Rincian</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Pengiriman</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-group">
                                            <label for="nm_mitra">Nama Mitra</label>
                                            <input class="form-control" type="text" name="nm_mitra" id="nm_mitra" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="almt_kirim">Alamat Kirim</label>
                                            <input class="form-control" type="text" name="almt_kirim" id="almt_kirim" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pro_mitra">Brand</label>
                                            <input class="form-control" type="text" name="pro_mitra" id="pro_mitra" style="width: 80%;" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="paket_mitra">Paket</label>
                                            <input class="form-control" type="text" name="paket_mitra" id="paket_mitra" style="width: 80%;" readonly>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                        <div id="rinciantahugila" style="display: none;"><?php $this->load->view('avbooth/part/tahu_gila')?></div>
                                        <div id="rincianchickenpopop" style="display: none;"><?php $this->load->view('avbooth/part/tahu_gila')?></div>
                                        <div id="rincianpopchick" style="display: none;"><?php $this->load->view('avbooth/part/popchick')?></div>
                                        <div id="rincianchiclin" style="display: none;"><?php $this->load->view('avbooth/part/chiclin')?></div>
                                        <div id="rincianboboochicken" style="display: none;"><?php $this->load->view('avbooth/part/boboo_chicken')?></div>
                                        <div id="rinciancutchicken" style="display: none;"><?php $this->load->view('avbooth/part/cut_chicken')?></div>
                                        <div id="rinciancandycrepes" style="display: none;"><?php $this->load->view('avbooth/part/candy_crepes')?></div>
                                        <div id="rincianpisangnugget" style="display: none;"><?php $this->load->view('avbooth/part/pisang_nugget_kece')?></div>
                                        <div id="rincianolivgeprek" style="display: none;"><?php $this->load->view('avbooth/part/oliv_geprek')?></div>
                                        <div id="rinciantahuhotking" style="display: none;"><?php $this->load->view('avbooth/part/tahu_hot_king')?></div>
                                        <div id="rincianohana" style="display: none;"><?php $this->load->view('avbooth/part/ohana')?></div>
                                        <div id="rincianchipfinger" style="display: none;"><?php $this->load->view('avbooth/part/chipfinger')?></div>
                                        <div id="rincianxiaolin" style="display: none;"><?php $this->load->view('avbooth/part/xiaolin')?></div>
                                    </div>
                                    <div class="tab-pane" id="tab_3">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function tutup(){
                        $('#rinciVendor').modal('hide');
                    }

                    $('#rinciVendor').on('show.bs.modal', function(event){
                            var button = $(event.relatedTarget)
                            var recipient = button.data('whatever')
                            var modal = $(this)
                            var dataString = 'id='+recipient
                            $.get("<?php echo base_url();?>AVBooth/get_data_mitra", dataString, function(data){
                                $('#nm_mitra').val(data[0].nm_mitra);
                                $('#almt_kirim').val(data[0].almt_kirim);
                                $('#pro_mitra').val(data[0].nm_produk);
                                $('#paket_mitra').val(data[0].nm_paket);
                                if(data[0].nm_produk == 'Tahu Gila'){
                                    $('#rinciantahugila').show();
                                    if(data[0].nm_paket == 'Paket Tenda'){
                                        $('#tenpre').show();
                                        $('#tenda').show();
                                        $('#komgas').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#lampu').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                    }else if(data[0].nm_paket == 'Paket Premium'){
                                        $('#tenpre').show();
                                        $('#deepgas').show();
                                        $('#deeplis').show();
                                        $('#lampu').show();
                                        $('#rafia').show();
                                        $('#4').show();
                                    }else if(data[0].nm_paket == 'Paket Indoor'){
                                        $('#indoor').show();
                                        $('#komgas').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#lampu').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                    }else if(data[0].nm_paket == 'Paket Tanpa Booth'){
                                        $('#komgas').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#lakban').show();
                                        $('#1').show();
                                    }
                                }else if(data[0].nm_produk == 'Chicken Popop'){
                                    $('#rincianchickenpopop').show();
                                    if(data[0].nm_paket == 'Paket A'){
                                        $('#bo_put').show();
                                        $('#deep_gas').show();
                                        $('#selang').show();
                                        $('#rafia').show();
                                        $('#4').show();
                                        $('#botol_kaca').show();
                                        $('#celmer').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket B'){
                                        $('#bo_put').show();
                                        $('#deep_lis').show();
                                        $('#rafia').show();
                                        $('#4').show();
                                        $('#botol_kaca').show();
                                        $('#celmer').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket C'){
                                        $('#bo_put').show();
                                        $('#kom_gas').show();
                                        $('#selang').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#botol_kaca').show();
                                        $('#celmer').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket D'){
                                        $('#bo_pall').show();
                                        $('#kom_gas').show();
                                        $('#selang').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#botol_kaca').show();
                                        $('#celmer').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket E'){
                                        $('#bo_pall').show();
                                        $('#kom_gas').show();
                                        $('#selang').show();
                                        $('#lakban').show();
                                        $('#1').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#wadah_bumbu').show();
                                        $('#polos').show();
                                    }
                                }else if(data[0].nm_produk == 'Popchick Chicken'){
                                    $('#rincianpopchick').show();
                                    if(data[0].nm_paket == 'Tenda Premium'){
                                        $('#boput').show();
                                        $('#tenda').show();
                                        $('#rafia').show();
                                        $('#4').show();
                                        $('#deepgas').show();
                                        $('#btol_bkaca').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Booth 1'){
                                        $('#boput').show();
                                        $('#rafia').show();
                                        $('#4').show();
                                        $('#deepgas').show();
                                        $('#btol_bkaca').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Booth 2'){
                                        $('#boput').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#komgas').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#btol_b').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#lakban').show();
                                        $('#1').show();
                                        $('#komgas').show();
                                        $('#wajan').show();
                                        $('#irus').show();
                                        $('#sotil').show();
                                        $('#saringan').show();
                                        $('#btol_b').show();
                                    }
                                }else if(data[0].nm_produk == 'Chiclin'){
                                    $('#rincianchiclin').show();
                                    if(data[0].nm_paket == 'Paket Gold'){
                                        $('#tenda').show();
                                    }else if(data[0].nm_paket == 'Paket Silver'){
                                        $('#lampu').show();
                                        $('#banat').show();
                                    }
                                }else if(data[0].nm_produk == 'Boboo Chicken'){
                                    $('#rincianboboochicken').show();
                                    if(data[0].nm_paket == 'Paket Eksklusif'){
                                        $('#tenda').show();
                                    }
                                }else if(data[0].nm_produk == 'Cut Chicken'){
                                    $('#rinciancutchicken').show();
                                    if(data[0].nm_paket == 'Portable'){
                                        $('#portable').show();
                                        $('#neon').show();
                                        $('#3').show();
                                    }else if(data[0].nm_paket == 'Booth'){
                                        $('#booth').show();
                                        $('#4').show();
                                    }
                                }else if(data[0].nm_produk == 'Candy Crepes'){
                                    $('#rinciancandycrepes').show();
                                    if(data[0].nm_paket == 'Outdoor'){
                                        $('#bo_put').show();
                                        $('#tenda').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Indoor'){
                                        $('#bo_put').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Pallet'){
                                        $('#bo_pall').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#lakban').show();
                                        $('#1').show();
                                    }
                                }else if(data[0].nm_produk == 'Pisang Nugget Kece'){
                                    $('#rincianpisangnugget').show();
                                    if(data[0].nm_paket == 'Premium'){
                                        $('#bo_put').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Indoor'){
                                        $('#bo_pall').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Tanpa Booth'){
                                        $('#lakban').show();
                                        $('#1').show();
                                    }
                                }else if(data[0].nm_produk == 'Oliv Geprek Ekspress'){
                                    $('#rincianolivgeprek').show();
                                    if(data[0].nm_paket == 'Paket 1 (Booth Jumbo)'){
                                        $('#bo_put').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket 2 (FTB)'){
                                        $('#lakban').show();
                                        $('#1').show();
                                    }
                                }else if(data[0].nm_produk == 'Tahu Hot King'){
                                    $('#rinciantahuhotking').show();
                                    if(data[0].nm_paket == 'Paket A (Putih)'){
                                        $('#bo_put').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket B (Palet)'){
                                        $('#bo_pal').show();
                                        $('#rafia').show();
                                        $('#5').show();
                                        $('#lampu').show();
                                    }else if(data[0].nm_paket == 'Paket C (FTB)'){
                                        $('#lakban').show();
                                        $('#1').show();
                                    }
                                }else if(data[0].nm_produk == 'Ohana Fried Chicken'){
                                    $('#rincianohana').show();
                                    if(data[0].nm_paket == 'Paket Combo'){
                                        $('#tenda').show();
                                        $('#5').show();
                                    }else if(data[0].nm_paket == 'Paket Single'){
                                        $('#5').show();
                                    }
                                }else if(data[0].nm_produk == 'Chip Finger'){
                                    $('#rinciachipfinger').show();
                                }else if(data[0].nm_produk == 'Xiaolin'){
                                    $('#rinciaxiaolin').show();
                                    if(data[0].nm_paket == 'Paket Gold'){
                                        $('#tenda').show();
                                    }
                                }
                            },'json')
                        })
                </script>
            </div>
        </div>
    </div>
</div>