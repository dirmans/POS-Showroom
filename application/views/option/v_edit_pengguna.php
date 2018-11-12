<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Data Pengguna</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" 
								  action="<?php echo site_url('pengguna/edit');?>">
                                      
									  <div class="form-group">
                                          <label for="kd_pengguna" class="control-label col-lg-2">Kode Pengguna</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="kd_pengguna" type="text" 
											  value="<?php print $baris['kd_pengguna']; ?>"
											  class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
                                      
									  <div class="form-group">
                                          <label for="nama_pengguna" class="control-label col-lg-2">Nama</label>
                                          <div class="col-lg-10 controls">
												<input class="form-control" name="nama_pengguna" type="text" 
												value="<?php echo $baris['nama_pengguna'];?>" autofocus />
											</div>
                                      </div>
                                      
									  <div class="form-group">
                                          <label for="username" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-10 controls">
												<input class="form-control" name="username" type="text" 
												value="<?php echo $baris['username'];?>"/>
											</div>
                                      </div>
									  
									  <div class="form-group">
                                          <label for="password" class="control-label col-lg-2">Password</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="password" type="password"
											  value="<?php echo $baris['password'];?>"/>
                                          </div>
                                      </div>
									  
									  <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-outline btn-primary" name="submit" type="submit">
											  Update</button>
											  <?php echo anchor('pengguna','Kembali',
											  array('class'=>'btn btn-outline btn-success'))?>
                                          </div>
                                      </div>
                                  </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		