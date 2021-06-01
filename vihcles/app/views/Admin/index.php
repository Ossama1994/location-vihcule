
<?php foreach($data['total'] as $total) ?>
<?php include '../app/views/inc/header.php'; ?>
  <style type="text/css">
    body,
    html {
      height: 100%;
    }
    /* workaround modal-open padding issue */
    
    body.modal-open {
      padding-right: 0 !important;
    }
    
    #sidebar {
      padding-left: 0;
    }
    /*
 * Off Canvas at medium breakpoint
 * --------------------------------------------------
 */
    
    @media screen and (max-width: 48em) {
      .row-offcanvas {
        position: relative;
        -webkit-transition: all 0.25s ease-out;
        -moz-transition: all 0.25s ease-out;
        transition: all 0.25s ease-out;
      }
      .row-offcanvas-left .sidebar-offcanvas {
        left: -33%;
      }
      .row-offcanvas-left.active {
        left: 33%;
        margin-left: -6px;
      }
      .sidebar-offcanvas {
        position: absolute;
        top: 0;
        width: 33%;
        height: 100%;
      }
    }
    /*
 * Off Canvas wider at sm breakpoint
 * --------------------------------------------------
 */
    
    @media screen and (max-width: 34em) {
      .row-offcanvas-left .sidebar-offcanvas {
        left: -45%;
      }
      .row-offcanvas-left.active {
        left: 45%;
        margin-left: -6px;
      }
      .sidebar-offcanvas {
        width: 45%;
      }
    }
    
    .card {
      overflow: hidden;
    }
    
    .card-block .rotate {
      z-index: 8;
      float: right;
      height: 100%;
    }
    
    .card-block .rotate i {
      color: rgba(20, 20, 20, 0.15);
      position: absolute;
      left: 0;
      left: auto;
      right: -10px;
      bottom: 0;
      display: block;
      -webkit-transform: rotate(-44deg);
      -moz-transform: rotate(-44deg);
      -o-transform: rotate(-44deg);
      -ms-transform: rotate(-44deg);
      transform: rotate(-44deg);
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-primary mb-3">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
      <a class="navbar-brand mb-1" href="#">Dashboard</a>
      <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/Admin/index">Home<span class="sr-only">Home</span></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      </ul>
    </div>
  </nav>
  <div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav flex-column pl-1">
          <li class="nav-item"><a class="nav-link" href="#">Analytics</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Admins</a></li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo URL_ROOT; ?>/User/index">Log out</a>
          </li>
      
        </ul>
      </div>


      <div class="col-md-9 col-lg-10 main">

        <h1 class="display-2 hidden-xs-down">
            Bootstrap 4 Dashboard
            </h1>
        <p class="lead hidden-xs-down">(with off-canvas sidebar, based on BS v4 alpha 6)</p>

        <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
        </div>

        <div class="row mb-3">
          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-success">
              <div class="card-block bg-success">
                <div class="rotate">
                  <i class="fa fa-user fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Admins</h6>
                <h1 class="display-1">4</h1>
              </div>
            </div>
          </div>
 
          <div class="col-xl-3 col-lg-6">
            <div class="card card-inverse card-warning">
              <div class="card-block bg-warning">
                <div class="rotate">
                  <i class="fa fa-share fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Vihcle</h6>
                <h1 class="display-1"><?php echo $total->num ?></h1>
              </div>
            </div>
          </div>
        </div>
        <!--/row-->

        <hr>
        
          </div>
          <div class="col-lg-9 col-md-8">

          <li class="nav-item">
            <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="bi bi-plus-square-fill"></i></a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
      <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add vihcle</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="<?php echo URL_ROOT; ?>/Admin/add" method="post">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="Price" id="" class="form-control input-sm" placeholder="Price">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="name" id="" class="form-control input-sm" placeholder="name">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="class" id="email" class="form-control input-sm" placeholder="class">
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="fuel" id="password" class="form-control input-sm" placeholder="fuel">
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="passengers" id="" class="" placeholder="passengers">
			    					</div>
			    				</div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
			    				</div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="image" id="" class="" placeholder="image">
			    					</div>
			    				</div>
			    			</div>
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
            </ul>
          </li>
         <!-- <div class="btn btn-dark"></div>  -->
            <div class="table-responsive">
              <table class="table ">
                <thead class="thead-inverse">
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Class</th>
                    <th>Fuel</th>
                    <th>Passengers</th>
                    <th>Manage</th>

                  </tr>
                </thead>
                <tbody>
            
                <?php foreach($data['vihcle'] as $vichle):?>
				<tr>   
                <!-- (`regis_num`, `Price`, `name`, `class`, `fuel`, `passengers`, `Code_res`, `image`) -->
                
                    <td><?php echo $vichle->name ?></td> 
                    <td><?php echo $vichle->Price ?></td>
                    <td><?php echo $vichle->class ?></td>
                    <td><?php echo $vichle->fuel ?></td>
                    <td><?php echo $vichle->passengers ?></td>
                    <td><a href="<?php echo URL_ROOT; ?>/Admin/update?regis_num=<?php echo $vichle->regis_num; ?>"><i class="bi bi-pencil-square m-2"></i></a>
                    <a href="<?php echo URL_ROOT; ?>/Admin/delete/<?php echo $vichle->regis_num; ?>"><i class="bi bi-trash-fill"></i></a></td>
                    
                </tr>
                  <?php endforeach;?>
                
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <?php include '../app/views/inc/footer.php'; ?>


