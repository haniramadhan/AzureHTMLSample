<html>
<head>
<Title>Buku Teleponku</Title>
</head>
<body>
<h1>Halo</h1>
<p>Masukkan nama dan nomor telepon Saudara untuk mengisi buku telepon saya! Lalu, klik  <strong>Kirim</strong> untuk menyimpan.</p>
<form method="post" action="index.php">
       Nama <input type="text" name="name" id="name"/></br></br>
       No. Ponsel <input type="text" name="phone" id="phone"/></br></br>
       <input type="submit" name="submit" value="Submit" />
       <!--<input type="submit" name="load_data" value="Load Data" />-->
 </form>
 <?php
    $host = "hani-dicoding-sql.database.windows.net/";
    $user = "hani";
    $pass = "àç_è-('\"é&Bismi";
    $db = "hani-dicoding-sql";
    $connectionOptions = array(
        "Database" => "hani-dicoding-sql", // update me
        "Uid" => "hani", // update me
        "PWD" => "àç_è-('\"é&Bismi" // update me
    );
    try {
        //$conn = sqlsrv_connect($host, $connectionOptions);
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        //if($conn === false)
		//{
		//    die(print_r(sqlsrv_errors(), true));
		//}
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
 ?>
 </body>
 </html>