<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $polaczenie = mysqli_connect("localhost", "root", "", "wedkowanie");
                    if (!$polaczenie) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
                    $wynik = mysqli_query($polaczenie, $sql);

                    if (mysqli_num_rows($wynik) > 0) {
                        while($row = mysqli_fetch_array($wynik)) {
                            echo "<li> ".$row[0]." pływa w rzece ".$row[1].", ".$row[2]."</li>";
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($polaczenie);
                ?>
            </ol>
    </main>
    <nav>
    <img src="ryba1.jpg" alt="Sum">
    <p><a href="">Pobierz kwerendy</a></p>
        </nav>
    <aside>
    <section>
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.P.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
                <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "wedkowanie");
                    $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
                    $wynik = mysqli_query($polaczenie, $sql);

                    while($row = mysqli_fetch_array($wynik)) {
                        echo "<tr>";
                            echo "<td>".$row[0]."</td>";
                            echo "<td>".$row[1]."</td>";
                            echo "<td>".$row[2]."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
    </aside>
    <footer>
        <p>Stronę wykonał: Adrian Szostek</p>
    </footer>
</body>
</html>