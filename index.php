<?php
ini_set('default_charset', 'utf-8');
$con=mysqli_connect("localhost","root","","test")or die("Connection faild: ".mysqli_connect_error());
if(!mysqli_connect_errno()){
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['control'])){
        if($_POST['control'] == 'Import')
            require("Pages/import_excel.php");
        else if($_POST['control'] == 'Export')
            require("Pages/export_excel.php");
        else
            echo "Please enter control option.";
        
    }

}else{
?>
<form action="" method="post" enctype="multipart/form-data">
  <label for="Import">Please choose from bellow:</label><br/>
  <input type="radio" name="control" value="Import" checked>
  <label for="Import">Import</label>
  <input type="radio" name="control" value="Export">
  <label for="Export">Export</label><br><br>
  <div id='file-div'>
  <label for="File" >File: </label>
  <input type="file" name="file">
  </div><br/>
  <input type="submit" value="Submit">
</form>

<?php 
}
}else 
    echo "Connection Error";
?>