<?php
    declare(strict_types=1);
    require '../control/handlefuncRequest.php';
    function getdepartment($datarequest){
        $data = new webdetails();
        return $data->fetchdepartmentdata($datarequest);
    }

    function getsectionimages($imagedata){
        $data = new webdetails();
        return $data->fetchImageSectionData($imagedata);
    }

    function getdoctorts($datarequest){
        $data = new webdetails();
        return $data->fetchDoctorsData($datarequest);
    }