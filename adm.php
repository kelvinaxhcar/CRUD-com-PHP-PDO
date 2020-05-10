<?php
$nome  = $_POST["nome"];
$email = $_POST["email"];
$curso = $_POST["curso"];
//echo("$nome, $email, $curso");

try {
  $pdo = new PDO('mysql:host=localhost;dbname=alunos', 'root', null);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('INSERT INTO aluno VALUES (:id,:nome,:email,:curso)');
  $stmt->execute(array(
  	':id'    => null,
    ':nome'  => $nome,
    ':email' => $email,
    ':curso' => $curso
  ));
   
  echo ("<script>alert('Dados registrados com sucesso.');window.location.assign('index.html');</script>");  
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>