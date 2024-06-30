<?php
// Conexão com o banco de dados (substitua pelos seus dados de conexão)
include("db.php");

// Query SQL para selecionar dados do usuário com o ID especificado
$sql = "SELECT * FROM user";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Monta um array associativo com os dados do usuário
    $dados_usuario = $resultado->fetch_assoc();

    // Retorna os dados do usuário como JSON
    header('Content-Type: application/json');
    echo json_encode($dados_usuario);
} else {
    // Retorna um JSON indicando que o usuário não foi encontrado
    $resposta = array('mensagem' => 'Usuário não encontrado');
    header('Content-Type: application/json');
    echo json_encode($resposta);
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
