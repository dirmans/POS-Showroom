	<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Transaksi Penjualan</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('laporan/editPenjualan')?>">
                                      <div class="form-group">
                                          <label for="kd_trx_pjl" class="control-label col-lg-2">Kode Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="kd_trx_pjl" type="text" value="<?php print $baris['kd_trx_pjl']?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="tgl_trx_pjl" class="control-label col-lg-2">Tanggal Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tgl_trx_pjl" type="text" value="<?php echo $baris['tgl_trx_pjl']?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="last_update" class="control-label col-lg-2">Tanggal Update Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="last_update" type="date" value="<?php echo $baris['tgl_trx_pjl']?>" />
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label for="kd_pembeli" class="control-label col-lg-2">Kode Pembeli</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_pembeli" type="text" value="<?php echo $baris['kd_pembeli']?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label for="kd_pengguna" class="control-label col-lg-2">Operator</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_pengguna" type="text" value="<?php echo $baris['kd_pengguna']?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="jumlah_mobil" class="control-label col-lg-2">Jumlah Mobil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="jumlah_mobil" type="text" value="<?php echo $baris['jumlah_mobil']?>" class="uneditable-input" readonly />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="total_transaksi" class="control-label col-lg-2">Total Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" readonly name="total_transaksi" type="text" value="<?php echo $baris['total_transaksi']?>" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <select class="form-control" name="keterangan" required>
												<option></option>
												<option value="Lunas">Lunas</option>
												<option value="DP">DP</option>
												</select>
                                          </div>
                                      </div><div class="form-group">
                                          <label for="jumlah_dp" class="control-label col-lg-2">Jumlah DP</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="jumlah_dp" type="text" value="<?php echo $baris['jumlah_dp']?>" autofocus />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" name="submit" class="btn btn-outline btn-primary" >
											  Update</button>
											  <?php echo anchor('laporan/lapPenjualan','Kembali',array('class'=>'btn btn-outline btn-success'))?>
                                          </div>
                                      </div>
                                  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>