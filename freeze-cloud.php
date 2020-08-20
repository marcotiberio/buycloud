<?php 
	/* Template Name: Freeze Cloud */

acf_form_head();

get_header(); ?>


<div class="post-header-freeze">
  <img src="https://www.buycloud.space/wp-content/uploads/2020/08/intro.png" alt="">
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
          <div class="noaa">
            <p>source: buycloud.space, NOAA.gov</p>
          </div>
        </div>




		  
		<p id="ownInteract">
			To own is to interact<br>Unite your data with the cloud
		</p>

        <div class="form">
            <?php the_field('test_form'); ?>
        </div>
		  
		<p id="declaration">
          read declaration
        </p>
		  
		<p id="makeSure">
			make sure you submit before paying
		</p>

        <button class="button" id="payment">
          <?php the_field('paypal_button'); ?>
        </button>

        
      </main>
		
		<!-- Modal Manifesto -->
    <div id="modalManifesto" class="modal">
        <div class="modal-content">
            <span id="closeManifesto">&times;</span>
            <img src="https://www.buycloud.space/wp-content/uploads/2020/08/Declaration.png" alt="">
        </div>
    </div>

    
    
    
<?php
get_sidebar();
get_footer();