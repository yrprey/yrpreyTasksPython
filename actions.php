<?php

include 'db.php';

$user_id = 1;

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        $name = $_POST['name'];
		$query= "INSERT INTO tasks (id, user_id, name, status) VALUES (NULL, '$user_id', '$name', '$action')";
		if (!$mysqli->query($query)) {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }
        $id = $mysqli->insert_id;
        echo json_encode(['success' => true]);
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $stmt = $mysqli->prepare("UPDATE tasks SET name = ? WHERE user_id = ? AND id = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }
        $stmt->bind_param('sii', $name, $user_id, $id);
        $stmt->execute();
        echo json_encode(['success' => true]);
        break;
    case 'delete':
        $id = $_POST['id'];
        $stmt = $mysqli->prepare("DELETE FROM tasks WHERE user_id = ? AND id = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }
        $stmt->bind_param('ii', $user_id,$id);
        $stmt->execute();
        echo json_encode(['success' => true]);
        break;
    case 'toggle':
        $id = $_GET['id'];
        $status = $_GET['status'] === 'pending' ? 'completed' : 'pending';
        $stmt = $mysqli->prepare("UPDATE tasks SET status = ? WHERE user_id = ? AND id = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }
        $stmt->bind_param('sii', $status, $user_id, $id);
        $stmt->execute();
        echo json_encode(['success' => true]);
        break;
    case 'list':
        $status = $_GET['status'] ?? 'all';
        $query = "SELECT * FROM tasks";
        if ($status !== 'all') {
            $query .= " WHERE user_id = '$user_id' AND status = '$status'";
        }
        $result = $mysqli->query($query);
        if ($result === false) {
            die('Query failed: ' . htmlspecialchars($mysqli->error));
        }
        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            // Decodificar os caracteres especiais antes de retornar os dados
            $row['name'] = htmlspecialchars_decode($row['name'], ENT_QUOTES);
            $tasks[] = $row;
        }
        echo json_encode($tasks);
        break;
}
?>
