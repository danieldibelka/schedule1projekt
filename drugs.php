<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drogy a Efekty | Váš Databázový Projekt</title>
    
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
        <h1>Drogy a Efekty</h1>
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
            <h2>Seznam drog</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Název Drogy</th>
                        <th>ID Receptu</th>
                    </tr>
                </thead>
                <tbody>
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

                    $sql_drugs = "SELECT id, name, recepie_id FROM drugs";
                    $result_drugs = $conn->query($sql_drugs);

                    if ($result_drugs->num_rows > 0) {
                        while($row = $result_drugs->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"]. "</td>";
                            echo "<td>" . $row["name"]. "</td>";
                            echo "<td>" . $row["recepie_id"]. "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Žádné drogy v databázi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Možné efekty</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Efektu</th>
                        <th>Efekt</th>
                        <th>Síla Efektu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Připojení již existuje, používáme stávající $conn
                    $sql_effects = "SELECT id, effect, effect_strength FROM effects";
                    $result_effects = $conn->query($sql_effects);

                    if ($result_effects->num_rows > 0) {
                        while($row = $result_effects->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"]. "</td>";
                            echo "<td>" . $row["effect"]. "</td>";
                            echo "<td>" . $row["effect_strength"]. "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Žádné efekty v databázi.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
             <p>Spojení drog a efektů (data z tabulky `effect_drug`) by se zobrazovalo v detailu drog nebo v samostatné sekci, ale pro jednoduchost zde vypisujeme seznam drog a efektů samostatně.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Váš Projekt</p>
    </footer>
</body>
</html>