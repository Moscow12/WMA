<?php
    include("include/connection.php");
    session_start();

    echo $_SESSION['userinfo']['workstation_ID'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMA Report Dashboard</title>
    <script src="css/custom.js"></script>
    <link rel="stylesheet" href="./Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="ui small menu">
        <a class="active item" onclick="loadHomeContents()">Home</a>
        <a class="item" onclick="makeRequisitions()">Requisition</a>
        <a class="item" onclick="grnAgainstIssueNote()">GRN Against Issue Note</a>
        <a class="item" onclick="getReports()">Reports</a>
        <div class="right menu">
            <div class="ui compact menu">
                <div class="ui simple dropdown item">
                    System Settings
                  <i class="dropdown icon"></i>
                  <div class="menu">
                    <div class="item" onclick="getMedicalSettings()">Add Measure type</div>
                    <div class="item">Add System User </div>
                    <div class="item">Add Client</div>
                  </div>
                </div>
              </div>
            <div class="item">
                <div class="ui primary button" onclick="signout()">Sign Out</div>
            </div>
        </div>
    </div>

    <div id="main-content"></div>

    <script src="library/jquery.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>

    <script>
        $(document).ready(() => {
            loadHomeContents();
        })
        function getMedicalSettings(){
            $.ajax({
                type: "GET",
                url: "views/addmeasure.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }

        function signout(){
            $.ajax({
                type: "POST",
                url: "process/logout.php",
                data: {logout:''},
                cache:false,
                success: (response) => {
                    if(response=="1"){
                        window.open("index.php");
                    }
                }
            });
        }
        function loadHomeContents(){
            $.ajax({
                type: "GET",
                url: "views/home.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }
    </script>

    <script>
        function makeRequisitions(){
            $.ajax({
                type: "GET",
                url: "views/requesitions.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }

    </script> 

    <script>
        function grnAgainstIssueNote(){
            $.ajax({
                type: "GET",
                url: "views/settings.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }
    </script>

    <script>
        function getIncome(){
            $.ajax({
                type: "GET",
                url: "views/income.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }
    </script>

    <script>
        function getReports(){
            $.ajax({
                type: "GET",
                url: "views/stock.html",
                data: {},
                cache:false,
                success: (response) => {
                    $("#main-content").html(response);
                }
            });
        }
    </script>
</body>
</html>