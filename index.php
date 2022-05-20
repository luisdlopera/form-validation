<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
		.error{
			background-color: red;
			padding:20px;
			margin: 20px;
			color:white;
		}
		.correcto{
			background-color: green;
			padding:20px;
			margin: 20px;
			color:white;
		}
	</style>
</head>
<body>
    <?php
		
		if(isset($_POST["send"])){
			$user = $_POST["user"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$lista = $_POST["pais"];
			// =================== SAVE ERROR HERE
			$errores = array();
			// =================== USER VALIDATED HERE
			if($user == "" || strlen ($user) < 5 || strlen ($user) < 5){
				array_push($errores,"Ingresa un usuario con mas de 5 caracteres y menos de 10 ");
			}

			// =================== EMAIL VALIDATED HERE
			if( $email = "" || strpos($email, "@") === false){
				array_push ($campos, "Ingresa un correo electrónico válido . ");
			}

			// =================== PASSWORD VALIDATED HERE
			if($password == "" || strlen ($password) > 5){
				array_push($errores,"Ingrese contraseña valida  ");
			}

			// =================== LIST VALIDATED HERE
			if($pais == ""){
				array_push($errores,"Seleccione un pais");
			}

			//==================== DATE IS PRINTED HERE
			if(count($errores) > 0 ){
				echo "<div class='error'>";
				for($i = 0; $i < count($errores); $i++){
					echo $errores[$i];
				}
				echo "</div>";
			}else{
				echo '<div class="correcto"> ENVIADO CORRECTAMENTE </div>';
			}
			
		}

		//echo $user . " y " .$password;
    ?>

    <form action="index.php" method="post">
		<!-- -->
        <input type="text" name="user" id="user" placeholder="Ingrese usuario">
		<input type="email" name="email" id="email" placeholder="Ingrese email">
        <input type="password" name="password" id="password" placeholder="Ingrese contraseña">
        <input type="submit" name="send"value="Send">


		<p>
			Pais de origen : <br>
			<select name="pais" id="">
				<option value="" selected >Selecciona un país</option>
				<option value="mx" <?php if( $pais == "mx") echo "selected" ?>> México</option>
				<option value="eu" <?php if( $pais == "eu") echo "selected" ?>> Estados Unidos</option>
				<option value="es" <?php if( $pais == "es") echo "selected" ?>> España</option>
				<option value="ar" <?php if( $pais == "ar") echo "selected" ?>> argentina</option>
				<option value="ch" <?php if( $pais == "ch") echo "selected" ?>> China</option>
			</select>
		</p>



    </form>

	


</body>
</html>