$(function () {
  $('[data-toggle="tooltip"]').tooltip()

  // Filter menu checkbox/radio on click open sub menu
  // $('.filter-dropdown .dropdown-menu').on('click', function (e) {
  //   $(this).addClass('show')
  //   $(this).parent().addClass('show')
  // })
})

const course_wrapper = $('.course-details-wrapper')

if (course_wrapper.length > 0) {
  $(window).scroll(function () {
    const window_top = $(window).scrollTop() + 76
    const course_wrapper_top = course_wrapper.offset().top
    if (window_top > course_wrapper_top) {
      if (!$('.course-details-wrapper').is('.sticky')) {
        $('.course-details-wrapper').addClass('sticky')
      }
    } else {
      $('.course-details-wrapper').removeClass('sticky')
    }

    var footer = document.querySelector('.footer')
    var footer_position = footer.getBoundingClientRect()

    // checking for partial visibility
    if (
      footer_position.top < window.innerHeight &&
      footer_position.bottom >= 0
    ) {
      $('.course-details-wrapper').removeClass('sticky')
    }
  })
}
