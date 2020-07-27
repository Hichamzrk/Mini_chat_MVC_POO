<form method="POST">
	<input type="text" name="message">
	<input type="submit" name="">
</form>

<?php foreach ($messages as $message): ?>

<h2><?= $message->message?></h2>
<h3><em><?=$message->date ?></em></h3>
<?php endforeach ?>