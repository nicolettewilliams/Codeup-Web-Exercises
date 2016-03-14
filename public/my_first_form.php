<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="/css/my_first_form.css">

</head>
<body>

	<div id="wrapper">

		<h1>GET</h1>
		<?php var_dump($_GET); ?>
		<h1>POST</h1>
		<?php var_dump($_POST); ?>

		<h2>User Login</h2>

		<form method="POST" action="my_first_form.php">
				
			<p>
				<input id="username" name="username" placeholder="Username">
			</p>

			<p>
				<input id="password" name="password" type="password" placeholder="Password">
			</p>

			<p>
				<button class="my_button">Login</button>
			</p>

		</form>

		<form method="POST" action="my_first_form.php">

			<h2>Compose an Email</h2>

			<p> 
				<input type="text" id="To" name="To" placeholder="Send To">
			</p>

			<p>
				<input type="text" id="from" name="from" placeholder="From">
			</p>

			<p> 
				<input type="text" id="subject" name="subject" placeholder="Subject">
			</p>

			<p>
				<textarea id="email_body" name="email_body" rows="5" cols="40"></textarea>
			</p>

			<p>
				<label for="save_a_copy">
					Would you like to save a copy to your sent folder?
				</label>
				<input type="checkbox" id="save_a_copy" name="save_a_copy" value="yes">
			</p>

			<p>
				<button class="my_button">Send</button>
			</p>		
		</form>

		<form method="POST" action="my_first_form.php">

			<h2>Multiply Choice Test</h2>

			<p>
				What is the capital of Texas?
			</p>

			<p>
				<label>
					<input type="radio" name="answer1" value="dallas">
					Dallas
				</label>
			</p>

			<p>
				<label>
					<input type="radio" name="answer2" value="austin">
					Austin
				</label>
			</p>

			<p>
				<label>
					<input type="radio" name="answer3" value="houston">
					Houston
				</label>
			</p>

			<p>
				What is 2+2?
			</p>

			<p>
				<label>
					<input type="radio" name="q1" value="18">
					18
				</label>
			</p>

			<p>
				<label>
					<input type="radio" name="q2" value="4">
					4
				</label>
			</p>

			<p>
				<label>
					<input type="radio" name="q3" value="fish">
					Fish
				</label>
			</p>

			<h2>What are your favorite foods?</h2>
		
			<h3>Check all that apply.</h3>

			<p>
				<label>
					<input type="checkbox" name="os[]" value="hamburgers">
					Hamburgers
				</label>
			</p>

			<p>
				<label>
					<input type="checkbox" name="os[]" value="steak">
					Steak
				</label>
			</p>

			<p>
				<label>
					<input type="checkbox" name="os[]" value="bacon">
					Bacon
				</label>
			</p>

			<p>
				<button class="my_button">Submit Answers</button>
			</p>

			<h2>Where have you traveled?</h2>

			<p>
				<label for="os" id="traveled_label">Where have you traveled?</label>
				<select id="os" name="os[]" multiple>
					<option value="canada">Canada</option>
					<option value="rome">Rome</option>
					<option value="mexico">Mexico</option>
					<option value="hawaii">Hawaii</option>
				</select>

				<input type="submit">

			</p>

		</form>

		<form method="POST" action="my_first_form.php">

			<p>

				<label for="rain" id="rain_label">Do you like the rain?</label>
				<select id="rain" name="rain">
					<option selected disabled>Do you like the rain?</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>

				<button class="my_button">Submit</button>

			</p>

		</form>

	</div>
</body>
</html>























