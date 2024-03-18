<div class="main-panel">
    <div class="content">
        <div class="page-header">
            <div class="page-inner">
                <div class="row">
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                    <li class="nav-item submenu"> <a class="nav-link active show" href="<?php echo base_url('profile');?>" aria-selected="true">Profile</a> </li>
                                    <li class="nav-item submenu"> <a class="nav-link" href="<?php echo base_url('mhs/loginMHS/change_password');?>" aria-selected="false">Change Password</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                <form action="<?php echo base_url('profile/save_profile');?>" method="post">
                                    <div class="form-group form-group-default">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" value="<?=$prf['nim'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?=$prf['name'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?=$prf['username'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label for="jurusan">Jurusan</label>
                                        <input id="jurusan" type="text" class="form-control" name="jurusan" value="<?=$prf['jurusan'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" class="form-control" name="phone" value="<?=$prf['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="<?=$prf['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label for="address">Address</label>
                                        <input id="address" type="text" class="form-control" name="address" value="<?=$prf['address'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
