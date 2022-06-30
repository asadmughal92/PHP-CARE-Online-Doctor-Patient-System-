
<?php
   session_start();
   require_once('config.php');

    // user login code
    if(isset($_POST['checkUser']))
    {
        $email= $_POST['email'];
        $pass=md5($_POST['pass']);
    
        $query= "SELECT * FROM USERS where email='$email' and password='$pass'";
        var_dump($query);
        if($result = $mysqli->query($query))
        {
            var_dump($mysqli->query($query));
            echo "reach t";
            exit;
            while($row=$result->fetch_object())
            {
                $_SESSION['userId'] = $row->userid;
                $_SESSION['userName'] = $row->Name;
                $_SESSION['userPic'] = $row->pic;
                header('location:adminDashboard.php');
            }
            
        }
        else{
            echo "reach d";
            exit;
            header('location:index.php?msg=Inavlid Email Password');
        }
    
    
    }


    // add City
    if(isset($_POST['addCity'])){
                        
        $name=$_POST['cname'];
        
        $query="insert into cities(city_Name) values ('$name')";
       if($mysqli->query($query)===true)
       {
          header('location:addCity.php?msg=City Added Successfully');
       }
       else{
        header('location:addCity.php?msg=City not Added');
       }
    }


    // del city
    if(isset($_GET['cid'])){
                        
        $id=$_GET['cid'];
        
        $query="delete from cities where cID=$id";
       if($mysqli->query($query)===true)
       {
          header('location:viewCity.php?msg=City Record Deleted Successfully');
       }
       else{
        header('location:ViewCity.php?msg=City Record not Deleted');
       }
    }


    // del department

     //
     if(isset($_GET['did'])){
                        
        $id=$_GET['did'];
        
        $query="delete from departments where dID=$id";
       if($mysqli->query($query)===true)
       {
          header('location:viewDept.php?msg=Department Record Deleted Successfully');
       }
       else{
        header('location:ViewDept.php?msg=Department Record not Deleted');
       }
    }


     //user delete
     if(isset($_GET['uid'])){
                        
        $id=$_GET['uid'];
        
        $query="delete from users where userid=$id";
       if($mysqli->query($query)===true)
       {
          header('location:viewUser.php?msg=User Record Deleted Successfully');
       }
       else{
        header('location:ViewUser.php?msg=User Record not Deleted');
       }
    }

     //
     if(isset($_GET['dsid'])){
                        
        $id=$_GET['dsid'];
        $pic=$_GET['pic'];

        $query="delete from dieases where d_id=$id";
       if($mysqli->query($query)===true)
       {
        unlink($pic);
          header('location:viewDS.php?msg=Disease Record Deleted Successfully');
       }
       else{
        header('location:ViewDS.php?msg=Disease Record not Deleted');
       }
    }

    // add user
    if(isset($_POST['addUser']))
    {
                        
        $fname=$_POST['fname'];
        
        $email=$_POST['email'];
        $pass=md5($_POST['pass']);
        
        $contact=$_POST['contact'];

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

// Verify file size - 1MB maximum
$maxsize = 1 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
if(in_array($filetype, $allowed)){
// Check whether file exists before uploading it
if(file_exists("userImages/" . $filename)){
echo $filename . " is already exists.";
} else{
$path="userImages/" .uniqid().$filename;
$query="insert into users(Name,Email,Contact,Password,pic)
values ('$fname','$email','$contact','$pass','$path')";
if($mysqli->query($query)===true)
{
// echo "Data inserted Successfully";
move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
header('location:addUser.php?msg=Data Inserted Successfully');

}
}
}
else{
// echo "Error".$mysqli->error;
header('location:addUser.php?msg=Data Failed to insert');
}

    //move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
    //   echo "Your file was uploaded successfully.";} 
} else{
echo "Error: There was a problem uploading your file. Please try again.";  }
} else{
echo "Error: " . $_FILES["photo"]["error"];  }

    
    
    
    
    // add disease
    
    if(isset($_POST['addDS'])){
                        
        $name=$_POST['dname'];
        
        $query="insert into departments(depart_Name) values ('$name')";
       if($mysqli->query($query)===true)
       {
          header('location:addDept.php?msg=Department Added Successfully');
       }
       else{
        header('location:addDept.php?msg=Department not Added');
       }
    }

    // add disease
    if(isset($_POST['addDS'])){
                        
        $name=$_POST['dname'];
        $desc=$_POST['desc'];
        $prev=$_POST['prev'];
        
    
        

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$filename = $_FILES["photo"]["name"];
$filetype = $_FILES["photo"]["type"];
$filesize = $_FILES["photo"]["size"];

// Verify file extension
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

// Verify file size - 1MB maximum
$maxsize = 1 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
if(in_array($filetype, $allowed)){
// Check whether file exists before uploading it
if(file_exists("dis/" .uniqid().$filename)){
echo $filename . " is already exists.";
} else{
$path="dis/" .uniqid().$filename;
$query="insert into dieases(dName,description,prevention,pic)
values ('$name','$desc','$prev','$path')";
if($mysqli->query($query)===true)
{
// echo "Data inserted Successfully";
move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
header('location:addDS.php?msg=Data Inserted Successfully');

}
}
}
else{
// echo "Error".$mysqli->error;
header('location:addDS.php?msg=Data Failed to insert');
}

    //move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
    //   echo "Your file was uploaded successfully.";} 
} else{
echo "Error: There was a problem uploading your file. Please try again.";  }
} else{
echo "Error: " . $_FILES["photo"]["error"];  }



// doctor status change

if(isset($_GET['docid'])){
                        
    $id=$_GET['docid'];
    $status=$_GET['status'];
    
    if($status == 'Active')
    {
        $query="update doctors set status='Deactive'  where docID=$id";
    }
    else{
        $query="update doctors set status='Active'  where docID=$id";
    }
    
   if($mysqli->query($query)===true)
   {
      header('location:viewDoc.php?msg=Status Updated Successfully');
   }
   else{
    header('location:ViewCity.php?msg=Error Updating Status ');
   }
}

    // add doctor
    if(isset($_POST['addDoc'])){
                        
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pass=md5($_POST['pass']);
        $add=$_POST['add'];
        $contact=$_POST['contact'];
        $dob=$_POST['dob'];
        $city=$_POST['city'];
        $dept=$_POST['depart'];
    
        

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$filename = $_FILES["photo"]["name"];
$filetype = $_FILES["photo"]["type"];
$filesize = $_FILES["photo"]["size"];

// Verify file extension
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

// Verify file size - 1MB maximum
$maxsize = 1 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
if(in_array($filetype, $allowed)){
// Check whether file exists before uploading it
if(file_exists("userImages/" . $filename)){
echo $filename . " is already exists.";
} else{
$path="userImages/" .uniqid().$filename;
$query="insert into doctors(FirstName,LastName,Address,Email,Password,Contact,dob,pic,cityID,deptID)
values ('$fname','$lname','$add','$email','$pass','$contact','$dob','$path',$city,$dept)";
if($mysqli->query($query)===true)
{
// echo "Data inserted Successfully";
move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
header('location:addDoc.php?msg=Data Inserted Successfully');

}
}
}
else{
// echo "Error".$mysqli->error;
header('location:addDoc.php?msg=Data Failed to insert');
}

    //move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
    //   echo "Your file was uploaded successfully.";} 
} else{
echo "Error: There was a problem uploading your file. Please try again.";  }
} else{
echo "Error: " . $_FILES["photo"]["error"];  }

?>