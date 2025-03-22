<?php
$host = 'localhost'; // Typically 'localhost'
$dbname = 'user_animal_detail';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $animal = $_GET['animal'];

    $stmt = $pdo->prepare("SELECT * FROM `animals` WHERE  species = :species");
    $stmt->bindParam(':species', $animal);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
       
		$id = $row['id'];
		$species = $row['species'];
		$district = $row['district'];
		$availability = $row['availability'];
		  
    } else {
       $name = "No details found for this animal.";
    }

   echo"<p> <ol><li>ID:<br> $id </li>
	        SPECIES:<br>$species<br>
			DISTRICT:<br>  $district <br>
			Availability:<br>   $availability<br>
		</p>";
 } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>