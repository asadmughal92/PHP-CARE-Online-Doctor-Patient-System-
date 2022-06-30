<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Cities
               
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="function.php">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">CityName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="cname" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Add City" name="addCity">
                      <a href="viewCity.php" class="btn btn-primary">Go to List</a>
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