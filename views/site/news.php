<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="assets/theme/js/pgwslider.min.js"></script>
	<link rel="stylesheet" href="assets/theme/css/pgwslider.min.css">
	<link rel="stylesheet" href="assets/theme/css/demo.css">

    <ul class="pgwSlider">
    <?php foreach ($blog as $item): ?>
  <li><a href="http://new.udrso.ru/blog/<?php echo $item->alias?>"><img src="<?php echo $item->images ?>" alt="<?php echo $item->title ?>"></a></li>

  <?php endforeach ?>
</ul>


<script>
	$(document).ready(function() {
		$('.pgwSlider').pgwSlider({
			autoSlide: false,
			displayControls: true
		});
	});
</script>

<script src="assets/theme/js/demo.js"></script>