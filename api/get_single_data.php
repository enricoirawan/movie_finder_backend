<?php 
  require_once('../include/db.php');
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM movies WHERE movie_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ":id" => $id,
    ]);

    $response = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($response);
  }
