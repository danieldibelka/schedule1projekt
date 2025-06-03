<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vložit data | Váš Databázový Projekt</title>
    
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
        <h1>Vložit nová data</h1>
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
            <h2>Vyberte, co chcete vložit:</h2>
            <p>
                <a href="insert_data.php?type=player">Nový hráč</a> |
                <a href="insert_data.php?type=worker">Nový pracovník</a> |
                <a href="insert_data.php?type=user">Nový uživatel</a> |
                <a href="insert_data.php?type=product">Nový produkt</a> |
                <a href="insert_data.php?type=weed">Nový druh Weedu</a>
            </p>

            <?php
            $form_type = isset($_GET['type']) ? $_GET['type'] : '';

            if ($form_type == 'player') {
                ?>
                <h3>Přidat nového hráče</h3>
                <form action="insert_player.php" method="post">
                    <label for="nickname">Přezdívka:</label><br>
                    <input type="text" id="nickname" name="nickname" required><br><br>

                    <label for="rank">Rank:</label><br>
                    <input type="text" id="rank" name="rank" required><br><br>

                    <label for="ingame_time">Čas ve hře (hodiny):</label><br>
                    <input type="number" id="ingame_time" name="ingame_time" required><br><br>

                    <label for="num_achievment">Počet achievementů:</label><br>
                    <input type="number" id="num_achievment" name="num_achievment" required><br><br>

                    <label for="money">Peníze:</label><br>
                    <input type="number" id="money" name="money" required><br><br>

                    <label for="location">Lokace:</label><br>
                    <input type="text" id="location" name="location" required><br><br>

                    <input type="submit" value="Přidat hráče">
                </form>
                <?php
            } elseif ($form_type == 'worker') {
                ?>
                <h3>Přidat nového pracovníka</h3>
                <form action="insert_worker.php" method="post">
                    <label for="worker_id">ID Pracovníka:</label><br>
                    <input type="number" id="worker_id" name="id" required><br><br> <label for="worker_name">Jméno:</label><br>
                    <input type="text" id="worker_name" name="name" required><br><br>

                    <label for="worker_type">Typ:</label><br>
                    <input type="text" id="worker_type" name="type" required><br><br>

                    <label for="worker_level">Úroveň:</label><br>
                    <input type="number" id="worker_level" name="level" required><br><br>

                    <label for="worker_cost_per_H">Cena/hod:</label><br>
                    <input type="number" id="worker_cost_per_H" name="cost_per_H" required><br><br>

                    <label for="worker_address">Adresa:</label><br>
                    <input type="text" id="worker_address" name="address" required><br><br>

                    <input type="submit" value="Přidat pracovníka">
                </form>
                <?php
            } elseif ($form_type == 'user') {
                 ?>
                <h3>Přidat nového uživatele</h3>
                <form action="insert_user.php" method="post">
                    <label for="user_id">ID Uživatele:</label><br>
                    <input type="number" id="user_id" name="id" required><br><br> <label for="user_name">Jméno:</label><br>
                    <input type="text" id="user_name" name="name" required><br><br>

                    <label for="user_address">Adresa:</label><br>
                    <input type="text" id="user_address" name="address" required><br><br>

                    <label for="user_weed_quality_requieremt">Požadavek na kvalitu Weedu:</label><br>
                    <input type="text" id="user_weed_quality_requieremt" name="weed_quality_requieremt" required><br><br>

                    <label for="user_addiction">Závislost:</label><br>
                    <input type="number" id="user_addiction" name="addiction" required><br><br>

                    <label for="user_pref_effect">Preferovaný Efekt:</label><br>
                    <input type="text" id="user_pref_effect" name="pref_effect" required><br><br>

                    <input type="submit" value="Přidat uživatele">
                </form>
                <?php
            } elseif ($form_type == 'product') {
                 ?>
                <h3>Přidat nový produkt</h3>
                <form action="insert_product.php" method="post">
                    <label for="product_id">ID Produktu:</label><br>
                    <input type="number" id="product_id" name="id" required><br><br> <label for="product_name">Název:</label><br>
                    <input type="text" id="product_name" name="name" required><br><br>

                    <label for="product_cost">Cena:</label><br>
                    <input type="number" id="product_cost" name="cost" required><br><br>

                    <input type="submit" value="Přidat produkt">
                </form>
                <?php
            } elseif ($form_type == 'weed') {
                 ?>
                <h3>Přidat nový druh Weedu</h3>
                <form action="insert_weed.php" method="post">
                    <label for="weed_id">ID Weedu:</label><br>
                    <input type="number" id="weed_id" name="id" required><br><br> <label for="weed_name">Název:</label><br>
                    <input type="text" id="weed_name" name="name" required><br><br>

                    <label for="weed_prod_cost">Výrobní náklady:</label><br>
                    <input type="number" id="weed_prod_cost" name="prod_cost" required><br><br>

                    <label for="weed_water_needs">Potřeba vody:</label><br>
                    <input type="number" id="weed_water_needs" name="water_needs" required><br><br>

                     <label for="weed_grow_difficulty">Obtížnost pěstování:</label><br>
                    <input type="number" id="weed_grow_difficulty" name="grow_difficulty" required><br><br>

                    <label for="weed_light_needs">Potřeba světla:</label><br>
                    <input type="number" id="weed_light_needs" name="light_needs" required><br><br>

                    <input type="submit" value="Přidat Weed">
                </form>
                <?php
            } else {
                echo "<p>Zvolte prosím typ dat, která chcete vložit do databáze kliknutím na jeden z odkazů výše.</p>";
            }
            ?>

        </section>
    </main>

    <footer>
        <p>&copy; 2024 Váš Projekt</p>
    </footer>
</body>
</html>