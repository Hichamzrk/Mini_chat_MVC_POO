<!-- messages view -->

<!-- On fait une boucle pour afficher les differentes valeurs de message -->

<article>
	<div>
	<?php foreach ($messages as $message): ?>
		<p><?='<strong>'.$message->pseudo.'</strong> :  '.$message->message;?></p>

		<div class="like">
			<?php $aimes = $aime->NumeberLike($message->id_message)?>

			<h2><?= $aimes ?></h2>

			<a  href="/message/aime/<?=$message->id_message ?>">Like</a>
		</div>
		<?php endforeach ?>

		<!-- Formulaire message -->
		<form method="POST" class="message_area">
			<input type="text" name="message" placeholder="message">
			<input type="submit" name="">
		</form>
	</div>
</article>

<a href="/user/logout">Log out</a>