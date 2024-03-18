<!-- keluhan_view.php -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN KEAMANAN</h4>
            </div>

            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="sub-item">Tabel Pengaduan Keamanan</h2>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Keluhan -->
                        <div class="table-responsive">
                            <table id="keluhanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>KONTAK</th>
                                        <th>TANGGAL</th>
                                        <th>LOKASI</th>
                                        <th>DESKRIPSI</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($keamananArr as $keamanan): ?>
                                    <tr>
                                        <td><?php echo $keamanan['nim']; ?></td>
                                        <td><?php echo $keamanan['nama']; ?></td>
                                        <td><?php echo $keamanan['kontak']; ?></td>
                                        <td><?php echo $keamanan['tanggal']; ?></td>
                                        <td><?php echo $keamanan['lokasi']; ?></td>
                                        <td><?php echo $keamanan['deskripsi']; ?></td>
                                        <td>
                                            <select class="status-select" data-nim="<?php echo $keamanan['nim']; ?>">
                                                <option value="terkirim" <?php echo ($keamanan['status'] === 'terkirim') ? 'selected' : ''; ?>>Terkirim</option>
                                                <option value="diproses" <?php echo ($keamanan['status'] === 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                                <option value="selesai" <?php echo ($keamanan['status'] === 'selesai') ? 'selected' : ''; ?>>Selesai</option>
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
        updateStatus($(this).data('nim'), $(this).val());
    });

    function updateStatus(nim, status) {
        // Kirim data status yang berubah ke server menggunakan AJAX
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url("keamanan_ctl/update_status"); ?>', // Ganti "controller_name" dengan nama controller yang sesuai untuk meng-handle update status
            data: JSON.stringify({ nim: nim, status: status }),
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
                <h5 class="modal-title" id="addKeluhanModalLabel">Tambah Pengaduan keamananstruktur dan Fasilitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Add akademik -->
                <form action="<?php echo base_url('mhs/keamanan_ctl/save_keamanan');?>" method="post">
                    <div class="form-group">
                        <label for="addnim">NIM</label>
                        <input id="addnim" type="number" class="form-control" name="nim" placeholder="Enter NIM">
                    </div>
                    <div class="form-group">
                        <label for="addnama">NAMA</label>
                        <input id="addnama" type="text" class="form-control" name="nama" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="addkontak">kontak</label>
                        <input id="addkontak" type="text" class="form-control" name="kontak" placeholder="Enter kontak">
                    </div>
                    <div class="form-group">
                        <label for="addtanggal">TANGGAL</label>
                        <input id="addtanggal" type="date" class="form-control" name="tanggal" placeholder="Enter Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="addlokasi">lokasi</label>
                        <input id="addlokasi" type="text" class="form-control" name="lokasi" placeholder="Enter lokasi">
                    </div>
                    <div class="form-group">
                        <label for="adddeskripsi">Deskripsi</label>
                        <textarea id="adddeskripsi" class="form-control" name="deskripsi" rows="3" placeholder="Enter Deskripsi"></textarea>
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

