<?php include("header.php");?>

        <div class="container py-5 m-9">
            <div class="container rounded px-2 py-2" style="width: 48rem;">
                <div class="row gx-2  py-2">
                  <div class="col  py-3" >
                  <a type="button" class="btn btn-info my-2"  onclick="goBackToPrev()">Go back</a>
                   <div class="p-3 m-3 " >
                    <div class="card text-center rounded m-5"  style="height:auto">
                        <div class="card-header rounded">
                            <img src="https://genexinfosys.com/images/Genex-Logo.png?v=1576746127" width=200px style="padding:15px">
                        </div>
                        <div class="card-body rounded" style="background-color:#782b90;height:auto;" id="showHiddenForm">
                        <!--1st form for collecting userID and email-->
                        <form action="../Controller/resetPasswordController.php" method="POST" id="firstForm">
                          <div class="mb-2">
                            <label for="userID" class="form-label">User ID</label><br>
                            <input type="number" class="form-control-md" id="userID" name="userID" placeholder="User ID" required>
                          </div>
                          <div class="mb-4">
                            <label for="email" class="form-label">Email</label><br>
                            <input type="email" class="form-control-md" id="email" name="email" placeholder="Email" required>
                          </div>
                          <input type="submit" value="Get verification code"class="btn mb-2" style="background-color:#48CCCD ;">
                        </form>
                    </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
        </div>
