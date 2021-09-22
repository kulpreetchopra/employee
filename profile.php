<div class="card" style="padding-right: 0px;
    padding-left: 0px;background-color:transparent!important;">
<div class="container">
    <div class="row my-2">
        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item" class="m">
                    <a style="background-color:transparent!important;" href="" data-target="#login" data-toggle="tab" class="nav-link active"><i class="fas fa-user"></i><b> Login</b></a>
                </li>
                <li class="nav-item">
                    <a style="background-color:transparent!important;" href="" data-target="#cv" data-toggle="tab" class="nav-link"><i class="far fa-file-pdf"></i><b> CV/RESUME</b></a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="login">
                    <div class="row">
                        <div class="col-md-12">
                          <form onsubmit="return login()" action="admin/login.php" enctype="multipart/form-data" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="lemail" name="email" placeholder="Enter Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <span id="lremail" class="text-danger font-weight-bold"> </span>
        <div class="input-group mb-3">
          <input type="password" id="lpassword" name="password" class="form-control" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id="lrpassword" class="text-danger font-weight-bold"> </span>
        <div class="row">
            <div class="col-12">
            <button type="submit" name="submit" class="btn btn-success btn-block">SUBMIT</button>
            </div>
      </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <br>
      <p align="center">--OR--</p>
        <a href="" data-toggle="modal"data-target="#ag" class="btn btn-block btn-info">
          <i class="fas fa-key"></i></i> Forgotten Password
        </a>
      </div>
    </div>
  </div>
</div>
                <div class="tab-pane" id="cv">
                    <form onsubmit="return resume()" action="resume.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">FULL Name:</label>
                            <div class="col-lg-9">
                               <input id="name9" type="text" class="form-control" name="name" placeholder="Enter Full Name">
                               <span id="rname9" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email ADD.:</label>
                            <div class="col-lg-9">
                               <input id="email9" type="email" class="form-control" name="email" placeholder="Enter Email Address">
                               <span id="remail9" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">RESUME/CV:</label>
                            <div class="col-lg-9">
                                <input id="file9" type="file" class="form-control" name="file">
                                <span id="rfile9" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--login start-->
    <div class="modal fade" id="ag">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header" style="background-color:#c9354f!important">
            <h5 class="modal-title" style="color:white;font-weight:bold" id="exampleModalLabel"><i class="far fa-question-circle"></i>Forgott Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span >&times;</span>
            </button>
          </div>
          <div class="modal-body" style="background:black">
            <form action="forgott_pass.php" method="post" enctype="multipart/form-data" onsubmit="return forgott_pass()">
              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Enter Registered Name" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <p align="center">--OR--</p>
              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Enter Registered Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <input class="btn btn-block btn-success" style="color:white" type="submit" name="update" value="SUBMIT">
        </form>
        </div>
        </div>
      </div>
    </div>
    <!-- end login -->