<?php
$id    = $_POST["id"];
$nome  = $_POST["nome"];
$email = $_POST["email"];
$curso = $_POST["curso"];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=alunos', 'root', null);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('UPDATE aluno SET nome = :nome, email = :email, curso = :curso WHERE id = :id');
  $stmt->execute(array(
    ':id'   => $id,
    ':nome' => $nome,
    ':email' => $email,
    ':curso' => $curso
  ));
     //echo $stmt->rowCount();
  echo ("<script>alert('Dados atualizados com sucesso.');window.location.assign('index.html');</script>"); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  echo ("<script>alert('Erro ao tentar atualizar dados.');window.location.assign('index.html');</script>");
}
?>