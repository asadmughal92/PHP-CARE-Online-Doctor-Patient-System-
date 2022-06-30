    

<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
          <p>At Care we have the following departments covered up and we will add more departmemts later.</p>
        </div>
      
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
            <?php
            require_once('admin/config.php');
            $query= "SELECT * FROM departments ";
            $result = $mysqli->query($query);
            while($row=$result->fetch_object())
             {
         
            ?>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#tab<?php echo $row->dID?>"><?php echo $row->depart_Name; ?></a>
              </li>
       <?php }?>       
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
          <?php
            $result1 = $mysqli->query($query);
          while($row1=$result1->fetch_object())
             {
              
            ?>
            <div class="tab-content">
              <div class="tab-pane " id="tab<?php echo $row1->dID?>">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3><?php echo $row1->depart_Name;?></h3>
                    <p class="font-italic"><?php echo $row1->depart_desc;?></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <?php }?>
             
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->
