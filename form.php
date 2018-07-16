<?php 


include 'layout.php';
include'dbconnect.php';
head();

?>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<form role="form" method="POST" ng-app="">
              <div class="box-body">
                <div class="form-group">
                  <label >Select Plan</label>
                  <select class="form-control" ng-model="plan" name="planSelect">
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
                  <input type="number" class="form-control" name="pins"  ng-model="number" placeholder="Enter Number of Pins">
                </div>
                
                <div class="form-group">
                  <label >Total Cost</label>
                  <input type="number" class="form-control" name="cost" disabled="disabled" value="{{number*plan}}">
                  
                </div>
               
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>