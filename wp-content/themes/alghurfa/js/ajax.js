jQuery(document).ready(function($) { 

  owl_load(); // load owl carousels
  get_post_types();
  get_collaborators();

  if ($('button.issues_button li a').hasClass("selected")) {
    var a_text = $('button.issues_button li a.selected').text();
    $('button.issues_button span').text(a_text);
  }

  if ($('button#issue_posttypes li a').hasClass("selected")) {
    var a_text = $('button#issue_posttypes li a.selected').text();
    $('button#issue_posttypes span').text(a_text);
  }

  if ($('button#collaborators li a').hasClass("selected")) {
    var a_text = $('button#collaborators li a.selected').text();
    $('button#collaborators span').text(a_text);
  }

  $('.issues_drop_menu ul li a').click(function(){

      $('.ajax-content').addClass('animated-background');

      // rename button issues on select
      var issue_name = $(this).text();
      $(this).parents('button').find('div:first-child span').text(issue_name);

      // reset button subjects / post types
      reset_subject_button();

      // reset button collaborators
      reset_collaborator_button();

      var issue_id = $(this).attr('id');
      $(this).parents('button').attr('selected_issue', issue_id);

      var page = 1;
      var post_type = 'any';
      var collaborator_id = 0;

      get_related_posts(page, post_type, collaborator_id, issue_id);
  });

  $(document).on( 'click', '.ajax-content .cvf-universal-pagination li.active', function(e) {
          e.preventDefault();
          e.stopImmediatePropagation();
          var page = jQuery(this).attr('p');
          // var post_type = jQuery('#issue_posttypes').data("selected");
          var post_type = getUrlParameter('subject');
          var collaborator_id = getUrlParameter('collaborator');
          get_related_posts(page, post_type, collaborator_id);
      }
  );

}); // end of jQuery function


// reset button subjects / post types
function reset_subject_button() {
  var posttypes_name = jQuery('button#issue_posttypes').data("defaultname");
  jQuery('button#issue_posttypes div:first-child span').text(posttypes_name);
}

// reset button collaborators
function reset_collaborator_button() {
  var collaborator_name = jQuery('button#collaborators').data("defaultname");
  jQuery('button#collaborators div:first-child span').text(collaborator_name);
}

function get_post_types() {
  jQuery('#issue_posttypes ul li a').click(function(){
    jQuery('.ajax-content').addClass('animated-background');

    // rename button subjects / post types on select
    var posttype_name = jQuery(this).text();
    jQuery(this).parents('button').find('div:first-child span').text(posttype_name);

    // ajax get posttype related posts
    var post_type = jQuery(this).attr('id');
    jQuery(this).parents('button').data('selected', post_type);
    get_related_posts(1, post_type);

    reset_collaborator_button();
  });
  ////////////////////////////////////////////////////////////////
}

function get_collaborators() {
  jQuery('#collaborators ul li a').click(function(){
    jQuery('.ajax-content').addClass('animated-background');
    // rename button subjects / post types on select
    var collaborator_name = jQuery(this).text();
    jQuery(this).parents('button').find('div:first-child span').text(collaborator_name);

    // ajax get posttype related posts
    var post_type = 'any';
    var collaborator_id = jQuery(this).data('colid');
    get_related_posts(1, post_type, collaborator_id);

    reset_subject_button();
  });
  ////////////////////////////////////////////////////////////////
}

var posts_all;
function get_related_posts(page, post_type, collaborator_id, issue_id) {
    if (posts_all && posts_all.readystate != 4) {
        posts_all.abort();
    }

    var issue_btn_attr = jQuery('button.issues_button').attr('selected_issue');
    if (typeof issue_btn_attr !== 'undefined' && issue_btn_attr !== false) {
        issue_id = issue_btn_attr;
    } else { // no issue selected
        issue_id = getUrlParameter('issue');
    }

    if (typeof collaborator_id !== 'undefined' && collaborator_id !== false) {
        collaborator_id = collaborator_id;
    } else { // no issue selected
        collaborator_id = 0;
    }

    if (!post_type) {
      post_type = 'any';
    }

    var related_posts_data = {
        type: 'GET',
        issue_id: issue_id,
        collaborator_id: collaborator_id,
        posttype: post_type,
        page: page,
        action: 'get_related_posts',
        async: false,
    };

    // Send the data
    posts_all = jQuery.post(ajax_handler, related_posts_data, function(response) {
        jQuery('.ajax-content').removeClass('animated-background');
        jQuery('.ajax-content').html(response);
        owl_load();
        var url = window.location.pathname;
        var redirect_lnk =
            url +
            '?issue=' +
            issue_id +
            '&subject=' +
            post_type +
            '&collaborator=' +
            collaborator_id +
            '&cur_page=' +
            page;

        history.pushState({}, null, redirect_lnk);
    });
}

// get url parameter value
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

// owl carousel load
function owl_load() {
  jQuery("#section-3").owlCarousel({
    items: 2,
    nav: false,
    loop: false,
    rtl: true,
    dots: false,
    margin: 20,

    responsive: {
      0: {
        items: 1,
        dots: true,
      },
      800: {
        stagePadding: 50,
        items: 2,
      },
    },
  });

  jQuery("#section-correspondence").owlCarousel({
    items: 3,
    rtl: true,
    dots: false,
    loop: false,
    margin: 10,
    responsive: {
      0: {
        items: 1,
        dots: true,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });

  jQuery("#circles-section").owlCarousel({
    items: 3,
    rtl: true,
    loop: false,
    dots: false,
    margin: 0,
    responsive: {
      0: {
        items: 1,
        dots: true,
        margin: 35,
        stagePadding: 50,
      },
      600: {
        items: 2,
        dots: true,
      },
      1350: {
        items: 3,
      },
    },
  });

}
