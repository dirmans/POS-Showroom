	<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Transaksi Penjualan</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('penjualan/tambahPenjualan')?>">
                                      <div class="form-group">
                                          <label for="kd_trx_pjl" class="control-label col-lg-2">Kode Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="kd_trx_pjl" type="text" value="<?php echo $kd_trx_pjl; ?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="tgl_trx_pjl" class="control-label col-lg-2">Tanggal Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tgl_trx_pjl" type="text" value="<?php echo jin_date(date('d-m-Y')) ?>" class="uneditable-input" readonly="true" />
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label for="kd_pembeli" class="control-label col-lg-2">Kode Pembeli</label>
                                          <div class="col-lg-10">
                                              <select name="kd_pembeli" class="form-control">
												<?php foreach ($data_pembeli as $k) {
												echo "<option value='$k->kd_pembeli'>$k->kd_pembeli - $k->nama_pembeli</option>";
												} ?>
											</select>
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label for="kd_pengguna" class="control-label col-lg-2">Operator</label>
                                          <div class="col-lg-10">
                                              <select name="kd_pengguna" class="form-control">
												<?php foreach ($data_pengguna as $k) {
												echo "<option value='$k->kd_pengguna'>$k->kd_pengguna - $k->nama_pengguna</option>";
												} ?>
											</select>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="jumlah_mobil" class="control-label col-lg-2">Jumlah Mobil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="jumlah_mobil" type="text" placeholder="jumlah mobil" autofocus required="" />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="total_transaksi" class="control-label col-lg-2">Total Transaksi</label>
                                          <div class="col-lg-10">
											<?php 
											$total=0;
											foreach ($detail as $row){ 
											?>
											<?php $total=$total+$row->harga_jual; } ?>
                                              <input class="form-control"  readonly="true" name="total_transaksi" type="text" value="<?php echo $total; ?>" placeholder="total transaksi" />
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
                                          <label for="jumlah_dp" class="control-label col-lg-2">Jumlah DP (Optional)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="jumlah_dp" type="text" placeholder="jumlah dp" autofocus />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-outline btn-primary" type="submit">Simpan</button>

                                          </div>
                                      </div>
                                  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>