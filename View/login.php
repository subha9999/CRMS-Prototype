<?php include("header.php");?>

        <div class="container py-5 m-9">
            <div class="container rounded px-2 py-2" style="width: 48rem;">
                <div class="row gx-2  py-2">
                  <div class="col  py-3">
                   <div class="p-3 m-3 " >
                    <div class="card text-center rounded m-5"  style="height:50vh">
                        <div class="card-header rounded">
                            <img src="https://genexinfosys.com/images/Genex-Logo.png?v=1576746127" width=200px style="padding:15px">
                        </div>
                        <div class="card-body rounded" style="background-color:#782b90;height:18vh;">
                        <form action="" method="POST">
                          <div class="mb-2">
                            <label for="userID" class="form-label">User ID</label><br>
                            <input type="number" class="form-control-md" id="userID" name="userID" placeholder="User ID" required>
                          </div>
                          <div class="mb-2">
                            <label for="password" class="form-label">Password</label><br>
                            <input type="password" class="form-control-md" id="password" name="password" placeholder="Password" required>
                          </div>
                          <input type="submit" value="Log In"class="btn" style="background-color:#48CCCD ;">
                    </div>
                  </form>
                        <div class="card-footer rounded">
                          <a href=""style="color:purple ;">Forgot Password?</a>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
        </div>
