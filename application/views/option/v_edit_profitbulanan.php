<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
<div id="page-wrapper">
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Profit Bulanan</h1>
                </div>
            </div>
			<div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">Data Profit Bulanan</div>
							<div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="post" 
								  action="<?php echo site_url('profitbulanan/edit');?>">
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Kode Profit Bulanan</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="kd_profitbulanan"
											  value="<?php print $baris['kd_profitbulanan']?>" class="uneditable-input" readonly="true"/>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label col-lg-2">Profit Kotor</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt1" onkeyup="sum();" name="profit_kotor" type="text" 
											  value="<?php echo $baris['profit_kotor']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Sewa Gedung (Rp.)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt2" onkeyup="sum();" name="sewa_gedung" type="text" 
											  value="<?php echo $baris['sewa_gedung']?>" autofocus />
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Listrik (Rp.)</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt3" onkeyup="sum();" name="listrik" type="text" 
											  value="<?php echo $baris['listrik']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Gaji Karywan</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt4" onkeyup="sum();" name="gaji_karyawan" type="text" 
											  value="<?php echo $baris['gaji_karyawan']?>"/>
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="control-label col-lg-2">Kas Kecil</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt5" onkeyup="sum();" name="kas_kecil" type="text" 
											  value="<?php echo $baris['kas_kecil']?>"/>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label for="profit_bersih" class="control-label col-lg-2">Profit Bersih</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="txt6" name="profit_bersih" type="text" readonly />
                                          </div>
                                          </div>
									   
                                      <div class="form-group">
                                          <label for="bulan" class="control-label col-lg-2">Bulan Cetak</label>
                                          <div class="col-lg-10">
                                              
                                              <select class="form-control" name="bulan">
        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="Nopember">Nopember</option>
        <option value="Desember">Desember</option>
     </select> 
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
                                              <button type="submit" name="submit" class="btn btn-outline btn-primary" >
											  Update</button>
											  <?php echo anchor('profitbulanan','Kembali',array('class'=>'btn btn-outline btn-success'))?>
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