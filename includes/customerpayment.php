<?php 
if(isset($_GET['Customer_ID'])){
    $Customer_ID = $_GET['Customer_ID'];
}else{
    $Customer_ID =0;
}
$sql_selectwork =mysqli_query($conn, "SELECT * FROM  tbl_customers WHERE Customer_ID ='$Customer_ID'") or die(mysqli_error($conn));
    if(mysqli_num_rows($sql_selectwork)>0){
        while($row = mysqli_fetch_assoc($sql_selectwork)){
            $Location =$row['Location'];
            $Customer_name =$row['Customer_name'];
            $Gender =$row['Gender'];
            $Phone_Number =$row['Phone_Number'];
            $Customer_ID = $row['Customer_ID'];
            $htmdata.= "<tr>
                <td>NAME: <b>$Customer_name </b></td>
                <td>PHONE #: <b>$Phone_Number </b></td>
                <td> ADDRESS: <b>$Location </b></td>
                <td><input type='button' style='width:90%' class='btn btn-info' value='ADD CUSTOMER WEIGH' data-toggle='modal' data-target='#myModal'></td>
            </tr>";
            $num++;
        }
    }else{
        $htmdata.= "<tr><td>No result found</td></tr>";
    }
?>

<div class="section_main">
    <a href="./index.php?id=customers" class='back'> <b>< </b>Back</a>
    <div class="list">
    <fieldset>
        <legend>
            <table class="table"><?php echo $htmdata;?></table>
        </legend>
        <table class="table">
            <tr>
                <th>Service date</th>
                
                <th>Status</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Amount Paid</th>
                <th>Referance Number</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        <?php
               $num=1;
               $Today= date('Y-m-d');
               $sql_selectwork =mysqli_query($conn, "SELECT * FROM   tbl_Customer_bill cb WHERE cb.Customer_ID='$Customer_ID' and bill_status='Pending'") or die(mysqli_error($conn));
               if(mysqli_num_rows($sql_selectwork)>0){
                   while($row = mysqli_fetch_assoc($sql_selectwork)){
                       $Customer_name =$row['Customer_name'];
                       $Bill_ID =$row['Bill_ID'];
                       $Phone_Number =$row['Phone_Number'];
                       $Customer_ID = $row['Customer_ID'];
                       $bill_status =$row['bill_status'];
                       
                       $selectservicedone = mysqli_query($conn, "SELECT * FROM tbl_measure_mantainance WHERE Bill_ID='$Bill_ID'") or die(mysqli_error($conn));
                       
                       if(mysqli_num_rows($selectservicedone)>0){
                           while($rows = mysqli_fetch_assoc($selectservicedone)){
                               $test_date = $rows['test_date'];
                               $measure_status = $rows['measure_status'];
                               $remarks =$rows['remarks'];
                               $Quantity =$rows['Quantity'];
                               $Amount_required = $rows['Amount_required'];
                               $Payment_status = $rows['Payment_status'];
                               $Bill_ID =$rows['Bill_ID'];
                               $Measure_mantainance_ID = $rows['Measure_mantainance_ID'];
                               $selectpayment = mysqli_query($conn, "SELECT * FROM tbl_payment_of_measure WHERE Measure_mantainance_ID='$Measure_mantainance_ID'") or die(mysqli_error($conn));
                               $readonly='';
                               $Amount_paid='';
                               $Reference_number='';
                               $Payment_date='';
                               if(mysqli_num_rows($selectpayment)>0){
                                   while($datarw =mysqli_fetch_assoc($selectpayment) ){
                                   $Amount_paid = $datarw['Amount_paid'];
                                   $Payment_date = $datarw['Payment_date'];
                                   $Reference_number = $datarw['Reference_number'];
                                   }
                                   $readonly ='readonly';
                                   
                               }else{
                                   $date='date';
                               }
                               $date='date';
                            //    echo "<input id='Bill_ID$Measure_mantainance_ID' style='display:none' type='text'>";
                               echo "<tr>
                                   <td>$test_date</td>
                                   <td>$measure_status</td>
                                   <td>$Quantity</td>
                                   <td>$Amount_required  </td><td> <input type='text' style='width:10% display:inline;' id='Amount_paid$Measure_mantainance_ID'  class='form-control' value='$Amount_paid' $readonly>
                                   </td>
                                   <td><input id='Bill_ID$Measure_mantainance_ID' value='' style='display:none' type='text'>
                                   <input type='text' style='width:10% display:inline;' id='Reference_number$Measure_mantainance_ID' class='form-control' $readonly value='$Reference_number'></td>
                                   <td><input type='$date' style='width:10% display:inline;' id='Payment_date$Measure_mantainance_ID' class='form-control' value='$Payment_date' $readonly></td><td>
                                    <td>";
                                    if($Payment_status=='Active'){
                                    echo "<button style='width:50% display:inline;' type='button' class='btn btn-info' name='save' onclick='paycustomerbill($Measure_mantainance_ID, $Bill_ID)' class='btn-success'>PAY</button>";
                                    }else{
                                        echo $Payment_status;
                                    }
                                    echo "</td>";

                              echo "</tr>";
                           }
                       }else{
                           echo "<tr><td colspan='5'>No service done yet for this weigh</td></tr>";
                       }
                   }
                }
               ?>
        </table>
    </fieldset>
    <p style="padding: 20px;" id="responcedata"></p>
    </div>
  
</div>
