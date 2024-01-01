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
                        <!--2nd form for getting verification code-->
                        <form action="../Controller/resetPasswordController.php" method="GET" >
                        <div class="mb-2">
                            <label for="code" class="form-label">Verification Code</label><br>
                            <input type="number" class="form-control-md" id="code" name="code" placeholder="code" required>
                          </div>
                          <input type="submit" value="Enter code"class="btn mb-2"  style="background-color:#48CCCD ;" >
                        </form>
                    </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
        </div>
