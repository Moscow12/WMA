<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>
    <script src="js/jsfunc.js"></script>
    <div class="form-container">
        
        <h2 style="padding:10px;font-weight:bold">Customer with pending bill</h2>

        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Service Date</th>
                    <th>Quantity</th>
                    <th>Amount Required</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
               <?php
               $num=1;
               $sql_selectwork =mysqli_query($conn, "SELECT * FROM  tbl_customers c, tbl_Customer_bill cb WHERE c.Customer_ID =cb.Customer_ID and bill_status='Pending'") or die(mysqli_error($conn));
               if(mysqli_num_rows($sql_selectwork)>0){
                   while($row = mysqli_fetch_assoc($sql_selectwork)){
                       $Customer_name =$row['Customer_name'];
                       $Bill_ID =$row['Bill_ID'];
                       $Phone_Number =$row['Phone_Number'];
                       $Customer_ID = $row['Customer_ID'];
                       $bill_status =$row['bill_status'];
                       
                       $sql_selectbill = mysqli_query($conn, "SELECT test_date, sum(Quantity) as Quantity, sum(Amount_required) as Amount_required FROM tbl_measure_mantainance where Bill_ID='$Bill_ID'") or die(mysqli_error($conn));
                       while($rws = mysqli_fetch_assoc($sql_selectbill)){
                            $Amount_required = $rws['Amount_required'];
                            $Quantity = $rws['Quantity'];
                            $test_date = $rws['test_date'];
                       }
                       echo "<tr>
                                <td>$num</td>
                                <td>$Customer_name</td>
                                <td>$Phone_Number</td>
                                <td>$test_date</td>
                                <td>$Quantity</td>
                                <td>$Amount_required</td>
                                <td>$bill_status</td>
                                <td><a href='index.php?id=customerpayment&Customer_ID=$Customer_ID'><button type='button' style='width:90%' class='btn btn-info'>MAKE PAYMENT</button></a>
                                    
                                </td>
                            </tr>";
                            $num++;
                   }
               }else{
                   echo "<tr><td colspan='7'>No result found</td></tr>";
               }
               ?>
            </tbody>
        </table>
        
    </div>
</div>


<!-- customers ==> Mteja,Aina ya Machine,Location,Quantity === 
payment on services,==> customer ==> services==> reference number ==> amount paid.
payment ==>  date,receipt amount ,deficiet, quantity , machine type,customer id,


expected vs reality;;; -->

  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">MAKE PAYMENT</h4>
        </div>
        <div class="modal-body">
        <form action="" method="post" class="form">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="name">Referance Number</label>
                    <input type="text" class="form-control" placeholder="customer" id="Reference_number">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="" class="form-control" placeholder="Phone Number" id="Payment_date">
                    <label for="station">Amount</label>
                    <input type="number" name="phone" id="" class="form-control" placeholder="amount" id="Amount_paid">
                    <label for="role">Payment Date</label>
                    <input type="date" name="phone" id="Payment_date" class="form-control" placeholder="Payment Date">

                </div>

            </div>
            
        </form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-info" name='save' onclick="paycustomerbill()" class='btn-success'>PAY</button>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>