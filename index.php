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
		$user = "";
		$email = "";
		$password = "";
		$lista = "";
		$radio = "";
		$checkbox = array();

		// =================== START HERE THE VALIDATION
		if(isset($_POST["send"])){
			$user = $_POST["user"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$lista = $_POST["pais"];
			
			// =================== SAVE ERROR HERE
			$errores = array();
			// =================== USER VALIDATED HERE
			if($user == "" || strlen ($user) < 5 || strlen ($user) > 10){
				array_push($errores,"Ingresa un usuario con mas de 5 caracteres y menos de 10 ");
			}

			// =================== EMAIL VALIDATED HERE
			if( $email = "" || strpos($email, "@") === false){
				array_push ($errores, "Ingresa un correo electrónico válido . ");
			}

			// =================== PASSWORD VALIDATED HERE
			if($password == "" || strlen ($password) < 6){
				array_push($errores,"Ingrese contraseña valida  ");
			}

			// =================== LIST VALIDATED HERE
			if($lista == ""){
				array_push($errores,"Seleccione un pais");
			}
			// =================== RADIO VALIDATED HERE
			if(isset($_POST["nivel"])){
				$radio = $_POST["nivel"];
			}else{
				$radio == "";
			}
			if($radio == ""){
				array_push($errores,"Seleccione un nivel");
			}

			// =================== CHECKBOX VALIDATED HERE
			if(isset($_POST["lenguajes"])){
				$checkbox = $_POST["lenguajes"];
			}else{
				$checkbox == [];
			}
			if($checkbox == "" || count($checkbox ) < 2){
				array_push($errores,"Seleccione entre uno y dos lenguajes de programacion");
				
			}

	
			//==================== DATE IS PRINTED HERE
			if(count($errores) > 0 ){
				echo "<div class='error'>";
				for($i = 0; $i < count($errores); $i++){
					echo $errores[$i] . "<br>";
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
        <input type="text" name="user" id="user" placeholder="Ingrese usuario" value="<?php echo $user; ?>" >
		<input type="email" name="email" id="email" placeholder="Ingrese email" value="<?php echo $email; ?>">
        <input type="password" name="password" id="password" placeholder="Ingrese contraseña" value="<?php echo $password; ?>">
        <input type="submit" name="send"value="Send">


		<p>
			Pais de origen : <br>
			<select name="pais" id="">
				<option value="" selected >Selecciona un país</option>
				<option value="mx" <?php if( $lista == "mx") echo "selected" ?>> México</option>
				<option value="eu" <?php if( $lista == "eu") echo "selected" ?>> Estados Unidos</option>
				<option value="es" <?php if( $lista == "es") echo "selected" ?>> España</option>
				<option value="ar" <?php if( $lista == "ar") echo "selected" ?>> argentina</option>
				<option value="ch" <?php if( $lista == "ch") echo "selected" ?>> China</option>
			</select>
		</p>
		<p>
			Nivel de desarrollo <br>
			<input type="radio" name="nivel" value="principiante" <?php if( $radio == "principiante") echo "checked"; ?> >Principiante
			<input type="radio" name="nivel" value="Intermedio"<?php if( $radio == "Intermedio") echo "checked" ;?> >Intermedio
			<input type="radio" name="nivel" value="avanzado"<?php if( $radio == "avanzado") echo "checked"; ?> >Avanzado
		</p>
		<p>
			
			Lenguajes de programacion <br>
			<input type="checkbox" name="lenguajes[]" value="php" <?php if(in_array("php", $checkbox)) echo "checked" ; ?>>php <br>
			<input type="checkbox" name="lenguajes[]" value="js"<?php if(in_array("js", $checkbox)) echo "checked" ; ?>>js<br>
			<input type="checkbox" name="lenguajes[]" value="java"<?php if(in_array("java", $checkbox)) echo "checked" ; ?>>java<br>
			<input type="checkbox" name="lenguajes[]" value="python"<?php if(in_array("python", $checkbox)) echo "checked" ; ?>>python<br>
			<input type="checkbox" name="lenguajes[]" value="c#"<?php if(in_array("c#", $checkbox)) echo "checked" ; ?>>c#<br>
		</p>

    </form>

	


</body>
</html>