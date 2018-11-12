<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pengguna</h1>
                </div>
            </div>
            <div class="row">
			<div class="btn">
				<a href="<?php echo site_url('pengguna/add') ?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Tambah Data</a></div>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Daftar Pengguna</div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Pengguna</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Login Terakhir</th>
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								 <?php
								$no=1;
								if(isset($data_pengguna)){
									foreach($data_pengguna as $row){
										?>
								<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $row->kd_pengguna; ?></td>
										<td><?php echo $row->nama_pengguna; ?></td>
										<td><?php echo $row->username; ?></td>
										<td><?php echo $row->last_login; ?></td>
										<td>
										<div class="btn btn-primary"><a class="fa fa-mini fa-edit" href="<?php echo site_url('pengguna/edit/'.$row->kd_pengguna);?>"></a></div>
										<div class="btn btn-danger"><a class="fa fa-mini fa-remove" href="<?php echo site_url('pengguna/hapusPengguna/'.$row->kd_pengguna);?>"
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