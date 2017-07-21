<div class="col-md-6"><div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php base_url() ?>change-password">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
                  <div class="col-sm-5">
                      <input type="password" required onBlur="checkPassAvailability()" name="oldpassword" class="form-control" id="oldpassword" placeholder="Old Password">
                  </div><span id="user-password-status"></span>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
                  <div class="col-sm-10">
                      <input type="password" required name="password" id="pass1" class="form-control" placeholder="New Password">
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3"  class="col-sm-2 control-label">Retype Password</label>
                  <div class="col-sm-10">
                      <input type="password" required name="retypepassword" id="pass2" onkeyup="checkPass();" class="form-control"  placeholder="Retype Password">
                  <span id="confirmMessage" class="confirmMessage"></span></div>
                    
                </div>
                
              </div>
              <div class="box-footer">
                
                  <button type="submit" id="myBtn" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
            
          
          </div> </div>