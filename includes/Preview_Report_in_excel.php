<?php 
 require_once('../config/connection.php');
 session_start();
    $measure_status = $_GET['measure_status'];
      $start_date = $_GET['start_date'];
      $end_date = $_GET['end_date'];
      $Employee_ID = $_GET['Employee_ID'];
      $filter = '';

      if($measure_status != 'All'){
        $filter .=" AND measure_status='$measure_status'";
      }
      if($Employee_ID != 'All'){
        $filter .=" AND mm.Added_by='$Employee_ID'";
      }
      $htm.= "<table width='100%'>
      <thead>
          <tr>
              <th>Sn</th>
              <th>Customer Name</th>
              <th>Phone Number</th>
              <th>Service Date</th>
              <th>Location</th>
              <th>Service Status</th>
              <th>Service Done By</th>
              <th>Quantity</th>
              <th>Amount Required</th>
              <th>Amount Paid</th>
              <th>Deficity</th>
          </tr>
      </thead>

      <tbody id='responcedata'>";
         
      
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
              $htm.= "<tr>
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
          $htm.= "<tr><td colspan='7'>No result found</td></tr>";
      }
      $htm.= "<tr>
               <td colspan='7'>Total</td>
               <td>".number_format($totalquantity)."</td>
               <td>".number_format($totlrequired)."</td>
               <td>".number_format($TotalPaid)."</td>
               <td>".number_format($Totaldifiecity)."</td>
           </tr>";
    $htm.= "</tbody>
  </table>";
   //SIMPLE EXCELL FUNCTION STARTS HERE 
   header("Content-Type:application/xls");
   header("content-Disposition: attachement; filename= Report.xls");
   echo $htm;