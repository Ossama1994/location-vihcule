<?php foreach($data['vihcle'] as $vihcle)  ?>
<?php include '../app/views/inc/header.php'; ?>
<div class="container p-5">
 <form class="row g-3 bg-light p-5" action="<?php echo URL_ROOT; ?>/Admin/edit/<?php echo $_GET['regis_num'] ?>" method="post">
  <div class="col-md-6">
  
      <!-- (`regis_num`, `Price`, `name`, `class`, `fuel`, `passengers`, `Code_res`, `image`) -->
    <label for="inputEmail4" class="form-label" >Name</label>
    <input type="text" name="name" class="form-control" id="inputEmail4" value="<?php echo $vihcle->name ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label" >Price</label>
    <input type="text" name="Price" class="form-control" id="inputPassword4" value="<?php echo $vihcle->Price ?>">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Class</label>
    <input type="text" name="class" class="form-control" id="inputAddress" value="<?php echo $vihcle->class ?>">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Fuel</label>
    <input type="text" name="fuel" class="form-control" id="inputAddress2" value="<?php echo $vihcle->fuel ?>">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label" >Passengers</label>
    <input type="text" name="passengers" class="form-control" id="inputCity" value="<?php echo $vihcle->passengers ?>">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">update</button>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary"><a class="text-light" href="<?php echo URL_ROOT; ?>/Admin/index">Return</a></button>
  </div>
</form>
</div> 

 