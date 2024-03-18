<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN ADMINISTRASI</h4>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="sub-item">Tabel Pengaduan Administrasi</h2>
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
                                        <th>Deskripsi</th>
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
                                        <td><?php echo $administrasi['deskripsi']; ?></td>
                                        <td>
                                            <select class="status-select" data-no-ref="<?php echo $administrasi['no_ref']; ?>">
                                                <option value="terkirim" <?php echo ($administrasi['status'] === 'terkirim') ? 'selected' : ''; ?>>Terkirim</option>
                                                <option value="diproses" <?php echo ($administrasi['status'] === 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                                <option value="selesai" <?php echo ($administrasi['status'] === 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Menghandle perubahan pada select dengan class "status-select"
    $('.status-select').change(function() {
        $(this).addClass('modified');
        updateStatus($(this).data('no-ref'), $(this).val());
    });

    function updateStatus(no_ref, status) {
        // Kirim data status yang berubah ke server menggunakan AJAX
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url("administrasi_ctl/update_status"); ?>', // Ganti "controller_name" dengan nama controller yang sesuai untuk meng-handle update status
            data: JSON.stringify({ no_ref: no_ref, status: status }),
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
