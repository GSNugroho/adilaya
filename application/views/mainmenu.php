<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIM Adilaya</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/font-awesome/css/font-awesome.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/node_modules/flag-icon-css/css/flag-icon.min.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" />
  <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
  <style>
      .box-nav{
        padding: 5px;
        border-radius: 25px;
        margin: 10px;
        background-color: #f4f8fb;
      }
  </style>
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
        <button style="margin-top:10px;" class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="dropdown-toggle navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
              <i class="fa fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"></span>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>   
              </div>  
          </a>
              
          
          <?php if($this->session->userdata('level')=='3'):?>
            <script>
            $(document).ready(function() {
                  if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
             
            function notifikasi() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Adilaya Marketing', {
                        icon: '<?php echo base_url('assets/image/logo_notif.png')?>',
                        body: "Mengirimkan Notifikasi Baru \nSilahkan cek rincian notifikasi.",
                    });
                    
                    setTimeout(function(){
                        notifikasi.close();
                    }, 4000);
                }
            };
              $(document).ready(function(){
 
              function load_unseen_notification(view = '')
              {
                $.ajax({
                  url:"<?php echo base_url('Monitor/update_notif')?>",
                  method:"POST",
                  data:{view:view},
                  dataType:"json",
                  success:function(data)
                  {
                    $('.dropdown-list').html(data.notification);
                    if(data.unseen_notification > 0)
                    {
                    $('.badge-counter').html(data.unseen_notification);
                    notifikasi()
                    }
                  }
                });
              }
              
              load_unseen_notification();
              
              $(document).on('click', '.dropdown-toggle', function(){
                $('.badge-counter').html('');
                load_unseen_notification('yes');
              });
              
              setInterval(function(){ 
                load_unseen_notification();; 
              }, 5000);
              
              });
            </script>
            <?php endif;?>
        
          <div class="user-info">
            <img src="<?php echo base_url('assets/images/faces/face8.jpg')?>" alt="">
            <p class="name"><?php echo $this->session->userdata('username')?></p>
            <p class="designation"><?php if($this->session->userdata('level')=='2'){echo 'Admin Marketing';}else if($this->session->userdata('level')=='3'){echo "Admin CS";}?></p>
            <span class="online"></span>
          </div>
          
          <div class="box-nav">
            <ul class="nav">
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="<?php echo base_url('assets/images/icons/1.png')?>" alt="">
                    <span class="menu-title">Dashboard</span>
                </a>
                </li>
                <?php if($this->session->userdata('level')=='3' || $this->session->userdata('level')=='2'):?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Monitor')?>">
                    <img src="<?php echo base_url('assets/images/icons/2.png')?>" alt="">
                    <span class="menu-title">Data Mitra</span>
                </a>
                </li>
                <?php endif;?>
                <?php if($this->session->userdata('level')=='3'):?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Order')?>">
                    <img src="<?php echo base_url('assets/images/icons/005-forms.png')?>" alt="">
                    <span class="menu-title">Data Order</span>
                </a>
                </li>
                <?php endif;?>
                <?php if($this->session->userdata('level')=='4'):?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Rnd')?>">
                    <img src="<?php echo base_url('assets/images/icons/9.png')?>" alt="">
                    <span class="menu-title">RnD</span>
                </a>
                </li>
                <?php endif;?>
                <?php if($this->session->userdata('level')=='4'):?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Desain')?>">
                    <img src="<?php echo base_url('assets/images/icons/011-gallery.png')?>" alt="">
                    <span class="menu-title">Desain</span>
                </a>
                </li>
                <?php endif;?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Login/logout')?>">
                    <img src="<?php echo base_url('assets/images/icons/020-locked.png')?>" alt="">
                    <span class="menu-title">Logout</span>
                </a>
                </li>
            </ul>
          </div>
        </nav>


  <!-- <script src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js')?>"></script> -->
  
  <script src="<?php echo base_url('assets/node_modules/popper.js/dist/umd/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datepicker/js/moment-with-locales.js') ?>"></script>
  <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
  <!-- <script src="<?php echo base_url('assets/node_modules/chart.js/dist/Chart.min.js')?>"></script> -->
  <script src="<?php echo base_url('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')?>"></script>
  <!-- <script src="<?php echo base_url('assets/')?>https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script> -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/misc.js')?>"></script>
  <script src="<?php echo base_url('assets/js/chart.js')?>"></script>
  <script src="<?php echo base_url('assets/js/maps.js')?>"></script>
</body>

</html>
