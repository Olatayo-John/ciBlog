<?php foreach ($posts as $post) : ?>
	<?php if($this->session->userdata('logged_in')): ?>
		<a href="<?php echo base_url('index.php/posts/'.$post['id']); ?>"><button class="btn btn-outline-dark mb-1 text-light" style="font-weight: bolder;">Back</button></a>
	<?php endif; ?>
		<h4 class="text-info text-center mb-5 " style="font-weight: bolder;"><?= $title ?></h4>
	</div>

<form action="<?php echo base_url('index.php/posts/update/'.$post['id']) ?>" method="post" class="container mb-5 col-md-7">
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
	<h6 class="text-danger"><?php echo validation_errors(); ?></h6>

	<h5 class="text-light">Title:</h5>
	<input type="text" name="title" class="form-control mb-3" placeholder="Title" value="<?php echo $post['title'] ?>">

	<h5 class="text-light">Body:</h5>
	<textarea id="editor1" class="form-control mb-3" name="body" placeholder="Body"><?php echo $post['body'] ?></textarea>

	<div class="mb-4 mt-3">
		<h5 class="text-light">Category:</h5>
		<select class="form-control" name="category_id">
			<?php foreach ($categories as $category) :?>
				<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
			<?php endforeach;?>
		</select>
	</div>

	<input type="submit" class="btn btn-success btn-block" value="Update">
</form>
<?php endforeach; ?><br>

<style type="text/css">
	div.row a{
		margin-right: 200px;
	}
</style>