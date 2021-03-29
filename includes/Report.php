<div class="section_main">
    <a href="./index.php?id=dashboard" class='back'> <b>< </b>Back</a>
    <script src="js/jsfunc.js"></script>
    <?php
        $first_date = date('Y-m-d',strtotime('first day of this month'));
        $Today = date('Y-m-d');

    ?>
    <div class="form-container">
        
        <h2 style="padding:5px;font-weight:bold">Reports</h2>
        <div class="row">
            <div class="col-md-4">
            <input type="text"  style="width:40%; display:inline;" class='form-control' id="start_date" value="<?= $first_date?>">
            <input type="text"  style="width:40%; display:inline;" class='form-control' id="end_date" value="<?= $Today?>">
            </div>
            <div class="col-md-2">
                <select class='form-control' id='measure_status' onchange="filterreport()">
                    <option value='All'>All Status</option>
                    <option value='Pass'>Pass</option>
                    <option value='Rejected'>Rejected</option>
                    <option value='Failed'>Failed</option>
                </select></div>
            <div class="col-md-2">
                <select class='form-control' id='Employee_ID' onchange="filterreport()">
                    <option value='All'>All Employees</option>
                <?php 
                $sql_selectwork =mysqli_query($conn, "SELECT User_ID, Full_name FROM tbl_Users ") or die(mysqli_error($conn));
                if(mysqli_num_rows($sql_selectwork)>0){
                    while($emprw = mysqli_fetch_assoc($sql_selectwork)){
                        $User_ID = $emprw['User_ID'];
                        $Full_name = $emprw['Full_name'];
                        echo "<option value='$User_ID'>$Full_name</option>";
                    }
                }else{
                    echo "No result found";
                }
                ?>
                </select>
            </div>
            <div class="col-md-2">
                <input type="button" value="FILTER" class='btn btn-info btn-sm' onclick="filterreport()">
            </div>
            <div class="col-md-2"><input type="button" value="EXCEL" class='btn btn-info btn-sm' onclick="filterreportexcel()"></div>
        </div>
        
        <table class="table table-condensed table-hover">
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

            <tbody id='responcedata'>
               
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