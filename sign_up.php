<!DOCTYPE html>
<html lang="en-us">
    <head>
    <link rel="stylesheet" href="style_main.css"> <!--Referenz zu style.css-->
    <style>
        body{ /*Defaultcursor, Hintergrund- und Schriftfarbe*/
            cursor: url('images/cursor.png'), auto;
            background-color: #0a1010;
            color: GhostWhite;
        } 
	/*Farben der Links auf dieser Seite*/
        a:link {
            color: LavenderBlush;
            background-color: transparent;
            text-decoration: none;
        }                   
        a:visited {
            color: #ffccdd;
            background-color: transparent;
            text-decoration: none;
        }
        a:hover, a:active {
            color: #ffe6ee;
            background-color: transparent;
            text-decoration: none;
        }
        form { /*Schriftart im Formular*/
            font-family: Win95;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SIGN UP</title>
    </head>
    <body>
        <header> <!--Siehe style.css-->
            <h1>THE BOX</h1> <!--Siehe style.css-->
        </header>
        <h2 style= "text-align: center; font-family: Sysfont;">Sign Up</h2> <!--Untertitel, zentriert-->
	    <br>
	<!--PHP Formular für das Registrieren. Funktionieren tut es nicht-->
        <form action="sign_up.php" method="post">
        Name: <br>
        <input type="text" name="vorname" size="20" maxlength="30" />
        <br>
        Surname: <br>
        <input type="text" name="nachname" size="20" maxlength="30" /><br />
        E-Mail: <br>
        <input type="text" name="email" size="20" maxlength="30" />
        <br>
        Phone: <br>
        <input type="text" name="telefon" size="20" maxlength="30" />
        <br>
        <input type="submit" value="Register" / style="font-family: Win95">
        </form>
        <footer> <!--Siehe style.css-->
            <hr color=LavenderBlush> <!--Querstrich über dem Footer-->
            <div style="margin-left: 6px"> <!--Links sollen 6px weg vom Rand sein-->
                <a href="archive.html">Archive</a> <!--Zum Archiv-->
                <a href="about_us.html">About Us</a> <!--Zu About Us-->
            </div>
        </footer>
	    </div>
        <?php 
    $database = array();
    $database['host'] = 'localhost';
    $database['port'] = '3306';
    $database['name'] = 'forum';
    $database['vorname'] = 'root';
    $database['nachname'] = 'root';
    $database['database'] = 'forum';

    $mysqli = new mysqli($database['host'], $database['username'], $database['password'], $database['database']);

    if ($mysqli-> connect_errno) {
        echo "Connection to the database: ".$database['name'] . ' failed';
        echo 'Error : '.mysql_error();
    } 
            $username = $_POST['username'];
            $kommentar = $_POST['kommentar'];

            $sql = "INSERT INTO forum.users(vorname, nachname) VALUES ('$vorname', '$nachname');";

            mysqli_query($mysqli, $sql);

            $query = "SELECT * FROM users  ORDER BY id DESC";


            echo '<table border="0" cellspacing="2" cellpadding="2"> 
                    <tr> 
                        <th> <font face="Helvetica">Name</font> </th> 
                        <th> <font face="Helvetica">Kommentar</font> </th> 
                    </tr>';

            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $username = $row["vorname"];
                    $kommentar = $row["nachname"];
                     echo ' <tr> 
                               <td>'.$vorname.'</td>
                              <td>'.$nachname.'</td>
                            </tr>';
                }
            }
            echo '</table>'
        ?>
    </div>
    </body>
</html>
