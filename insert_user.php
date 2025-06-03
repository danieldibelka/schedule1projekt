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
    $address = $_POST['address'];
    $weed_quality_requieremt = $_POST['weed_quality_requieremt'];
    $addiction = $_POST['addiction'];
    $pref_effect = $_POST['pref_effect'];

    // Příprava SQL dotazu pro vložení dat do tabulky 'users'
    // POZOR: Počet sloupců a otazníků se musí shodovat! (6 sloupců, 6 otazníků)
    $sql = "INSERT INTO users (id, name, address, weed_quality_requieremt, addiction, pref_effect) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Důležitá kontrola: Zkontrolujeme, zda prepare() proběhlo úspěšně
    if ($stmt === false) {
        die("Chyba při přípravě dotazu: " . $conn->error);
    }

    // 'issiis' - integer (id), string, string, string, integer, string
    // POZOR: Typy a pořadí proměnných musí odpovídat SQL dotazu!
    $stmt->bind_param("isssis", $id, $name, $address, $weed_quality_requieremt, $addiction, $pref_effect);

    if ($stmt->execute()) {
        echo "Nový uživatel úspěšně přidán.";
    } else {
        echo "Chyba při vkládání uživatele: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Formulář pro uživatele nebyl odeslán POST metodou.";
}

$conn->close();
?>