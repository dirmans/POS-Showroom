<!----------------------------------------CONTENT WRAPPER----------------------------------------------->
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Profit bulanan</h1>
                </div>
            </div>
            <div class="row">
			<div class="btn">
				<a href="<?php echo site_url('profitbulanan/add') ?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Tambah Data profit bulanan</a></div>
						<div class="btn">
				<a href="<?php echo base_url('xlsdataprofitbulanan/export')?>" class="btn btn-outline btn-primary">
					<i class="fa fa-list"></i> Cetak Data Profit bulanan Excel</a></div>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Data Profit bulanan</div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
										<th>Kode Profit</th>
										<th>Profit Kotor</th>
										<th>Sewa Gedung</th>
										<th>Listrik</th>
										<th>Gaji Karyawan</th>
										<th>Kas Kecil</th>
										<th>Profit Bersih</th>
										<th>Bulan dan tahun</th>
										
										<th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$no=1;
								if ($data_profitbulanan){
								foreach($data_profitbulanan as $row){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->kd_profitbulanan; ?></td>
									<td>Rp. <?php echo number_format ($row->profit_kotor); ?></td>
									<td>Rp. <?php echo number_format ($row->sewa_gedung); ?></td>
									<td>Rp. <?php echo number_format ($row->listrik); ?></td>
									<td>Rp. <?php echo number_format ($row->gaji_karyawan); ?></td>
									<td>Rp. <?php echo number_format ($row->kas_kecil); ?></td>
									<td class="success">Rp. <?php echo number_format ($row->profit_bersih); ?></td>
									<td><?php echo $row->bulan," ", $row->tahun; ?></td>
									<td>
									<div class="btn btn-primary"><a class="fa fa-edit" href="<?php echo site_url('profitbulanan/edit/'.$row->kd_profitbulanan);?>"></a></div>
									<div class="btn btn-danger"><a class="fa fa-remove" href="<?php echo site_url('profitbulanan/hapusProfitbulanan/'.$row->kd_profitbulanan);?>" onclick="return confirm('Anda yakin?')"></a></div>
									</td>
								</tr>
								<?php 
									}
								}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>