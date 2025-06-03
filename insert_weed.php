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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Získání dat z formuláře (včetně ID)
    $id = $_POST['id']; // POZOR NA ID
    $name = $_POST['name'];
    $prod_cost = $_POST['prod_cost'];
    $water_needs = $_POST['water_needs'];
    $grow_difficulty = $_POST['grow_difficulty'];
    $light_needs = $_POST['light_needs'];

    // Příprava SQL dotazu pro vložení dat do tabulky 'weed'
    // POZOR: Počet sloupců a otazníků se musí shodovat! (6 sloupců, 6 otazníků)
    $sql = "INSERT INTO weed (id, name, prod_cost, water_needs, grow_difficulty, light_needs) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Důležitá kontrola: Zkontrolujeme, zda prepare() proběhlo úspěšně
    if ($stmt === false) {
        die("Chyba při přípravě dotazu: " . $conn->error);
    }

    // 'isiiii' - integer (id), string, integer, integer, integer, integer
    // POZOR: Typy a pořadí proměnných musí odpovídat SQL dotazu!
    $stmt->bind_param("isiiii", $id, $name, $prod_cost, $water_needs, $grow_difficulty, $light_needs);

    if ($stmt->execute()) {
        echo "Nový druh Weedu úspěšně přidán.";
    } else {
        echo "Chyba při vkládání Weedu: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Formulář pro Weed nebyl odeslán POST metodou.";
}

$conn->close();
?>