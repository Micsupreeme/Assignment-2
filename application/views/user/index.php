<h2><?php echo $title; ?></h2>
<?php foreach ($user_instance as $user): ?>
	<h3><?php echo $user['usr_first_name']; ?></h3>
	<div class="main">
		<?php echo $user['usr_email']; ?>
	</div>
	<p><a href="<?php echo site_url('test'); ?>">View article</a></p>
<?php endforeach; ?>