<!----------------------------------------CONTENT WRAPPER----------------------------------------------->		
		<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Tambah Data Profit Pertahun</div>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" action="<?php echo site_url('profit/tambahProfit')?>">
                                      <div class="form-group">
                                          <label for="kd_profit" class="control-label col-lg-2">Kode</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_profit" type="text" value="<?php echo $kd_profit ?>" 
											  class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="profit_kotor" class="control-label col-lg-2">Profit Kotor</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt1" name="profit_kotor" type="text" onkeyup="sum();" placeholder="profit kotor" autofocus required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="sewa_gedung" class="control-label col-lg-2">Sewa Gedung</label>
                                          <div class="col-lg-10">
												<input class="form-control" id="txt2" name="sewa_gedung" type="text" onkeyup="sum();" placeholder="sewa gedung" autofocus required />
											</div>
                                      </div>
									  <div class="form-group">
                                          <label for="listrik" class="control-label col-lg-2">Listrik</label>
                                          <div class="col-lg-10">
												<input class="form-control" id="txt3" name="listrik" type="text" onkeyup="sum();" placeholder="listrik" autofocus required />
											</div>
                                      </div>
									  <div class="form-group">
                                          <label for="gaji_karyawan" class="control-label col-lg-2">Gaji Karyawan</label>
                                          <div class="col-lg-10">
												<input class="form-control" id="txt4" name="gaji_karyawan" type="text" onkeyup="sum();" placeholder="gaji karyawan" autofocus required />
											</div>
                                      </div>
                                      <div class="form-group">
                                          <label for="kas_kecil" class="control-label col-lg-2">Kas Kecil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt5" name="kas_kecil" type="text" onkeyup="sum();" placeholder="kas kecil" autofocus required />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label for="profit_bersih" class="control-label col-lg-2">Profit Bersih</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt6" name="profit_bersih" type="text" readonly />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="tahun" class="control-label col-lg-2">Tahun Cetak</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="tahun" type="text" />
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

<script type="text/javascript">
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
	  var txtTigaNumberValue = document.getElementById('txt3').value;
	  var txtEmpatNumberValue = document.getElementById('txt4').value;
	  var txtLimaNumberValue = document.getElementById('txt5').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue) - parseInt(txtTigaNumberValue) - parseInt(txtEmpatNumberValue) - parseInt(txtLimaNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt6').value = result;
      }
}
</script>