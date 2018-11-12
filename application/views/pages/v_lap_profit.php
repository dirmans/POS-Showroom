<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Profit</h1>
                </div>
            </div>
            <div class="row">
			<form action="<?php echo site_url("laporan/pdfPeriodeProfit/?tgl_awal=''&tgl_akhir=''") ?>" method="GET">
			<div class="btn">
				<a href="<?php echo site_url('laporan/pdfProfit') ?>" class="btn btn-outline btn-primary">
				<i class="fa fa-print"></i> Cetak Semua Laporan</a></div>
					<tr>
					<td>Laporan Tanggal</td>
					<td><input class="input-group-date" type="text" name="tgl_awal"  /></td>
					<td>- Sampai Tanggal</td>
					<td><input class="input-group-date" type="text" name="tgl_akhir"  /></td>
					<td><input type="submit" value="Cetak" /></td></tr>
				</form>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Daftar Transaksi</div>
                        <div class="panel-body">
						<div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Transaksi</th>
										<th>Tanggal Transaksi</th>
										<th>Modal (Rp.)</th>
										<th>Harga Jual (Rp.)</th>
										<th>Profit Kendaraan (Rp.)</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<form method="GET">
								<?php
								$no=1;
								$total=0;
								foreach($data_profit as $row){
								    $total= $row->total_transaksi-$row->harga_beli;
								?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->kd_trx_pjl; ?></td>
										<td><?php echo $row->tgl_trx_pjl; ?></td>
										<td>Rp. <?php echo number_format($row->harga_beli); ?></td>
										<td>Rp. <?php echo number_format($row->harga_jual); ?></td>
										<td>Rp. <?php echo number_format($total); ?></td>
										<td>
										<div class="btn btn-primary"><a class="fa fa-mini fa-print" href="<?php echo site_url("laporan/pdfPerProfit/".$row->kd_trx_pjl."/?jumlah_dp=".$row->jumlah_dp) ?>"></a></div></td>
									</tr>
									<?php 
                                        } ?> 
								</form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>