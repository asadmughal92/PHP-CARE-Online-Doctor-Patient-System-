<?php include('header.php');?>
<div class="row">
          
        <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Diseases Records
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
                    <th><i class="icon_profile"></i> Disease Name</th>
                    <th><i class="icon_profile"></i> Description</th>
                    <th><i class="icon_profile"></i> Prevention</th>
                    <th><i class="icon_profile"></i> Pic</th>
                    <th>Options</th>
                  </tr>
                  
     <?php
        require_once('config.php');
        $query= "SELECT * FROM dieases";
        
        if($result= $mysqli->query($query))
        {
            while($row=$result->fetch_object())
            {
               
            ?>
            <tr>
                <td><?php echo  $row->dName; ?></td>
                <td><?php echo  $row->description; ?></td>
                <td><?php echo  $row->prevention; ?></td>
                <td><img src="<?php echo  $row->pic; ?>" width="30px" height="30px"/></td>
                    
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="addDS.php"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-success" href="editDS.php?id=<?php echo $row->d_id; ?>"><i class="icon_check_alt2"></i></a>
                    <a class="btn btn-danger" href="function.php?dsid=<?php echo $row->d_id; ?>&pic=<?php echo $row->pic; ?>"><i class="icon_close_alt2"></i></a>
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