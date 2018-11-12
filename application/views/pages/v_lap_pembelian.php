<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Pembelian</h1>
                </div>
            </div>
            <div class="row">
			<form action="<?php echo site_url("laporan/pdfPeriodePbl/?tgl_awal=''&tgl_akhir=''") ?>" method="GET">
			<div class="btn">
				<a href="<?php echo site_url('laporan/pdfPembelian') ?>" class="btn btn-outline btn-primary">
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
                            <table width="100%" class="table table-striped table-bordered table-hover"
							id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Transaksi</th>
										<th>Tanggal Transaksi</th>
										<th>Operator</th>
										<th>Keterangan</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$no=1;
								$total=0;
								foreach($data_pembelian as $row){
								?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->kd_trx_pbl; ?></td>
										<td><?php echo $row->tgl_trx_pbl; ?></td>
										<td><?php echo $row->nama_pengguna; ?></td>
										<td><?php echo $row->keterangan; ?></td>
										<td>
										<div class="btn btn-primary"><a class="fa fa-mini fa-file-o" 
										href="<?php echo site_url('laporan/detailLapPembelian/'.$row->kd_trx_pbl);?>"></a></div>
										<div class="btn btn-danger"><a class="fa fa-mini fa-remove" 
										href="<?php echo site_url('laporan/hapusLapPembelian/'.$row->kd_trx_pbl);?>"
										   onclick="return confirm('Anda yakin?')"> </a></div></td>
									</tr>
										<?php 
									} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>