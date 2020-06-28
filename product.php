<?php 
	/* Template Name: Product */
?>

<?php get_header(); ?>


<div class="post-header">
      <p>follow the steps to buy this cloud</p>
    </div>
    <section class="main-content">
      <main>
        <?php 
            $image = get_field('cover');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <div class="info">
          <div class="left">
            <ul style="list-style: none;">
              <li style="color: #FED56B;">price</li>
              <li style="color: #FED56B;">ur_cloud</li>
              <li>coordinates</li>
              <li>wind_direction</li>
              <li>speed</li>
              <li>cloudiness</li>
              <li>estimated_energy</li>
              <li>temperature</li>
            </ul>
          </div>
          <div class="right" style="text-align: right;">
            <ul style="list-style: none;">
              <li style="color: #FED56B;"><?php the_field('price'); ?></li>
              <li style="color: #FED56B;"><?php the_field('ur_cloud'); ?></li>
              <li style="color: lime;"><?php the_field('coordinates'); ?></li>
              <li style="color: lime;"><?php the_field('wind_direction'); ?></li>
              <li style="color: lime;"><?php the_field('speed'); ?></li>
              <li style="color: lime;"><?php the_field('cloudiness'); ?></li>
              <li style="color: lime;"><?php the_field('estimated_energy'); ?></li>
              <li style="color: lime;"><?php the_field('temperature'); ?></li>
            </ul>
          </div>
        </div>
        <div class="buttons">
          <button class="button" id="manifesto"><p>read manifesto</p></button>
          <button class="button" id="freeze">
            <a href="#"><p>freeze cloud</p></a>
          </button>
        </div>
      </main>
    </section>
    
    
<?php
get_sidebar();
get_footer();