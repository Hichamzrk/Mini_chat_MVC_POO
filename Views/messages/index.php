<!-- messages view -->

<!-- On fait une boucle pour afficher les differentes valeurs de message -->
<?php foreach ($messages as $message): ?>

<p><?='<strong>'.$message->pseudo.'</strong> :  '.$message->message;?></p>
<p><em><?=$message->date ?></em></p>

<?php endforeach ?>

<!-- Formulaire message -->
<form method="POST">
	<input type="text" name="message" placeholder="message">
	<input type="submit" name="">
</form>

<a href="/user/logout">Log out</a>