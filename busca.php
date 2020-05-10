<?php
$nome = $_GET["nome"];
//header('Content-type: text/html; charset=iso-8859-1');
header('Content-Type: text/html; charset=utf-8');
$pdo = new PDO('mysql:host=localhost;dbname=alunos', 'root', null);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$consulta = $pdo->query("SELECT * FROM aluno;");
$consulta = $pdo->query("SELECT * FROM aluno WHERE nome LIKE '%$nome%'");
 
echo "<table border='1'>
            <tr>
               <td><center>Id</center></td>
               <td><center>Nome</center></td>
               <td><center>E-mail</center></td>
               <td><center>Curso</center></td>
               <td></td>
               <td></td>
             </tr>"; 
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>
               <td>{$linha['id']}</td>
               <td>{$linha['nome']}</td>
               <td>{$linha['email']}</td>
               <td>{$linha['curso']}</td>
               <td><a href=deletar.php?id={$linha['id']} onclick=\"return confirm('Tem certeza que deseja excluir o registro?'); return false;\"><img src='imgs/del.png' heigth='25' width='25'></a></td>
               <td><a href=editar.php?id={$linha['id']}><img src='imgs/edit.png' heigth='25' width='25'></a></td>
             </tr>
      ";
}
echo "</table><br><a href='index.html'>Cadastrar</a>"; 
?>