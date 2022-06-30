<?php include('header.php');?>
<div class="row">
          
        <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Doctor Records
              </header>
               <?php
               if(isset($_GET['msg']))
               {
                   echo  $_GET['msg'];
               }
               
               ?> 
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> First Name</th>
                    <th><i class="icon_profile"></i> Last Name</th>
                    <th><i class="icon_profile"></i> Address</th>
                    <th><i class="icon_profile"></i> Email</th>
                    <th><i class="icon_profile"></i> Contact</th>
                    <th><i class="icon_profile"></i> City</th>
                    <th><i class="icon_profile"></i> Department</th>
                    <th><i class="icon_profile"></i> Status</th>
                    <th>Options</th>
                  </tr>
                  
     <?php
        require_once('config.php');
        $query= "SELECT d.*,c.city_Name as cname,dp.depart_Name as dname FROM doctors d
         inner join cities c on 
        d.cityID=c.cID
        inner join departments dp on 
        d.deptID=dp.dID
        ";
        
        if($result= $mysqli->query($query))
        {
            while($row=$result->fetch_object())
            {
               
            ?>
            <tr>
                <td><?php echo  $row->FirstName; ?></td>
                <td><?php echo  $row->LastName; ?></td>
                <td><?php echo  $row->Address; ?></td>
                <td><?php echo  $row->Email; ?></td>
                <td><?php echo  $row->contact; ?></td>
                <td><?php echo  $row->cname; ?></td>
                <td><?php echo  $row->dname; ?></td>
                <td><?php echo  $row->status; ?></td>
                    
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="addDoc.php"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-success" href="editDoc.php?id=<?php echo $row->docID; ?>"><i class="icon_check_alt2"></i></a>
                    <a class="btn btn-danger" href="function.php?docid=<?php echo $row->docID; ?>&status=<?php echo $row->status; ?>"><i class="icon_close_alt2"></i></a>
                  </div>
                </td>
              </tr>
            <?php
            
            }
            
        }
       
        ?>
    
                  
                 
                </tbody>
              </table>
            </section>
          </div>
        </div>

<?php include('footer.php');?>