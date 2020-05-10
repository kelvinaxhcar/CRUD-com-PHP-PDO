<?php 
$id = $_GET["id"]; 
//echo("$id");
try {
  $pdo = new PDO('mysql:host=localhost;dbname=alunos', 'root', null);
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('DELETE FROM aluno WHERE id = :id');
  $stmt->bindParam(':id', $id); 
  $stmt->execute();
     
  echo ("<a href='busca.php'>Voltar</a>"); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
echo("<script>alert('Dados excluidos com sucesso...');window.location.assign('index.html');</script>");
?>