<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "../../components/header.php" ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "prvni_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM zbozi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tbody>
                         <tr>
                            <th>ID</th>
                            <th>Název produktu</th>
                            <th>Cena za kus</th>
                            <th>Počet kusů</th>
                        </tr>";

        while($row = $result->fetch_assoc()) {
            echo        "<tr>".
                            "<td>" . $row["ID"]. "</td>".
                            "<td>" . $row["Název_produktu"]. "</td>".
                            "<td>" . $row["Cena_za_kus"]. "</td>".
                            "<td>" . $row["Počet_kusů"]. "</td>".
                        "</tr>";
        }
        echo "      </tbody>
                </table>";

        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
    <style>
        table{
            border: 1px solid black;

            th, td, tr{
                border: 1px solid black;
                text-align: center;
                background-color: red;
            }
        }

    </style>
</body>
</html>