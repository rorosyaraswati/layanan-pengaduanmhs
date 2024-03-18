<!-- keluhan_view.php -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN AKADEMIK</h4>
            </div>

            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="sub-item">Tabel Pengaduan Akademik</h2>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Keluhan -->

                        <div class="table-responsive">
                            <table id="keluhanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TANGGAL</th>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>PRODI</th>
                                        <th>PILIHAN</th>
                                        <th>DESKRIPSI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($akademikArr as $akademik): ?>
                                    <tr>
                                        <td><?php echo $akademik['id_akademik']; ?></td>
                                        <td><?php echo $akademik['tanggal']; ?></td>
                                        <td><?php echo $akademik['nim']; ?></td>
                                        <td><?php echo $akademik['nama']; ?></td>
                                        <td><?php echo $akademik['program_studi']; ?></td>
                                        <td><?php echo $akademik['pilihan_akademik']; ?></td>
                                        <td><?php echo $akademik['deskripsi_pengaduan']; ?></td>
                                        <td>
                                            <select class="status-select" data-id-akademik="<?php echo $akademik['id_akademik']; ?>">
                                                <option value="terkirim" <?php echo ($akademik['status'] === 'terkirim') ? 'selected' : ''; ?>>Terkirim</option>
                                                <option value="diproses" <?php echo ($akademik['status'] === 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                                <option value="selesai" <?php echo ($akademik['status'] === 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Tabel Keluhan -->
                    
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Menghandle perubahan pada select dengan class "status-select"
    $('.status-select').change(function() {
        $(this).addClass('modified');
        updateStatus($(this).data('id-akademik'), $(this).val());
    });

    function updateStatus(id_akademik, status) {
        // Kirim data status yang berubah ke server menggunakan AJAX
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url("akademik_ctl/update_status"); ?>', // Ganti "controller_name" dengan nama controller yang sesuai untuk meng-handle update status
            data: JSON.stringify({ id_akademik: id_akademik, status: status }),
            contentType: 'application/json', // Tentukan tipe konten sebagai JSON
            success: function(response) {
                alert('Data berhasil disimpan.');
                $('.status-select.modified').removeClass('modified');
            },
            error: function() {
                alert('Terjadi kesalahan saat menyimpan data.');
            }
        });
    }
});
</script>

<!-- Modal Add akademik -->
<div class="modal fade" id="addKeluhanModal" tabindex="-1" role="dialog" aria-labelledby="addKeluhanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKeluhanModalLabel">Add akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <!-- Form Add akademik -->
                <form action="<?php echo base_url('mhs/akademik_ctl/save_akademik');?>" method="post">
                    <div class="form-group">
                        <label for="addIdakademik">ID akademik</label>
                        <input id="addIdakademik" type="text" class="form-control" name="id_akademik" placeholder="Enter ID akademik">
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
                            <option value="Sitem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addPilihanakademik">Pilihan akademik</label>
                        <select id="addPilihanakademik" class="form-control" name="pilihan_akademik">
                            <option value="Pilih">Pilih</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Matakuliah">Matakuliah</option>
                            <option value="Penilaian">Penilaian</option>
                            <option value="Jadwal Kuliah">Jadwal Kuliah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addDeskripsipengaduan">Deskripsi akademik</label>
                        <textarea id="addDeskripsipengaduan" class="form-control" name="deskripsi_pengaduan" rows="3" placeholder="Enter Deskripsi pengaduan"></textarea>
                    </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End of Form Add akademik -->
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Add akademik -->

