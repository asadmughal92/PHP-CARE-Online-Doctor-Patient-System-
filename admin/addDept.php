<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Department
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="Post" action="function.php">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Department Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="dname" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Add Department" name="addDept">
                      <a href="viewDept.php" class="btn btn-primary">Go to List</a>
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