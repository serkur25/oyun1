<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oyun Detayları</title>
        <link rel="stylesheet" href="style.css">
        <style>
        body {
            background-color: #333;
            color: white;
            font-family: Arial, sans-serif;
        }

        .menu-bar ul {
            list-style-type: none;
            padding: 0;
        }

        .menu-bar ul li {
            display: inline;
            margin-right: 10px;
        }

        .menu-bar ul li a {
            color: white;
            text-decoration: none;
        }

        .oyun-detay {
            text-align: center;
            margin-top: 20px;
        }

        .oyun-detay img {
            max-width: 100%;
            height: auto;
        }
        </style>
    </head>

    <body>
        <div class="menu-bar">
            <ul>
                <li><a href="index.php">AnaSayfa</a></li>
                <li><a href="#">Oyun İncelemeleri</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="#">Aksiyon Oyunları</a></li>
                            <li><a href="#">Savaş Oyunları</a></li>
                            <li><a href="#">Macera Oyunları</a></li>
                            <li><a href="#">Online Oyunlar</a></li>
                            <li><a href="#">Yarış Oyunları</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Kategoriler</a></li>
                <li><a href="#">Haberler</a></li>
                <li><a href="#">Giriş Sayfası</a></li>
            </ul>
        </div>

        <div class="oyun-detay">
            <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "oyun_incelemeleri";

        // Bağlantıyı oluştur
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Bağlantıyı kontrol et
        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);

            $sql = "SELECT resim_url, baslik, detayli_aciklama FROM oyunlar WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Veriyi göster
                while($row = $result->fetch_assoc()) {
                    echo '<div class="oyun">';
                    echo '<img src="' . $row["resim_url"] . '" alt="' . $row["baslik"] . '">';
                    echo '<h2>' . $row["baslik"] . '</h2>';
                    echo '<p>' . $row["detayli_aciklama"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Bu oyun bulunamadı.";
            }
        } else {
            echo "Geçersiz istek. Lütfen doğru bir oyun ID'si sağlayın.";
        }
        $conn->close();
        ?>
        </div>
    </body>

</html>