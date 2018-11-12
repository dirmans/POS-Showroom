<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Beranda</h1>
					<h4>Selamat Datang</h4>
					<h5>Hai, admin silahkan pilih menu dibawah dan disamping untuk mengoperasikan aplikasi.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="medium">Data Kendaraan</div>
                                </div>
								<div class="col-xs-9 text-right">
                                    <div class="medium">Stok <?php echo $baris; ?> Unit</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('mobil');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="medium">Data Pembeli</div>
                                </div>
								<div class="col-xs-9 text-right">
                                    <div class="medium">Total pembeli <?php echo $baris2; ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('pembeli');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="medium">Data Penyuplai</div>
                                </div>
								<div class="col-xs-9 text-right">
                                    <div class="medium">Total penyuplai <?php echo $baris3; ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('penyuplai');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="medium">Laporan Penjualan</div>
                                </div>
								<div class="col-xs-9 text-right">
								<?php 
								$total=0;
								foreach ($baris4 as $d){ 
								?>
								<?php $total=$total+$d->total_transaksi; } ?>
                                    <div class="medium">Total Transaksi</div>
									<div class="small">Rp. <?php echo number_format($total); ?>,-</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('laporan/lapPenjualan');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Selengkapnya</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>