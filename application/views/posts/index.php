<h3 class="text-center text-light"><?= $title ?></h3>

<?php foreach ($posts as $post) : ?>
	<div class="card mb-2">
		<h3 class="text-danger" style="font-weight: bolder;"><?php echo $post['title']; ?></h3>
		<div class="row mb-1">
			<div class="col-md-2">
				<img width="100%" src="<?php echo site_url('assets/images/posts/' .$post['post_image']); ?>">
			</div>	
			<div class="col-md-10">
				<!--To show the category name -->
				<!-- <small class="category"> in <?php echo $post['name'] ?></small> -->
				<p><?php echo word_limiter($post['body'], 100); ?></p>
			</div>
		</div>
		<a href="<?php echo site_url('index.php/posts/'.$post['id']); ?>" class="mb-2"><button class="btn btn-outline-dark" style="font-weight: bold;">Read more</button></a>
		<small style="flex-wrap: nowrap;">
			<?php echo $post['created_at'] ?>
			<?php echo "By: " ?>
		</small>
	</div>
<?php endforeach; ?>