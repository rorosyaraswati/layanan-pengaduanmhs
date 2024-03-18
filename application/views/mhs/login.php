<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Mahasiswa</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="<?= base_url('assets') ?>/img/oip.svg" type="image/x-icon">

  <!-- Fonts and icons -->
  <script src="<?= base_url('assets') ?>/js/plugin/webfont/webfont.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="all">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/fonts.min.css" media="all">
  <script>
    WebFont.load({
      google: { "families": ["Lato:300,400,700,900"] },
      custom: {
        "families": [
          "Flaticon",
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons"
        ],
        urls: ['<?= base_url('assets') ?>/css/fonts.min.css']
      },
      active: function () {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/atlantis.css">
  <style>
    .wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
    .container-login {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container-signup {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .btn-login {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-login:hover {
      background-color: #0069d9;
      border-color: #0069d9;
    }
    .btn-link {
      color: #dc3545;
    }
    .btn-link:hover {
      color: #c82333;
    }
  </style>
</head>
<body class="login">
  <div class="wrapper">
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
      <div class="container container-login container-transparent animated fadeIn col-md-6 ml-auto mr-auto" style="display: block;">
        <h3 class="text-center">Sign In Mahasiswa</h3>
        <div class="login-form">
          <form action="<?= base_url('mhs/loginMHS');?>" method="post">
            <?= $this->session->flashdata('message'); ?>
            <div class="form-group">
              <label for="username" class="placeholder"><b>Username</b></label>
              <input id="username" name="username" type="text" class="form-control" required="">
              <?= form_error('username', '<small class ="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-group">
              <label for="password" class="placeholder"><b>Password</b></label>
              <div class="position-relative">
                <input id="password" name="password" type="password" class="form-control" required="">
                <div class="show-password" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);">
                  <i class="icon-eye"></i>
                </div>
              </div>
            </div>
            <div>
              <div class="form-group form-action-d-flex mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="rememberme">
                  <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-user">Sign In</button>
              </div>
            </div>
          </form>
          <div class="login-account text-center mt-3">
            <span class="msg">Don't have an account yet?</span>
            <a href="<?= base_url('mhs/loginMHS/register')?>" id="show-signup" class="link">Sign Up</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Files -->
  <script src="<?= base_url('assets') ?>/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/core/popper.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/atlantis.min.js"></script>
</body>
</html>
