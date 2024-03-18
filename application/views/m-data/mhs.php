<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">DATA MAHASISWA</h4>
            </div>

            <!-- Tombol Add -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"></h4>
                            <!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addKeluhanModal">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="keluhanTable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO ID</th>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Jurusan</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usermhsArr as $mhs): ?>
                                    <tr>
                                        <td><?php echo $mhs['id']; ?></td>
                                        <td><?php echo $mhs['nim']; ?></td>
                                        <td><?php echo $mhs['name']; ?></td>
                                        <td><?php echo $mhs['jurusan']; ?></td>
                                        <td><?php echo $mhs['username']; ?></td>
                                        <td><?php echo $mhs['email']; ?></td>
                                        <td><?php echo $mhs['phone']; ?></td>
                                        <td><?php echo $mhs['address']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    
        </div>
    </div>
</div>