<?php 
/**
 * Template Name: About Us
 */
get_header(); 
$page_id = get_the_id(); 
$content_page = get_post($page_id);
$content = $content_page->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
$content = str_replace(['<p>', '</p>'], '', $content);

$chiefs = get_post_meta($page_id, 'chiefs', true);
$managers = get_post_meta($page_id, 'managers', true);
$designers = get_post_meta($page_id, 'designers', true);
$inner_designers = get_post_meta($page_id, 'inner_designers', true);
$consultants = get_post_meta($page_id, 'consultants', true);

$page_img = wp_get_attachment_image_url(get_post_thumbnail_id($page_id), 'large');
?>

<!-- Section 1 Starter -->
<section class="pt-12 lg:mb-24 mb-10 max-w-[935px] mx-auto text-center">
    <h3 class="mb-3 text-lg font-extrabold md:text-3xl">
        عــــــــــــــــن الكتــــــــــــــــــــــــــــاب
    </h3>
    <p class="font-cairo font-light md:text-2xl text-base md:leading-[52px] leading-9 text-black mb-4"><?php echo $content; ?></p>
    <div
        class="bg-[#F8F7F7] border-[3px] border-black lg:py-14 py-10 px-10 lg:px-[152px] flex flex-col sm:flex-row sm:justify-between justify-center flex-wrap ">
        <div>
            <?php if($chiefs) { ?>
              <h4 class="mb-2 text-lg font-medium text-black lg:text-2xl">رئيس التحرير</h4>
              <?php foreach($chiefs as $chief) { ?>
                <h3 class="mb-4 text-lg font-bold text-black lg:mb-6 lg:text-xl font-cairo"><?php echo $chief ?>
                </h3>
              <?php } ?>
            <?php } ?>

            <?php if($managers) { ?>
              <h4 class="mb-2 text-lg font-medium text-black lg:text-2xl">مدير التحرير</h4>
              <?php foreach($managers as $manager) { ?>
                <h3 class="mb-4 text-lg font-bold text-black lg:mb-6 lg:text-xl font-cairo"><?php echo $manager ?>
                </h3>
              <?php } ?>
            <?php } ?>

            <?php if($designers) { ?>
              <h4 class="mb-2 text-lg font-medium text-black lg:text-2xl">غرافيك</h4>
              <?php foreach($designers as $designer) { ?>
                <h3 class="mb-4 text-lg font-bold text-black lg:mb-6 lg:text-xl font-cairo"><?php echo $designer ?>
                </h3>
              <?php } ?>
            <?php } ?>

            <?php if($inner_designers) { ?>
              <h4 class="mb-2 text-lg font-medium text-black lg:text-2xl">تصميم داخلي</h4>
              <?php foreach($inner_designers as $inner_designer) { ?>
                <h3 class="mb-4 text-lg font-bold text-black lg:mb-6 lg:text-xl font-cairo"><?php echo $inner_designer ?>
                </h3>
              <?php } ?>
            <?php } ?>

        </div>
        <div>
          <?php if($consultants) { ?>
            <h4 class="mb-2 text-lg font-medium text-black lg:text-2xl">لجنة استشارية</h4>
            <?php foreach($consultants as $consultant) { ?>
              <h3 class="mb-4 text-lg font-bold text-black lg:mb-6 lg:text-xl font-cairo"><?php echo $consultant ?>
              </h3>
            <?php } ?>
          <?php } ?>
        </div>
    </div>
    <div class="mt-10 text-center lg:mt-24">
        <h5 class="font-cairo font-bold lg:text-2xl lg:leading-[52px] text-black mb-4">تم نشر ودعم كتاب
            الغرفة
            211
            عن طريق</h5>
        <img src="<?php echo $page_img; ?>" alt="about" class="mx-auto">
        <div class="flex items-center justify-center gap-5 pr-4 mt-3">
            <?php if($GLOBALS[ 'ig_url' ]) { ?>
              <a target="_blank" href="<?php echo $GLOBALS[ 'ig_url' ]; ?>">
                  <svg viewBox="0 0 31 30" fill="none" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_86_561)">
                          <path
                              d="M15.8571 2.70117C19.8649 2.70117 20.3395 2.71875 21.9157 2.78906C23.3805 2.85351 24.1715 3.09961 24.6989 3.30469C25.3961 3.57422 25.9 3.90234 26.4215 4.42383C26.9489 4.95117 27.2711 5.44922 27.5407 6.14648C27.7457 6.67383 27.9918 7.4707 28.0563 8.92968C28.1266 10.5117 28.1442 10.9863 28.1442 14.9883C28.1442 18.9961 28.1266 19.4707 28.0563 21.0469C27.9918 22.5117 27.7457 23.3027 27.5407 23.8301C27.2711 24.5273 26.943 25.0312 26.4215 25.5527C25.8942 26.0801 25.3961 26.4023 24.6989 26.6719C24.1715 26.8769 23.3746 27.123 21.9157 27.1875C20.3336 27.2578 19.859 27.2754 15.8571 27.2754C11.8492 27.2754 11.3746 27.2578 9.79847 27.1875C8.33362 27.123 7.5426 26.8769 7.01526 26.6719C6.318 26.4023 5.81409 26.0742 5.2926 25.5527C4.76526 25.0254 4.44299 24.5273 4.17346 23.8301C3.96838 23.3027 3.72229 22.5059 3.65784 21.0469C3.58753 19.4648 3.56995 18.9902 3.56995 14.9883C3.56995 10.9805 3.58753 10.5059 3.65784 8.92968C3.72229 7.46484 3.96838 6.67383 4.17346 6.14648C4.44299 5.44922 4.77112 4.94531 5.2926 4.42383C5.81995 3.89648 6.318 3.57422 7.01526 3.30469C7.5426 3.09961 8.33948 2.85351 9.79847 2.78906C11.3746 2.71875 11.8492 2.70117 15.8571 2.70117ZM15.8571 0C11.7848 0 11.275 0.0175781 9.67542 0.0878906C8.08167 0.158203 6.98596 0.416015 6.03675 0.785156C5.04651 1.17187 4.20862 1.68164 3.37659 2.51953C2.5387 3.35156 2.02893 4.18945 1.64221 5.17383C1.27307 6.1289 1.01526 7.21875 0.944946 8.8125C0.874634 10.418 0.857056 10.9277 0.857056 15C0.857056 19.0723 0.874634 19.582 0.944946 21.1816C1.01526 22.7754 1.27307 23.8711 1.64221 24.8203C2.02893 25.8105 2.5387 26.6484 3.37659 27.4805C4.20862 28.3125 5.04651 28.8281 6.03089 29.209C6.98596 29.5781 8.07581 29.8359 9.66956 29.9062C11.2692 29.9766 11.7789 29.9941 15.8512 29.9941C19.9235 29.9941 20.4332 29.9766 22.0328 29.9062C23.6266 29.8359 24.7223 29.5781 25.6715 29.209C26.6559 28.8281 27.4938 28.3125 28.3258 27.4805C29.1578 26.6484 29.6735 25.8105 30.0543 24.8262C30.4235 23.8711 30.6813 22.7812 30.7516 21.1875C30.8219 19.5879 30.8395 19.0781 30.8395 15.0059C30.8395 10.9336 30.8219 10.4238 30.7516 8.82422C30.6813 7.23047 30.4235 6.13476 30.0543 5.18555C29.6852 4.18945 29.1754 3.35156 28.3375 2.51953C27.5055 1.6875 26.6676 1.17187 25.6832 0.791015C24.7282 0.421875 23.6383 0.164062 22.0446 0.09375C20.4391 0.0175781 19.9293 0 15.8571 0Z"
                              fill="#000" />
                          <path
                              d="M15.8571 7.29492C11.6031 7.29492 8.15198 10.7461 8.15198 15C8.15198 19.2539 11.6031 22.7051 15.8571 22.7051C20.111 22.7051 23.5621 19.2539 23.5621 15C23.5621 10.7461 20.111 7.29492 15.8571 7.29492ZM15.8571 19.998C13.0973 19.998 10.859 17.7598 10.859 15C10.859 12.2402 13.0973 10.002 15.8571 10.002C18.6168 10.002 20.8551 12.2402 20.8551 15C20.8551 17.7598 18.6168 19.998 15.8571 19.998Z"
                              fill="#000" />
                          <path
                              d="M25.6657 6.99027C25.6657 7.98636 24.8571 8.7891 23.8668 8.7891C22.8707 8.7891 22.068 7.9805 22.068 6.99027C22.068 5.99417 22.8766 5.19144 23.8668 5.19144C24.8571 5.19144 25.6657 6.00003 25.6657 6.99027Z"
                              fill="#000" />
                      </g>
                      <defs>
                          <clipPath id="clip0_86_561">
                              <rect width="30" height="30" fill="white" transform="translate(0.857056)" />
                          </clipPath>
                      </defs>
                  </svg>
              </a>
            <?php } ?>
            <?php if($GLOBALS[ 'tw_url' ]) { ?>
              <a target="_blank" href="<?php echo $GLOBALS[ 'tw_url' ]; ?>">
                  <svg viewBox="0 0 31 30" fill="none" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_86_560)">
                          <path
                              d="M9.86293 27.1884C21.1837 27.1884 27.3757 17.8092 27.3757 9.67556C27.3757 9.40916 27.3757 9.14396 27.3577 8.87996C28.5623 8.00865 29.6022 6.92981 30.4285 5.69396C29.3053 6.19196 28.1136 6.5184 26.8933 6.66236C28.1783 5.89322 29.14 4.68334 29.5993 3.25796C28.3911 3.97497 27.0693 4.48024 25.6909 4.75196C24.7629 3.76518 23.5356 3.11176 22.1988 2.89281C20.862 2.67387 19.4903 2.9016 18.296 3.54077C17.1017 4.17995 16.1513 5.19493 15.592 6.42864C15.0326 7.66236 14.8955 9.04604 15.2017 10.3656C12.7546 10.2428 10.3607 9.60685 8.17535 8.49896C5.98997 7.39108 4.06198 5.83603 2.51653 3.93476C1.72944 5.28975 1.48837 6.89379 1.8424 8.42029C2.19644 9.94678 3.11895 11.2809 4.42213 12.1512C3.44257 12.1225 2.48434 11.8582 1.62853 11.3808V11.4588C1.62892 12.8798 2.12084 14.257 3.02087 15.3567C3.92089 16.4564 5.1736 17.211 6.56653 17.4924C5.66038 17.7395 4.70962 17.7757 3.78733 17.598C4.1808 18.8209 4.94656 19.8903 5.97758 20.6566C7.00859 21.423 8.25331 21.8481 9.53773 21.8724C8.26158 22.8755 6.80017 23.6171 5.23712 24.0549C3.67407 24.4926 2.04005 24.6179 0.428528 24.4236C3.24332 26.2298 6.51843 27.1879 9.86293 27.1836"
                              fill="#000" />
                      </g>
                      <defs>
                          <clipPath id="clip0_86_560">
                              <rect width="30" height="30" fill="white" transform="translate(0.428528)" />
                          </clipPath>
                      </defs>
                  </svg>
              </a>
            <?php } ?>
            <?php if($GLOBALS[ 'fb_url' ]) { ?>
              <a target="_blank" href="<?php echo $GLOBALS[ 'fb_url' ]; ?>">
                  <svg viewBox="0 0 30 30" fill="none" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_86_559)">
                          <path
                              d="M30 15C30 6.71572 23.2843 0 15 0C6.71572 0 0 6.71572 0 15C0 22.4868 5.48525 28.6925 12.6562 29.8178V19.3359H8.84766V15H12.6562V11.6953C12.6562 7.93593 14.8957 5.85937 18.322 5.85937C19.9626 5.85937 21.6797 6.15234 21.6797 6.15234V9.84374H19.7883C17.925 9.84374 17.3438 11.0001 17.3438 12.1875V15H21.5039L20.8389 19.3359H17.3438V29.8178C24.5147 28.6925 30 22.4868 30 15Z"
                              fill="#000" />
                          <path
                              d="M20.8389 19.3359L21.5039 15H17.3438V12.1875C17.3438 11.0013 17.925 9.84375 19.7883 9.84375H21.6797V6.15234C21.6797 6.15234 19.9632 5.85938 18.322 5.85938C14.8957 5.85938 12.6562 7.93594 12.6562 11.6953V15H8.84766V19.3359H12.6562V29.8178C14.2093 30.0607 15.7907 30.0607 17.3438 29.8178V19.3359H20.8389Z"
                              fill="#fff" />
                      </g>
                      <defs>
                          <clipPath id="clip0_86_559">
                              <rect width="30" height="30" fill="white" />
                          </clipPath>
                      </defs>
                  </svg>
              </a>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Section 1 End -->

<?php get_footer(); ?>