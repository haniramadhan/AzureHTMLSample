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
       <input type="submit" name="show" value="Lihat Buku Telepon" />
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
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

    if (isset($_POST['submit'])) {
        try {	
            // Insert data	
            $sql_select = "SELECT * FROM PHONEBOOK";    
            $stmt = $conn->query($sql_select);  
            $book = $stmt->fetchAll();  
            $pid = count($book);    
            $name = $_POST['name'];     
            $phone = $_POST['phone']; 
            
            $sql_insert = "INSERT INTO PHONEBOOK (pid, name, phone) 	
                        VALUES (?,?,?)";	
            $stmt = $conn->prepare($sql_insert);	
            $stmt->bindValue(1, $pid);	
            $stmt->bindValue(2, $name);	
            $stmt->bindValue(3, $phone);	
            $stmt->execute();	

            echo "Sukses tersimpan!";
            
         } catch(Exception $e) {	
            echo "Failed: " . $e;	
        }
    }
    else if (isset($_POST['show'])) {

        $sql_select = "SELECT * FROM PHONEBOOK";    
        $stmt = $conn->query($sql_select);  
        $book = $stmt->fetchAll();  
        if(count($book) > 0) {
        echo "<h2>Kontak Anda:</h2>";   
        echo "<table>"; 
        echo "<tr><th>Nama</th>";   
        echo "<th>No. Telepon</th></tr>";   
        for($p=0;$p<count($book);$p++){
                echo "<tr><td>".$book[$p]['name']."</td>";
                echo "<td>".$book[$p]['phone']."</td></tr>";
            }
        echo "</table>";    

        } else {    
            echo "<h3>Tidak ada kontak terdaftar.</h3>";    
        }     
    }


 ?>
 </body>
 </html>