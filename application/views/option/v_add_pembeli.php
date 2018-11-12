		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Data Pembeli</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" 
								  action="<?php echo site_url('pembeli/tambahPembeli')?>">
                                      <div class="form-group">
                                          <label for="kd_pembeli" class="control-label col-lg-2">Kode Pembeli</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_pembeli" type="text" 
											  value="<?php echo $kd_pembeli; ?>" class="uneditable-input" 
											  readonly="true"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="nama_pembeli" class="control-label col-lg-2">Nama</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="nama_pembeli" type="text"
											  placeholder="nama" autofocus />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="alamat_pembeli" class="control-label col-lg-2">Alamat</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="alamat_pembeli" type="text" 
											  placeholder="alamat" />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="notelp_pembeli" class="control-label col-lg-2">No Telpon </label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="notelp_pembeli" type="text"
											  placeholder="nomor telpon" />
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
		