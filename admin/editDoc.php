<?php  
require_once('config.php');
if(isset($_POST['updDoc'])){
                        
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email']; 
    $add=$_POST['add'];
    $contact=$_POST['contact'];
    $dob=$_POST['dob'];
    $id=$_POST['docid'];

    $query="update doctors set FirstName='$fname',LastName='$lname',Address='$add',Email='$email',contact='$contact',DOB='$dob' where docID=$id";
  
    if($mysqli->query($query)===true)
   {
      header('location:viewDoc.php?msg=Doctor record updated Successfully');
   }
   else{
    header('location:viewDoc.php?msg=Doctor record not updated');
   }
}


?>


<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Doctor
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                  <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                    
                    require_once('config.php');
                    $query= "SELECT * FROM doctors where docID=$id";
        
                  if($result= $mysqli->query($query))
                 {
                while($row=$result->fetch_object())
                {
                    ?>
                    <label class="col-sm-2 control-label">FirstName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $row->FirstName; ?>" name="fname" required>
                      <input type="hidden" class="form-control" value="<?php echo $row->docID; ?>" name="docid" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">LastName</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname" value="<?php echo $row->LastName; ?>" required>
                    
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="add" value="<?php echo $row->Address; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="email" name="email" value="<?php echo $row->Email; ?>" required>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact" value="<?php echo $row->contact; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="dob" value="<?php echo $row->DOB; ?>" required>
                    </div>
                  </div>
                   <?php }}}?>     
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Update Doctor" name="updDoc">
                        <a href="viewDoc.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>


<?php include('footer.php');?>