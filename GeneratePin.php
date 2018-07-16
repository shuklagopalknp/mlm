<?php 

include 'session.php';
include 'layout.php';
include'dbconnect.php';
head();
sidebar();
?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
 <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 

<div class="content-wrapper">
 <?php  
 if (isset($_POST['submit'])!=''){
	 
	  $planSelect=$_POST['planSelect'];
	  $pins=$_POST['pins'];
	  $cost=$_POST['cost'];
	 
	 for($i=1;$i<=$pins;$i++){
		 
		  $fetching_max_entry="SELECT MAX(pin_id) as var FROM `pin`";
							$run11=mysql_query($fetching_max_entry);
							$rowww=mysql_fetch_assoc($run11);
							$varr=$rowww['var'];
							
							 $generatedPin=rand(1111,9999)."_".$varr;
							  $q="INSERT INTO `pin`( `pin_value`, `sponsor_id`, `generated_date`,`plan_price`) VALUES ('".$generatedPin."','1',now(),'".$planSelect."')";
							 
							 mysql_query($q);
		 
		 }
	 
	
	 //mysql_query($q);
	 //if(mysql_affected_rows()){?>
		 <div class="alert alert-success alert-dismissable">
<h4>  <i class="icon fa fa-check"></i> Congratulation!</h4>
Pins Created Successfully.
</div>
		<?php }
	 //}
 
 ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MLM
        <small>Generate Pin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Generate Pin</li>
      </ol>
    </section>

    <section class="content" >
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details to Generate Pin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="Post"  >
              <div class="box-body">
                <div class="form-group">
                  <label >Select Plan</label>
                  <select class="form-control" name="planSelect" id="planSelect">
                  <option value="" selected="selected">Choose Plan</option>
                  <?php 
				  $q1="SELECT * FROM `plan`";
				  $run1=mysql_query($q1);
				  while($row1=mysql_fetch_array($run1)){
					  $plan_price=$row1['plan_price'];
					  $plan_name=$row1['plan_name'];
					  $plan_price=$row1['plan_price'];
				  ?>
                  <option value="<?php echo $plan_price?>"><?php echo $plan_name?> (<?php echo $plan_price?>)</option>
                  <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label >Number of Pins</label>
                  <input type="number" class="form-control" name="pins"  id="pins" placeholder="Enter Number of Pins" onKeyUp="calc()">
                </div>
              
                <div class="form-group">
                  <label >Total Cost</label>
                  <input type="number" class="form-control" name="cost" id="cost" readonly="readonly">
                  
                </div>
               
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
              </div>
            </form>
              
                <script>
				calc = function()
{
    var resources = document.getElementById('planSelect').value;
    var minutes = document.getElementById('pins').value; 
    document.getElementById('cost').value  = parseInt(resources)*parseInt(minutes);

   }
				</script>
                
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
                  <th>Pin Id</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Used For</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				
				 $q11="SELECT * FROM `pin` WHERE `sponsor_id`='1'";
				  $run11=mysql_query($q11);
				  while($row11=mysql_fetch_array($run11)){
					  $pin_value=$row11['pin_value'];
					  $plan_price1=$row11['plan_price'];
					  $used_on=$row11['used_on'];
					  
					
				?>
                <tr>
                  <td><?php echo $pin_value?></td>
                  <td><?php echo $plan_price1?></td>
                  
                  <td><?php if($used_on==''){
					   ?><p style="color:#093">Unused</p><?php ;}else{
						   ?><p style="color:#C03">used</p><?php ;}?></td>
                  <td><?php echo $used_on?></td>
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
