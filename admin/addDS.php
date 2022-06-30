<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Disease
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="Post" action="function.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="dname" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="desc"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Prevention</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="prev"></textarea>
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
                      <input type="submit" class="btn btn-primary" value="Add Disease" name="addDS">
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