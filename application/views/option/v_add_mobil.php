		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Data Kendaraan</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('mobil/tambahMobil')?>">
                                      <div class="form-group">
                                          <label for="kd_mobil" class="control-label col-lg-2">Kode Mobil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_mobil" type="text" value="<?php echo $kd_mobil ?>" 
											  class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="merk_mobil" class="control-label col-lg-2">Merk Mobil</label>
                                          <div class="col-lg-10">
												<input class="form-control" name="merk_mobil" type="text" placeholder="merk mobil" autofocus required />
											</div>
                                      </div>
									  <div class="form-group">
                                          <label for="harga_beli" class="control-label col-lg-2">Modal (Rp.)</label>
                                          <div class="col-lg-10">
												<input class="form-control" name="harga_beli" type="text" placeholder="modal akhir" autofocus required />
											</div>
                                      </div>
									  <div class="form-group">
                                          <label for="harga_jual" class="control-label col-lg-2">Harga Jual (Rp.)</label>
                                          <div class="col-lg-10">
												<input class="form-control" name="harga_jual" type="text" placeholder="harga jual" autofocus required />
											</div>
                                      </div>
                                      <div class="form-group">
                                          <label for="no_pol" class="control-label col-lg-2">Nomor Polisi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_pol" type="text" placeholder="no pol" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="no_rka" class="control-label col-lg-2">Nomor Rangka</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_rka" type="text" placeholder="no rangka" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="no_msn" class="control-label col-lg-2">Nomor Mesin</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_msn" type="text" placeholder="no mesin" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="tahun" class="control-label col-lg-2">Tahun</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tahun" type="text" placeholder="tahun" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="warna" class="control-label col-lg-2">Warna</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="warna" type="text" placeholder="warna" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="atas_nama" class="control-label col-lg-2">A/N</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="atas_nama" type="text" placeholder="atas nama" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="alamat" class="control-label col-lg-2">Alamat</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="alamat" type="text" placeholder="alamat" autofocus required />
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
		