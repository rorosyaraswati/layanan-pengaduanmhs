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
                                <!-- Table header remains unchanged -->
                                <thead>
                                    <tr>
                                        <th>ID akademik</th>
                                        <th>Tanggal</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Program Studi</th>
                                        <th>Pilihan akademik</th>
                                        <th>Deskripsi akademik</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PHP loop to populate table rows with data -->
                                    <?php foreach ($akademikArr as $akademik): ?>
                                    <tr>
                                        <td><?php echo $akademik['id_akademik']; ?></td>
                                        <td><?php echo $akademik['tanggal']; ?></td>
                                        <td><?php echo $akademik['nim']; ?></td>
                                        <td><?php echo $akademik['nama']; ?></td>
                                        <td><?php echo $akademik['program_studi']; ?></td>
                                        <td><?php echo $akademik['pilihan_akademik']; ?></td>
                                        <td><?php echo $akademik['deskripsi_pengaduan']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Tabel Keluhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Function to trigger PDF generation when the button is clicked
    function redirectToPDF() {
        // Redirect to the controller's generatePdf method to generate the PDF
        window.location.href = '<?php echo base_url('PDF/pdf_akademik/generatePdf'); ?>';
    }

    // Attach click event to the "DOWNLOAD PDF" button
    document.getElementById('downloadPdfBtn').addEventListener('click', redirectToPDF);
</script>
