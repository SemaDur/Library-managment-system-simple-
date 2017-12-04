<?php

include('session.php');
$user = $_SESSION['user'];
$deleted = '';
$updated = '';

if (isset($_POST['ADDBOOK']) && !(empty($_POST['BOOKNAME'])) && !(empty($_POST['WRITERNAME']))){
		$bname = $_POST['BOOKNAME'];
		$bwriter = $_POST['WRITERNAME'];
		$query = "INSERT INTO books(book_name, book_writer) VALUES ('$bname','$bwriter')";
		$res = $db->insertBook($query);
}

if(isset($_POST['Remove']) && !(empty($_POST['REMBOOKNAME']))){
	
	$search_name = $_POST['REMBOOKNAME'];
	$delete = "DELETE FROM books WHERE book_name = '$search_name'";
	$exec = mysqli_query($connect, $delete) or die('Error executing query');
	if (!$exec) {
		echo "Could not successfully run query from DB: " . mysql_error();
		exit;
	}	else {
		$deleted = "Book: ".$search_name." removed";
	}
}

if(isset($_POST['SETROLE']) && !(empty($_POST['SETUSER']))){
	
	$search_name = $_POST['SETUSER'];
	$role = $_POST['ROLESELECT'];
	$update = "UPDATE users SET role = '$role' WHERE email = '$search_name'";
	$exec = mysqli_query($connect, $update) or die('Error executing query');
	if (!$exec) {
		echo "Could not successfully run query from DB: " . mysql_error();
		exit;
	}	else {
		$updated = "User: ".$search_name." promoted to: ".$role;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
    <title>Main</title>
    <link rel="stylesheet prefetch" href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'/>
		<link rel="stylesheet" href='css/styles_main.css'/>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>

<body>
    <b style="font-size:16px;">Welcome : <span style="font-size:16px;" ><?php echo $user; ?></span></b><br><hr />

    <div id="topbar">
    <a  href="logout.php"  style="float: right;margin-right:30px;">Log Out</a>
    </div>

    <div id="w">
    <div id="content" class="clearfix">
      <h1> Admin Page </h1>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#books">Book</a></li>
          <li><a href="#users">Users</a></li>
        </ul>
			</nav>
			
			<section id="books">
      <div class="title_box" >
				<div id="title"><b>Manage Books <b></div>
				<div id="content">

						<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
							<td>Book Name</td>
							<td>Writer Name</td>
						  </tr>		  
						  <form method="post"  action="">
						  <tr>
							<td><input type="text" class="txtbox" value="" name="BOOKNAME" /></td>
							<td><input type="text" class="txtbox" value="" name="WRITERNAME" /></td>
							<td><input type="submit" value="Add Book" name="ADDBOOK" /></td>
						  </tr>
						  </form>	
						</table>
						  

						<form method="post"  action="">	  
						<table class="hovertable">

							<tr>
								<th>Book Name</th><th>Writer</th>
							</tr>
                  <?php

										$result = mysqli_query($connect,  "SELECT book_name, book_writer FROM books" );
										if (!$result) {
											echo "Could not successfully run query from DB: " . mysql_error();
											exit;
										}
										if (!mysqli_num_rows($result)) {
											echo "No rows found";
										}	else{
												while ($row = mysqli_fetch_assoc($result)) {
												$a= $row["book_name"];
												$b= $row["book_writer"];
	
												echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
												echo "<td>$a</td>";
												echo "<td>$b</td>";
												echo "</tr>";
												}
										}

						    ?>
						</table>
						
            <table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
								<td>Book Name</td>
						  </tr>
						  <tr>
								<td><input type="text" class="txtbox" value="" name="REMBOOKNAME" /></td>
								<td><input type="submit" value="Remove Book" name="Remove" /></td>
							</tr>
							<tr>
								<td><?php echo $deleted; ?></td>
							</tr>
						</table>

						
						
					</form>
				</div>
			</section>

			<section id="users" class="hidden">
 			<div class="title_box" >
    		<div id="title"><b>User Management<b></div>
    		<div id="content">
	

				<table class="hovertable">
				
					<tr>
							<th>Name</th><th>Lastname</th><th>Email</th><th>Type</th>
					</tr>
					<?php
				
						$result = mysqli_query($connect,  "SELECT name, lastname, email, role FROM users" );
						if (!$result) {
							echo "Could not successfully run query from DB: " . mysql_error();
							exit;
							}
						if (!mysqli_num_rows($result)) {
							echo "No rows found";
						}	else {
								while ($row = mysqli_fetch_assoc($result)) {
								$a = $row["name"];
								$b = $row["lastname"];
								$c = $row["email"];
								$d = $row["role"];
					
								echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
								echo "<td>$a</td>";
								echo "<td>$b</td>";
								echo "<td>$c</td>";
								echo "<td>$d</td>";
								echo "</tr>";
								}
						}
				
					?>
				</table>

				<table width="50%" border="1" cellpadding="1" cellspacing="1" class="test">
						  <tr>
								<td>Enter User Email</td>
						  </tr>
						  <tr>
							<form method="post"  action="">
								<td><input type="text" class="txtbox" value="" name="SETUSER" /></td>
								<td><select name="ROLESELECT">
    							<option value="Admin">Admin</option>
   							  <option value="User">User</option>
							    </select>
								</td>
								<td><input type="submit" value="Promote" name="SETROLE" /></td>
							</tr>
							</form>
							<tr>
								<td><?php echo $updated; ?></td>
							</tr>
						</table>
			</div>
			</section>
			
			<script type="text/javascript">
				$(function(){
  				$('#profiletabs ul li a').on('click', function(e){
    				e.preventDefault();
    				var newcontent = $(this).attr('href');
    
    			$('#profiletabs ul li a').removeClass('sel');
    			$(this).addClass('sel');
    
    			$('#content section').each(function(){
      		if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    			});
    
    			$(newcontent).removeClass('hidden');
  				});
				});
</script>
</body>
</html>