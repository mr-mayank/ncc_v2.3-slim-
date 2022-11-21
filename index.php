
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
//$id;
	
	
//echo $catname;
		$data = array();
			$data['email'] = $email;
			$data['password'] = $name;
			//$data['sal'] = $sal;
			

			$post_str =''; 
			foreach($data as $key=>$val)
			{ $post_str .= $key.'='.$val.'&'; }
			
			$post_str = substr($post_str, 0, -1);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://ambaitsystem.com/CookBookChatApp/admissionchat/loginuser.php'); 
			curl_setopt($ch, CURLOPT_POST, TRUE); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$result = curl_exec($ch);
			curl_close($ch);

		$json = json_decode($result, true);
	
		
		$id='';
		$k='';
			foreach($json as $i)
			{
				$v=$i['email'];
				$id=$i['userId'];
				session_start();
				$_SESSION['id']=$i['userId'];
				$_SESSION['email']=$v;
				$k=$_SESSION['email'];
				
			}
			if($k == 'N')
			{
				$v=1;
				//echo "<div> invalid Login </div>";
			}else 
			{
				$v=0;
				if(isset($_SESSION['id']))
				{
					header("Location:main.php?id=".$_SESSION['id']);
				}
				else{
					header("Location:index.php");
				}
			}
			/*else
			{
				header("Location:loginuser.php");
				
			}*/
	


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Engineer's Gossip</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>



</body>
</html>
Result:
 

