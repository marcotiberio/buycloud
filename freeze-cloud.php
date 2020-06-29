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
        </div>
        <div class="formform">
          <div class="left">
            <ul style="list-style: none;">
              <li style="color: red;">name</li>
              <li style="color: red;">email</li>
            </ul>
          </div>
          <div class="right" style="text-align: right;">
            <ul style="list-style: none;">
              <li style="color: lime;"><?php the_field('price'); ?></li>
              <li style="color: lime;"><?php the_field('ur_cloud'); ?></li>
            </ul>
          </div>
          <p class="credits" style="color: white; font-size: 9px; margin-top: 10px;">
          We’ll use this information to create your certificate<br>
          and send you the UR-tracking number of your cloud.
          </p>
        </div>
        <div class="buttons">
          <button class="button" id="freeze">
            <?php the_field('paypal_button'); ?>
          </button>
        </div>
      </main>
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
      </script>
    </div>
    
    
<?php
get_sidebar();
get_footer();