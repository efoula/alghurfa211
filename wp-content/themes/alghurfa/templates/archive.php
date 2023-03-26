<?php 
/**
 * Template Name: Archive
 */
get_header();
?>
<?php
$issues = get_issues_exist();
$collaborators = get_collaborators_exist();
$post_types = get_all_posttypes();

// get URL parameters to set ajax content
$url_issue_id = $url_subject = $url_collaborator = $url_cur_page = '';
$url_issue_id = $_GET['issue'];
$url_subject = $_GET['subject'];
$url_collaborator = $_GET['collaborator'];
$url_cur_page = $_GET['cur_page'];
?>

<!-- Section 1 Starter -->
<section class="mb-24">
    <h3 class="mt-12 mb-8 text-xl font-extrabold text-center lg:text-3xl">
        دليـــــــــــــــــــــل الأعـــــــــــــــــداد</h3>
    <!-- Mobile filter button -->
    <button
        class="relative text-right archive-filter-button w-full shadow-md text-base font-extrabold px-6 py-3 rounded-[15px] bg-primary md:hidden mb-8">
        <div class="flex items-center justify-between">
            <span>التصفية</span>
            <!-- chevron down -->
            <i class="fas fa-chevron-down"></i>
        </div>
    </button>
    <!-- Filter component -->
    <div
        class="fixed left-0 z-40 flex flex-col items-center w-full h-full gap-5 px-6 py-10 transition-all duration-300 ease-in-out bg-white filter-menu bottom-full md:justify-center md:bg-transparent md:relative md:flex-row md:w-auto md:h-auto filter-container">
        <!-- Close button (in mobile only) -->
        <button
            class="bg-primary close-filter-menu text-black w-[55px] h-[55px] flex items-center justify-center rounded-full mb-10 md:hidden">
            <svg width="20" height="20" viewBox="0 0 25 25" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.2386 12.5L24.3459 5.39276C25.218 4.5206 25.218 3.10653 24.3459 2.23366L22.7663 0.654119C21.8942 -0.21804 20.4801 -0.21804 19.6072 0.654119L12.5 7.76136L5.39276 0.654119C4.5206 -0.21804 3.10653 -0.21804 2.23366 0.654119L0.654119 2.23366C-0.21804 3.10582 -0.21804 4.51989 0.654119 5.39276L7.76136 12.5L0.654119 19.6072C-0.21804 20.4794 -0.21804 21.8935 0.654119 22.7663L2.23366 24.3459C3.10582 25.218 4.5206 25.218 5.39276 24.3459L12.5 17.2386L19.6072 24.3459C20.4794 25.218 21.8942 25.218 22.7663 24.3459L24.3459 22.7663C25.218 21.8942 25.218 20.4801 24.3459 19.6072L17.2386 12.5Z"
                    fill="currentColor" />
            </svg>
        </button>
        <!-- Issues button component -->
        <button
            class="relative text-right archive-filter-item md:w-[330px] w-full shadow-md md:text-main text-lg font-extrabold px-6 py-3 rounded-[10px] bg-[#F3F3F3] transition-all ease-in-out duration-300 issues_button">
            <div class="flex items-center justify-between">
                <span>الأعداد</span>
                <!-- chevron down -->
                <i class="fas fa-chevron-down"></i>
            </div>
            <div
                class="archive-filter-list issues_drop_menu w-full pt-4 pb-6 shadow-lg border-[3px] border-primary rounded-[10px] px-3 offset-y divide-y-[5px] divide-[#F3F3F3] absolute mt-8 bg-white right-0">
                    <ul class="pr-8 list-disc">
                        <?php 
                          if($issues) {
                            foreach($issues as $issue) {
                              $issue_name = $issue['name'];
                              $issue_id = $issue['id'];
                        ?>

                          <li>
                              <a class="text-lg font-normal leading-normal transition-all duration-300 ease-in-out md:text-main hover:opacity-50 <?php if($url_issue_id == $issue_id) {echo 'selected';} ?>" id="<?php echo $issue_id; ?>">
                                  <?php echo $issue_name; ?>
                              </a>
                          </li>

                        <?php } } ?>
                    </ul>
            </div>
        </button>
        <!-- Subjects button component -->
        <button
            class="relative text-right archive-filter-item md:w-[330px] w-full shadow-md md:text-main text-lg font-extrabold px-6 py-3 rounded-[10px] bg-[#F3F3F3] transition-all ease-in-out duration-300" id="issue_posttypes" data-defaultname="المواضيع" data-selected="">
            <div class="flex items-center justify-between">
                <span>المواضيع</span>
                <!-- chevron down -->
                <i class="fas fa-chevron-down"></i>
            </div>
            <div
                class="archive-filter-list w-full pt-4 pb-6 shadow-lg border-[3px] border-primary rounded-[10px] px-3 offset-y divide-y-[5px] divide-[#F3F3F3] absolute mt-8 bg-white right-0">
                <!-- Repeat this item with loop -->

                <ul class="pr-8 list-disc">
                    <?php
                      if($post_types) {
                        foreach($post_types as $post_type) {
                          $posttype_ar_name = get_translation($post_type);
                    ?>
                      <li>
                          <a id="<?php echo $post_type; ?>" class="text-lg font-normal leading-normal transition-all duration-300 ease-in-out md:text-main hover:opacity-50 <?php if($url_subject == $post_type){echo 'selected';}?>">
                              <?php echo $posttype_ar_name; ?>
                          </a>
                      </li>
                    <?php }} ?>
                </ul>

            </div>
        </button>
        <!-- Authors button component -->
        <button class="relative text-right archive-filter-item md:w-[330px] w-full shadow-md md:text-main text-lg font-extrabold px-6 py-3 rounded-[10px] bg-[#F3F3F3] transition-all ease-in-out duration-300" id="collaborators" data-defaultname="المشاركين">
            <div class="flex items-center justify-between">
                <span>المشاركين</span>
                <!-- chevron down -->
                <i class="fas fa-chevron-down"></i>
            </div>
            <div
                class="archive-filter-list w-full pt-4 pb-6 shadow-lg border-[3px] border-primary rounded-[10px] px-3 offset-y divide-y-[5px] divide-[#F3F3F3] absolute mt-8 bg-white right-0">
                <!-- Repeat this item with loop -->

                <ul class="pr-8 list-disc">
                    <?php 
                      if($collaborators) {
                        foreach($collaborators as $collaborator) {
                          $collaborator_name = $collaborator['name'];
                          $collaborator_id = $collaborator['id'];
                    ?>

                      <li>
                          <a class="text-lg font-normal leading-normal transition-all duration-300 ease-in-out md:text-main hover:opacity-50 <?php if($url_collaborator == $collaborator_id){echo 'selected';}?>" data-colid="<?php echo $collaborator_id; ?>">
                              <?php echo $collaborator_name; ?>
                          </a>
                      </li>

                    <?php } } ?>
                </ul>

            </div>
        </button>
    </div>
    <!-- Columns list component -->
    <div class="relative -mx-6 lg:mx-0">
      <div class="absolute top-0 left-0 w-full h-full bg-white overlay bg-opacity-80"></div>
      <div class="flex flex-col lg:divide-y-[10px] lg:divide-[#F3F3F3] gap-[60px] lg:gap-0 ajax-content">
        
      <!-- first display content - most recent posts from all post types -->
      <?php
        if($url_subject) {
          $url_subject = $url_subject;
        } else {
          $url_subject = "any";
        }
        if($url_collaborator) {
          $collaborator_id = $url_collaborator;
        } else {
          $collaborator_id = 0;
        }
        if($url_issue_id) {
          $issue_id = $url_issue_id;
        } else {
          $issue_id = 0;
        }
        if($url_cur_page) {
          $page = $url_cur_page;
        } else {
          $page = 1;
        }

        echo '<script type="text/javascript">get_related_posts('.$page.', "'.$url_subject.'", '.$collaborator_id.', '.$issue_id.');</script>';

      ?>

      </div>
    </div>
</section>
<!-- Section 1 End -->

<?php get_footer(); ?>