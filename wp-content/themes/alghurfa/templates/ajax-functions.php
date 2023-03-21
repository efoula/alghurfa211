<?php

// Get Issue Content
function get_issue_callback() {
    global $issue_id;
    $issue_id = $_POST['issue_id'];
    $issue_template = get_template_part('templates/content-issue');
    $response = ob_get_contents();
    ob_end_clean();
    echo $response;
    die(1);
}

// Get Issue Post Types for Dropdown Menu
function get_posttypes_callback() {
  $issue_id = $_POST['issue_id'];
  global $post_types;
  $post_types = get_all_posttypes_byissue($issue_id);
  $dropdwon_list = get_template_part('templates/content-posttypes');
  $response = ob_get_contents();
  ob_end_clean();
  echo $response;
  die(1);
}

// Get Issue Collaborators for Dropdown Menu
function get_collaborators_callback() {
  $issue_id = $_POST['issue_id'];
  global $collaborators;
  $collaborators = get_all_collaborators_byissue($issue_id);
  $dropdwon_list = get_template_part('templates/content-collaborators');
  $response = ob_get_contents();
  ob_end_clean();
  echo $response;
  die(1);
}

// Get Post Types Posts Per Issue
function get_related_posts_callback() {
  // if issue is set, then get only posts related to issue id and post type
  // otherwise, get all the posts related to the post type  

  if(isset($_POST['page'])){
    $page = sanitize_text_field($_POST['page']);
  }

  if(isset($_POST['issue_id'])){
    $issue_id = sanitize_text_field($_POST['issue_id']);
  }

  if(isset($_POST['collaborator_id'])){
    $collaborator_id = sanitize_text_field($_POST['collaborator_id']);
  }

  if(isset($_POST['posttype'])){
    $posttype = sanitize_text_field($_POST['posttype']);
  }

  if(($page == 1) && ($collaborator_id == 0) && ($posttype == 'any') && ($issue_id > 0)) {

    $issue_template = get_template_part('templates/content-issue');
    $response = ob_get_contents();
    ob_end_clean();
    echo $response;
    die(1);

  } else {

      if($posttype == 'any') {
        $posttype = get_registered_post_types();
      }

      $msg = '';
      $cur_page = $page;
      $page -= 1;
      $per_page = 6;
      $previous_btn = true;
      $next_btn = true;
      $first_btn = true;
      $last_btn = true;
      $start = $page * $per_page;

      if($issue_id > 0) {
          $tax_query[] =  array(
              'taxonomy' => 'issues',
              'field' => 'term_id',
              'terms' => $issue_id
          );
      }

      if($collaborator_id > 0) {
          $tax_query[] =  array(
              'taxonomy' => 'collaborators',
              'field' => 'term_id',
              'terms' => $collaborator_id
          );
      }
      
      $all_posts = new WP_Query(
        array(
          'post_type'         => $posttype,
          'posts_per_page'    => $per_page,
          'post_status'     => array('publish'),
          'fields'      => 'ids',
          'cache_results'   => false,
          'offset'      => $start,
          'tax_query'     => $tax_query,
        )
      );

      $count_posts = new WP_Query(
        array(
          'post_type'     => $posttype,
          'post_status'     => array('publish'),
          'posts_per_page'  => -1,
          'fields'      => 'ids',
          'cache_results'   => false,
          'tax_query'     => $tax_query,
        )
      );

      $count = $count_posts->post_count;

      
      echo '<div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-x-5 gap-y-8">';
      if ( $all_posts->have_posts() ) :
        while ( $all_posts->have_posts() ) : $all_posts->the_post();
          global $postID;
          $postID = get_the_id();
          $msg = get_template_part('templates/content-post');
        endwhile;
      endif;
      wp_reset_query($all_posts);

      echo '</div>';


        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        if ($count > 6) {

            // Pagination Buttons logic
            $pag_container .= "
            <div class='cvf-universal-pagination'>
                <ul>";

            if ($previous_btn && $cur_page > 1) {
                $pre = $cur_page - 1;
                $pag_container .= "<li p='$pre' class='active'><span class='fas fa-angle-right'></span></li>";
            } else if ($previous_btn) {
                $pag_container .= "<li class='inactive'><span class='fas fa-angle-right'></span></li>";
            }
            for ($i = $start_loop; $i <= $end_loop; $i++) {

                if ($cur_page == $i)
                    $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
                else
                    $pag_container .= "<li p='$i' class='active'>{$i}</li>";
            }

            if ($next_btn && $cur_page < $no_of_paginations) {
                $nex = $cur_page + 1;
                $pag_container .= "<li p='$nex' class='active'><span class='fas fa-angle-left'></span></li>";
            } else if ($next_btn) {
                $pag_container .= "<li class='inactive'><span class='fa fas fa-angle-left'></span></li>";
            }


            $pag_container = $pag_container . "
                </ul>
            </div>";

            // We echo the final output
            echo '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

        }

        exit();

    }
}


?>