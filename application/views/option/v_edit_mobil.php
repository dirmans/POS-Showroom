<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Data Kendaraan</div>
							<div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" 
								  action="<?php echo site_url('mobil/edit');?>">
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Kode Mobil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_mobil"
											  value="<?php print $baris['kd_mobil']?>" class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Merk Mobil</label>
											<div class="col-lg-10">
												<input class="form-control" name="merk_mobil" type="text" 
												value="<?php echo $baris['merk_mobil']?>" autofocus />
											</div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Modal (Rp.)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="harga_beli" type="text" 
											  value="<?php echo $baris['harga_beli']?>" autofocus />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Harga Jual (Rp.)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="harga_jual" type="text" 
											  value="<?php echo $baris['harga_jual']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Nomor Polisi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_pol" type="text" 
											  value="<?php echo $baris['no_pol']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Nomor Rangka</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_rka" type="text" 
											  value="<?php echo $baris['no_rka']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Nomor Mesin</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="no_msn" type="text" 
											  value="<?php echo $baris['no_msn']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Tahun</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tahun" type="text" 
											  value="<?php echo $baris['tahun']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Warna</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="warna" type="text" 
											  value="<?php echo $baris['warna']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">A/N</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="atas_nama" type="text" 
											  value="<?php echo $baris['atas_nama']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Alamat</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="alamat" type="text" 
											  value="<?php echo $baris['alamat']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Status</label>
                                          <div class="col-lg-10">
                                              <select class="form-control" name="status" option value=""></option>
												<option></option>
												<option value="Tersedia">Tersedia</option>
												<option value="Terjual">Terjual</option>
												</select>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" name="submit" class="btn btn-outline btn-primary" >
											  Update</button>
											  <?php echo anchor('mobil','Kembali',array('class'=>'btn btn-outline btn-success'))?>
                                          </div>
                                      </div>
                                  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	