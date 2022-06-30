<?php  
require_once('config.php');
if(isset($_POST['updCity'])){
                        
    $name=$_POST['cname'];
    $id=$_POST['id'];
    $query="update cities set city_Name='$name' where cID=$id";
   if($mysqli->query($query)===true)
   {
      header('location:viewCity.php?msg=City record updated Successfully');
   }
   else{
    header('location:viewCity.php?msg=City record not updated');
   }
}


?>

<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit City
               
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">CityName</label>
                    <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                    
                    require_once('config.php');
                    $query= "SELECT * FROM cities where cID=$id";
        
                  if($result= $mysqli->query($query))
                 {
                while($row=$result->fetch_object())
                {
               ?>
                    <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->cID; ?>">
                    <input type="text" class="form-control" name="cname" value="<?php echo $row->city_Name; ?>" required>
                    </div>
                  </div>
                 <?php }}}?>
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Update City" name="updCity">
                      <a href="viewCity.php" class="btn btn-primary">Cancel</a>
                  
                    </div>
                  </div>
                </form>
              </div>


<?php include('footer.php');?>