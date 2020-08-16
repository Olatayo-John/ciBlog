<div>
	<?php if ($this->session->userdata('logged_in')): ?>
		<strong class="text-danger" style="font-size: 18px;"><?php echo "Welcome " .$this->session->userdata('uname') ?></strong>
	<?php endif;?>
</div>
	<h2 class="text-light text-center" style="font-weight: bold;">Your Posts</h2>
<?php foreach ($posts as $post): ?>
	<div class="card">
		<h3 class="text-danger" style="font-weight: bolder;"><?php echo $post['title']; ?></h3>
		<div class="row">
			<div class="col-md-2">
				<img src="<?php echo base_url('assets/images/posts/').$post['post_image'] ?>" width="100%">
			</div>
			<div class="col-md-10">
				
				<p><?php echo word_limiter($post['body'],100) ?></p>
			</div>
		</div>
		<a href="<?php echo site_url('index.php/posts/'.$post['id']); ?>" class="mb-2"><button class="btn btn-outline-dark" style="font-weight: bold;">Read more</button></a>
		<small><?php echo $post['created_at'] ?></small>
	</div>	
<?php endforeach; ?>
