<?php
global $postID;
$p_permalink = get_the_permalink($postID);
$p_img_thumb = wp_get_attachment_image_url(get_post_thumbnail_id($postID), 'prov_thumb');
$p_nme = get_the_title($postID);
$p_nme = mb_strimwidth($p_nme, 0, 50, "...");
$p_excerpt = get_the_excerpt($postID);
$p_excerpt = mb_strimwidth($p_excerpt, 0, 100, "...");
?>

<a href="<?php echo $p_permalink; ?>" class="group">
    <img src="<?php echo $p_img_thumb; ?>"
        class="md:h-[220px] h-[280px] w-full object-cover rounded-[10px]">
    <h3 class="mt-3 text-xl font-extrabold leading-normal text-black lg:mt-6 lg:text-main">
        <?php echo $p_nme; ?></h3>
    <p class="mt-2 font-cairo text-base lg:leading-[30px] text-black font-normal"><?php echo $p_excerpt; ?></p>
    <div
        class="group-hover:bg-black bg-[#F3F3F3] h-[10px] w-[249px] rounded-[10px] mt-8 transition-all ease-in-out duration-500">
    </div>
</a>