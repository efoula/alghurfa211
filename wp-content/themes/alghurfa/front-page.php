<?php get_header(); ?>

<?php
$get_homepage_id = get_the_id();
$defult_issue_id = get_post_meta($get_homepage_id, 'default_issue', true);
$issue_name = get_term($defult_issue_id)->name;
$issue_desc = get_term($defult_issue_id)->description;
$get_issue_posttypes = get_posttypes_of_issue($defult_issue_id);
?>

<!-- Section 1 Starter -->
<section class="pt-8 mb-10 lg:pt-20">
	<div class="flex items-center flex-col lg:flex-row carousel-item justify-center lg:gap-[60px] gap-6">
		<div>
			<img src="<?php bloginfo('template_directory'); ?>/img/section-1-img.jpg" alt="img" class="!w-[265px] shadow-lg shadow-gray-400">
		</div>
		<div>
			<h3 class="text-lg font-droid font-bold lg:mb-10 lg:text-[28px] leading-8 text-dark"><?php echo $issue_name; ?></h3>
			<div class="flex-wrap font-semibold font-cairo gap-4 max-w-[600px] hidden lg:flex">
				<a href="#intro" class="py-1 rounded-lg shadow-md text-main bg-light-gray px-7 text-dark">مقدمة</a>
				<?php
				if ($get_issue_posttypes) {
					foreach ($get_issue_posttypes as $issue_post_type) {
						?>
						<a href="#<?php echo $issue_post_type; ?>" class="py-1 rounded-lg shadow-md text-main bg-light-gray px-7 text-dark"><?php echo get_translation($issue_post_type); ?></a>
				<?php }
				} ?>
			</div>
		</div>
	</div>
</section>
<!-- Section 1 End -->

<!-- Section 2 Starter -->
<section class="flex flex-col md:flex-row items-center md:gap-[50px] gap-8 mb-8 lg:mb-0 lg:pt-24" id="intro">
	<a href="#" class="text-2xl font-extrabold text-center md:text-[25px] md:text-start font-notoSans text-dark">
		مقــــــــــــــــــــــــــ
		</br>
		ــــــــــــــــــــــــدمة
	</a>
	<p class="font-normal text-black font-cairo md:text-main text-lg text-center md:text-start md:!leading-loose"><?php echo $issue_desc; ?></p>
</section>
<!-- Section 2 End -->


<?php
if ($get_issue_posttypes) {
	foreach ($get_issue_posttypes as $issue_post_type) {
		$p_layout = get_term_meta($defult_issue_id, 'dlayout_' . $issue_post_type . '', true);
		echo '<section class="flex flex-col xl:flex-row items-center xl:gap-[50px] gap-8 lg:mb-0 lg:pt-24 mb-14" id="' . $issue_post_type . '">
                <a href="#" class=" text-2xl font-extrabold text-center md:text-[25px] md:text-start font-notoSans
                text-dark">' . get_long_titles($issue_post_type) . '</a>';

		if ($p_layout == 'layout_1') {
			$perpage = 4;
			echo '<div class="overflow-hidden owl-carousel owl-carousel-layout1">';
		} elseif ($p_layout == 'layout_2') {
			$perpage = 1;
		} elseif ($p_layout == 'layout_3') {
			$perpage = 4;
			echo '<div class="relative flex-1 w-full overflow-hidden">
						<div class="owl-carousel owl-carousel-layout2">';
		} elseif ($p_layout == 'layout_4') {
			$perpage = 1;
		} elseif ($p_layout == 'layout_5') {
			$perpage = 2;
			echo '<div class="overflow-hidden owl-carousel owl-carousel-layout3">';
		} elseif ($p_layout == 'layout_6') {
			$perpage = 1;
		}

		$query = new WP_Query(array(
			'post_type' => $issue_post_type,
			'order' => 'DESC',
			'posts_per_page' => $perpage,
			'tax_query'      => array(
				array(
					'taxonomy' => 'issues',
					'terms'    => $defult_issue_id, // grouped category
				),
			)
		));
		$count = 0;
		while ($query->have_posts()) :
			$count++;
			$query->the_post();
			$p_permalink = get_the_permalink();
			$p_id = get_the_id();
			$p_img_thumb = wp_get_attachment_image_url(get_post_thumbnail_id($p_id), 'prov_thumb');
			// $p_img_portrait = wp_get_attachment_image_url(get_post_thumbnail_id($p_id), 'portrait_thumb');
			$p_img_portrait = wp_get_attachment_image_url(get_post_thumbnail_id($p_id), 'prov_thumb');
			$p_nme = get_the_title();
			// $p_nme = mb_strimwidth($p_nme, 0, 50, "...");
			$p_excerpt = get_the_excerpt();
			// $p_excerpt = mb_strimwidth($p_excerpt, 0, 100, "...");
			?>


			<?php if ($p_layout == 'layout_1') { ?>

				<!-- Section 3 Starter layout_1 -->
				<a href="<?php echo $p_permalink; ?>" class="group">
					<img src="<?php echo $p_img_thumb; ?>" class="h-[220px] w-full object-cover rounded-[10px]">
					<h3 class="mt-6 text-lg font-extrabold leading-normal text-black md:text-main"><?php echo $p_nme; ?></h3>
					<p class="mt-2 font-droid md:text-lg md:leading-[30px] text-base text-black font-normal"><?php echo $p_excerpt; ?></p>
					<div class="group-hover:bg-black bg-[#F3F3F3] h-[10px] w-[249px] rounded-[10px] mt-8 transition-all ease-in-out duration-500 hidden lg:block">
					</div>
				</a>
				<!-- Section 3 End -->

			<?php } elseif ($p_layout == 'layout_2') { ?>

				<!-- Section 4 Starter layout_2 -->
				<div class="flex flex-col flex-1 -mx-4 lg:flex-row xl:items-end lg:mx-0">
					<a href="#" class="relative contents">
						<img src="<?php echo $p_img_portrait; ?>" class="relative z-10 lg:mb-10 lg:rounded-[20px]">
					</a>
					<div class="bg-light-gray lg:rounded-[20px] font-droid text-justify after:hidden lg:p-12 p-6 lg:text-2xl !rounded-br-none !rounded-tr-none text-lg lg:!leading-10 relative after:bg-light-gray after:w-[200px] after:lg:block after:absolute after:top-0 after:left-full after:h-full after:rounded-br-[20px]"><?php echo $p_excerpt; ?></div>
				</div>
				<!-- Section 4 End -->

			<?php } elseif ($p_layout == 'layout_3') { ?>

				<!-- Section 5 Starter layout_3 -->
				<a href="<?php echo $p_permalink; ?>" class="block my-4 lg:mx-1 lg:p-6 lg:bg-white lg:shadow-md lg:rounded-xl group">
					<img src="<?php echo $p_img_thumb ?>" alt="" class="h-[212px] object-cover">
					<h3 class="block mt-3 mb-2 text-lg font-extrabold text-black lg:leading-7 lg:text-xl"><?php echo $p_nme; ?></h3>
					<p class="text-base font-normal text-black lg:text-base lg:leading-loose font-droid"><?php echo $p_excerpt; ?></p>
					<div class="group-hover:bg-black bg-[#F3F3F3] h-[10px] w-[249px] rounded-[10px] mt-8 transition-all ease-in-out duration-500 hidden lg:block">
					</div>
				</a>
				<!-- Section 5 End -->

			<?php } elseif ($p_layout == 'layout_4') { ?>

				<!-- Section 6 Starter layout_4 -->
				<div class="relative flex-1 overflow-hidden">
					<h3 class="flex items-center justify-center text-lg font-extrabold text-black lg:text-xl lg:justify-start">
						<span class="bg-primary rounded-[10px] h-[23px] w-[222px] hidden lg:block"></span>
						<a href="<?php echo $p_permalink; ?>" class="relative flex-1 py-3 text-center lg:flex-none lg:text-start lg:px-10 bg-primary lg:py-0 lg:bg-white rounded-[10px] lg:rounded-none"><?php echo $p_nme; ?></a>
						<span class="bg-primary rounded-[10px] h-[23px] flex-1 hidden lg:block"></span>
					</h3>
					<p class="mt-4 text-2xl font-normal text-justify text-black lg:mt-6 lg:font-light font-droid lg:leading-loose"><?php echo $p_excerpt; ?></p>
				</div>
				<!-- Section 6 End -->

			<?php } elseif ($p_layout == 'layout_5') { ?>

				<!-- Section 7 Starter layout_5 -->

				<a href="<?php echo $p_permalink; ?>" class="lg:w-[330px] w-[300px] h-[300px] lg:h-[330px] rounded-full border-[10px] border-primary bg-primary hover:bg-white transition flex items-center justify-center px-6 font-extrabold lg:text-2xl text-xl text-black text-center"><?php echo $p_nme; ?></a>

				<!-- Section 7 End -->

			<?php } elseif ($p_layout == 'layout_6') { ?>


				<!-- Section 8 Starter layout_6 -->
				<div class="relative flex flex-col md:flex-row md:p-0 p-7 items-center flex-1 gap-5 overflow-hidden border-[10px] -mx-4 sm:mx-0 md:border-[20px] border-primary">
					<div class="flex-1 lg:px-[60px] md:px-4 px-0 text-center">
						<a href="<?php echo $p_permalink; ?>" class="block mb-6 text-lg font-semibold text-center text-black md:text-2xl"><?php echo $p_nme; ?></a>
						<span class="block h-px mx-auto mb-2 bg-black md:w-1/2 md:mb-6"></span>
						<h4 class="md:text-3xl text-lg font-normal text-black md:leading-[45px]">خالد المطاوع</h4>
					</div>
					<div class="md:text-xl text-base text-justify text-black font-cairo leading-[30px] lg:leading-[40px] lg:w-[563px] md:w-[450px] lg:py-[60px] md:py-10 md:px-[53px] md:border-r-[20px] md:border-r-primary"><?php echo $p_excerpt; ?></div>
				</div>
				<!-- Section 8 End -->

			<?php } ?>

<?php
		endwhile;
		wp_reset_postdata();
		if ($p_layout == 'layout_1') {
			echo '</div>';
		} elseif ($p_layout == 'layout_2') { } elseif ($p_layout == 'layout_3') {
			echo '</div></div>';
		} elseif ($p_layout == 'layout_4') { } elseif ($p_layout == 'layout_5') {
			echo '</div>';
		} elseif ($p_layout == 'layout_6') { }
		echo '</section>';
	}
} ?>





<?php get_footer(); ?>