<h2><?php echo $title; ?></h2>
<?php foreach ($user as $user_instance): ?>
	<h3><?php echo $user_instance['usr_first_name']; ?></h3>
	<div class="main">
		<?php echo $user_instance['usr_email']; ?>
	</div>
	<p><a href="<?php echo site_url('test'); ?>">View article</a></p>
<?php endforeach; ?>