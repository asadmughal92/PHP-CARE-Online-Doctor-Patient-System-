<?php  
require_once('config.php');

if(isset($_POST['updDS']))
{
                        
    $dname=$_POST['dname'];
    $desc=$_POST['desc'];
    $prev=$_POST['prev']; 
    $id=$_POST['dsid'];
    $oldpic= $_POST['oldpic'];
    
    // update file code
    
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0)
    {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 1 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit."); 

        $path = "dis/". uniqid().$filename;

        if(in_array($filetype, $allowed))
        {
            // Check whether file exists before uploading it
            if(file_exists("dis/" . $filename))
            {
                echo $filename . " is already exists.";
                die();
            }
            else
            {
                $query=" update dieases set dName='$dname',description='$desc',prevention='$prev',pic='$path' where d_id=$id";
                if($mysqli->query($query)===true)
                {    
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                    unlink($oldpic);
                    header('location:viewDS.php?msg=Data Updated Successfully');
                }
                else
                {
                    header('location:viewDS.php?msg=Data Failed to Update');
                }
            }
        }
    // file isset    
    }
    else
    {
        
        $query=" update dieases set dName='$dname',description='$desc',prevention='$prev' where d_id=$id";
        //var_dump($mysqli->query($query));
        //die();
        if($mysqli->query($query)===true)
        {
        header('location:viewDS.php?msg=Data Updated Successfully');
        }
        else
        {
            header('location:viewDS.php?msg=Data Failed to Update');
        }
    }
//end isset IF    
}
   

?>


<?php include('header.php');?>

    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Disease
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                  <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                    
                    require_once('config.php');
                    $query= "SELECT * FROM dieases where d_id=$id";
        
                  if($result= $mysqli->query($query))
                 {
                while($row=$result->fetch_object())
                {
                    ?>
                    <label class="col-sm-2 control-label">Diseas Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $row->dName; ?>" name="dname" required>
                      <input type="hidden" class="form-control" value="<?php echo $row->d_id; ?>" name="dsid" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="desc" value="<?php echo $row->description; ?>" required>
                    
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Prevention</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="prev" value="<?php echo $row->prevention; ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Pic</label>
                    <div class="col-sm-10">
                       <img src="<?php echo $row->pic ?>" width="50px" height="50px">
                       <input type="hidden" name="oldpic" class="form-control"  value="<?php echo $row->pic; ?>"> 
                      <input class="form-control" type="file" name="photo"  >
                    </div>
                  </div>
                 
                
                   <?php }}}?>     
                  <div class="form-group">
                        <div class="col-lg-10">
                      <input type="submit" class="btn btn-primary" value="Update Disease" name="updDS">
                        <a href="viewDS.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
                </form>
              </div>


<?php include('footer.php');?>