<?php  
require_once('config.php');
if(isset($_POST['updDept'])){
                        
    $name=$_POST['dname'];
    $id=$_POST['id'];
    $query="update departments set depart_Name='$name' where dID=$id";
   if($mysqli->query($query)===true)
   {
      header('location:viewDept.php?msg=Department record updated Successfully');
   }
   else{
    header('location:viewDept.php?msg=City record not updated');
   }
}


?>

<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Department
               
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Department Name</label>
                    <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                    
                    require_once('config.php');
                    $query= "SELECT * FROM departments where dID=$id";
        
                  if($result= $mysqli->query($query))
                 {
                while($row=$result->fetch_object())
                {
               ?>
                    <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->dID; ?>">
                    <input type="text" class="form-control" name="dname" value="<?php echo $row->depart_Name; ?>" required>
                    </div>
                  </div>
                 <?php }}}?>
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Update Department" name="updDept">
                      <a href="viewDept.php" class="btn btn-primary">Cancel</a>
                  
                    </div>
                  </div>
                </form>
              </div>


<?php include('footer.php');?>