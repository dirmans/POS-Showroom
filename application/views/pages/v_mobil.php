<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Kendaraan</h1>
                </div>
            </div>
            <div class="row">
			<div class="btn">
				<a href="<?php echo site_url('mobil/add') ?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Tambah Data</a></div>
			<div class="btn">
				<a href="<?php echo base_url('xlsdatakendaraan/export')?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Cetak Data Kendaraan Excel</a></div>		
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Daftar Kendaraan</div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Mobil</th>
										<th>Merk Mobil</th>
										<th>Modal (Rp)</th>
										<th>Harga Jual (Rp)</th>
										<th>Status</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$no=1;
								if ($data_mobil){
								foreach($data_mobil as $row){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->kd_mobil; ?></td>
									<td><?php echo $row->merk_mobil; ?></td>
									<td>Rp. <?php echo number_format ($row->harga_beli); ?></td>
									<td>Rp. <?php echo number_format ($row->harga_jual); ?></td>
									<td><?php echo $row->status; ?></td>
									<td>
									<div class="btn btn-primary"><a class="fa fa-file" href="<?php echo site_url('mobil/detail/'.$row->kd_mobil);?>"></a></div>
									<div class="btn btn-primary"><a class="fa fa-edit" href="<?php echo site_url('mobil/edit/'.$row->kd_mobil);?>"></a></div>
									<div class="btn btn-danger"><a class="fa fa-remove" href="<?php echo site_url('mobil/hapusMobil/'.$row->kd_mobil);?>" onclick="return confirm('Anda yakin?')"></a></div>
									</td>
								</tr>
								<?php }
								}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		