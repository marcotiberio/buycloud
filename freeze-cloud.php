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
          <div class="buttons">
            <button class="button" id="capture">
              <p>to own is to interact</p>
            </button>
          </div>
        </div>
        <div class="buttons">
          <button class="button" id="freeze">
            <a href="#"><p>go to payment</p></a>
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