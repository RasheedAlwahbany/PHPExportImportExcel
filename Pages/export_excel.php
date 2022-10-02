<?php

$query=mysqli_query($con,"select * from cities");
$arr=array();
while($row=mysqli_fetch_assoc($query)){
    $arr[]=$row;
    
}
// print_r($arr);
header("Content-Disposition: attachment;filename=\"exported.xls\"");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");


    $heading=false;
    if(!empty($arr)){
        foreach($arr as $row){
            if(!$heading){
                echo implode("\t",array_keys($row))."\n";
                $heading=true;
            }else{
                echo implode("\t",array_values($row))."\n";
            }

        }
    }

    


?>