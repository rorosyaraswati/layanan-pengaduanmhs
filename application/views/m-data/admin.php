<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">DATA ADMIN</h4>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($userArr as $admin): ?>
                                    <tr>
                                        <td><?php echo $admin['id_user']; ?></td>
                                        <td><?php echo $admin['username']; ?></td>
                                        <td><?php echo $admin['email']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    
        </div>
    </div>
</div>