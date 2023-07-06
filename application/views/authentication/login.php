<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SPIO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$assets?>assets/css/style.css">
  </head>
  <body>
    <section class="login-block">
      <div class="row no-gutters">
        <div class="col-sm-6">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <!-- <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul> -->

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="loginContainer">
                    <div class="loginContent">
                        <h1>Easy way to connect to multiple users</h1>
                        <p>A smart connection management connecting single<br/> devices to multiple users in easy and smart way</p>
                    </div>
                </div>
              </div>
              <!-- <div class="carousel-item">
                <div class="carouselContent">
                  <img src="assets/images/spio-logo.png" alt="" class="logo" />
                </div>
              </div>
              <div class="carousel-item">
                <div class="carouselContent">
                  <img src="assets/images/spio-logo.png" alt="" class="logo" />
                </div>
              </div> -->
            </div>

            <!-- Left and right controls
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a> -->
          </div>
        </div>
        <div class="col-sm-6">
          <div class="login-sec">
            <div class="loginHeader">
                <div class="buttonBlock">
                    <a href="">Not a user?</a>
                    <a href="<?=base_url('welcome/signup')?>" class="buttonClass">Sign up</a>
                </div>
            </div>
            <div class="loginFormBlock">
              <h2>Welcome Back</h2>
              <p>Continue with Email Id to login into SPIO</p>
              <?php
                  $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'class' => 'login-form',  'enctype'=>"multipart/form-data");
                  echo form_open_multipart("welcome/checklogin", $attrib)
              ?> 
                <div class="my-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" id="username" name="username" class="form-control" required>
                                <label class="form-control-placeholder" for="name">Email Id/ Username</label>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                            </div>
                            <a href="#" class="forgotPassword">Forgot Password?</a>
                            <div class="col-sm-12">
                              <div class="text-danger" style="padding:10px;text-align:center;"><?=$this->session->flashdata('error')?></div>
                              <div class="text-success" style="padding:10px;text-align:center;"><?=$this->session->flashdata('message')?></div>
                            </div>
                            <button type="submit" class="loginButton">Login</a>
                        </div>
                    </div>
                </div>
              
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      document.getElementById("myButton").onclick = function () {
        location.href = "dashboard.html";
      };
    </script>
  </body>
</html>
