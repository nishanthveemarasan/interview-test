<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";

class CommonService
{
    public function sanitize_input($input)
    {
        $data = trim($input);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function get_api_details()
    {
        $locationArray = array('Harrington', 'Cornwall', 'Southwell', 'Mews', 'Kensington');
        $data = array();
        //send api request to get the images data
        $apiUrl = 'https://jsonplaceholder.typicode.com/photos';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        $jsonResponse = json_decode($result, true);
        //create an array with image data with location which will be then used for carousel
        for ($i = 0; $i < count($locationArray); $i++) {
            $array = array(
                'location' => $locationArray[$i],
                'title' => $jsonResponse[$i]['title'],
                'image_url' => $jsonResponse[$i]['url']
            );
            array_push($data, $array);
        }
        return $data;
    }

    public static function send_email($name, $email)
    {
        $html = '<html>
                    Hi <strong>' . $name . '</strong>, we are happy to <br>confirm your Registration.</br> 
                </html>';
        $mail = new PHPMailer(true);
        // configure an SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'xxxxxxxxxx@xxxxx.com';
        $mail->Password = 'xxxxxxxxxxxxxx';

        $mail->setFrom('confirmation@testemail.com', 'Registration Confirmation Email');
        $mail->addAddress($email, 'User');
        $mail->Subject = 'Thanks for Registering with us!!';
        // Set HTML
        $mail->isHTML(TRUE);
        $mail->Body = $html;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            die();
        }
    }
}
