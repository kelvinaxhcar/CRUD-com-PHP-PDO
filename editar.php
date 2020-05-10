<?php
$id = $_GET["id"];
  $pdo = new PDO('mysql:host=localhost;dbname=alunos', 'root', null);
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consulta = $pdo->query("SELECT * FROM aluno WHERE id = $id;");
  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
echo "
      <h1>Cadastro</h1>
      <form action='gravar.php' method='post'>
      <input type='hidden' name='id' value='".$linha['id']."'>
	  <p>Nome:<input type='text' name='nome' value='".$linha['nome']."' maxlength='30'><img src=\"imgs/lupa.jpg\" onClick=\"location.href='busca.php?nome='+nome.value;\"></p>
	  <p>E-mail:<input type='text' name='email' value='".$linha['email']."' maxlength='30'></p>
	  <p>Curso:<input type='text' name='curso' value='".$linha['curso']."' maxlength='30'></p>
	  <hr>
	  <p><input type='submit' name='btGravar' value='Gravar'><!--<a href='busca.php'>Buscar</a>-->
      </form>
";
}
?>