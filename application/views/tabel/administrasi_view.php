<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN ADMINISTRASI</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="sub-item">Tabel Pengaduan Administrasi Mahasiswa</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="keluhanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor Referensi</th>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Program Studi</th>
                                        <th>Jenis Biaya</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($administrasiArr as $administrasi): ?>
                                    <tr>
                                        <td><?php echo $administrasi['no_ref']; ?></td>
                                        <td><?php echo $administrasi['tanggal']; ?></td>
                                        <td><?php echo $administrasi['nim']; ?></td>
                                        <td><?php echo $administrasi['nama']; ?></td>
                                        <td><?php echo $administrasi['program_studi']; ?></td>
                                        <td><?php echo $administrasi['jenis_biaya']; ?></td>
                                        <td><?php echo $administrasi['status']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Tabel Keluhan -->
                    
        </div>
    </div>
</div>



