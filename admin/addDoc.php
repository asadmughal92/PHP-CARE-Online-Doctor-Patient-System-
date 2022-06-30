<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Doctor
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
                    <label class="col-sm-2 control-label">LastName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname" required>
                    
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="add" required>
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
                    <label class="col-sm-2 control-label">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="dob" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Pic</label>
                    <div class="col-lg-10">
                      <input type="file" class="form-control" name="photo" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Select City</label>
                    <div class="col-lg-10">
                      <select name="city" class="form-control">
                          <option> Select City</option>
                          <?php  
                            require('config.php');
                            
                        $query= "SELECT * FROM cities ";
        
                      if($result= $mysqli->query($query))
                           {
                      while($row =$result->fetch_object())
                        {
                          ?>  
                          <option value="<?php echo $row->cID;?>"><?php echo $row->city_Name;?></option>
                        <?php
                        }}
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Select Department</label>
                    <div class="col-lg-10">
                      <select name="depart" class="form-control">
                          <option> Select Department</option>
                          <?php  
                            require('config.php');
                            
                        $query= "SELECT * FROM departments ";
        
                      if($result= $mysqli->query($query))
                           {
                      while($row =$result->fetch_object())
                        {
                          ?>  
                          <option value="<?php echo $row->dID;?>"><?php echo $row->depart_Name;?></option>
                        <?php
                        }}
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Add Doctor" name="addDoc">
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