<?php
/*** insta Downloader shortcodes ***/
function youtube_downloader_shortcode()
{
  ob_start();
  /* Start Short Code */
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) :
    $url = filter_var($_POST['link'], FILTER_SANITIZE_URL);
    if (strpos($url, 'youtube.com') !== false) :
      $url1 = parse_url($url, PHP_URL_QUERY);
      parse_str($url1, $url2);
      $imgId = $url2['v'];
      elseif (strpos($url, 'youtu.be') !== false) :
        $url1 = parse_url($url, PHP_URL_PATH);
        $url2 = trim($url1, '/');
        $imgId = $url2;
    //if the false link
    else :
      echo '<div class="alert alert-danger alert-dismissible fade show text-center text-uppercase" role="alert">
      <strong>worng URL!</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    endif;
  endif;
  ?>
  <div class="container-fluid">
    <form class="main-form" action="" method="POST">
      <div class="row">
        <input class="form-control col-xs-12 col-sm-9" style="border-color: #db2823;" type="text" name="link" placeholder="<?php esc_html_e('type the video url'); ?>">
        <input class="form-control btn btn-danger col-xs-12 col-sm-3" style="background-color: #db2823;" type="submit" name="send" value="<?php esc_html_e('submit', 'youtube-thumbnail-downloader'); ?>">
      </div>
    </form>
  </div>
  <!-- start download box -->
  <div class="big-box">
    <div class="download text-center text-capitalize">
      <div class="info row justify-content-around">
        <?php if (!empty($imgId)) : ?>
          <div class="contents">
            <img width="270" height="200" src="https://i.ytimg.com/vi/<?php echo $imgId; ?>/mqdefault.jpg" alt="">
            <div>
              <a class="btn text-capitalize mt-2 mb-2" style="background-color: #db2823;color: #fff" href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=https://i.ytimg.com/vi/<?php echo $imgId; ?>/mqdefault.jpg">Download MQ 320x180</a>
            </div>
          </div>
          <div class="contents">
            <img width="270" height="200" src="https://i.ytimg.com/vi/<?php echo $imgId; ?>/hqdefault.jpg" alt="">
            <div>
              <a class="btn text-capitalize mt-2 mb-2" style="background-color: #db2823;color: #fff" href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=https://i.ytimg.com/vi/<?php echo $imgId; ?>/hqdefault.jpg">Download HQ 480x360</a>
            </div>
          </div>
          <div class="contents">
            <img width="270" height="200" src="https://i.ytimg.com/vi/<?php echo $imgId; ?>/sddefault.jpg" alt="">
            <div>
              <a class="btn text-capitalize mt-2 mb-2" style="background-color: #db2823;color: #fff" href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=https://i.ytimg.com/vi/<?php echo $imgId; ?>/sddefault.jpg">Download SD 640x480</a>
            </div>
          </div>
          <div class="contents">
            <img width="270" height="200" src="https://i.ytimg.com/vi/<?php echo $imgId; ?>/maxresdefault.jpg" alt="">
            <div>
              <a class="btn text-capitalize mt-2 mb-2" style="background-color: #db2823;color: #fff" href="<?php echo plugins_url("inc/download/download.php", dirname(__FILE__)) ?>?youtubedowwnloade=image&url=https://i.ytimg.com/vi/<?php echo $imgId; ?>/maxresdefault.jpg">Download HD 1280x720</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php /* end Shor Code */ return ob_get_clean();
}
add_shortcode('youtube-thumbnail-downloader', 'youtube_downloader_shortcode');
