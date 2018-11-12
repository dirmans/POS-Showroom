<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi Showroom Panji Motor</title>
	<link href="<?php echo base_url('assets/img/favicon.ico'); ?>" rel="shortcut icon">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
	<!-- DataTables CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">
</head>
<body>
<!----------------------------------------HEAD + NAVBAR----------------------------------------------->
    <div id="wrapper">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 20">
            <div class="navbar-header">
			<a class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span><i class="fa fa-list fa-fw"></i>
                </button></a>
				<a class="navbar-brand" href="<?php echo base_url('beranda'); ?>">SHOWROOM PANJI MOTOR</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url('auth/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
			<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown">
                    <i class="fa fa-calendar"></i> <?php echo date('d F Y'); ?> &nbsp; 
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">      
                        <li><a href="<?php echo site_url('beranda'); ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a></li>
						<li class><a href="#"><i class="fa fa-folder fa-fw"></i> Data Master<span class="fa arrow arrow_carrot-down arrow_carrot-right"></span></a>
                            <ul class="nav nav-second-level" aria-expanded="false">
							    <li><a href="<?php echo site_url('mobil'); ?>"><i class="fa fa-folder-open"></i> Data Kendaraan</a></li>
                                <li><a href="<?php echo site_url('pembeli'); ?>"><i class="fa fa-folder-open"></i> Data Pembeli</a></li>
								<li><a href="<?php echo site_url('penyuplai'); ?>"><i class="fa fa-folder-open"></i> Data Penyuplai</a></li>
								<li><a href="<?php echo site_url('pengguna'); ?>"><i class="fa fa-folder-open"></i> Data Pengguna</a></li>
								<li><a href="<?php echo site_url('profit'); ?>"><i class="fa fa-folder-open"></i> Data Profit pertahun</a></li>
								<li><a href="<?php echo site_url('profitbulanan'); ?>"><i class="fa fa-folder-open"></i> Data Profit perbulan</a></li>
                            </ul></li>
						<li><a href="<?php echo site_url('pembelian'); ?>"><i class="fa fa-shopping-cart fa-fw"></i> Pembelian</a></li>
						<li><a href="<?php echo site_url('penjualan'); ?>"><i class="fa fa-money fa-fw"></i> Penjualan</a></li>
						<li><a href="#"><i class="fa fa-list fa-fw"></i> Laporan<span class="fa arrow arrow_carrot-down arrow_carrot-right"></span></a>
						<ul class="nav nav-second-level" aria-expanded="false">
							    <li><a href="<?php echo site_url('laporan/lapPembelian'); ?>"><i class="fa fa-folder-open"></i> Laporan Pembelian</a></li>
                                <li><a href="<?php echo site_url('laporan/lapPenjualan'); ?>"><i class="fa fa-folder-open"></i> Laporan Penjualan</a></li>
                                <li><a href="<?php echo site_url('laporan/lapProfit'); ?>"><i class="fa fa-folder-open"></i> Laporan Profit</a></li>
                            </ul></li>
                    </ul>
                </div>
            </div>
        </nav>
	</div>
	<!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
	
</body>
</html>
	