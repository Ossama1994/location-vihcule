<?php include '../app/views/inc/header.php'; ?>
 
<section class="container-fluid bg-container">
    <div class="container bg-light reserve-now p-4 col-xl-12">
      <div class="row">
          <form action="<?php echo URL_ROOT; ?>/reservation/check" class="container d-flex" method="POST">
            <div class="col col-xl-3 col-md-6 col-auto m-2">
             <label for="formGroupExampleInput" class="form-label text-dark">Example label</label>
             <select class="form-select" aria-label="Default select example" name="locationfrom">
              <option selected>Open this select menu</option>
              <option value="Merrakesh">Merrakesh</option>
              <option value="Safi">Safi</option>
              <option value="Youssoufia">Youssoufia</option>
            </select>
            </div>
            <div class="col col-xl-2 col-md-6 col-auto m-2">
               <label for="formGroupExampleInput" class="form-label text-dark">Example label</label>
              <input type="date" class="form-control" placeholder="Last name" aria-label="Last name" name="datefrom">
            </div>
            <div class="col col-xl-3 col-md-6 col-auto m-2">
               <label for="formGroupExampleInput" class="form-label text-dark">Example label</label>
               <select class="form-select" aria-label="Default select example" name="locationto">
                 <option selected>Open this select menu</option>
                 <option value="Merrakesh">Merrakesh</option>
                 <option value="Safi">Safi</option>
                 <option value="Youssoufia">Youssoufia</option>
               </select>
            </div>
            <div class="col col-xl-2 col-md-6 col-auto mt-2">
                <label for="formGroupExampleInput" class="form-label text-dark">Example label</label>
              <input type="date" class="form-control" placeholder="Last name" aria-label="Last name" name="dateto">
            </div>
            <div class="col col-xl-2 col-md-6 col-auto">
              <label for="formGroupExampleInput" class="form-label text-dark"></label>
              <button type="submit" name="reserve" class="btn btn-primary btn-lg mt-4">Search</button>
            </div>
       </div>
    </form>
  </div>      
</section>



     <div class="container">
       <div class="row">
         <?php foreach($data['vihcle'] as $vichle):?>
             <div class="col bg-light p-3 m-2">
                <h4><?php echo $vichle->Price ?></h4>
                <h4><?php echo $vichle->fuel ?></h4>
                <h4><?php echo $vichle->passengers ?></h4>
                <h4><?php echo $vichle->name ?><h4>
             </div>
         <?php endforeach;?>
       </div>
     </div>
