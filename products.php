<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkty | Váš Databázový Projekt</title>
    
        <meta name="description" content="Oficiální webová prezentace databáze SFW projektu. Zobrazte a spravujte data o hráčích, drogách, pracovnících, uživatelích, produktech, weedu a receptech v přehledných tabulkách.">
    <meta name="keywords" content="SFW projekt, databáze, UwAmp, hráči, drogy, pracovníci, uživatelé, produkty, weed, recepty, správa dat, webové rozhraní">
    <link rel="stylesheet" href="style.css">
    
    <meta property="og:title" content="SFW Projekt Databáze - Správa Dat">
    <meta property="og:description" content="Oficiální webová prezentace databáze SFW projektu. Zobrazte a spravujte data o hráčích, drogách, pracovnících, uživatelích, produktech, weedu a receptech v přehledných tabulkách.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://localhost/index.html"> <meta property="og:image" content="http://localhost/logo.png"> <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SFW Projekt Databáze - Správa Dat">
    <meta name="twitter:description" content="Oficiální webová prezentace databáze SFW projektu. Zobrazte a spravujte data o hráčích, drogách, pracovnících, uživatelích, produktech, weedu a receptech v přehledných tabulkách.">
    <meta name="twitter:image" content="http://localhost/logo.png">

    <link rel="canonical" href="http://localhost/index.html">
</head>
<body>
    <header>
        <h1>Seznam produktů</h1>
        <nav>
            <a href="index.html">Úvod</a>
            <a href="players.php">Hráči</a>
            <a href="drugs.php">Drogy a Efekty</a>
            <a href="workers.php">Pracovníci</a>
            <a href="users.php">Uživatelé</a>
            <a href="products.php">Produkty</a>
            <a href="weed.php">Weed</a>
            <a href="insert_data.php">Vložit data</a>
        </nav>
    </header>

    <main>
        <section>
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

            $sql = "SELECT id, name, cost FROM product"; // SELECT z tabulky 'product'
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr><th>ID</th><th>Název</th><th>Cena</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                // Výpis dat z každého řádku
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["cost"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Žádné produkty nebyly nalezeny v databázi.</p>";
            }

            $conn->close();
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Váš Projekt</p>
    </footer>
</body>
</html>