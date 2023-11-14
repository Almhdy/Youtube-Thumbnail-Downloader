<?php

/*** insta Downloader shortcodes ***/
function youtube_downloader_shortcode()
{
  ob_start();
?>
<!-- Start Short Code -->
<form class="main-form" id="main-form-post-data" action="" method="POST">
  <input type="text" id="video_url" name="link" placeholder="<?php esc_html_e('type the video url'); ?>">
  <input id="submit-button" class="btn-button" type="submit" name="send"
    value="<?php esc_html_e('Submit', 'youtube-thumbnail-downloader'); ?>">
</form>
<!-- start download box -->
<div class="big-box" style="display: none;">
  <div class="contents">
    <img width="270" height="200" id="image-url" src="" alt="">
    <a class="btn-button" id="download-url"
      href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=">Download
      MQ 320x180</a>
  </div>
  <div class="contents">
    <img width="270" height="200" id="image-url" src="" alt="">
    <a class="btn-button" id="download-url"
      href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=">Download
      HQ 480x360</a>
  </div>
  <div class="contents">
    <img width="270" height="200" id="image-url" src="" alt="">
    <a class="btn-button" id="download-url"
      href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=">Download
      SD 640x480</a>
  </div>
  <div class="contents">
    <img width="270" height="200" id="image-url" resdefault.jpg" alt="">
    <a class="btn-button" id="download-url"
      href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=">Download
      HD 1280x720</a>
  </div>
</div>
<?php /* end Shor Code */ return ob_get_clean();
}
add_shortcode('youtube-thumbnail-downloader', 'youtube_downloader_shortcode');