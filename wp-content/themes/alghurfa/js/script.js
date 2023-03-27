jQuery(document).ready(function ($) {
  // on page load scroll into section from url

  $(window).scroll(function () {
    // const headerHeight = $(".menu-list").height();
    const logo = $(".logo-brand").height();

    if ($(this).scrollTop() > logo + 50) {
      $(".logo-yellow").addClass("!h-[45px]");
      $("header").addClass("header-sticky");
    } else if ($(this).scrollTop() == 0) {
      $("header").removeClass("header-sticky");
      $(".logo-yellow").removeClass("!h-[45px]");
    }
  });

  $(".archive-filter-item").click(function () {
    $(".archive-filter-item").removeClass("active !bg-primary");
    $(this).addClass("active !bg-primary");
    $(".overlay").addClass("active");
  });
  $(document).click(function (e) {
    if (
      !$(e.target).closest(".archive-filter-item").length ||
      $(e.target).closest(".archive-filter-list a").length
    ) {
      $(".archive-filter-item").removeClass("active !bg-primary");
      $(".overlay").removeClass("active");
    }
  });

  // Header nav toggler in mobile
  $(".menu-toggler").click(function () {
    $(".menu-list").toggleClass("active");
  });
  $(".close-menu").click(function () {
    $(".menu-list").removeClass("active");
  });

  $(".archive-filter-button").click(function () {
    $(".filter-menu").toggleClass("active");
  });

  // Close filter menu
  $(".close-filter-menu, .archive-filter-list a").click(function () {
    $(".filter-menu").removeClass("active");
  });

  ///////////////////////////////////////////////////////// archive scenario

  // $('.archive-filter-item div ul li a').click(function (){
  //   $(this).closest(".archive-filter-item").removeClass("active !bg-primary");
  //   var foula_var = $(this).parents('button.archive-filter-item').attr('id');
  //   console.log(foula_var);
  // });

  ////////////////////////////////////////////////////////////////////////////////

  const url = window.location.href;
  const hash = url.substring(url.indexOf("#") + 1);
  if (hash) {
    const section = document.getElementById(hash);
    if (section) {
      $("html, body").animate(
        {
          scrollTop: $(section).offset().top - 100,
        },
        0
      );
    }
  }
});
