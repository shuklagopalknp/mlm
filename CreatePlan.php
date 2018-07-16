<?php 

include 'session.php';
include 'layout.php';
include'dbconnect.php';
head();
sidebar();
?>


  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 

<div class="content-wrapper">
 <?php  
 if (isset($_POST['submit'])!=''){
	 
	 $planName=$_POST['planName'];
	 $planPrice=$_POST['planPrice'];
	 $desc=$_POST['desc'];
	 
	 $q="INSERT INTO `plan`(`plan_name`,`plan_price`,`plan_desc`, `time`) VALUES ('".$planName."','".$planPrice."','".$desc."',now())";
	 mysql_query($q);
	 if(mysql_affected_rows()){?>
		 <div class="alert alert-success alert-dismissable">
<h4>  <i class="icon fa fa-check"></i> Congratulation!</h4>
 Plan Created Successfully.
</div>
		<?php }
	 }
 
 ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MLM
        <small>Create Plan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Plan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Name Of Plan</label>
                  <input type="text" class="form-control" id="planname" name="planName" placeholder="Enter Plan Name">
                </div>
                <div class="form-group">
                  <label >Price Of Plan</label>
                  <input type="number" class="form-control" name="planPrice" placeholder="Price of Plan">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="desc" placeholder="Enter Plan Description"></textarea>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
          </div>
       

        </div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Entered Plan</h3>
            </div>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Plan</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>View/Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				
				$qry="SELECT * FROM `plan`";
				$run=mysql_query($qry);
				while($row=mysql_fetch_array($run)){
					$plan=$row['plan_name'];
					$plan_price=$row['plan_price'];
					$plan_desc=$row['plan_desc'];
					
				?>
                <tr>
                  <td><?php echo $plan?></td>
                  <td><?php echo $plan_price?></td>
                  <td><?php echo $plan_desc?></td>
                  <td style="width:13%"><a><button class="btn btn-info"><i class="fa fa-eye"></i></button></a><a><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a></td>
                </tr>
               <?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
          </div>
       

        </div>
        
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="">Onistech Info Systemj</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
