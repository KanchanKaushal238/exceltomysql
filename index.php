<?php
if(isset($_POST["submit"]))
{
     $con = mysqli_connect('localhost', 'root', '', 'smsp');
        if($con === false)
                         {
	                        echo "connection is not done";
                         }
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          //$fname = $filesop[0];
          //$roll = $filesop[1];
		  //$class = $filesop[2];
		  $c++;
		  if($c>1)
		  {
          $sql = "insert into `excel` (`fname`, `roll`, `class`) values ('$filesop[0]','$filesop[1]','$filesop[2]')";
          mysqli_query($con,$sql);
		  }
         
           }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>