<?php
$con=mysqli_connect("localhost","root","","yedco")or die("Connection faild: ".mysqli_connect_error());
if(!mysqli_connect_errno()){
$query=mysqli_query($con,"select * from accounts");
$arr=array();
while($row=mysqli_fetch_assoc($query)){
    $arr[]=$row;
    
}
// print_r($arr);
header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"exported.xls\"");
    
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

    
}

?>