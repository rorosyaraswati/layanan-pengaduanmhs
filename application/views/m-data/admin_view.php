<!-- keluhan_view.php -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN ADMINISTRASI</h4>
            </div>

            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pengaduan</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addKeluhanModal">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Keluhan -->
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
                                        <th>Deskripsi</th>
                                        <th>Lampiran</th>
                                        <th>Aksi</th>
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
                                        <td><?php echo $administrasi['deskripsi']; ?></td>
                                        <td><?php echo $administrasi['lampiran']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Tabel Keluhan -->
                    
        </div>
    </div>
</div>

<!-- Modal Add administrasi -->
<div class="modal fade" id="addKeluhanModal" tabindex="-1" role="dialog" aria-labelledby="addKeluhanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKeluhanModalLabel">Add Administrasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Add administrasi -->
                <form action="<?php echo base_url('save_administrasi');?>" method="post">
                    <div class="form-group">
                        <label for="addno_ref">no referensi</label>
                        <input id="addno_ref" type="text" class="form-control" name="no_ref" placeholder="Enter no referensi">
                    </div>
                    <div class="form-group">
                        <label for="addTanggal">Tanggal</label>
                        <input id="addTanggal" type="date" class="form-control" name="tanggal" placeholder="Enter Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="addNIM">NIM</label>
                        <input id="addNIM" type="text" class="form-control" name="nim" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="addNama">Nama</label>
                        <input id="addNama" type="text" class="form-control" name="nama" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="addprogramstudi">Program Studi</label>
                        <select id="addprogramstudi" class="form-control" name="program_studi">
                            <option value="Pilih">Pilih</option>
                            <option value="SI">Sistem Informasi</option>
                            <option value="iF">Teknik Informatika</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addjenisbiaya">Pilihan Biaya</label>
                        <select id="addjenisbiaya" class="form-control" name="jenis_biaya">
                            <option value="Pilih">Pilih</option>
                            <option value="Dosen">SPP</option>
                            <option value="Matakuliah">Semester Antara</option>
                            <option value="Penilaian">Ulangan Susulan</option>
                            <option value="Jadwal Kuliah">Wisuda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addDeskripsi">Deskripsi</label>
                        <textarea id="addDeskripsi" class="form-control" name="deskripsi" rows="3" placeholder="Enter Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addLampiran">Lampiran</label>
                        <input id="addLampiran" type="file" class="form-control-file" name="lampiran">
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End of Form Add administrasi -->
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Add administrasi -->

