<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transaksi Pembelian</h1>
                </div>
            </div>
            <div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Input Data</div>
                        <div class="panel-body">
						<div class="form">
						<form class="form-validate form-horizontal" method="post" 
						action="<?php echo site_url('pembelian/transaksi')?>">
							<div class="form-group">
                                <label for="kd_mobil" class="control-label col-lg-2">Kode Mobil</label>
                                          <div class="col-lg-10 controls">
											<select name="kd_mobil" class="form-control" required>
												<?php foreach ($data_kendaraan as $k) {
												echo "<option value='$k->kd_mobil'>$k->kd_mobil</option>";
												} ?>
											</select>
											</div>
                                      </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="submit" class="btn btn-outline btn-primary">
									Simpan</button>  <?php echo anchor('pembelian/selesaiBelanja','Selesai',
									array('class'=>'btn btn-outline btn-success'))?>
                                    </div>
                                </div>
							</form>
							</div>
                        </div>
                    </div>
				</div>
                <div class="col-lg-12">
                        <div class="panel panel-primary">
                        <div class="panel-heading">Detail Kendaraan</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" 
									id="dataTables-example">
                                        <thead>
                                            <tr>
												<th>No</th>
												<th>Kode Mobil</th>
												<th>Merk Mobil</th>
												<th>Modal (Rp.)</th>
											</tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											$no=1;
											$total=0;
											foreach ($detail as $row){ 
											?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
												<td><?php echo $row->kd_mobil; ?></td>
                                                <td><?php echo $row->merk_mobil; ?></td>
                                                <td>Rp. <?php echo number_format($row->harga_beli).' - '.
												anchor('pembelian/hapusItem/'.$row->id_detail_pbl,'Hapus',
												array('style'=>'color:red;')) ?></td>
                                            </tr>
											<?php $total=$total+$row->harga_beli; } ?>
                                            <tr>
                                                <td colspan="3">Total Transaksi</td>
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