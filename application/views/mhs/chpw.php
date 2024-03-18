<!-- layoutmhs/header and layoutmhs/sidebar contents here -->

<div class="main-panel">
    <div class="content">
        <div class="page-header">
            <div class="page-inner">
                <div class="row">
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                    <li class="nav-item submenu">
                                        <a class="nav-link" href="<?= base_url('profile');?>" aria-selected="false">Profile</a>
                                    </li>
                                    <li class="nav-item submenu">
                                        <a class="nav-link active show" href="<?= base_url('mhs/loginMHS/change_password');?>" aria-selected="true">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body" style="width: 600px;">
                            <!-- Display session flash messages -->
                            <?php if ($this->session->flashdata('message')) {
                                echo $this->session->flashdata('message');
                            } ?>
                            <form action="<?= base_url('mhs/loginmhs/change_password'); ?>" method="post">
                                <div class="form-group">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                                    <?= form_error('current_password', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="new_password1">New Password:</label>
                                    <input type="password" id="new_password1" name="new_password1" class="form-control" required>
                                    <?= form_error('new_password1', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="new_password2">Confirm New Password:</label>
                                    <input type="password" id="new_password2" name="new_password2" class="form-control" required>
                                    <?= form_error('new_password2', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- layoutmhs/footer content here -->
