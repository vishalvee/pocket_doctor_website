<?php
@include 'config.php';





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_medicine'])) {
        $medicien_name = strip_tags($_POST['medi_name']);
        $medicien_genric = $_POST['gen_name'];
        $medicien_information = $_POST['info'];
        $medicien_dose = $_POST['dose_size'];
        $medicien_image = $_FILES['medi_image']['name'];
        $medicien_image_tmp_name = $_FILES['medi_image']['tmp_name'];

        //add image folder of mediciens 
        $medicien_image_folder = '' . $medicien_image;

        if (empty($medicien_name) || empty($medicien_genric) || empty($medicien_information) || empty($medicien_dose) || empty($medicien_image)) {
            $message[] = 'please fill all details';
        } else {
            $insert = "INSERT INTO pocket_doctor(mediname,generic,info,dosesize,image)VALUES('$medicien_name','$medicien_genric','$medicien_information','$medicien_dose','$medicien_image')";
            $upload = mysqli_query($conn, $insert);
            if ($upload) {
                move_uploaded_file($medicien_image_tmp_name, $medicien_image_folder);
                $message[] = 'new medicine added';
            } else {
                $message[] = 'Could not add the medicine';
            }
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
    <link rel="stylesheet" href="style.css?=v2">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<span class="message">' . $message . '</span>';
            }
        }
    }
    ?>
    <div class="container">
        <div class="bodyImg">

            <img src="./BGblue09.png" alt="bg">
        </div>
        <div class="admin_product">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>Add new medicine</h3>
                <input type="text" placeholder="enter medicine name" id="medicine_name" name="medi_name" class="box" autocomplete="off">
                <input type="text" placeholder="enter generic name" name="gen_name" class="box">
                <textarea placeholder="enter information of medicine" name="info" class="box" cols="32" rows="5" style="width: 718px; height: 135px;" id="raja"></textarea>
                <input type="text" placeholder="enter dose size" name="dose_size" class="box">
                <div class="btnBox">

                    <input type="file" accept="image/png, image/jpeg, image/jpg" placeholder="add image of medicine" name="medi_image" class="box1">
                    <input type="submit" name="add_medicine" value="add medicine" class="submit_btn">
                </div>
                <button class="btnVoice" type="button" onclick="runSpeechRecognition()">  <img src="mic.png" alt="user" width="30PX" ><h4>ADD INFORMATION</h4> </button>
            </form>
        </div>
    </div>

      <!-- Voice Search by javascript -->
                <span id="action"></span>
                <div id="output" class="hide"></div>
        <script>
                    /* JS comes here */
                    function runSpeechRecognition() {
                        // get output div reference
                        var output = document.getElementById("output");
                        // get action element reference
                        var action = document.getElementById("action");
                        // new speech recognition object
                        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                        var recognition = new SpeechRecognition();
                        // This runs when the speech recognition service returns result
                        recognition.onresult = function(event) {
                            var transcript = event.results[0][0].transcript;
                            document.getElementById('raja').value=transcript;
                            var confidence = event.results[0][0].confidence;
                        };

                        // start recognition
                        recognition.start();
                    }
        </script>

</body>
</html>