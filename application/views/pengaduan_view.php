<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan View</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">

</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <!-- Sidebar content goes here -->

        <div class="main-panel">

            <!-- Navbar -->
            <!-- Navbar content goes here -->

            <div class="content">

                <!-- Page Header -->
                <div class="page-inner">
                    <h4 class="page-title">PENGADUAN VIEW</h4>
                </div>

                <!-- Add Button -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
								<div class="d-flex align-items-center">
                                <h4 class="card-title">ADD DATA</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addPengaduanModal">
                                    <i class="fa fa-plus"></i>
                                    ADD DATA
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                <!-- Table -->
                                <div class="table-responsive">
                                    <table id="pengaduanTable" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Pengaduan</th>
                                                <th>Tanggal Pengaduan</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>NIM</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengaduanArr as $pengaduan): ?>
                                            <tr>
                                                <td><?php echo $pengaduan['id_pengaduan']; ?></td>
                                                <td><?php echo $pengaduan['tanggal_pengaduan']; ?></td>
                                                <td><?php echo $pengaduan['nama_mahasiswa']; ?></td>
                                                <td><?php echo $pengaduan['nim']; ?></td>
                                                <td><?php echo $pengaduan['deskripsi']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

            </div>

        </div>

    </div>

    <!-- Modal Add Pengaduan -->
    <div class="modal fade" id="addPengaduanModal" tabindex="-1" role="dialog" aria-labelledby="addPengaduanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPengaduanModalLabel">Add Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('save_pengaduan');?>" method="post">
                        <div class="form-group">
                            <label for="addIdPengaduan">ID Pengaduan</label>
                            <input id="addIdPengaduan" type="text" class="form-control" name="id_pengaduan" placeholder="Enter ID Pengaduan">
                        </div>
                        <div class="form-group">
                            <label for="addTanggalPengaduan">Tanggal Pengaduan</label>
                            <input id="addTanggalPengaduan" type="date" class="form-control" name="tanggal_pengaduan" placeholder="Enter Tanggal Pengaduan">
                        </div>
                        <div class="form-group">
                            <label for="addNamaMahasiswa">Nama Mahasiswa</label>
                            <input id="addNamaMahasiswa" type="text" class="form-control" name="nama_mahasiswa" placeholder="Enter Nama Mahasiswa">
                        </div>
                        <div class="form-group">
                            <label for="addNim">NIM</label>
                            <input id="addNim" type="text" class="form-control" name="nim" placeholder="Enter NIM">
                        </div>
                        <div class="form-group">
                            <label for="addDeskripsi">Deskripsi</label>
                            <textarea id="addDeskripsi" class="form-control" name="deskripsi" placeholder="Enter Deskripsi"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/atlantis.min.js"></script>

    <!-- DataTables -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        });
    </script>

</body>

</html>
