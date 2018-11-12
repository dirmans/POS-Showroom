<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembeli</h1>
                </div>
            </div>
            <div class="row">
			<div class="btn">
				<a href="<?php echo site_url('pembeli/add') ?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Tambah Data</a></div>
				<div class="btn">
				<a href="<?php echo base_url('xlsdatapembeli/export')?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Cetak Data Pembeli Excel</a></div>		
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Daftar Pembeli</div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" 
							id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Pembeli</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>No Telpon</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
								$no=1;
								if(isset($data_pembeli)){
									foreach($data_pembeli as $row){
										?>
								<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->kd_pembeli; ?></td>
										<td><?php echo $row->nama_pembeli; ?></td>
										<td><?php echo $row->alamat_pembeli; ?></td>
										<td><?php echo $row->notelp_pembeli; ?></td>
										<td>
										<div class="btn btn-primary"><a class="fa fa-mini fa-edit" 
										href="<?php echo site_url('pembeli/edit/'.$row->kd_pembeli);?>"></a></div>
										<div class="btn btn-danger"><a class="fa fa-mini fa-remove" 
										href="<?php echo site_url('pembeli/hapusPembeli/'.$row->kd_pembeli);?>"
										   onclick="return confirm('Anda yakin?')"></a></div>
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