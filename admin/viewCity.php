<?php include('header.php');?>
<div class="row">
          
        <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Cities Records
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
                    <th><i class="icon_profile"></i> City Name</th>
                    <th>Options</th>
                  </tr>
                  
     <?php
        require_once('config.php');
        $query= "SELECT * FROM cities";
        
        if($result= $mysqli->query($query))
        {
            while($row=$result->fetch_object())
            {
               
            ?>
            <tr>
                <td><?php echo  $row->city_Name; ?></td>
                    
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="addCity.php"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-success" href="editcity.php?id=<?php echo $row->cID; ?>"><i class="icon_check_alt2"></i></a>
                    <a class="btn btn-danger" href="function.php?cid=<?php echo $row->cID; ?>"><i class="icon_close_alt2"></i></a>
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