<?php 
include('include/header.php');
?>
<title>SUFFRAGE</title>
<style>
ul {
    list-style-type: none;    
	margin: 0;
    padding: 0;
}
ul li {
    margin-bottom:2px;
    padding:2px;
     
}
a:hover, a:active, a:focus, a:visited {
    text-decoration: none;
} 
</style>
<?php include('include/container.php');?>
<div class="container">
	<h2>SRM Institute of Science and Technology</h2>		
	<?php
	include ('Poll.php');        
	$poll = new Poll();
	$pollData = $poll->getPoll();	
	if(isset($_POST['vote'])){
		$pollVoteData = array(
			'pollid' => $_POST['pollid'],
			'pollOptions' => $_POST['options']
		);
		$isVoted = $poll->updateVote($pollVoteData);
		if($isVoted){
			setcookie($_POST['pollid'], 1, time()+60*60*24*365);			
			$voteMessage = 'You have voted successfully.';
		} else {
			$voteMessage = 'You had already voted.';
		}
	}
	?>	
	<div class="poll-container">	
		<?php echo !empty($voteMessage)?'<div class="alert alert-danger"><strong>Warning!</strong> '.$voteMessage.'</div>':''; ?>		
		<form action="" method="post" name="pollFrm">	
			<?php 
			foreach($pollData as $poll){
				
				echo "<h3>".$poll['question']."</h3>"; 				
				$pollOptions = explode("||||", $poll['options']);
				echo "<br>";
				echo "<hr>";
				echo "<ul>";
				for( $i = 0; $i < count($pollOptions); $i++ ) {
					echo '<li style="color:blue;"><input type="radio" name="options" value="'.$i.'" > '.$pollOptions[$i].'</li>';
				}
				echo "</ul>";
				echo '<input type="hidden" name="pollid" value="'.$poll['pollid'].'">';
				echo '<br><input type="submit" name="vote" class="btn btn-primary" value="Vote">';
				echo '<a href="results.php"> View Results</a>';	
			} 
			?>			
		</form>		
	</div>		
</div>
<?php include('include/footer.php');?>