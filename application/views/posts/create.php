<h4 class="text-info text-center mb-3" style="font-weight: bolder;"><?= $title ?></h4>
	
	
<form enctype="multipart/form-data" action="<?php echo base_url('index.php/posts/create') ?>" method="post" class="container mb-5 col-md-7">
	<h6 class="text-danger"><?php echo validation_errors(); ?></h6>

	<h5 class="text-light">Title:</h5>
	<input type="text" name="title" class="form-control mb-3" placeholder="Title">

	<h5 class="text-light">Body:</h5>
	<textarea id="editor1" class="form-control" name="body" placeholder="Body"></textarea>

	<div class="mb-3 mt-3">
		<h5 class="text-light">Category:</h5>
		<select class="form-control" name="category_id">
			<?php foreach ($categories as $category) :?>
				<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
			<?php endforeach;?>
		</select>
	</div>

	<h5 class="text-light">Uplaod Image</h5>
		<input type="file" name="userfile" class="form-control upload mb-3" size="20">

	<input type="submit" class="btn btn-success btn-block" value="Create">
</form>

<style type="text/css">
	 input.upload{
	 	border: none;
		border-bottom: 1px solid white;
		border-radius: 0px;
		color: white;
		outline: none;
		background: transparent;
	}
</style>