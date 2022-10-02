<?php
if(!empty($_FILES['file'])){

$file=$_FILES['file']['tmp_name'];
$file=fopen($file,"r");
$heading=false;
if (($file) !== FALSE) {
while(($data= fgetcsv($file,1000,","))!==false){
    if(!$heading){
        $heading=true;
    }else{
        try{
            mysqli_query($con,"INSERT INTO `cities` VALUES($data[0],'$data[1]','$data[2]'
            ,'$data[3]');");
            
        }catch(Exception $ex){
                echo $ex;
        }
}
}
}
else{
    echo "Error: Could not open file";

}
}else echo "Error loading";



?>