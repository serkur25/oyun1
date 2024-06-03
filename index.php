<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oyun İncelemeleri</title>
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

        .oyunlar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .oyun {
            position: relative;
            width: 200px;
            /* Sabit genişlik */
            height: 300px;
            /* Sabit yükseklik */
            overflow: hidden;
            margin: 10px;
        }

        .oyun img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Resmin tam olarak sığması için */
        }

        .oyun h2,
        .oyun p {
            text-align: center;
            color: white;
        }

        .oyun .tur {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 5px;
            display: none;
        }

        .oyun:hover img {
            filter: brightness(50%);
        }

        .oyun:hover .tur {
            display: block;
        }

        .oyun a {
            color: white;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 5px;
        }
        </style>
    </head>

    <body>
        <div class="menu-bar">
            <ul>
                <li class="active"><a href="#">AnaSayfa</a></li>
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

        <div class="oyunlar">
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

        $sql = "SELECT id, resim_url, baslik, aciklama, tur FROM oyunlar";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Verileri div içinde göster
            while($row = $result->fetch_assoc()) {
                echo '<div class="oyun">';
                echo '<img src="' . $row["resim_url"] . '" alt="' . $row["baslik"] . '">';
                echo '<div class="tur">' . $row["tur"] . '</div>';
                echo '<h2>' . $row["baslik"] . '</h2>';
                echo '<p>' . $row["aciklama"] . '</p>';
                echo '<a href="detay.php?id=' . $row["id"] . '">Detaylı İnceleme</a>';
                echo '</div>';
            }
        } else {
            echo "Hiç oyun bulunamadı.";
        }
        $conn->close();
        ?>
        </div>
    </body>

</html>