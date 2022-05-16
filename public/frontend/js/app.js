// PRELOADER PART
document.addEventListener("DOMContentLoaded", function () {
  $(".preloader").delay(900).fadeOut();
});
// AOS PLUGIN FOR ANIMATION

AOS.init({
  disable: "mobile",
  once: true,
});
window.addEventListener("load", AOS.refresh);

$(".filter_buttons button").click(function () {
  AOS.refresh();

  $("#courses").mousemove(function () {
    AOS.refresh();
  });
});

// AOS PLUGIN ENDS

$(function () {
  // MENU FIXED
  let navTop = $(".creative_navbar").offset().top;

  // TEST
  let animated_img = $(".animated__human img");
  let animated_value;
  if ($("#courses").length) {
    animated_value = $("#courses").offset().top - 1250;
  }

  $(window).on("scroll", function () {
    let scrTop = $(window).scrollTop();
    // FIXED NAV
    if (scrTop > navTop) {
      $(".creative_navbar").addClass("fixedNav");
      $(".fixedLogo").addClass("activeLogo");
    } else {
      $(".creative_navbar").removeClass("fixedNav");
      $(".fixedLogo").removeClass("activeLogo");
    }
    // ANIMATED HUMAN FIGURE
    if ($("#courses").length > 0) {
      if (scrTop > animated_value) {
        animated_img.addClass("animate");
      } else {
        animated_img.removeClass("animate");
      }
    }
  });

  // BANNER SLIDER INDEX
  $(".banner_slider").slick({
    fade: true,
    arrows: false,
    speed: 600,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  // mix it up filtering course
  if ($(".filterable_container").length > 0) {
    var mixer = mixitup(".filterable_container");
  }

  // JOIN SEMINAR BUTTON
  let seminarJoinButton = $(".join__seminar__btn");
  seminarJoinButton.click(function (e) {
    e.preventDefault();
    let propValue = $(this).attr("data-id");

    $(".seminar_model").addClass("modalActive");
    let optionsNode = $(".seminar_model .card select option");
    let options = optionsNode.toArray();
    options.map((item) => {
      let value = item.value;
      if (value == propValue) {
        item.setAttribute("selected", "selected");
      }
    });
  });

  $(".close__modal").click(function () {
    $(".seminar_model").removeClass("modalActive");
  });

  // JOIN SEMINAR BUTTON ENDS

  let courseFeatureCard = $(".featureCard");
  if (courseFeatureCard.length > 0) {
    let featureButton = $(".button_container span.featured_btn");
    let hide = true;
    featureButton.click(function () {
      if (hide == true) {
        hide = false;
        featureButton.html("Read Less");
      } else {
        hide = true;
        featureButton.html("Read More");
      }
      courseFeatureCard.toggleClass("fullView");
    });
  }

  // YOUTUBE thumb test
  let thumb = $(".youtubeThumb");
  thumb.click(function () {
    // REMOVING IMG FIRST
    $(this).children("img").remove();
    let iframeSrc = $(this).attr("data-youtube");
    // replacing with iframe
    let iframe =
      `<iframe  src="` +
      iframeSrc +
      `?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    $(this).html(iframe);
  });

  // FILTER FOR BLOG
  let filterBtn = $(".filterButton");
  filterBtn.click(function () {
    filterBtn.children("span").toggleClass("rotate");
    $(".filteringOptions").slideToggle(150);
  });

  // SEARCH BAR FOR BLOG NAV
  let blogSearch = $("li.searchBarIcon a");
  let searchBarOpen = false;
  blogSearch.click(function () {
    if (searchBarOpen == false) {
      $(blogSearch).children(".closeIcon").show();
      $(blogSearch).children(".searchIcon").hide();
      searchBarOpen = true;
    } else {
      $(blogSearch).children(".closeIcon").hide();
      $(blogSearch).children(".searchIcon").show();
      searchBarOpen = false;
    }
    $(".searchOption").fadeToggle(150);
  });

  // SMALL DEVICE SEARCH
  let smallSearchButton = $(".smallDeviceSearchBar i.bi-search");
  smallSearchButton.click(function () {
    $(this).siblings("form").fadeToggle(100);
  });
});
