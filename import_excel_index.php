<?php
if(!empty($_FILES['file'])){
$con=mysqli_connect("localhost","root","","yedco")or die("Connection faild: ".mysqli_connect_error());
if(!mysqli_connect_errno()){

$file=$_FILES['file']['tmp_name'];
$file=fopen($file,"r");
$heading=false;
while(($data= fgetcsv($file,1000,","))!==false){
    if(!$heading){
        $heading=true;
    }else{
        try{
            mysqli_query($con,"INSERT INTO `accounts` VALUES($data[0],'$data[1]','$data[2]'
            ,'$data[3]','$data[4]','$data[5]',$data[6],'$data[7]'
            ,'$data[8]','$data[9]','$data[10]',$data[11],$data[12],'$data[13]','$data[14]');");
            
        }catch(Exception $ex){
                echo $ex;
        }
}
}
}
}




?>
<form method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit"/>
</form>