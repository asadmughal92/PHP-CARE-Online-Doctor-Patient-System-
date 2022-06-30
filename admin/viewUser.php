<?php include('header.php');?>
<div class="row">
          
        <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                User Records
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
                    <th><i class="icon_profile"></i> User Name</th>
                    <th><i class="icon_profile"></i> Email</th>
                    <th><i class="icon_profile"></i> Contact</th>
                    <th><i class="icon_profile"></i> Pic</th>
                    <th>Options</th>
                  </tr>
                  
     <?php
        require_once('config.php');
        $userid=$_SESSION['userId'];
        $query= "SELECT * FROM users where userid!=$userid";
        
        if($result= $mysqli->query($query))
        {
            while($row=$result->fetch_object())
            {
               
            ?>
            <tr>
                <td><?php echo  $row->Name; ?></td>
                <td><?php echo  $row->Email; ?></td>
                <td><?php echo  $row->contact; ?></td>
                <td><img src="<?php echo  $row->pic; ?>" width="30px" height="30px"/></td>
                    
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="addUser.php"><i class="icon_plus_alt2"></i></a>
              
                    <a class="btn btn-danger" href="function.php?uid=<?php echo $row->userid; ?>"><i class="icon_close_alt2"></i></a>
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