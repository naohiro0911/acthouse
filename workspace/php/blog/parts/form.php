<form action="post.php" method="post" enctype="multipart/form-data">
	<div>
		<label for="title">タイトル
			<input type="text" name="title" value="<?php echo $post['title']; ?>">	
	</div>
	<div>
		<label for="image">写真</label>
		<input type="file" name="image">
		</label>
	</div>
	<div>
		<label for="draft">
		<?php $draft = $post['status'] == "draft"; ?>
			<input type="checkbox" name="draft" value="true">
			<?php if ($draft) echo 'checked'; ?>>
		 下書き
		</label>
	</div>
		<textarea name="content" id="" cols="30" rows="10">
			<?php echo $post['content']; ?></textarea>
			<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
		<button>作成</button>
	</form>