<?php
$server = "localhost";
$user = "root";
$pwd = "";
$db = "projet_immo";
$con = mysqli_connect($server, $user, $pwd, $db);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
} else {
?>
	<script>
		console.log('Connexion réussie');
	</script>
<?php
}
