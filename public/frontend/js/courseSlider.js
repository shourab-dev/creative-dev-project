$(function () {
    // DEPARTMENT SLIDER

    $(".department__slider").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: ".department_base_course_slider",
        focusOnSelect: true,
    });
    $(".department_base_course_slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: ".department__slider",
    });
    let allCourse = $(".all__courses").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $(".leftArrow").click(function () {
        allCourse.slick("slickPrev");
    });
    $(".rightArrow").click(function () {
        allCourse.slick("slickNext");
    });
});
//   // asNavFor: ".slider-nav",
