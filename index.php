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
       <input type="submit" name="submit" value="Kirim" />
       <!--<input type="submit" name="load_data" value="Load Data" />-->
 </form>
 <?php
    $host = "tcp:hani-dicoding-sql.database.windows.net";
    $user = "hani";
    $pass = "321321Bismi-";
    $db = "hani-dicoding-sql";
    $connectionOptions = array(
        "Database" => "hani-dicoding-sql", // update me
        "Uid" => "hani@hani-dicoding-sql", // update me
        "PWD" => "321321Bismi-" // update me
    );
    try {
        //$conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        //$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn = sqlsrv_connect($host, $connectionOptions);
        if($conn === false)
		{
		    die(print_r(sqlsrv_errors(), true));
		}
    } catch(Exception $e) {
        echo "Failed: " . $e;
    } try {	
    	$sql_select = "SELECT * FROM PHONEBOOK";	
        $stmt = $conn->query($sql_select);	
        $book = $stmt->fetchAll(); 	
        $pid = count($book);	
         $name = $_POST['nama']; 	
        $phone = $_POST['phone'];	
        // Insert data	
        /*
        $sql_insert = "INSERT INTO PHONEBOOK (pid, name, phone) 	
                    VALUES (?,?,?)";	
        $stmt = $conn->prepare($sql_insert);	
        $stmt->bindValue(1, $pid);	
        $stmt->bindValue(2, $name);	
        $stmt->bindValue(3, $phone);	
        $stmt->execute();	
        */
   		echo "<h3>Data kontak Anda tersimpan dengan baik!</h3>";	
     	$sql_select = "SELECT * FROM PHONEBOOK";	
        $stmt = $conn->query($sql_select);	
        $e = $stmt->fetchAll(); 	
        $book = $stmt->fetchAll(); 	
        if(count($book) > 0) {	
            echo "<h2>Kontak Anda:</h2>";	
            echo "<table>";	
            echo "<tr><th>Nama</th>";	
            echo "<th>No. Telepon</th></tr>";	
            foreach($contact as $book) {	
                echo "<tr><td>".$contact['name']."</td>";	
                echo "<td>".$contact['phone']."</td></tr>";	
            }	
            echo "</table>";	
        } else {	
            echo "<h3>No one is currently registered.</h3>";	
        }	
     } catch(Exception $e) {	
        echo "Failed: " . $e;	
    }
 ?>
 </body>
 </html>