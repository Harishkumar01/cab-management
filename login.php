<?php
	require 'connect.php';

	$mail1 = $_POST["email"];
	$pwd1 = $_POST["pwd"];

	echo $mail1;
	echo $pwd1;

	$query = "Select id,email,password from user1";
	$s = oci_parse($c,$query);
	oci_execute($s);

	while ($row = oci_fetch_array($s)) {
			$x = $row['EMAIL'];
			$y = $row['PASSWORD'];
			$z = $row['ID'];

			if($x == $mail1 && $y == $pwd1){
				echo "<li>".$x."</li><br>";
				echo "<li>".$y."</li><br>";
				$query = "insert into loginuser values (loginuser_sequence.nextval,'".$_POST["email"]."','".$_POST["pwd"]."','".$_POST["id"]."')";
				$s = oci_parse($c, $query);
				$r = oci_execute($s);	
				session_start();
            	$_SESSION['uname'] = $x;
            	echo $_SESSION['uname'];
				header('Location:index.html');
			}
	}

	echo "<script>
		alert('Account do not exist please sign up');
		window.location.href='usignup.html';
		</script>";
?>