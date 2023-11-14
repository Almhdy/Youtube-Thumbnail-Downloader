jQuery(document).ready(function ($) {
  let img = [
    'mqdefault.jpg',
    'hqdefault.jpg',
    'sddefault.jpg',
    'maxresdefault.jpg'
  ]
  // Start
  $('#submit-button').click(function (e) {
    e.preventDefault()
    jQuery.ajax({
      type: 'post',
      url: ajax_object.ajax_url,
      data: {
        action: 'get_data',
        videoUrl: $('#video_url').val()
      },
      success: function (msg) {
        if (msg == 0) {
          alert('Please Add a Valid URL')
        } else {
          // Image URL
          for (let i = 0; i < img.length; i++) {
            $('img#image-url').eq(i).attr('src', 'https://i.ytimg.com/vi/' + msg + '/' + img[i])
          }
          // Download URL
          $url = $('a#download-url').attr('href')
          for (let i = 0; i < img.length; i++) {
            $('a#download-url').eq(i).attr('href', $url + 'https://i.ytimg.com/vi/' + msg + '/' + img[i])
          }
          $('.big-box').fadeIn()
        }
      }
    })
  })
// End
})
