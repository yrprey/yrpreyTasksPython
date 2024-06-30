<?php
if (isset($_COOKIE["user"])) {
  if (str_contains($_COOKIE["user"],"admin")) {
    $status = "administrator";
  }
  else {
    $status="";
  }
}
else {
    exit(header("location: index.php"));
}
$array = explode("-",$_COOKIE["user"]);
$admin = $array[1];
$user_id = $array[2];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
<?php
include("navbar.php");
?>
    <div class="container mt-5">
        <h1>Lista de Tarefas</h1>
        <div class="mb-3">
            <form id="taskForm">
                <div class="input-group">
                    <input type="text" class="form-control" id="taskName" placeholder="Nova tarefa" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" id="showAll">Todas</button>
            <button class="btn btn-secondary" id="showPending">Pendentes</button>
            <button class="btn btn-secondary" id="showCompleted">Concluídas</button>
        </div>
        <ul class="list-group" id="taskList">
            <!-- Tarefas serão carregadas aqui via Ajax -->
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="main.js"></script>
</body>
</html>
