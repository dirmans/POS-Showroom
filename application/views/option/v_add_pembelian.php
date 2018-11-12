	<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Transaksi Pembelian</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('pembelian/tambahPembelian')?>">
                                      <div class="form-group">
                                          <label for="kd_trx_pbl" class="control-label col-lg-2">Kode Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="kd_trx_pbl" type="text" value="<?php echo $kd_trx_pbl; ?>" class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="tgl_trx_pbl" class="control-label col-lg-2">Tanggal Transaksi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tgl_trx_pbl" type="text" value="<?php echo jin_date(date('d-m-Y')) ?>" class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label for="kd_penyuplai" class="control-label col-lg-2">Kode Penyuplai</label>
                                          <div class="col-lg-10">
											<select name="kd_penyuplai" class="form-control">
												<?php foreach ($data_penyuplai as $k) {
												echo "<option value='$k->kd_penyuplai'>$k->kd_penyuplai - $k->nama_penyuplai</option>";
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
                                              <input class="form-control" name="jumlah_mobil" type="text" placeholder="jumlah mobil" autofocus />
                                          </div>
                                      </div>
										<div class="form-group">
                                          <label for="total_transaksi" class="control-label col-lg-2">Total Transaksi</label>
                                          <div class="col-lg-10">
											<?php 
											$total=0;
											foreach ($detail as $row){ 
											?>
											<?php $total=$total+$row->harga_beli; } ?>
                                              <input class="form-control" readonly="true" name="total_transaksi" type="text" value="<?php echo $total; ?>" placeholder="total transaksi" autofocus />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <select class="form-control" name="keterangan" option value="">---Pilih Keterangan--</option>
												<option value="Lunas">Lunas</option>
												<option value="DP">DP</option>
												</select>
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
