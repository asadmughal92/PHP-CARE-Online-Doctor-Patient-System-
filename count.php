<?php 
 require_once('admin/config.php');
 $result= $mysqli->query("SELECT count(docID) as total_doc from doctors");
 $doc=$result->fetch_object();

 $result= $mysqli->query("SELECT count(dID) as total_depart from departments");
 $dept=$result->fetch_object();

 $result= $mysqli->query("SELECT count(patientID) as total_patients from patients");
 $pt=$result->fetch_object();

 $result= $mysqli->query("SELECT count(appointment_ID) as total_appointments from appointments");
 $apt=$result->fetch_object();


?>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-doctor-alt"></i>
              <span data-toggle="counter-up"><?php echo $doc->total_doc; ?></span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-patient-bed"></i>
              <span data-toggle="counter-up"><?php echo $dept->total_depart; ?></span>
              <p>Departments</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-laboratory"></i>
              <span data-toggle="counter-up"><?php echo $pt->total_patients; ?></span>
              <p>Patients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-award"></i>
              <span data-toggle="counter-up"><?php echo $apt->total_appointments; ?></span>
              <p>Appintments</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

