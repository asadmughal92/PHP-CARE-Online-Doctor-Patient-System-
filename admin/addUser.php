<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add User
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="function.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">FirstName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fname" required>
                    </div>
                  </div>
                 
                 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" name="email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input class="form-control"  type="password" name="pass" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Pic</label>
                    <div class="col-lg-10">
                      <input type="file" class="form-control" name="photo" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Add User" name="addUser">
                      <?php
                      if(isset($_GET['msg']))
                    {
                      echo $_GET['msg'];
                    }
                ?> 
                    </div>
                  </div>
                </form>
              </div>


<?php include('footer.php');?>