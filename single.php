<?php 
the_post();

get_header();

?>



    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                   <?php the_title();?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php the_date();?></li>
                    <li class="cat">

					<!-- category দেখানোর জন্য  এই  -->
                        In
                        <?php echo get_the_category_list(' ');?>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail('large');?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

             <?php the_content();?>

                <p class="s-content__tags">
                    <span><?php _e('Post Tags','filosophy');?></span>

                    <span class="s-content__tag-list">

					<!-- tag গুলো দেখানোর জন্য এই function -->
					<?php echo get_the_tag_list();?>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">

				<!-- author image দেখানোর জন্য  -->
                   <?php echo get_avatar(get_the_author_meta("ID"));?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">

						<!-- author নাম এর জন্য  -->
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>">
							<?php the_author();?></a>
                        </h4>
                    
                        <p>
							<!-- author er decription  -->
							<?php the_author_meta('description');?>
                        </p>

                        <ul class="s-content__author-social">
						<?php 

						// সোশ্যাল লিংক  দেখানর জন্য 

						$filosophy_facebook= get_field('facebook',"user_". get_the_author_meta('ID'));
						$filosophy_twitter= get_field('twitter',"user_". get_the_author_meta('ID'));
						$filosophy_instagram= get_field('instagram',"user_". get_the_author_meta('ID'));
						
						?>
						<?php 
						if($filosophy_facebook){
							?>
							<li><a href="<?php echo esc_url($filosophy_facebook);?>">Facebook</a></li>
							<?php
						}
							?>
						<?php 
						if($filosophy_twitter){
							?>
							<li><a href="<?php echo esc_url($filosophy_twitter);?>">Twitter</a></li>
							<?php
						}
							?>
						<?php 
						if($filosophy_instagram){
							?>
							<li><a href="<?php echo esc_url($filosophy_instagram);?>">Instagram</a></li>
							<?php
						}
							?>
                          
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
							<?php 
							$filosophy_prev= get_previous_post();
							if ( $filosophy_prev ):
                                ?>
                            <a href="<?php echo get_the_permalink( $filosophy_prev ); ?>" rel="prev">
                                <span><?php _e('Previous Post','phylosophy');?></span>
                                <?php echo get_the_title($filosophy_prev);?>
                            </a>
							<?php endif;?>
                        </div>
                        <div class="s-content__next">
						<?php 
							$philosophy_next_post = get_next_post();
							if ( $philosophy_next_post ):
								
                                ?>
                            <a href="<?php echo get_the_permalink( $philosophy_next_post ); ?>" rel="next">
                                <span><?php _e('Next Post','phylosophy');?></span>
								<?php echo get_the_title( $philosophy_next_post ); ?>
                            </a>
							<?php endif;?>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <?php 
        
        if(!post_password_required()){

            comments_template();
        }
        
        ?>

    </section> <!-- s-content -->


  


 <?php 
 
 get_footer();
 ?>