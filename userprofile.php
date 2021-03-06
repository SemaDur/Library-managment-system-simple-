<?php

include('session.php');
$user = $_SESSION['user'];
$id = $_SESSION['id'];

$result = $book->selectAll();
if (!$result) {
        echo "Could not successfully run query from DB: " . mysql_error();
        exit;
}

$reserved = '';

if(isset($_POST['RESERVE'])){
    $search_name = $_POST['IDBOOK'];
	$exec = $book->reserveBook($id, $search_name);

	if (is_string($exec)){
		echo "Could not successfully run query from DB. ".$exec ;
		exit;
	} else {
		$reserved = "You reserved: ".$search_name;
	}
}

if(isset($_POST['RETURN'])){
    $search_name = $_POST['IDBOOK'];
	//$update = "UPDATE books SET user_id = 0 WHERE book_name = '$search_name'";
    $exec = $book->reserveBook(0, $search_name);

	if (is_string($exec)){
		echo "Could not successfully run query from DB: " .$exec;
		exit;
	} else {
		$reserved = "You put back: ".$search_name;
	}
}
	

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet prefetch" href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'/>
    <link rel="stylesheet" href='css/styles_main.css'/>
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
        </ul>
			</nav>
			
			<section id="books">
        <div class="title_box" >
				<div id="title"><b>Manage Books <b></div>
				<div id="content">

						<form method="post"  action="">	  
						<table class="hovertable">

							<tr>
								<th>Book Name</th><th>Writer</th>
							</tr>
                                <?php

									if (!mysqli_num_rows($result)) {
											echo "No rows found";
									} else {
									    while ($row = mysqli_fetch_assoc($result)) {
										$a = $row["book_name"];
                                        $b = $row["book_writer"];
                                        $c = $row["user_id"];
                                        
                                        if($c == $id){
                                            echo '<tr style="background-color:#ff0000" >';
                                        } else
										    echo " <tr onmouseover=\"this.style.backgroundColor='#ffff66';\" onmouseout=\"this.style.backgroundColor='#d4e3e5';\"> ";
										echo "<td>$a</td>";
										echo "<td>$b</td>";
										echo "</tr>";
										}
									}

                                ?>
                        </form>
						</table>
						
                        <table>
						  <tr>
								<td>Book Name</td>
						  </tr>
						  <tr>
                            <form method="post"  action="">
                                <td>
                                    
                                    <?php 
                                        $searchByUser = $book->selectBookByUser(0);
                                        if (!$searchByUser) {
                                                echo "Could not successfully run query from DB:";
                                                exit;
                                        }
                                        echo "<select name='IDBOOK'>";
                                        while ($raw = mysqli_fetch_assoc($searchByUser)) {
                                            echo "<option value='".$raw["book_name"]."'>" . $raw["book_name"]."</option>";
                                        } 
                                        echo "</select>";
                                    
                                    ?>
                                    
                                </td>
								<td><input type="submit" value="Reserve" name="RESERVE" /></td>
                            </tr>
                            </form>
							<tr>
								<td><?php echo $reserved; ?></td>
							</tr>
						</table>

						<table>
						  <tr>
								<td>Return Book</td>
						  </tr>
						  <tr>
                            <form method="post"  action="">
                                <td>
                                    
                                    <?php
                                        $searchByUser = $book->selectBookByUser($id);
                                        if (!$searchByUser) {
                                            echo "Could not successfully run query from DB:";
                                            exit;
                                        }
                                        echo "<select name='IDBOOK'>";
                                        while ($raw = mysqli_fetch_assoc($searchByUser)) {
                                            echo "<option value='".$raw["book_name"]."'>" . $raw["book_name"]."</option>";
                                        } 
                                        echo "</select>";
                                    
                                    ?>
                                    
                                </td>
								<td><input type="submit" value="Return" name="RETURN" /></td>
                            </tr>
                            </form>
							<tr>
								<td><?php echo $reserved; ?></td>
							</tr>
						</table>

                </div>
                                    
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