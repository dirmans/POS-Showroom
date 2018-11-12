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
                          <div class="panel-heading">Data Penyuplai</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('penyuplai/edit');?>">
                                      
									  <div class="form-group">
                                          <label for="kd_penyuplai" class="control-label col-lg-2">Kode Penyuplai</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="kd_penyuplai" type="text" value="<?php print $baris['kd_penyuplai'] ?>" class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
                                      
									  <div class="form-group">
                                          <label for="nama_penyuplai" class="control-label col-lg-2">Nama</label>
                                          <div class="col-lg-10 controls">
												<input class="form-control" name="nama_penyuplai" type="text" value="<?php echo $baris['nama_penyuplai']?>" autofocus />
											</div>
                                      </div>
                                      
									  <div class="form-group">
                                          <label for="alamat_penyuplai" class="control-label col-lg-2">Alamat</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="alamat_penyuplai" type="text" value="<?php echo $baris['alamat_penyuplai']?>"/>
                                          </div>
                                      </div>
									  
									  <div class="form-group">
                                          <label for="notelp_penyuplai" class="control-label col-lg-2">No Telpon</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="notelp_penyuplai" type="text" value="<?php echo $baris['notelp_penyuplai']?>"/>
                                          </div>
                                      </div>
                                      
									  <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-outline btn-primary" name="submit" type="submit">Update</button>
											  <?php echo anchor('penyuplai','Kembali',array('class'=>'btn btn-outline btn-success'))?>
                                          </div>
                                      </div>
                                  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>