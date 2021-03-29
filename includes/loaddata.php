<?php
    require_once('../config/connection.php');
    session_start();

    if(isset($_POST['loaddatareport'])){
      $measure_status = $_POST['measure_status'];
      $start_date = $_POST['start_date'];
      $end_date = $_POST['end_date'];
      $Employee_ID = $_POST['Employee_ID'];
      $filter = '';

      if($measure_status != 'All'){
        $filter .=" AND measure_status='$measure_status'";
      }
      if($Employee_ID != 'All'){
        $filter .=" AND mm.Added_by='$Employee_ID'";
      }
      $num=1;
      $sql_selectwork =mysqli_query($conn, "SELECT Customer_name,mm.Bill_ID,cb.Customer_ID,c.Phone_Number, Measure_mantainance_ID,Full_name,  Amount_required,Quantity,test_date,c.Location, bill_status,measure_status FROM  tbl_Users u, tbl_customers c, tbl_Customer_bill cb, tbl_measure_mantainance mm WHERE c.Customer_ID =cb.Customer_ID  AND  mm.Bill_ID=cb.Bill_ID AND mm.Added_by=u.User_ID AND test_date BETWEEN DATE('$start_date') AND DATE('$end_date') $filter ") or die(mysqli_error($conn));
      if(mysqli_num_rows($sql_selectwork)>0){
          while($row = mysqli_fetch_assoc($sql_selectwork)){
              $Customer_name =$row['Customer_name'];
              $Bill_ID =$row['Bill_ID'];
              $Phone_Number =$row['Phone_Number'];
              $Customer_ID = $row['Customer_ID'];
              $bill_status =$row['bill_status'];
              $Location = $row['Location'];
               $Amount_required = $row['Amount_required'];
               $Quantity = $row['Quantity'];
               $test_date = $row['test_date'];
               $Full_name = $row['Full_name'];
               $measure_status = $row['measure_status'];
               $Measure_mantainance_ID=$row['Measure_mantainance_ID'];
               
              $sql_selectbill = mysqli_query($conn, "SELECT Amount_paid,Payment_date   Reference_number FROM tbl_payment_of_measure where Measure_mantainance_ID='$Measure_mantainance_ID'") or die(mysqli_error($conn));
              $Amount_paid=0;
              $deficity=0;
              if(mysqli_num_rows($sql_selectbill)>0){
                   while($rws = mysqli_fetch_assoc($sql_selectbill)){
                   $Amount_paid = $rws['Amount_paid'];
                   $Reference_number= $rws['Reference_number'];
                   }
               }
               $deficity=(($Quantity *$Amount_required)-$Amount_paid);
              echo "<tr>
                       <td>$num</td>
                       <td>$Customer_name</td>
                       <td>$Phone_Number</td>
                       <td>$test_date</td>
                       <td>$Location</td>
                       <td>$measure_status</td>
                       <td>$Full_name</td>
                       <td>$Quantity</td>
                       <td>$Amount_required</td>
                       <td>$Amount_paid</td>
                       <td>$deficity</td>
                   </tr>";
                   $num++;
                 $totlrequired +=$Amount_required;
                 $TotalPaid +=$Amount_paid;
                 $Totaldifiecity +=$deficity;
                 $totalquantity +=$Quantity; 
                   
          }

      }else{
          echo "<tr><td colspan='7'>No result found</td></tr>";
      }
      echo "<tr>
               <td colspan='7'>Total</td>
               <td>".number_format($totalquantity)."</td>
               <td>".number_format($totlrequired)."</td>
               <td>".number_format($TotalPaid)."</td>
               <td>".number_format($Totaldifiecity)."</td>
           </tr>";

    }
    ?>


  <!-- Modal -->
 <!--  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TYPE OF WEIGH</h4>
        </div>
        <div class="modal-body">
            <table class="table">
                <?php 
                    // $num = 1;
                    //     $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_type_of_measure") or die(mysqli_error($conn));
                    //     if(mysqli_num_rows($sql_selectwork)>0){
                    //         while($row = mysqli_fetch_assoc($sql_selectwork)){
                    //         $Type_of_measure = $row['Type_of_measure'];
                    //         $Description =$row['Description'];
                    //         $Type_measure_ID =$row['Type_measure_ID'];
                    //         echo "<tr>
                    //                 <td>$num</td>
                    //                 <td>$Type_of_measure</td>
                    //                 <td>$Description</td>
                    //                 <td><input type='button' value='ADD' class='btn btn-info btn-sm' onclick='addweightyp($Type_measure_ID, $Customer_ID)'></td>
                    //                 </tr>";
                    //                 $num++;
                    //         }
                            
                    //     }else{
                    //         echo "<tr><td colspan='4'>No any type of weigh added go to setting to add</td></tr>";
                    //     }
                    ?>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div> -->
    <!-- Modal -->