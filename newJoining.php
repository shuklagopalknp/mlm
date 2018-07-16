<?php 
include 'session.php';
include 'layout.php';
include'dbconnect.php';
head();
sidebar();
?>
<script src="ajax.js"></script>
<div class="content-wrapper">
<?php 
if(isset($_POST['submit'])!=''){
	 $pin=$_POST['pin'];
	 $pin_price=$_POST['pin_price'];
	 
	 $Sponser_Id=$_POST['Sponser_Id'];
	 $User_name=$_POST['User_name'];
	 $User_Email=$_POST['User_Email'];
	 $User_Number=$_POST['User_Number'];
	 $user_gender=$_POST['user_gender'];
	 $adhar_card=$_POST['adhar_card'];
	 $pan=$_POST['pan'];
	 $account=$_POST['account'];
	 $ifsc=$_POST['ifsc'];
	
	$userid=rand(11111111,99999999);
	
	$q="INSERT INTO `user`(`user_id_generated`, `user_name`, `sponser_id`, `email`, `mobile`, `gender`, `adhar`, `pan`, `account`, `ifsc`,`pin_used`,`joining_date`) VALUES ('".$userid."','".$User_name."','".$Sponser_Id."','".$User_Email."','".$User_Number."','".$user_gender."','".$adhar_card."','".$pan."','".$account."','".$ifsc."','".$pin."',now())";
	mysql_query($q);
	 if(mysql_affected_rows()){
		 /*-------------used pin----------*/
		 $q1="UPDATE `pin` SET `used_on`='".$userid."',`used_date`=now() WHERE `pin_value`='".$pin."'
";
		 mysql_query($q1);
		  /*-------------/used pin----------*/
		  
		   /*-------------Update User Wallet Balance----------*/
		    $q2="INSERT INTO `wallet_transactions`(`user_id_generated`, `amount`, `reason`, `entry_time`) VALUES ('".$userid."','".$pin_price."','Joining Bonus',now());
";
		 mysql_query($q2);
		   
		    /*-------------/Update User Wallet Balance---------*/
			
			 /*-------------Level One Profit Destribution----------*/
			 $profit=($pin_price*10)/100;
		   echo $q3="INSERT INTO `wallet_transactions`(`user_id_generated`, `amount`, `reason`, `entry_time`) VALUES ('".$Sponser_Id."','".$profit."','LEVEL One Joining',now());
";
		 mysql_query($q3);
		   
		    /*-------------/Level One Profit Destribution---------*/
		 ?>
     
     
	 <div class="alert alert-success alert-dismissable">

<h4>  <i class="icon glyphicon glyphicon-check"></i> Success !</h4>
 <?php echo $User_name?> Registered Succefully.
</div>
	 <?php
		 
		 }
	}
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>New Joining</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Joining</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Pin</label>
                  <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter Pin" onKeyUp="getData('fetchPinDetail.php?id='+this.value,'pin_div');">
                  
                </div>
                <div id="pin_div">
                
                  <div class="form-group">
                  <label >Sponser Id</label>
                  <input type="text" class="form-control" name="Sponser_Id" placeholder="Insert Sponser Id" disabled>
                </div>
                <div class="form-group">
                  <label >User Name</label>
                  <input type="text" class="form-control" name="User_name" placeholder="Insert User Email" disabled>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="text" class="form-control" name="User_Email" placeholder="Insert User Email" disabled>
                </div>
                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="text" class="form-control" name="User_Number" placeholder="Insert User Number" disabled>
                </div>
                <div class="form-group lock_o">
                    <input type="radio" name="user_gender" value="M" disabled/>  <label>Male</label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="user_gender" value="F" disabled/> <label>Female</label>
                  </div>
                <div class="form-group">
                  <label >Adhar Card</label>
                  <input type="number" class="form-control" name="adhar_card" placeholder="Enter Adhar Card Number" disabled>
                </div>
                
                <div class="form-group">
                  <label >Pan Card</label>
                  <input type="text" class="form-control" name="User_Name" placeholder="Enter User Name" disabled>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="number" class="form-control" name="adhar_card" placeholder="Enter Account Number" disabled>
                </div>
                <div class="form-group">
                  <label >IFSC</label>
                  <input type="text" class="form-control" name="adhar_card" placeholder="Enter IFSC Number" disabled>
                </div>
                  </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              </div>
            </form>
          </div>
       

        </div>
        
        
      </div>
      <!-- /.row -->
    </section>
  </div>
<?php
footer();
?>