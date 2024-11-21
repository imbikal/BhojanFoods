<?php
//Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';

    include '../config/constants.php';
    if(isset($_GET['id']))
        {
            $id=$_GET['id'];

            $sql2="update tbl_order set status='Delivered' where id=$id";
            $result2=mysqli_query($conn,$sql2);


            $sql="select * from tbl_order where id=$id";
            $result=mysqli_query($conn,$sql);

            $row = mysqli_fetch_assoc($result);

            $email=$row['customer_email'];
            $name=$row['customer_name'];
            
            





                        
            
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username(email)
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                //$mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress($email, $name);     //Add a recipient
                

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Food delivery from Bhojan.';
                $mail->Body    = 'Dear customer your ordered food is on the way to your location. The name of our  delivery boy  is <mark>Shyam Neupane</mark> and his phone number is<mark>9863489204</mark>. He will be there in about 20 minutes.Thank you for ordering from Bhojan. ';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                
            }


            if($result)
            {
                $_SESSION['update-status']="<div class='success'>Food is on delivery.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }

        }
?>        
