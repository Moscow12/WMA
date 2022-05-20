$(document).ready(() => {
    loadHomeContents();
})
function getMedicaldepartment(){
    $.ajax({
        type: "GET",
        url: "views/addmeasure.php",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
            loaddepartment();
            loadregisterform();
        }
    });
}

function loadregisterform(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {loadregisterform:''},
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
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

function adddepartament(){
    var name_of_department = $("#name_of_department").val();
    var Title =$("#Title").val();
    var whychooseus = $("#whychooseus").val();
    var Precaution = $("#Precaution").val();
    var Inteligence= $("#Inteligence").val();
    var Specialization = $("#Specialization").val();
    var maelezoziada_kuhusu_dept = $("#Department_description").val();
    alert(maelezoziada_kuhusu_dept);
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {maelezoziadapppppppppp:maelezoziada_kuhusu_dept,name_of_department:name_of_department,Title:Title, whychooseus:whychooseus, Precaution:Precaution,Inteligence:Inteligence, Specialization:Specialization, adddepartament:'' },
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
        }
    });
}

function loaddepartment(){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {loaddepartment:'' },
        cache:false,
        success: (response) => {
            $("#result").html(response);
        }
    });
}

function uploadimegese(Department_ID){
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID, imageupload:'' },
        cache:false,
        success: (response) => {
            $("#imegeupdaload").html(response);
            loadimages(Department_ID)
        }
    });
}

function submituploadedimage(Department_ID){
  

    var file_input= $("#imageupload").val();
    var fd = new FormData();
    var files = $('#imageupload')[0].files[0];
    fd.append('file',files);
    
    $.ajax({
        type:'POST',
        url:'./process/image_upload.php',
        data:fd,
        processData: false,
        contentType: false,
        success:function(responce){  
            if(responce=='Nothing')  {
                alert("Failed To upload image please try again");
            } else{          
                saveImages(responce, Department_ID);
            }             
        }
    });
}

function saveImages(responce, Department_ID){
    var image_description = $("#image_description").val();
    var image_title = $("#image_title").val();
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID,responce_image_path:responce,image_description:image_description, image_title:image_title,  imageuploaded:'' },
        cache:false,
        success: (response) => {
            uploadimegese(Department_ID);
            loadimages(Department_ID)
        }
    });
}

function loadimages(Department_ID){
    
    $.ajax({
        type: "POST",
        url: "./process/loadrequest.php",
        data: {Department_ID:Department_ID, imagesection : 'Department', loadimagedepartment:'' },
        cache:false,
        success: (response) => {
            $("#imegeupdaloaded").html(response);
        }
    });
}
function testpage(){
    $.ajax({
        type: "GET",
        url: "views/test.php",
        data: {},
        cache:false,
        success: (response) => {
            $("#main-content").html(response);
        }
    });
}

