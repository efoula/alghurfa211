<?php

/**
 * Template Name: Distribution
 */
get_header();

?>

<!-- Section 1 Starter -->
<section class="pt-12 lg:mb-24 mb-10 max-w-[1155px] mx-auto text-center">
    <h3 class="mb-16 text-lg font-extrabold md:text-3xl">
        أماكــــــــــــــــن التـــــــــــــوزيــع
    </h3>

    <div class="flex flex-col gap-[72px]">
        <?php
        $entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true );

        $group = array();

        foreach ( (array) $entries as $key => $entry ) {

            $destrib_secname = '';

            if ( isset( $entry['destrib_secname'] ) ) {
                $destrib_secname = esc_html( $entry['destrib_secname'] );
                $destrib_secname = str_replace(['<p>', '</p>'], '', $destrib_secname);
            }

            $group[$destrib_secname][] = $entry;
        }         

        foreach($group as $group_single) {
            $section_name = $group_single[0]['destrib_secname'];

    ?>

        <div class="flex flex-col gap-[72px]">
            <div class="border-[3px] border-black lg:p-20 p-8 flex flex-col lg:flex-row items-center justify-between relative gap-10">
                <h3 class="absolute lg:pb-10 lg:pl-10 pb-4 pl-4 leading-none bg-white -right-[3px] lg:-top-6 -top-3 font-bold lg:text-[40px] text-2xl"><?php echo $section_name; ?></h3>
                <?php 
                    $count = 0;
                    foreach($group_single as $group_entry_single) { 
                        $count++;
                        if ( isset( $group_entry_single['distrib_name'] ) ) {
                            $distrib_name = wpautop( $group_entry_single['distrib_name'] );
                            $distrib_name = str_replace(['<p>', '</p>'], '', $distrib_name);
                        }

                        if ( isset( $group_entry_single['distrib_address'] ) ) {
                            $distrib_address = wpautop( $group_entry_single['distrib_address'] );
                            $distrib_address = str_replace(['<p>', '</p>'], '', $distrib_address);
                        }

                        if ( isset( $group_entry_single['distrib_phone'] ) ) {
                            $distrib_phone = wpautop( $group_entry_single['distrib_phone'] );
                            $distrib_phone = str_replace(['<p>', '</p>'], '', $distrib_phone);
                        }

                        if ( isset( $group_entry_single['distrib_url'] ) ) {
                            $distrib_url = wpautop( $group_entry_single['distrib_url'] );
                            $distrib_url = str_replace(['<p>', '</p>'], '', $distrib_url);
                        }
                ?>
                    <div class="flex flex-col gap-4 text-right">
                        <h2 class="lg:text-[27px] text-xl leading-normal font-bold font-droid"><?php echo $distrib_name; ?></h2>
                        <p class="text-base font-bold leading-normal lg:text-xl"><?php echo $distrib_address; ?></p>
                        <a href="tel:<?php echo $distrib_phone; ?>" dir="ltr" class="text-base font-bold lg:mb-4 lg:text-xl"><?php echo $distrib_phone; ?></a>
                        <a target="_blank" href="<?php echo $distrib_url; ?>" class="lg:px-6 lg:py-3 py-2 px-4 w-fit font-bold text-black shadow-md bg-primary !font-cairo lg:text-lg text-base rounded-[10px]">
                            الموقع الألكتروني
                        </a>
                    </div>
                    <div class="lg:w-px w-full lg:h-[212px] h-px bg-black separator"></div>
                <?php } ?>
            </div>
        </div>

    <?php } ?>
    </div>
</section>
<!-- Section 1 End -->

<?php get_footer(); ?>