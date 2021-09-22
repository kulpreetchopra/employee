<?php include"header.php";?>
  <div class="container profile" style="margin-top:10%">
<form onsubmit="return register()" action="employee/register.php" method="post" enctype="multipart/form-data">
  <br class="web">
  <h5 class="text-center">Registration <i class="fas fa-user-edit"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-eye"></i></a></h5>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name:</label>
                            <div class="col-lg-9">
                               <input id="name" type="text" class="form-control" name="name" placeholder="Enter Full Name">
                               <span id="rname" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email:</label>
                            <div class="col-lg-9">
                               <input id="email" type="email" class="form-control" name="email" placeholder="Enter Email Address">
                               <span id="remail" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile:</label>
                            <div class="col-lg-9">
                                <input id="mobile" type="mobile" class="form-control" name="mobile" placeholder="Enter Mobile Number">
                                <span id="rmobile" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">IMAGE:</label>
                            <div class="col-lg-9">
                                <input id="file" type="file" class="form-control" name="image">
                                <span id="rfile" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address:</label>
                            <div class="col-lg-9">
                                <textarea id="address" type="text" class="form-control" name="address" placeholder="Enter Address"></textarea>
                                <span id="raddress" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender:</label>
                            <div class="col-lg-9">
                    <input type="radio" id="gen1" value="male" name="gender">Male
                    <input type="radio" id="gen2" value="female" name="gender">Female
                    <br>
                    <span id="gender" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password:</label>
                            <div class="col-lg-9">
                                <input id="password" type="text" class="form-control" name="password" placeholder="Enter Password">
                                <span id="rpassword" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department:</label>
                            <div class="col-lg-9">
          <select id="department" name="department" class="form-control">
      <option value="-1">SELECT</option>
      <option value="frontend">FRONTEND</option>
      <option value="backend">BACKEND</option>
      <option value="hr">HR DEPT</option>
      <option value="pramotion">PRAMOTION</option>
      </select>
      <span id="rdepartment" class="text-danger font-weight-bold"> </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Role:</label>
                            <div class="col-lg-9">
          <select id="role" name="role" class="form-control">
      <option value="-1">SELECT</option>
      <option value="employee">EMPLOYEE</option>
      <option value="admin">ADMIN</option>
      </select>
      <span id="rrole" class="text-danger font-weight-bold"> </span>
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
<?php include"footer.php";?>
