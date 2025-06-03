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
    $cost = $_POST['cost'];

    // Příprava SQL dotazu pro vložení dat do tabulky 'product'
    // POZOR: Počet sloupců a otazníků se musí shodovat! (3 sloupce, 3 otazníky)
    $sql = "INSERT INTO product (id, name, cost) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Důležitá kontrola: Zkontrolujeme, zda prepare() proběhlo úspěšně
    if ($stmt === false) {
        die("Chyba při přípravě dotazu: " . $conn->error);
    }

    // 'isi' - integer (id), string, integer
    // POZOR: Typy a pořadí proměnných musí odpovídat SQL dotazu!
    $stmt->bind_param("isi", $id, $name, $cost);

    if ($stmt->execute()) {
        echo "Nový produkt úspěšně přidán.";
    } else {
        echo "Chyba při vkládání produktu: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Formulář pro produkt nebyl odeslán POST metodou.";
}

$conn->close();
?>