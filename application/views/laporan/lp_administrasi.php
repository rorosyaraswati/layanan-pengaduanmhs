<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PENGADUAN ADMINISTRASI</h4>
            </div>

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

<script>
    // Function to trigger PDF generation when the button is clicked
    function redirectToPDF() {
        // Redirect to the controller's generatePdf method to generate the PDF
        window.location.href = '<?php echo base_url('PDF/pdf_administrasi/generatePdf'); ?>';
    }

    // Attach click event to the "DOWNLOAD PDF" button
    document.getElementById('downloadPdfBtn').addEventListener('click', redirectToPDF);
</script>