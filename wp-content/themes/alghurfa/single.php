<?php get_header(); ?>
<?php
$post_id = get_the_id();
$content_post = get_post($post_id);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
$post_img_large = wp_get_attachment_image_url(get_post_thumbnail_id($post_id), 'large');

$next_post = get_adjacent_post(false, '', false);
$next_post_url = get_the_permalink($next_post);

$previous_post = get_adjacent_post(false, '', true);
$previous_post_url = get_the_permalink($previous_post);

$post_type = get_post_type($post_id);
$posttype_ar_name = get_translation($post_type);

$issue_id = wp_get_object_terms($post_id, 'issues', array('fields' => 'ids'))[0];
$issue_name = get_term($issue_id)->name;
$issue = get_term($issue_id, 'issues');
$issue_url = get_term_link($issue);

$collaborator_id = wp_get_object_terms($post_id, 'collaborators', array('fields' => 'ids'))[0];
$collaborator_name = get_term($collaborator_id)->name;

?>



<!-- Section 1 Starter -->
<section class="mb-10 lg:mb-24">
    <h3 class="mt-12 mb-3 text-xl font-extrabold text-center lg:text-3xl">
        <?php echo get_the_title(); ?>
    </h3>
    <p class="mb-8 text-base font-light text-center text-black font-cairo md:text-2xl"><?php echo $collaborator_name; ?></p>
    <div class="relative flex flex-col items-start gap-4">
        <div class="flex flex-row items-center justify-center flex-1 gap-5 lg:gap-8 ">
            <a <?php if (is_a($next_post, 'WP_Post')) {
                    echo 'href="' . $next_post_url . '"';
                } else {
                    echo 'style="pointer-events: none"';
                } ?> class="text-[#9F9F9F] lg:text-2xl text-lg font-extrabold flex items-center lg:gap-16 gap-10 lg:flex-col  flex-row self-center lg:self-auto transition hover:text-black">
                <i class="rotate-90 fas fa-arrow-up"></i>
                <span class="lg:rotate-90">النص التالي</span>
                <i class="rotate-90 fas fa-arrow-up"></i>
            </a>
            <img src="<?php echo $post_img_large; ?>" alt="">
            <a <?php if (is_a($previous_post, 'WP_Post')) {
                    echo 'href="' . $previous_post_url . '"';
                } else {
                    echo 'style="pointer-events: none"';
                } ?> class="text-[#9F9F9F] lg:text-2xl text-lg font-extrabold flex items-center lg:gap-16 gap-10 lg:flex-col flex-row self-center lg:self-auto transition hover:text-black">
                <i class="-rotate-90 fas fa-arrow-up"></i>
                <span class="lg:-rotate-90">النص السابق</span>
                <i class="-rotate-90 fas fa-arrow-up"></i>
            </a>
        </div>

        <!-- <div class="flex flex-col justify-center flex-1 order-1 gap-5 lg:gap-8 lg:order-2">
            
        </div> -->
        <div class="flex items-center justify-center lg:w-[70%] mx-auto">
            <div id="multicolumn1" class="flex-1 text-sm font-light !leading-loose lg:text-xl font-Amiri"><?php echo $content; ?></div>
        </div>

    </div>
    <hr class="border-[3px] rounded-full border-[#9F9F9F] block lg:mt-14 my-10 lg:mb-14">
    <div class="flex flex-wrap items-center justify-center gap-3 lg:gap-7">
        <a href="<?php echo get_permalink(5) . '?issue=' . $issue_id . '&subject=' . $post_type; ?>" class="px-4 py-2 font-bold text-black shadow-md bg-primary font-cairo lg:text-base text-sm rounded-[10px]"><?php echo $posttype_ar_name; ?></a>

        <?php if ($issue_id) { ?>
            <a href="<?php echo get_permalink(5) . '?issue=' . $issue_id; ?>" class="px-4 py-2 font-bold text-black shadow-md bg-primary font-cairo lg:text-base text-sm rounded-[10px]"><?php echo $issue_name; ?></a>
        <?php } ?>

        <?php if ($collaborator_id) { ?>
            <a href="<?php echo get_permalink(5) . '?issue=' . $issue_id . '&subject=&collaborator=' . $collaborator_id; ?>" class="px-4 py-2 font-bold text-black shadow-md bg-primary font-cairo lg:text-base text-sm rounded-[10px]"><?php echo $collaborator_name; ?></a>
        <?php } ?>
    </div>
</section>
<!-- Section 1 End -->




<?php get_footer(); ?>