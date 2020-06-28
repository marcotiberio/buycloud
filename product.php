<?php 
	/* Template Name: Product */
?>

<?php get_header(); ?>


<div class="post-header">
      <p>follow the steps to buy this cloud</p>
    </div>
    <section class="main-content">
      <main>
        <div class="cover">
          <img src="/cloud.png" alt="" />
        </div>
        <div class="info">
          <div class="left">
            <ul style="list-style: none;">
              <li style="color: #FED56B;">PRICE</li>
              <li style="color: #FED56B;">UR CLOUD</li>
              <li>coordinates</li>
              <li>wind</li>
              <li>direction</li>
              <li>speed</li>
              <li>cloudiness</li>
              <li>estimated energy</li>
              <li>temperature</li>
            </ul>
          </div>
          <div class="right" style="text-align: right;">
            <ul style="list-style: none;">
              <li style="color: #FED56B;">€11,78</li>
              <li style="color: #FED56B;">#18100</li>
              <li style="color: lime;">Nº128</li>
              <li style="color: lime;">Zº923</li>
              <li style="color: lime;">southwest</li>
              <li style="color: lime;">80 km/u</li>
              <li style="color: lime;">(u) 5</li>
              <li style="color: lime;">120.000</li>
              <li style="color: lime;">16 ºC</li>
            </ul>
          </div>
        </div>
        <div class="buttons">
          <button class="button" id="manifesto"><p>read manifesto</p></button>
          <button class="button" id="freeze">
            <a href="/freeze.html"><p>freeze cloud</p></a>
          </button>
        </div>
      </main>
    </section>
    
    
<?php
get_sidebar();
get_footer();