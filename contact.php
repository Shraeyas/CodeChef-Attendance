<?php



	if(isset($_POST['submit']))

	{

		$email = $_POST['email'];

		$user = $_POST['user'];

		$content = $_POST['content'];

		$subject = $_POST['subject'];

		

		if($email == '' || $user == '' || $content == '' || $subject == '')
		{
			$printmsg = '<div style="color:red;font-weight:bold"><strong>Please fill out all the fields.</strong></div>';
		}

		

		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$printmsg = '<div style="color:red;font-weight:bold">E-Mail Address is not valid.</div>';

		}

		

		else
		{

			

			

			$to = 'databread@gmail.com';

			$body = "Codechef Attendance Name:".$user."Content:".$content;

			$header = "From:".$email;

			//mysqli_query($link, $query);

			//echo $GLOBALS['word'] = mt_rand(100000,999999);

			

			if(mail($to, $subject, $body, $header))

			{

				//mysqli_query($link, $query);

				$printmsg = '<div style="color:green;font-weight:bold">Thank You. We will get back to you soon.</div>';

			}

			

			else

			{
				$printmsg = '<div style="color:red;font-weight:bold">Cannot process your query, try again later.</div>';

			}

		}

		

	}



?>







<!DOCTYPE html>

<html lang="en">

  <head>

  <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact</title>
		<meta name="description" content="Simple ideas for enhancing text input interactions" />
		<meta name="keywords" content="input, text, effect, focus, transition, interaction, inspiration, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		

		
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
	


	
			<style>
		
			body
			{
			    font-family: Cantarell;
				background-color:white;	
				font-size:13px;
			}
			
			.container
			{
				border-radius:25px;
				margin:50px;
				width:70vw;
				
			}
		
		
		</style>
		
	
	
	<?php include('header.html'); ?>
		
		<div class="container">
		
		<section class="content">
			<h1><strong>Reach Us for Queries, Hugs or Bugs.</strong></h1>
			
			<?php echo $printmsg; ?>

		<form method="post">


		
		<span class="input input--kaede">
				
					<label class="input__label input__label--kaede" for="input-35">
						<span class="input__label-content input__label-content--kaede">Your Name</span>
						<br>
						<input class="input__field input__field--kaede" type="text" name="user" id="input-35" />
						<br>
				</label>
			
		</span>
			<br>


			<span class="input input--kaede">
						
						<label class="input__label input__label--kaede" for="input-36">
							<span class="input__label-content input__label-content--kaede">Enter E Mail</span>
							<br>
							<input class="input__field input__field--kaede" type="email" name="email" id="input-36" />
							<br>
						</label>
	
					
			</span>
					
					<br>
					
			<span class="input input--kaede">
						
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede">Subject </span>
							<br>
							<input class="input__field input__field--kaede" type="text" name="subject" id="input-37" />
							<br>
						</label>
	
					
			</span>
			
	

			<br><br>

			<div class="form-group">

			<label for="exampleTextarea" style="font-weight:bold;font-size:3vh;margin-top:2vh">Write Your Heart Out.</label>
            <br><br>
			

			
			<textarea class="form-control" name="content" style="width:1000px;margin:auto;height:200px" placeholder="Write Here" id="exampleTextarea" rows="3"></textarea>

		  </div>

		  

		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		  <br>
              
        
        
		  </div>
            
		</form>

	<a href = "index.php"><button style="margin-left:50px">Back</button>  </a>
        
	</div>

	

	</div>



	<?php include('footer.php'); ?>

	

  </body>

  

</html>