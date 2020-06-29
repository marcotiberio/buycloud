<?php 
	/* Template Name: Freeze Cloud */
?>

<?php get_header(); ?>


<div class="post-header">
      <p>merge your data with the cloud</p>
    </div>
    <section class="main-content">
      <main>
        <div class="cover">
          <?php 
              $image = get_field('cover');
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
          <canvas id="canvas"></canvas>
        </div>
        <div class="form">
          <div class="interact">
            <button class="button" id="capture">
              <p>to own is to interact</p>
            </button>
            <div class="form-button-info">
              <p style="color: lime;">take a picture<br>while gazing at your cloud</p>
            </div>
          </div>
          <div class="formform">
            <div class="left">
              <ul style="list-style: none;">
                <li style="color: red;"><label for="name">name</label></li>
                <li style="color: red;"><label for="email">email</label></li>
                <li style="color: red;"><label for="confirmemail">confirm email</label></li>
              </ul>
            </div>
            <div class="right" style="text-align: right;">
              <ul style="list-style: none;">
                <li><input type="text" id="name" name="name" value="name" style="padding: 0; margin: 0;"></li>
                <li><input type="text" id="email" name="email" value="email" style="padding: 0; margin: 0;"></li>
                <li><input type="text" id="confirmemail" name="confirmemail" value="confirmemail" style="padding: 0; margin: 0;"></li>
              </ul>
            </div>
            <p class="credits" style="color: white; font-size: 9px; margin-top: 10px;">
            We’ll use this information to create your certificate<br>
            and send you the UR-tracking number of your cloud.
            </p>
          </div>
        </div>
        <div class="buttons">
          <button class="button" id="freeze">
            <?php the_field('paypal_button'); ?>
          </button>
        </div>
      </main>

      <div class="container" id="panel">
        <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888;">
                <h1>Take Screenshots in JS</h1>
                <p style="font-style: italic;">A html2canvas easy implementation</p>
                <hr>
                <input type="text" name="caption-input" id="caption-input" placeholder="Caption..." value="" class="form-control" style="border-radius: 0px;">
                <br>
                <a href="javascript:getScreen();" class="btn btn-lg btn-block btn-outline-success">Capture Screenshot and Download</a>
                <a href="" id="blank"></a>
            </div>
        </div>
    </div>
    </section>

    <!-- Snapshot -->

    <div class="snapshot">
      <video id="player" controls autoplay style="display: none;"></video>

      <script>
        const player = document.getElementById("player");
        const canvas = document.getElementById("canvas");
        const context = canvas.getContext("2d");
        const captureButton = document.getElementById("capture");

        const constraints = {
          video: true
        };

        captureButton.addEventListener("click", () => {
          context.drawImage(player, 0, 0, canvas.width, canvas.height);

          // Stop all video streams.
          player.srcObject.getVideoTracks().forEach(track => track.stop());
        });

        // Attach the video stream to the video element and autoplay.
        navigator.mediaDevices.getUserMedia(constraints).then(stream => {
          player.srcObject = stream;
        });

        // save canvas image as data url (png format by default)
        var dataURL = canvas.toDataURL();
      </script>
    </div>

    <!-- HTML2CANVAS -->
    <script src="/js/html2canvas.js"></script>

    <script>
        function getScreen() {
            var caption = $('#caption-input').val();
            $("#caption-text").html(caption);
            $("#panel").hide();
            html2canvas(document.body, {
                dpi: 192,
                onrendered: function(canvas) {
                    $("#blank").attr('href', canvas.toDataURL("image/png"));
                    $("#blank").attr('download', caption + '.png');
                    $("#blank")[0].click();
                }
            });
        }
    </script>
    
    
<?php
get_sidebar();
get_footer();