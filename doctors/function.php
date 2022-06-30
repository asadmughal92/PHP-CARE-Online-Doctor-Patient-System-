<?php
   session_start();
   require_once('config.php');

    // user login code
    if(isset($_POST['doc']))
    {
        $email= $_POST['email'];
        $pass=md5($_POST['pass']);
    
        $query= "SELECT * FROM doctors where Email='$email' and Password='$pass' and status='Active'";
        
        //var_dump($mysqli->query($query));
        //die(); 
        if($result= $mysqli->query($query))
        {
           
            while($row=$result->fetch_object())
            {
                $_SESSION['userId'] = $row->docID;
                $_SESSION['userName'] = $row->FirstName;
                $_SESSION['userPic'] = $row->pic;
                           
                header('location:doctorDashboard.php');
            }
            
        }
        else{
            header('location:index.php?msg=Invalid Email Password');
        }
    
    
    }

    // update doc
    

if(isset($_POST['updDoc'])){
                        
    $id=$_SESSION['userId'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $add=$_POST['add'];
    $dob=$_POST['dob'];
    $contact=$_POST['contact'];

    
    $query="update doctors set FirstName='$fname',LastName='$lname',Address='$add',DOB='$dob',contact='$contact'  where docID=$id";
   if($mysqli->query($query)===true)
   {
      header('location:doctorProfile.php?msg=Status Updated Successfully');
   }
   else{
    header('location:doctorProfile.php?msg=Error Updating Status ');
   }
}
    ?>