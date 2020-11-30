<!-- <h3>HELLO Archive</h3> -->

<?php get_header(); ?>




		<!-- contact start -->
<div class="container border border-dark mb-5 mt-5" style="margin-top: 120px !important;">
<?php
 //include('contactform.php');
if(is_author()){
	echo "This is author page";
}else if(is_category()){
	echo "This is category page<br>";
	single_cat_title();
}
if(have_posts()){
	while(have_posts()){ ?>
<?php 
the_post(); ?>
<div class="container post mt-3  text-center border border-warning">
<h5 class="border" style="display: inline;"><a class="mylink" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<?php the_time('F j,Y g:i a'); ?> | <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> |
<?php 
$cat = get_the_category();
$sep = ", ";
$newcat = "";
foreach ($cat as $value) {
	# code...
	// $newcat = $value->cat_name.$sep;
	$newcat .= "<a href='".get_category_link($value->term_id)."'>".$value->cat_name."</a>".$sep;
	// echo $newcat;
	// echo trim($newcat,$sep);
}
// echo $newcat;
echo trim($newcat,$sep);
?>
<div class="row del mt-2 border">
<div class="col-sm-4 pl-5 border border-primary pb-2 bg-danger pt-2">
<?php 
the_post_thumbnail('small-thumbnail');
?>	
</div>
<div class="col-sm-8">
<?php the_content(); ?>
	
</div>
</div>
</div>

<?php	}
}
?>
</div>


<?php get_footer(); ?>
