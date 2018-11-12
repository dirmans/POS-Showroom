<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Kendaraan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Detail Data</div>
                        <div class="panel-body">
						<div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Mobil</th>
										<th>Merk Mobil</th>
										<th>Modal (Rp.)</th>
										<th>Harga Jual (Rp.)</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
								$no=1;
								{
								?>
								<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td><?php echo $record['kd_mobil']; ?></td>
										<td><?php echo $record['merk_mobil']; ?></td>
										<td><?php echo $record['harga_beli']; ?></td>
										<td><?php echo $record['harga_jual']; ?></td>
										<td><?php echo $record['status']; ?></td>
								</tr>
								<?php 
                                } 
								?>        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Detail Surat Kendaraan</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Merk Mobil</th>
                                            <th>Nomor Polisi</th>
                                            <th>Nomor Rangka</th>
                                            <th>Nomor Mesin</th>
											<th>Tahun</th>
											<th>Warna Kendaraan</th>
											<th>A/N</th>
											<th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										{
										?>
										<tr class="odd gradeX">
												<td><?php echo $record['merk_mobil']; ?></td>
												<td><?php echo $record['no_pol']; ?></td>
												<td><?php echo $record['no_rka']; ?></td>
												<td><?php echo $record['no_msn']; ?></td>
												<td><?php echo $record['tahun']; ?></td>
												<td><?php echo $record['warna']; ?></td>
												<td><?php echo $record['atas_nama']; ?></td>
												<td><?php echo $record['alamat']; ?></td>
										</tr>
										<?php 
										} 
										?>      
                                    </tbody>
                                </table>
								<?php echo anchor('mobil','Kembali',array('class'=>'btn btn-outline btn-primary'))?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>