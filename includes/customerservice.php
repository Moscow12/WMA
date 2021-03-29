<?php
    if(isset($_GET['Customer_ID'])){
        $Customer_ID =$_GET['Customer_ID'];
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
            <?php 
             $num = 1;
             $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_type_of_measure tm, tbl_customer_measure_type cmt WHERE cmt.Type_measure_ID=tm.Type_measure_ID AND Customer_ID='$Customer_ID' ") or die(mysqli_error($conn));
             if(mysqli_num_rows($sql_selectwork)>0){
                 while($row = mysqli_fetch_assoc($sql_selectwork)){
                    $Customer_measure_ID = $row['Customer_measure_ID'];
                 $Type_of_measure = $row['Type_of_measure'];
                 $Description =$row['Description'];
                 $Type_measure_ID =$row['Type_measure_ID'];
                 $Today= date('Y-m-d');
                 echo "<tr> <td>$num</td> <td>$Type_of_measure</td> </tr>";
                         $num++;
                         echo "<tr><td colspan='2'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Service date</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th >ACTION</th>
                                    </tr>
                                </thead>
                                
                                <tr>
                                    <td><input class='form-control' type='date' value='$Today' id='test_date'></td>
                                    <td><input class='form-control' type='text' value='' id='remarks'></td>
                                    <td>
                                    <select class='form-control' id='measure_status'>
                                        <option value=''>~~select stutus~~</option>
                                        <option value='Pass'>Pass</option>
                                        <option value='Rejected'>Rejected</option>
                                        <option value='Failed'>Failed</option>
                                    </select>
                                    </td>
                                    <td>
                                    <input class='form-control' type='number' value='' id='Quantity'>
                                    </td>
                                    <td><input class='form-control' type='number' value='' id='Amount_required'></td>
                                    <td ><input class='btn' type='button'  value='SAVE' onclick='saveservice($Customer_measure_ID, $Customer_ID)'></td>
                                </tr><tbody id='servicebody'>
                                ";
                                    $selectservicedone = mysqli_query($conn, "SELECT * FROM tbl_measure_mantainance WHERE Customer_measure_ID='$Customer_measure_ID'") or die(mysqli_error($conn));
                                    if(mysqli_num_rows($selectservicedone)>0){
                                        while($rows = mysqli_fetch_assoc($selectservicedone)){
                                            $test_date = $rows['test_date'];
                                            $measure_status = $rows['measure_status'];
                                            $remarks =$rows['remarks'];
                                            $Quantity =$rows['Quantity'];
                                            $Amount_required = $rows['Amount_required'];
                                            $Payment_status = $rows['Payment_status'];
                                            $Measure_mantainance_ID = $rows['Measure_mantainance_ID'];
                                            echo "<tr>
                                                <td>$test_date</td>
                                                <td>$remarks</td>
                                                <td>$measure_status</td>
                                                <td>$Quantity</td>
                                                <td>$Amount_required  </td></tr>";
                                        }
                                    }else{
                                        echo "<tr><td colspan='5'>No service done yet for this weigh</td></tr>";
                                    }
                            echo "
                                </tbody>
                            </table>
                         <td></tr>";
                 }
                 
             }else{
                 echo "<tr><td colspan='4' style='color:red;'><b>$Customer_name </b> has No any weigh  to this system please add by using above button</td></tr>";
             }
            
            ?>
        </table>
    </fieldset>
    <p style="padding: 20px;" id="responcedata"></p>
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TYPE OF WEIGH</h4>
        </div>
        <div class="modal-body">
            <table class="table">
                <?php 
                    $num = 1;
                        $sql_selectwork =mysqli_query($conn, "SELECT *  FROM tbl_type_of_measure") or die(mysqli_error($conn));
                        if(mysqli_num_rows($sql_selectwork)>0){
                            while($row = mysqli_fetch_assoc($sql_selectwork)){
                            $Type_of_measure = $row['Type_of_measure'];
                            $Description =$row['Description'];
                            $Type_measure_ID =$row['Type_measure_ID'];
                            echo "<tr>
                                    <td>$num</td>
                                    <td>$Type_of_measure</td>
                                    <td>$Description</td>
                                    <td><input type='button' value='ADD' class='btn btn-info btn-sm' onclick='addweightyp($Type_measure_ID, $Customer_ID)'></td>
                                    </tr>";
                                    $num++;
                            }
                            
                        }else{
                            echo "<tr><td colspan='4'>No any type of weigh added go to setting to add</td></tr>";
                        }
                    ?>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>

</div>
