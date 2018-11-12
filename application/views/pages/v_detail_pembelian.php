<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Laporan Pembelian</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Detail Data</div>
                        <div class="panel-body">
						<div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Transaksi</th>
										<th>Tanggal Transaksi</th>
										<th>Kode Penyuplai</th>
										<th>Kode Operator</th>
										<th>Jumlah Mobil</th>
										<th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
								$no=1;
								{
								?>
								<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td><?php echo $record['kd_trx_pbl']; ?></td>
										<td><?php echo $record['tgl_trx_pbl']; ?></td>
										<td><?php echo $record['kd_penyuplai']; ?></td>
										<td><?php echo $record['kd_pengguna']; ?></td>
										<td><?php echo $record['jumlah_mobil']; ?> Unit</td>
										<td><?php echo $record['keterangan']; ?></td>
								</tr>
								<?php 
                                } 
								?>        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Detail Mobil</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
											<th>Kode Mobil</th>
                                            <th>Merk Mobil</th>
                                            <th>Nomor Polisi</th>
                                            <th>Nomor Rangka</th>
                                            <th>Nomor Mesin</th>
											<th>Tahun</th>
											<th>Warna</th>
											<th>A/N</th>
											<th>Alamat</th>
											<th>Modal (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
										$no=1;
										$total=0;
										foreach($detail as $row)
										{ 
										?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++ ?></td>
											<td><?php echo $row->kd_mobil; ?></td>
                                            <td><?php echo $row->merk_mobil; ?></td>
                                            <td><?php echo $row->no_pol; ?></td>
											<td><?php echo $row->no_rka; ?></td>
											<td><?php echo $row->no_msn; ?></td>
											<td><?php echo $row->tahun; ?></td>
											<td><?php echo $row->warna; ?></td>
											<td><?php echo $row->atas_nama; ?></td>
											<td><?php echo $row->alamat; ?></td>
                                            <td>Rp. <?php echo number_format($row->harga_beli); ?></td>
                                        </tr>
										<?php $total=$total+$row->harga_beli; } ?>
                                            <tr>
                                                <td colspan="10">Total Transaksi</td>
                                                <td>Rp. <?php echo number_format ($total);?></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>