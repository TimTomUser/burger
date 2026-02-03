<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Authorization");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// header("Access-Control-Allow-Headers: Authorization, Content-Type,Accept, Origin");
//   header('Content-Type: text/html; charset=utf-8');
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: Authorization, Content-Type, Origin");
// // Allow specific methods (GET, POST, etc.)
// header("Access-Control-Allow-Methods: GET, OPTIONS");

// Allow specific headers (important if you send JSON or Auth tokens)


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { 
     http_response_code(200);
    exit();
}

$token = $_SERVER['HTTP_AUTHORIZATION'];

if (!$token) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(['error' => 'Token manquant']);
    exit();
}

if ($token !== "VBnAzKpOLlf5DZSNpNuXJmvg4") {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(['error' => 'Token invalide']);
    exit();
}

    if ($_SERVER['REQUEST_METHOD'] == "GET") {


     $database = new mysqli("localhost", "root", "root", "burger_bdd");
    mysqli_set_charset($database, "utf8mb4");

    // $menunav = $database->execute_query("SELECT * FROM article")->fetch_all(MYSQLI_ASSOC);
    $header = $database->execute_query("SELECT id, sous_titre, photoUrl FROM article WHERE id = 1")->fetch_all(MYSQLI_ASSOC);
    $aboutus = $database->execute_query("SELECT id, titre, sous_titre FROM article WHERE id = 2")->fetch_all(MYSQLI_ASSOC);
    $hotdeals = $database->execute_query("SELECT id, titre, sous_titre, photoUrl, content FROM article WHERE id = 3")->fetch_all(MYSQLI_ASSOC);
    // $menu = $database->execute_query("SELECT * FROM contact")->fetch_all(MYSQLI_ASSOC);
    // $avis = $database->execute_query("SELECT * FROM header")->fetch_all(MYSQLI_ASSOC);
    // $video = $database->execute_query("SELECT * FROM services")->fetch_all(MYSQLI_ASSOC);

    $arrayFinal = array(
        // "menunav" => $menunav,
        "header" => $header,
        "aboutus" => $aboutus,
        "hotdeals" => $hotdeals
        // "menu" => $menu,
        // "avis" => $avis,
        // "video" => $video,

    );

    echo json_decode($arrayFinal);   
//    return 0;    
}    
// Traiter la preflight request en PREMIER
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     http_response_code(200);
//     header('Content-Type: text/html; charset=utf-8');
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Accept, Origin');
    // exit();
// }

                // // inclusion des packages installés avec Composeer
                // require 'vendor/autoload.php';

                // use PHPMailer\PHPMailer\PHPMailer;
                // use Firebase\JWT\JWT;
                // use Firebase\JWT\Key;

                // // Le token en lui-même, en dur certes mais côté back
                // $secret = 'tw8e3GT9ZcttMz93tOlE7SUqE2gIlH6bDLGQnAuJEp4ncfnUSL';

// Si on n'a pas de header "Authorization" alors on coupe court et on renvoie une 401
// $headers = getallheaders();
                // // if (!isset($headers['Authorization'])) {
                // //     http_response_code(401);
                // //     exit('Token manquant');
                // // }

                // // On supprime le mot-clé "Bearer" qui vient avec le Token
                // $token = str_replace('Bearer ', '', $headers['Authorization']);

                // // Et on essaie de décoder le JWT pour retomber sur notre clé secrète.
                // // try {
                //     $decoded = JWT::decode($token, new Key($secret, 'HS256'));
                //     // Si la cible du JWT décodé n'est pas la bonne, c'est que la clé n'était pas bonne, on renvoie une erreur
                //     if ($decoded->aud !== 'exercice-api') {
                //         throw new Exception('Audience invalide');
                //     }
// } catch (Exception $e) {
//     http_response_code(403);
//     exit('Token invalide');
// }




// $host = 'localhost';
// $db   = 'burger_bdd';
// $user = 'root';
// $pass = 'root';
// $charset = 'utf8mb4';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// $pdo = new PDO($dsn, $user, $pass, $options, 8081);


// Si on est en POST alors c'est qu'on veut réceptionner le formulaire donc on envoi le mail
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     // $mail = new PHPMailer();
//     // $mail->CharSet = 'UTF-8';
//     // $mail->Encoding = 'base64';

// }

    // Connexion à la base de données
   
    // Cors Policity Error: It does not have HTTP ok status
    // if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST'){http_response_code($code);}





                    //     // Configuration MailPit
                    //     $mail->Host       = '192.168.56.56';
                    //     $mail->Port       = 1025;
                    //     $mail->SMTPAuth   = false;
                    //     $mail->SMTPSecure = '';

                    //     // Qui envoie
                    //     $mail->setFrom('noreply@monappli.com', 'Mon App');
                    //     $mail->addAddress($_POST['email']);

                    //     // Contenu
                    //     $mail->Subject = $_POST['nom'] . " vous a envoyé un message : " . $_POST['sujet'];
                    //     $message = $_POST['nom'] . ", en provenance de " . $commune . " dans le/la " . $departement . " (" . $region . ") vous a écrit ce message : ";
                    //     $mail->Body    = $message . $_POST['message'];

                    //     // Envoyer
                    //     if ($mail->send()) {
                    //         $stmt = $pdo->prepare("INSERT INTO demande (sujet, nom, email, commune, departement, region, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    //         $stmt->execute(
                    //             array(
                    //                 $_POST['sujet'],
                    //                 $_POST['nom'],
                    //                 $_POST['email'],
                    //                 $commune,
                    //                 $departement,
                    //                 $region,
                    //                 $_POST['message']
                    //             )
                    //         );


                    //         echo json_encode(['status' => 'success', 'message' => 'Email envoyé']);
                    //     } else {
                    //         echo json_encode(['status' => 'error', 'message' => 'Votre e-mail n\'est pas parti']);
                    //     }
                    // } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    //     // Ici on est en GET alors on veut renvoyer la liste des demandes
                    //     $resultat = $pdo->query("SELECT * FROM demande ORDER BY id DESC")->fetchAll();
                    //     echo json_encode($resultat);
                    // }
// }