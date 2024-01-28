<?php
@include 'config.php';
if(isset($_POST['add_medicine']))
{
$medicien_name=$_POST['medi_name'];
$medicien_genric=$_POST['gen_name'];
$medicien_information=$_POST['info'];
$medicien_dose=$_POST['dose_size'];
$medicien_image=$_FILES['medi_image']['name'];
$medicien_image_tmp_name=$_FILES['medi_image']['tmp_name'];

//add image folder of mediciens 
$medicien_image_folder=''.$medicien_image;
 
if(empty($medicien_name)|| empty($medicien_genric)||empty ($medicien_information)|| empty ($medicien_dose)||empty($medicien_image)){
    $message[]='please fill all details';
}
else{
    $insert ="INSERT INTO pocket_doctor(mediname,generic,info,dosesize,image)VALUES('$medicien_name','$medicien_genric','$medicien_information','$medicien_dose','$medicien_image')";
$upload= mysqli_query($conn, $insert);
if($upload){
    move_uploaded_file($medicien_image_tmp_name,$medicien_image_folder);
    $message[]='new medicien added';
}else{
    $message[]='Could not add the medicien';
}  
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    if(isset($message))
    {
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }
    
    
    ?>

    <div class="container">
        <div class="admin_product">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> 
            <h3>Add new medicien</h3>
                <input type="text" placeholder="enter mediciene name" name="medi_name" class="box">
                <input type="text" placeholder="enter generic name" name="gen_name" class="box">
                <textarea placeholder="enter information of medicien" name="info" class="box" cols="32" rows="5" style="width: 718px; height: 135px;"></textarea>
                <input type="text" placeholder="enter dose size" name="dose_size" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg"  placeholder="add image of medicien" name="medi_image" class="box1">
                <input type="submit" class="btn" name="add_medicine" value="add medicien">
        </form>

      
        </div>

    </div>
   
</body>
</html>