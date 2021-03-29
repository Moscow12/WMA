<?php 
$id = isset($_GET['id'])?trim($_GET['id']):"";
// if(isset($_SESSION['User_ID'])){
    switch ($id){
        case 'dashboard':
            $content = 'dashboard.php';
        break;
        case 'add-user':
            $content = 'add-user.php';
        break;
        case 'add-customers':
            $content = 'add-customers.php';
        break;
        case 'customerservice':
            $content = 'customerservice.php';
        break;
        case 'customerpayment':
            $content = 'customerpayment.php';
        break;
        case 'add-measures':
            $content = 'add-measures.php';
        break;
        case 'workstation':
            $content = 'workstation.php';
        break;
        case 'machine':
            $content = 'machine.php';
        break;
        case 'users':
            $content = 'users.php';
        break;
        case 'customers':
            $content = 'customers.php';
        break;
        case 'services':
            $content = 'services.php';
        break;
        case 'payment':
            $content = 'payment.php';
        break;
        case 'add-customer':
            $content = 'addCustomer.php';
        break;
        case 'Report':
            $content = 'Report.php';
        break;
        default:
            $content ='dashboard.php';
        break;
    }
// }else{
//     header("location:index.php");
// }

?>