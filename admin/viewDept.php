<?php include('header.php');?>
<div class="row">
          
        <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Department Records
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
                    <th><i class="icon_profile"></i> Department Name</th>
                    <th>Options</th>
                  </tr>
                  
     <?php
        require_once('config.php');
        $query= "SELECT * FROM departments";
        
        if($result= $mysqli->query($query))
        {
            while($row=$result->fetch_object())
            {
               
            ?>
            <tr>
                <td><?php echo  $row->depart_Name; ?></td>
                    
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="addDept.php"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-success" href="editDept.php?id=<?php echo $row->dID; ?>"><i class="icon_check_alt2"></i></a>
                    <a class="btn btn-danger" href="function.php?did=<?php echo $row->dID; ?>"><i class="icon_close_alt2"></i></a>
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