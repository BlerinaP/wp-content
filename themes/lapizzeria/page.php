<?php get_header();?>

  <?php while(have_posts()): the_post(); ?>
   <div class="hero">
       <div class="hero-content">
           <div class="hero-text">
               <?php the_post_thumbnail(); ?>
               <h2><?php the_title(); ?></h2>
           </div>
       </div>
   </div>

   <div class="main-content container">
      <main class="text-center content-text">
          <?php the_content(); ?>
      </main>
   </div>

  <?php endwhile; ?>

<?php get_footer();?>