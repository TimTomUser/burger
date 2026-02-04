<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { 
     http_response_code(200);
    exit();
}


    if ($_SERVER['REQUEST_METHOD'] == "GET") {


     $database = new mysqli("db", "root", "root", "burger_bdd");
    mysqli_set_charset($database, "utf8mb4");

    // $menunav = $database->execute_query("SELECT * FROM article")->fetch_all(MYSQLI_ASSOC);
    $header = $database->execute_query("SELECT id, sous_titre, photoUrl FROM article WHERE id = 1")->fetch_all(MYSQLI_ASSOC);
    $aboutus = $database->execute_query("SELECT id, titre, sous_titre FROM article WHERE id = 2")->fetch_all(MYSQLI_ASSOC);
    $hotdeals = $database->execute_query("SELECT id, titre, sous_titre, photoUrl, content FROM article WHERE id = 3")->fetch_all(MYSQLI_ASSOC);
    // $menu = $database->execute_query("SELECT * FROM contact")->fetch_all(MYSQLI_ASSOC);
    // $avis = $database->execute_query("SELECT * FROM header")->fetch_all(MYSQLI_ASSOC);
    // $video = $database->execute_query("SELECT * FROM services")->fetch_all(MYSQLI_ASSOC);

    $arrayFinal = [
        // "menunav" => $menunav,
        "header" => $header,
        "aboutus" => $aboutus,
        "hotdeals" => $hotdeals

    ];

    echo json_encode(["monHeader" => $header]);   
//    return 0;    
}    

                    // }
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Le token doit être long d'au moins 30 caractères, j'ai eu des erreurs si il était trop court 
$secret = "tw8e3GT9ZcttMz93tOlE7SUqE2gIlH6bDLGQnAuJEp4ncfnUSL";

$payload = [
  'iss' => 'mon-angular-app', // Qui appelle
  'aud' => 'exercice-api', // Qui reçoit
  'iat' => time(),
  'exp' => time() + (3600 * 24 * 180) // Expiration au bout de 6 mois
];
$jwt = JWT::encode($payload, $secret, 'HS256');

echo json_encode(["token" => $jwt]);




$host = 'db';
$db   = 'burger_bdd';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options, 8081);


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

}

    if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST'){http_response_code($code);}





                        // Configuration MailPit
                        $mail->Host       = '192.168.56.56';
                        $mail->Port       = 1025;
                        $mail->SMTPAuth   = false;
                        $mail->SMTPSecure = '';

                        // Qui envoie
                        $mail->setFrom('noreply@monappli.com', 'Mon App');
                        $mail->addAddress($_POST['email']);

                        // Contenu
                        $mail->Subject = $_POST['email'] . " vous êtes maintenant inscris a la newsletter:";
                        $message = "Bienvenue, ";
                        $mail->Body    = $message . $_POST['message'];

                        // Envoyer
                        if ($mail->send()) {
                            $stmt = $pdo->prepare("INSERT INTO demande ( email) VALUES (?)");
                            $stmt->execute(
                                array(
                                    $_POST['email']
                                )
                            );


                            echo json_encode(['status' => 'success', 'message' => 'Email envoyé']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Votre e-mail n\'est pas parti']);
                        }
