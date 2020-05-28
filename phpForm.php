 <!DOCTYPE html>
    <html>
        <body>
          <?php
            $nameErr = $emailErr = $genderErr = $passwordErr = "";
            $name = $email = $gender = $password = $comment;
            if($_SERVER["REQUEST_METHOD" == "POST"]) {
                if(empty($_POST["name"])){
                    $nameErr = "Name is required";
                } else{
                    $name = test_input($_POST['name']);
                    if (!preg_match("/^[a-zA-Z]*$/", $name)){
                        $nameErr = "Only letters and white spaces are allowed";
                    }
                }
                if(empty($_POST["email"])){
                    $emailErr = "Email is required!";
                } else{
                    $email = test_input($_POST['email']);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $emailErr = "Invalid Email Format";
                    }
                }
                if(empty($_POST['password'])){
                    $passwordErr = "Password is required";
                } else{
                    $password = test_input($_POST['password']);
                    if(!password_match("[0-9A-Za-z!@#$&*%]",$password)){
                        $passwordErr = "A Password should contain atleast one Upper case and one lower case\nA password should contain a number as well as a special character\n";
                    }
                }
                if(empty($_POST['gender'])){
                    $genderErr = "Gender is required";
                } else{
                    $gender = test_input($_POST['gender']);
                }
            }
            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
            }
        ?>
            <?php
            echo "<H2>Your Input:</H2>";
            echo "$name<br>";
            echo "$email<br>";
            echo "$password<br>";
            echo "$gender<br>";
            ?>
        </body>
    </html>