<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$database = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recebe os dados da intolerância ou alergia selecionada pelo usuário
$intolerance = $_POST['intolerance']; // Supondo que os dados são enviados via POST

// Recebe o código de barras escaneado pelo usuário
$barcode = $_POST['barcode']; // Supondo que os dados são enviados via POST

// Consulta ao banco de dados para verificar a presença de ingredientes relacionados
$sql = "SELECT * FROM alimentos WHERE codigo_barras = '$barcode' AND ingredientes LIKE '%$intolerance%'";
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Alimento encontrado, exiba uma mensagem adequada ou execute a lógica desejada
    echo "Este alimento contém ingredientes relacionados à sua intolerância ou alergia alimentar.";
} else {
    // Alimento não encontrado ou seguro para consumo
    echo "Este alimento não contém ingredientes relacionados à sua intolerância ou alergia alimentar.";
}

$conn->close();
?>
