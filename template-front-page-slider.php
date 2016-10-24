<?php
/**
 * Template Name: Front Page With Slider
 *
 * @package speculor
 */

get_header(); ?>

<!-- Carousel -->
<div id="carousel-example-generic" class="carousel  slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img src="http://localhost/prelc/speculor/wp-content/uploads/sites/3/2016/10/slider-pencils.jpg" alt="First slide">
			<div class="carousel-caption">
				<div class="h1  carousel__title">bust your business</div>
				<p class="carousel__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur adipisicing elit. Perspiciatis similique laborum odio libero fugit, eum aspernatur.</p>
			</div>
		</div>
		<div class="carousel-item">
			<img src="http://localhost/prelc/speculor/wp-content/uploads/sites/3/2016/10/slider-snow.jpg" alt="Second slide">
			<div class="carousel-caption">
				<div class="h1  carousel__title">your business is our job</div>
				<p class="carousel__text">Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
		<div class="carousel-item">
			<img src="http://localhost/prelc/speculor/wp-content/uploads/sites/3/2016/10/slider-umbrella.jpg" alt="Third slide">
			<div class="carousel-caption">
				<div class="h1  carousel__title">our photography course</div>
				<p class="carousel__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis similique laborum odio libero fugit, eum aspernatur deserunt ex amet veniam, facere minima sint animi. Suscipit quod necessitatibus ad doloremque rem!</p>
			</div>
		</div>
	</div>
	<a class="left  carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<i class="fa fa-chevron-left" aria-hidden="true"></i>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right  carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<i class="fa fa-chevron-right" aria-hidden="true"></i>
		<span class="sr-only">Next</span>
	</a>
</div>

<main class="content-area  e-content">
	<!-- Content -->
	<div class="container">
		<div class="article">
			<div class="article__content">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						the_content();
					}
				}
				?>
			</div>
		</div>
	</div>

	Test bottom.
</main>

<?php get_footer(); ?>
