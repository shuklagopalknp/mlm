<?php 
include'dbconnect.php';
$pin=$_GET['id'];
$q="SELECT * FROM `pin` WHERE `pin_value`='".$pin."'";
$run=mysql_query($q);
$num=mysql_num_rows($run);
if($num==1){
$row=mysql_fetch_array($run);

$pin_value=$row['used_on'];
$sponsor_id=$row['sponsor_id'];
$plan_price=$row['plan_price'];

if($pin_value==''){?>

<span style="color:green;float:right">Available</span>
</div>
<div class="form-group">
                  <label >Sponser Id</label>
                  <input type="number" class="form-control" name="Sponser_Id" placeholder="Insert Sponser Id" value="<?php echo $sponsor_id?>">
                  <input type="hidden" class="form-control" name="pin_price" value="<?php echo $plan_price?>" >
                </div>
                 <div class="form-group">
                  <label >User Name</label>
                  <input type="text" class="form-control" name="User_name" placeholder="Insert User Email" >
                  
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="text" class="form-control" name="User_Email" placeholder="Insert User Email" >
                </div>
                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="number" class="form-control" name="User_Number" placeholder="Insert User Number" >
                </div>
                <div class="form-group lock_o">
                    <input type="radio" name="user_gender" value="M" />  <label>Male</label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="user_gender" value="F" /> <label>Female</label>
                  </div>
                <div class="form-group">
                  <label >Adhar Card</label>
                  <input type="text" class="form-control" name="adhar_card" placeholder="Enter Adhar Card Number" >
                </div>
                
                <div class="form-group">
                  <label >Pan Card</label>
                  <input type="text" class="form-control" name="pan" placeholder="Enter User Name" >
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="number" class="form-control" name="account" placeholder="Enter Account Number" >
                </div>
                <div class="form-group">
                  <label >IFSC</label>
                  <input type="text" class="form-control" name="ifsc" placeholder="Enter IFSC Number" >
                </div>
                
<?php }else{
	
	?>
	<span style="color:red;float:right">Pin Used Already</span>
    </div>
    <div class="form-group">
                  <label >Sponser Id</label>
                  <input type="number" class="form-control"  placeholder="Insert Sponser Id" disabled>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="number" class="form-control" placeholder="Insert User Email" disabled>
                </div>
                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="number" class="form-control" placeholder="Insert User Number" disabled>
                </div>
                <div class="form-group lock_o">
                    <input type="radio" value="M" disabled/>  <label>Male</label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio"  value="F" disabled/> <label>Female</label>
                  </div>
                <div class="form-group">
                  <label >Adhar Card</label>
                  <input type="number" class="form-control" placeholder="Enter Adhar Card Number" disabled>
                </div>
                
                <div class="form-group">
                  <label >Pan Card</label>
                  <input type="number" class="form-control"  placeholder="Enter User Name" disabled>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="number" class="form-control"  placeholder="Enter Account Number" disabled>
                </div>
                <div class="form-group">
                  <label >IFSC</label>
                  <input type="number" class="form-control" placeholder="Enter IFSC Number" disabled>
                </div>
                  </div>
                
	<?php
	
	}
	}else{?>
	<span style="color:red;float:right">Pin Is Incorrect</span>
    </div>
    <div class="form-group">
                  <label >Sponser Id</label>
                  <input type="number" class="form-control"  placeholder="Insert Sponser Id" disabled>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="number" class="form-control" placeholder="Insert User Email" disabled>
                </div>
                <div class="form-group">
                  <label >Mobile Number</label>
                  <input type="number" class="form-control"  placeholder="Insert User Number" disabled>
                </div>
                <div class="form-group lock_o">
                    <input type="radio"  value="M" disabled/>  <label>Male</label>
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio"  value="F" disabled/> <label>Female</label>
                  </div>
                <div class="form-group">
                  <label >Adhar Card</label>
                  <input type="number" class="form-control" placeholder="Enter Adhar Card Number" disabled>
                </div>
                
                <div class="form-group">
                  <label >Pan Card</label>
                  <input type="number" class="form-control"  placeholder="Enter User Name" disabled>
                </div>
                
                <div class="form-group">
                  <label >Account Number</label>
                  <input type="number" class="form-control" placeholder="Enter Account Number" disabled>
                </div>
                <div class="form-group">
                  <label >IFSC</label>
                  <input type="number" class="form-control" placeholder="Enter IFSC Number" disabled>
                </div>
                  </div>
                
	<?php }


?>
