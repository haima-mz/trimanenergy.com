<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "haimakombath8@gmail.com";      // Change to your email

    $mailSubject = "Website Contact: " . $subject;

    $mailBody = "
    Name: $name

    Email: $email

    Message:
    $message
    ";

    $headers = "From: noreply@trimanenergy.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if(mail($to, $mailSubject, $mailBody, $headers)){
        echo json_encode([
            "status"=>"success",
            "message"=>"Thank you! Your message has been sent."
        ]);
    }else{
        echo json_encode([
            "status"=>"error",
            "message"=>"Unable to send email."
        ]);
    }

} else {

    echo json_encode([
        "status"=>"error",
        "message"=>"Invalid request."
    ]);
}
?>