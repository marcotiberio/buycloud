<?php 
	/* Template Name: Freeze Cloud */

acf_form_head();

get_header(); ?>


<div class="post-header">
    <p style="font-weight: 800;">to own is to interact</p>
    <div id="postHeaderIntro">
      <p style="margin-left: 10px;">Merge your data with the cloud and take a picture of you gazing at eachother. 
      This information is used to generate your certificate. 
      <br><br>
      Once you pay, your ownership will be registred in the US (universal System) 
      where you can keep track of the movements and value of your cloud.
      </p>
    </div>
</div>
    <section class="main-content">
      <main>
        <div class="cover" id="cover">
          <?php 
              $image = get_field('cover');
              if( !empty( $image ) ): ?>
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
          <!-- <canvas id="canvas"></canvas> -->
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
            <?php the_field('test_form'); ?>
        </div>

        <button class="button" id="payment">
          <?php the_field('paypal_button'); ?>
        </button>

        
      </main>

    
    
    
<?php
get_sidebar();
get_footer();