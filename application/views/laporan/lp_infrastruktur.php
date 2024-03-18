<!-- keluhan_view.php -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN INFRASTRUKTUR DAN FASILITAS</h4>
            </div>

            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">CETAK LAPORAN</h4>
                            <!-- Add a button with an ID to trigger PDF generation -->
                            <button id="downloadPdfBtn" class="btn btn-primary-red btn-round ml-auto" style="background-color: red; color: white;">
                                <i class="fa fa-file-pdf"></i>
                                DOWNLOAD PDF
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Keluhan -->
                        <div class="table-responsive">
                            <table id="keluhanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>NAMA</th>
                                        <th>TANGGAL</th>
                                        <th>KATEGORI</th>
                                        <th>LOKASI</th>
                                        <th>DESKRIPSI</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($infrastrukturArr as $infra): ?>
                                    <tr>
                                        <td><?php echo $infra['nim']; ?></td>
                                        <td><?php echo $infra['nama']; ?></td>
                                        <td><?php echo $infra['tanggal']; ?></td>
                                        <td><?php echo $infra['kategori']; ?></td>
                                        <td><?php echo $infra['lokasi']; ?></td>
                                        <td><?php echo $infra['deskripsi']; ?></td>
                                        <td>
                                        <select class="status-select" data-nim="<?php echo $infra['nim']; ?>">
                                            <option value="terkirim" <?php echo ($infra['status'] === 'terkirim') ? 'selected' : ''; ?>>Terkirim</option>
                                            <option value="diproses" <?php echo ($infra['status'] === 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                                            <option value="selesai" <?php echo ($infra['status'] === 'selesai') ? 'selected' : ''; ?>>Selesai</option>
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

<script>
    // Function to trigger PDF generation when the button is clicked
    function redirectToPDF() {
        // Redirect to the controller's generatePdf method to generate the PDF
        window.location.href = '<?php echo base_url('PDF/pdf_infrastruktur/generatePdf'); ?>';
    }

    // Attach click event to the "DOWNLOAD PDF" button
    document.getElementById('downloadPdfBtn').addEventListener('click', redirectToPDF);
</script>

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
            url: '<?php echo base_url("infrastruktur_ctl/update_status"); ?>', // Ganti "controller_name" dengan nama controller yang sesuai untuk meng-handle update status
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