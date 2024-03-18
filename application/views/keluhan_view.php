<!-- keluhan_view.php -->

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">DATA KELUHAN</h4>
            </div>
            
            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">ADD DATA</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addKeluhanModal">
                                <i class="fa fa-plus"></i>
                                ADD DATA
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Tabel Keluhan -->
<div class="table-responsive">
    <table id="keluhanTable" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Keluhan</th>
                <th>Tanggal</th>
                <th>Nama Mahasiswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keluhanArr as $keluhan): ?>
            <tr>
                <td><?php echo $keluhan['id_keluhan']; ?></td>
                <td><?php echo $keluhan['tanggal']; ?></td>
                <td><?php echo $keluhan['nama_mhs']; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih status
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);" onclick="selectDropdownItem(this, <?php echo $keluhan['id_keluhan']; ?>, 'Proses')">Proses</a>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="selectDropdownItem(this, <?php echo $keluhan['id_keluhan']; ?>, 'Selesai')">Selesai</a>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="selectDropdownItem(this, <?php echo $keluhan['id_keluhan']; ?>, 'Ditolak')">Ditolak</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- End of Tabel Keluhan -->

<script>
    function selectDropdownItem(element, keluhanId, status) {
        var dropdownButton = element.closest('.dropdown').querySelector('.dropdown-toggle');
        dropdownButton.textContent = status;
        
        // Update tabel dengan status yang dipilih
        updateStatusInTable(keluhanId, status);
    }

    function updateStatusInTable(keluhanId, status) {
        // Ubah elemen pada tabel berdasarkan keluhanId
        var statusCell = document.querySelector('#keluhanTable tr[data-keluhan-id="' + keluhanId + '"] td:nth-child(4)');
        statusCell.textContent = status;
    }
</script>



                    </div>
                </div>
            </div>
            <!-- End of Tombol Add -->

        </div>
    </div>
</div>

<!-- Modal Add Keluhan -->
<div class="modal fade" id="addKeluhanModal" tabindex="-1" role="dialog" aria-labelledby="addKeluhanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKeluhanModalLabel">Add Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Add Keluhan -->
                <form action="<?php echo base_url('save_keluhan');?>" method="post">
                    <div class="form-group">
                        <label for="addIdKeluhan">ID Keluhan</label>
                        <input id="addIdKeluhan" type="text" class="form-control" name="id_keluhan" placeholder="Enter ID Keluhan">
                    </div>
                    <div class="form-group">
                        <label for="addTanggal">Tanggal</label>
                        <input id="addTanggal" type="date" class="form-control" name="tanggal" placeholder="Enter Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="addNamaMhs">Nama Mahasiswa</label>
                        <input id="addNamaMhs" type="text" class="form-control" name="nama_mhs" placeholder="Enter Nama Mahasiswa">
                    </div>

                    <div class="modal-footer no-bd">
					<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
                </form>
                <!-- End of Form Add Keluhan -->
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Add Keluhan -->

<!-- JavaScript -->
<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        $('#keluhanTable').DataTable();
    });
</script>
