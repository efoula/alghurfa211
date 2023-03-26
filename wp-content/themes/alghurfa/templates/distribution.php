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
        <div class="border-[3px] border-black lg:p-20 p-8 flex flex-col lg:flex-row items-center justify-between relative gap-10">
            <h3 class="absolute lg:pb-10 lg:pl-10 pb-4 pl-4 leading-none bg-white -right-[3px] lg:-top-6 -top-3 font-bold lg:text-[45px] text-2xl">
                مصر
            </h3>
            <?php for ($i = 0; $i <= 1; $i++) : ?>
                <div class="flex flex-col gap-4 text-right">
                    <h2 class="lg:text-[33px] lg:text-2xl text-xl leading-normal font-bold font-droid">مكتبة الكتب خان</h2>
                    <p class="text-base font-bold leading-normal lg:text-2xl">٣٠ شارع اللاسلكي، المعادي، القاهرة</p>
                    <a href="tel:+201066521221" dir="ltr" class="text-base font-bold lg:mb-4 lg:text-2xl">
                        +201066521221
                    </a>
                    <a href="#" class="lg:px-6 lg:py-3 py-2 px-4 w-fit font-bold text-black shadow-md bg-primary !font-cairo lg:text-[22px] text-base rounded-[10px]">
                        الموقع الألكتروني
                    </a>
                </div>
                <?php if ($i == 0) : ?>
                    <div class="lg:w-px w-full lg:h-[212px] h-px bg-black separator"></div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="border-[3px] border-black lg:p-20 p-8 flex flex-col lg:flex-row items-center justify-between relative gap-10">
            <h3 class="absolute lg:pb-10 lg:pl-10 pb-4 pl-4 leading-none bg-white -right-[3px] lg:-top-6 -top-3 font-bold lg:text-[45px] text-2xl">
                ليبيا
            </h3>
            <?php for ($i = 0; $i <= 1; $i++) : ?>
                <div class="flex flex-col gap-4 text-right">
                    <h2 class="lg:text-[33px] lg:text-2xl text-xl leading-normal font-bold font-droid">مكتبة الكتب خان</h2>
                    <p class="text-base font-bold leading-normal lg:text-2xl">٣٠ شارع اللاسلكي، المعادي، القاهرة</p>
                    <a href="tel:+201066521221" dir="ltr" class="text-base font-bold lg:mb-4 lg:text-2xl">
                        +201066521221
                    </a>
                    <a href="#" class="lg:px-6 lg:py-3 py-2 px-4 w-fit font-bold text-black shadow-md bg-primary !font-cairo lg:text-[22px] text-base rounded-[10px]">
                        الموقع الألكتروني
                    </a>
                </div>
                <?php if ($i == 0) : ?>
                    <div class="lg:w-px w-full lg:h-[212px] h-px bg-black separator"></div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="border-[3px] border-black lg:p-20 p-8 flex flex-col lg:flex-row items-center justify-between relative">
            <h3 class="absolute lg:pb-10 lg:pl-10 pb-4 pl-4 leading-none bg-white -right-[3px] lg:-top-6 -top-3 font-bold lg:text-[45px] text-2xl">
                أونلاين
            </h3>

            <div class="flex flex-col gap-4 text-right">
                <h2 class="lg:text-[33px] lg:text-2xl text-xl leading-normal font-bold font-droid">أمازون دوت كوم</h2>
                <p class="text-base font-bold leading-normal lg:text-2xl">
                    يمكنم شراء النسخة الرقمية من خلال<br>
                    الرابط التالي علي أمازون:
                </p>
                <a href="#" class="lg:px-6 lg:py-3 py-2 px-4 w-fit font-bold text-black shadow-md bg-primary !font-cairo lg:text-[22px] text-base rounded-[10px]">
                    الموقع الألكتروني
                </a>
            </div>

        </div>
    </div>
</section>
<!-- Section 1 End -->

<?php get_footer(); ?>