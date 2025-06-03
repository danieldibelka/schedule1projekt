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
    // Získání dat z formuláře
    // Zde se očekává, že pole 'id' přijde z formuláře
    $id = $_POST['id']; // <--- Řádek 22 (nebo kolem něj), který hlásí chybu Undefined index

    $name = $_POST['name'];
    $type = $_POST['type'];
    $level = $_POST['level'];
    $cost_per_H = $_POST['cost_per_H'];
    $address = $_POST['address'];

    // Příprava SQL dotazu pro vložení dat do tabulky 'workers'
    // Počet sloupců a otazníků se musí shodovat! (6 sloupců, 6 otazníků)
    $sql = "INSERT INTO workers (id, name, type, level, cost_per_H, address) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Důležitá kontrola: Zkontrolujeme, zda prepare() proběhlo úspěšně
    if ($stmt === false) {
        die("Chyba při přípravě dotazu: " . $conn->error);
    }

    // 'issiis' - integer (pro id), string, string, integer, integer, string
    // Typy a pořadí proměnných musí odpovídat SQL dotazu!
    $stmt->bind_param("issiis", $id, $name, $type, $level, $cost_per_H, $address);

    if ($stmt->execute()) {
        echo "Nový pracovník úspěšně přidán.";
    } else {
        echo "Chyba při vkládání pracovníka: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Formulář pro pracovníka nebyl odeslán POST metodou.";
}

$conn->close();
?>