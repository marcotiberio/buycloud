<?php 
	/* Template Name: Freeze Cloud */
?>

<?php get_header(); ?>


<div class="post-header">
      <p>merge your data with the cloud</p>
    </div>
    <section class="main-content">
      <main>
        <div class="cover" id="cover">
          <?php 
              $image = get_field('cover');
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
          <canvas id="canvas"></canvas>
        </div>
        
        <div class="cloud-info">
          <div class="left">
            <p><?php the_field('price'); ?></p>
            <p><?php the_field('ur_cloud'); ?></p>
          </div>
          <div class="right">
            <p><?php the_field('coordinates'); ?></p>
            <p><?php the_field('wind_direction'); ?></p>
            <p><?php the_field('speed'); ?></p>
            <p><?php the_field('cloudiness'); ?></p>
            <p><?php the_field('estimated_energy'); ?></p>
            <p><?php the_field('temperature'); ?></p>
          </div>
        </div>


        <div class="form">
          <div class="interact">
            <!-- <button class="button" id="capture">
              <p>to own is to interact</p>
            </button> -->
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
                <li style="color: red;"><label for="contract">contract photo</label></li>
              </ul>
            </div>
            <div class="right" style="text-align: right;">
              <ul style="list-style: none;">
                <li><input type="text" id="name" name="name" value="name" style="padding: 0; margin-right: 10px;"></li>
                <li><input type="text" id="email" name="email" value="email" style="padding: 0; margin-right: 10px;"></li>
                <li><input type="text" id="confirmemail" name="confirmemail" value="confirmemail" style="padding: 0; margin-right: 10px;"></li>
                <li><input type="file" id="certificate" name="certificate" accept="image/*" capture="user" style="padding: 0; margin-right: 10px; width:140px"></li>
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
          <button onclick="doCapture();">screenshot</button>
        </div>
      </main>

    
    
    
<?php
get_sidebar();
get_footer();