<?php $page_title = "ブログ"; ?>
<?php include "parts/header.php"; ?>
<div class="top">

</div>

<?php
if (!isset($_GET['o']) or empty($_GET['o']) or $_GET['o'] < 0) {
$offset = 0;
} else {
	$offset = $_GET['o'];
}
if (isset($_GET['draft'])) {
	$posts = get_drafts($offset);
	$count = get_drafts_count();
	$params = ["draft" => ""];
} else {
	$posts = get_posts($offset);
	$count = get_posts_count();
}
?>
	<div class="container">
	<a href="new.php">新規投稿</a>
	<a href="index.php?draft">下書き一覧</a>
	<nav>
	<ul>
	<?php
	$limit = get_limit();
	$prev_offset = $offset - $limit;
	$next_offset = $offset + $limit;
	?>
	<?php if ($prev_offset >= 0) : ?>
		<?php
		$params["0"] = $prev_offset;
		link_tag("index.php", "前へ", $params);
		?>
	<?php endif; ?>
	<?php
	  for($i =0; $i<$count; $i++) {
	  	if ($i % $limit == 0) {
	  		$page = $i / $limit;
	  		$page_offset = $page * $limit;
	  		$params["o"] = $page_offset;
	  		link_tag("index.php", $page + 1, $params);
	  	}
	  }
  ?>

	<?php if ($next_offset < $count) : ?>
		<a href="index.php?o=<?php echo $next_offset; ?>">次へ</a>
	<?php endif; ?>

	</ul>
	</nav>
	<div style="border: 1px solid red;">
		<h2>メイン記事</h2>
		<?php $main = $posts->fetch(); ?>
		<a href="show.php?id=<?php echo $main['id']; ?>">
		<p><?php echo $main['created_at']; ?></p>
		<h3><?php echo $main['title']; ?></h3>
		<p><?php echo $main['content']; ?></p>
		<img src="image.php?id=<?php echo $row['id']; ?>" alt="<?php echo $row['title']; ?>">
		</a>
 </div>
 <?php foreach($posts as $row) : ?>
		<article>
		<?php
     $likes = $row['likes'];
     if ($likes == 0) : ?>
     <P>いいね！はまだありません</P>
     <?php else : ?>
	  <p><?php echo $row['likes']; ?>回いいね！されています。</p>
    <?php endif; ?>

		<a href="show.php?id=<?php echo $row['id']; ?>
		">
		<div>投稿日時:<?php echo $row['created_at']; ?>
		</div>
		<div>
			<img src="image.php?id=<?php echo $row['id'];
			?>" alt="<?php echo $row['title']; ?>">
		</div>
		<div><?php echo $row['title']; ?></div>
		<?php
		$content = $row['content'];
		if (strlen($content) >= 50) {
			$content = substr($content, 0, 50);
			$content .= $content . '...';
		}
		?>
		<div><?php echo $content; ?></div>
		</a>
		</article>
	<?php endforeach; ?>
	<hr>
	<?php include "parts/footer.php"; ?>
