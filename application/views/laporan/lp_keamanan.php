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

<script>
    // Function to trigger PDF generation when the button is clicked
    function redirectToPDF() {
        // Redirect to the controller's generatePdf method to generate the PDF
        window.location.href = '<?php echo base_url('PDF/pdf_keamanan/generatePdf'); ?>';
    }

    // Attach click event to the "DOWNLOAD PDF" button
    document.getElementById('downloadPdfBtn').addEventListener('click', redirectToPDF);
</script>