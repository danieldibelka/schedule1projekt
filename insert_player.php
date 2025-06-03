<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sfw_projekt";

// Vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení k databázi selhalo: " . $conn->connect_error);
}

// Nastavení kódování na UTF-8 pro české znaky
$conn->set_charset("utf8mb4");

// Zkontrolovat, zda jsou data z formuláře odeslána (přes POST)
// Tímto se zabrání chybě "Undefined index" při přímém přístupu na stránku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře (metoda POST)
    // Před vložením do databáze je vhodné data validovat a případně ošetřit
    $nickname = $_POST['nickname'];
    $rank = $_POST['rank'];
    $ingame_time = $_POST['ingame_time'];
    $num_achievment = $_POST['num_achievment'];
    $money = $_POST['money'];
    $location = $_POST['location'];

    // Příprava a provedení SQL dotazu pro vložení dat
    // Používáme prepared statements pro zamezení SQL injection a správné zpracování znaků
    $sql = "INSERT INTO players (nickname, rank, ingame_time, num_achievment, money, location) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    // 'ssiiis' - specifikuje typy proměnných: string, string, integer, integer, integer, string
    $stmt->bind_param("ssiiis", $nickname, $rank, $ingame_time, $num_achievment, $money, $location);

    if ($stmt->execute()) {
        echo "Nový hráč úspěšně přidán.";
        // Volitelně přesměrovat uživatele zpět na stránku s hráči
        // header("Location: players.php");
        // exit();
    } else {
        echo "Chyba při vkládání hráče: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Formulář nebyl odeslán POST metodou.";
}

$conn->close();
?>