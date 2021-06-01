<?php include '../app/views/inc/header.php'; ?>
<section class="container-fluid bg-dark text-white text-center p-4">
  <div class="row">
   <div class="col">
     <!-- <h1 class="text-dark"> Booking Process</h1> -->
        </div>
        <div class="col">
           <h1 class=""> Booking Process</h1>
       </div>
        <div class="col">
           <!-- <h1 class="text-dark"> Booking Process</h1> -->
        </div>
    </div>
</section>
<!-- Sectio for bookin progress -->
<section class="container-fluid p-5">
   <div class="row text-center">
        <div class="col d-flex bg-light p-2 m-2 rounded-2">
             <h4>Search</h4>
        </div>
        <div class="col d-flex bg-light p-2 m-2 rounded-2">
             <h4>Change car</h4>
        </div>
        <div class="col d-flex bg-light p-2 m-2 rounded-2">
            <h4>Change Details</h4>
        </div>
        <div class="col d-flex bg-light p-2 m-2 rounded-2">
            <h4>Confirm</h4>
        </div>
    </div>
</section>

<!--section for location picked and datepicker --> 

<section class="container-fluid">

   <div class="row">
      <div class="col bg-warning p-2 m-2 rounded-2">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Period</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $data['datefrom'] ?></td>
    </tr>
    <tr>
      <td><?php echo $data['dateto'] ?></td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="col  bg-warning p-2 m-2 rounded-2">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Pick up</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> <?php echo $data['locationfrom'] ?> </td>
    </tr>
    <tr>
      <td><?php echo $data['locationto'] ?></td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="col  bg-warning p-2 m-2 rounded-2">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Return</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
    </tr>
    <tr>
      
    </tr>
  </tbody>
</table>
      </div>
   </div>

</section>

<?php foreach($data['vihcle'] as $vichle):?>
					    
              <?php echo $vichle->name ?>
                                                        
              <?php endforeach;?>


