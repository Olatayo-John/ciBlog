<?php foreach ($posts as $post) : ?>
		<a href="<?php echo base_url('index.php/posts') ?>"><button class="btn btn-outline-dark mb-1 text-light" style="font-weight: bolder;">Back</button></a>
	<!-- <?php if($this->session->userdata('logged_in')): ?>
		<a href="<?php echo base_url('index.php/users/userprofile/'.$this->session->userdata('id')); ?>"><button class="btn btn-outline-dark mb-1 text-light" style="font-weight: bolder;">Back</button></a>
	<?php endif; ?> -->
	<div class="card mb-2">
		<h3 class="text-danger text-center" style="font-weight: bolder;"><?php echo $post['title']; ?></h3>
		<div class="row mb-1">
			<div class="col-md-2">
				<img width="100%" src="<?php echo site_url('assets/images/posts/' .$post['post_image']); ?>">
			</div>	
			<div class="col-md-10">
				<!--To show the category name -->
				<!-- <small class="category"> in <?php echo $post['name'] ?></small> -->
				<p><?php echo $post['body']; ?></p>
			</div>
		</div>
		<small><?php echo $post['created_at'] ?></small>
	</div>
<hr>

<?php if($this->session->userdata('id') == $post['user_id']): ?>
	<div class="btn-group mb-5 r">
		<!-- <a href="<?php echo base_url('index.php/posts/edit/'.$post['id']) ?>" style="color: white"><button class="btn btn-dark mr-1">Edit</button></a> -->
		<form method="Post" action="<?php echo base_url('index.php/posts/edit/'.$post['id']) ?>">
			<input type="submit" value="Edit" class="btn btn-dark mr-3">
		</form>
		<!-- edit controller nd model works, but i avnt done the form to show that you can edit so if u press the edit button,it replaces the current text with blank because we didnt fill our form and its by default blank -->
		
		<!-- <form method="Post" action="<?php echo base_url('index.php/posts/delete/' .$post['id']) ?>">
			<input type="submit" value="Delete" class="btn btn-danger">
		</form> -->
	</div>
<?php endif; ?>

<h5 class="text-light" style="font-weight: bold;">Comments:</h5>

<?php if($this->session->userdata('logged_in')): ?>
<form action="<?php echo base_url('index.php/comments/addcomment/'.$post['id']); ?>" method="post">
	<?php echo validation_errors(); ?>
	<div class="input-group">
		<input type="text" name="comment" class="form-control comment mb-2" placeholder="add comment...">
		<input type="submit" value="Submit" class="btn btn-success" style="border-radius: 0;">
	</div>
</form>
<?php endif; ?>

<div class="card mb-4" style="background-color: #212121">
	<?php foreach($comments as $comment): ?>
		<?php if($comment['post_id'] == $post['id']):?>
			<label class="text-info" style="font-weight: bold;"><?php echo $comment['uname'] ?></label>
			<p class="text-light" style="margin: -10px 0 8px 0"><?php echo $comment['body'] ?></p>
			<?php if($this->session->userdata('id') == $comment['user_id']):?>
				<div style="display: flex; margin: -10px 0 8px 0">
					<form method="post" action="<?php echo base_url('index.php/comments/delete_comment/'.$comment['id']) ?>"><input type="submit" name="edit" value="Delete" class="delete changecomment"></form>
					<?php echo validation_errors(); ?>
					<form method="post" action="<?php echo base_url('index.php/comments/editcomment/'.$comment['id']) ?>"><input type="submit" value="Edit" class="edit changecomment"></form>
				</div>				
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>


<?php endforeach; ?>

<style type="text/css">
	div.btn-group{
		width: 100%;
		justify-content: center;
	}
	input.btn{
		width: 100px;
	}
	div.input-group input.comment,div.input-group input.btn{
		height: 100%;	
	}
	input.changecomment{
		background: transparent;
		border: none;
		outline: none;
		border-radius: 5px;
		transition: 1s;
	}
	input.delete{
		color: red;
	}
	input.edit{
		color: white;
	}
	input.delete:hover{
		background-color: red;
		color: white;
	}
	input.edit:hover{
		background-color: blue;
		color: white;
	}
</style>