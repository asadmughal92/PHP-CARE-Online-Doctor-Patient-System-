<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Here are some of the doctors available in our online Portal.</p>
        </div>

        <div class="row">
        <?php
            require_once('admin/config.php');
            $query= "SELECT * FROM doctors dc inner join departments d on d.dID=dc.deptID ";
            $result = $mysqli->query($query);
            while($row=$result->fetch_object())
             {
         ?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              
            <div class="pic"><img src="admin/<?php echo $row->pic ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $row->FirstName . ' '. $row->LastName ?></h4>
                <span><?php echo $row->depart_Name ?></span>
                <p><?php echo $row->Address ?></p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
                <?php }?>
          
        </div>

      </div>
    </section><!-- End Doctors Section -->