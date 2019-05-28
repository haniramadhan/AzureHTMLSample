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
    $user = "hani@hani-dicoding-sql";
    $pass = "321321Bismi-";
    $db = "hani-dicoding-sql";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


        $sql_select = "SELECT * FROM PHONEBOOK";    
        $stmt = $conn->query($sql_select);  
        $book = $stmt->fetchAll();  
        echo gettype($book);
        echo count($book);
        for($p=0;$p<count($book);$p++)
            echo $book[$p];
        if(count($book) ==  0) {  
            echo "HALO <br/>";
            echo count($book);
            echo "<h2>Kontak Anda:</h2>";   
            echo "<table>"; 
            echo "<tr><th>Nama</th>";   
            echo "<th>No. Telepon</th></tr>";   
            for ($iContact = 0; $iContact <count($book); $iContact++) {
                echo "The number is: $iContact <br>";
            } 
            echo "</table>";    
        } else {    
            echo "<h3>No one is currently registered.</h3>";    
        }     
        $pid = count($book);    
        $name = $_POST['nama'];     
        $phone = $_POST['phone']; 
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

    if (isset($_POST['submit'])) {
        try {	
            // Insert data	
            
            $sql_insert = "INSERT INTO PHONEBOOK (pid, name, phone) 	
                        VALUES (?,?,?)";	
            $stmt = $conn->prepare($sql_insert);	
            $stmt->bindValue(1, $pid);	
            $stmt->bindValue(2, $name);	
            $stmt->bindValue(3, $phone);	
            $stmt->execute();	
            
            
         } catch(Exception $e) {	
            echo "Failed: " . $e;	
        }
    }

 ?>
 </body>
 </html>