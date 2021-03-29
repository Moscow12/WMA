<?php
    
    require_once('../config/connection.php');
    session_start();
  
    if(isset($_POST['saveworkstation'])){
        $Workstation =mysqli_real_escape_string($conn, $_POST['Workstation']);
        $location =mysqli_real_escape_string($conn, $_POST['location']);

        $EmpID = $_SESSION['User_ID'];
        $sql_selectwork =mysqli_query($conn, "SELECT Workstation_name FROM tbl_working_station WHERE Workstation_name='$Workstation'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_selectwork)>0){
            echo "Workstation already exist";
        }else{
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_working_station(Workstation_name, Location, Added_by) VALUES('$Workstation', '$location', '$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "Saved successful";
            }else{
                echo "failed to save";
            }
        }
    }

    if(isset($_POST['saveusers'])){
        $Full_name =mysqli_real_escape_string($conn, $_POST['Full_name']);
        $Gender =mysqli_real_escape_string($conn, $_POST['Gender']);
        $Phone_number =mysqli_real_escape_string($conn, $_POST['Phone_number']);
        $role =mysqli_real_escape_string($conn, $_POST['role']);
        $Workstation_ID =mysqli_real_escape_string($conn, $_POST['Workstation_ID']);
        $username =mysqli_real_escape_string($conn, $_POST['username']);
        $password =md5($Phone_number);
        $EmpID = $_SESSION['User_ID'];
        $sql_selectwork =mysqli_query($conn, "SELECT Full_name FROM tbl_Users WHERE Full_name='$Full_name'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_selectwork)>0){
            echo "This Employee name already exist";
        }else{
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_Users(Full_name,username, Gender,Phone_number,roles,Workstation_ID,Password, Added_by) VALUES('$Full_name', '$username','$Gender','$Phone_number','$role','$Workstation_ID', '$password','$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong>
                </div>";
            }else{
                echo "failed to save"; 
            }
        }
    }

    if(isset($_POST['savecustomers'])){
        $Customer_name =mysqli_real_escape_string($conn, $_POST['Customer_name']);
        $location =mysqli_real_escape_string($conn, $_POST['location']);
        $Phone_number =mysqli_real_escape_string($conn, $_POST['Phone_number']);
        
        $EmpID = $_SESSION['User_ID'];
        $sql_selectwork =mysqli_query($conn, "SELECT Customer_name FROM tbl_customers WHERE Customer_name='$Customer_name'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_selectwork)>0){
            echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>This customer name already exist!</strong>
                </div>";
        }else{
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_customers(Customer_name, location,Phone_number, Added_by) VALUES('$Customer_name', '$location','$Phone_number','$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong>
                </div>";
            }else{
                echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to save!</strong>
                </div>";
            }
        }
    }
    

    if(isset($_POST['savemeasures'])){
        $Description =mysqli_real_escape_string($conn, $_POST['Description']);
        $Type_of_measure =mysqli_real_escape_string($conn, $_POST['Type_of_measure']);
        $Phone_number =mysqli_real_escape_string($conn, $_POST['Phone_number']);
        
        $EmpID = $_SESSION['User_ID'];
        $sql_selectwork =mysqli_query($conn, "SELECT Type_of_measure FROM tbl_type_of_measure WHERE Type_of_measure='$Type_of_measure'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_selectwork)>0){
            echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>This weigh name already exist!</strong>
                </div>";
        }else{
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_type_of_measure(Description, Type_of_measure, Added_by) VALUES('$Description', '$Type_of_measure','$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong>
                </div>";
            }else{
                echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to save!</strong>
                </div>";
            }
        }
    }

    if(isset($_POST['savemeasuretypecustomer'])){
        $Customer_ID =mysqli_real_escape_string($conn, $_POST['Customer_ID']);
        $Type_measure_ID =mysqli_real_escape_string($conn, $_POST['Type_measure_ID']);
        $EmpID = $_SESSION['User_ID'];
        $sql_selectwork =mysqli_query($conn, "SELECT Type_measure_ID FROM tbl_customer_measure_type WHERE Type_measure_ID='$Type_measure_ID' AND Customer_ID='$Customer_ID'") or die(mysqli_error($conn));
        if(mysqli_num_rows($sql_selectwork)>0){
            echo "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>This weigh name already exist!</strong>
                </div>";
        }else{
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_customer_measure_type(Customer_ID, Type_measure_ID, Added_by) VALUES('$Customer_ID', '$Type_measure_ID','$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Type of weigh added Successful! </strong>
                </div>";
            }else{
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to add try again!</strong>
                </div>";
            }
        }
    }
    
    if(isset($_POST['saveservice'])){
        $measure_status =mysqli_real_escape_string($conn, $_POST['measure_status']);
        $Quantity =mysqli_real_escape_string($conn, $_POST['Quantity']);
        $Customer_measure_ID =mysqli_real_escape_string($conn, $_POST['Customer_measure_ID']);
        $Amount_required =mysqli_real_escape_string($conn, $_POST['Amount_required']);
        $test_date =mysqli_real_escape_string($conn, $_POST['test_date']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
        $Customer_ID = $_POST['Customer_ID'];
        $EmpID = $_SESSION['User_ID'];
        $sql_selectbill =mysqli_query($conn, "SELECT Bill_ID FROM tbl_Customer_bill WHERE bill_status='Pending' AND Customer_ID='$Customer_ID'") or die(mysqli_error($conn));
        
        if(mysqli_num_rows($sql_selectbill)>0){
            $Bill_ID = mysqli_fetch_assoc($sql_selectbill)['Bill_ID'];
            
            
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_measure_mantainance(measure_status, Quantity,Customer_measure_ID,Bill_ID, Amount_required, test_date,remarks, Added_by) VALUES('$measure_status', '$Quantity','$Customer_measure_ID','$Bill_ID','$Amount_required', '$test_date', '$remarks', '$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Service mentained Successful!</strong>
                </div>";
            }else{
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to add try again!</strong>
                </div>";
            }
        }else{
            $EmpID = $_SESSION['User_ID'];
            
            $insertbill = mysqli_query($conn, "INSERT INTO tbl_Customer_bill(Customer_ID, Added_by)VALUES('$Customer_ID', '$EmpID')") or die(mysqli_error($conn));
            $Bill_ID = mysqli_insert_id($conn);
            $insertdata = mysqli_query($conn, "INSERT INTO tbl_measure_mantainance(measure_status, Quantity,Customer_measure_ID,Bill_ID, Amount_required, test_date,remarks, Added_by) VALUES('$measure_status', '$Quantity','$Customer_measure_ID','$Bill_ID','$Amount_required', '$test_date', '$remarks', '$EmpID')") or die(mysqli_error($conn));
            if($insertdata){
                echo "<div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Service mentained Successful!</strong>
                </div>";
            }else{
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to add try again!</strong>
                </div>";
            }
        }
    }

    if(isset($_POST['paysarvice'])){
        $Amount_paid = mysqli_real_escape_string($conn, $_POST['Amount_paid']);
        $Reference_number = mysqli_real_escape_string($conn, $_POST['Reference_number']);
        $Measure_mantainance_ID = $_POST['Measure_mantainance_ID'];
        $Bill_ID = $_POST['Bill_ID'];

        $EmpID = $_SESSION['User_ID'];
        $insertpayment= mysqli_query($conn, "INSERT INTO tbl_payment_of_measure(Measure_mantainance_ID, Amount_paid, Reference_number, User_ID)VALUES('$Measure_mantainance_ID', '$Amount_paid', '$Reference_number','$EmpID') ") or die(mysqli_error($conn));
        if($insertpayment){
            $update=mysqli_query($conn, "UPDATE tbl_measure_mantainance SET Payment_status='Paid' WHERE Measure_mantainance_ID='$Measure_mantainance_ID' ") or die(mysqli_error($conn));
            if($update){
                // die( "UPDATE tbl_Customer_bill SET bill_status='Cleared' WHERE Bill_ID='$Bill_ID' ");
                $updatebill = mysqli_query($conn, "UPDATE tbl_Customer_bill SET bill_status='Cleared' WHERE Bill_ID='$Bill_ID' ") or die(mysqli_error($conn));
                if($updatebill){
                    echo "<div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Payment done and bill cleared Successful!</strong>
                    </div>";
                }else{
                    echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to clear bill!! try again!</strong>
                </div>";
                }
            }else{
                echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to update service payment try again!</strong>
                </div>";
            }

        }else{
            echo "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Failed to make payment try again!</strong>
                </div>";
        }

    }
?>