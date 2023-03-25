<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package filosophy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
<div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
					<?php 
					$philosophy_cn=get_comments_number();
					if($philosophy_cn <= 1){
						echo $philosophy_cn.''. __('comment','philosophy'); 
					}else{
						echo $philosophy_cn. '' . __('comments','philosophy');
					}
					?>
					</h3>

                    <!-- commentlist -->
                    <ol class="commentlist">
						<?php 
						wp_list_comments();
						?>

                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2"><?php _e("Add Comment","philosophy"); ?></h3>

                        <form name="contactForm" id="contactForm" method="post" action="">
                           <?php echo do_shortcode('[contact-form-7 id="96" title="Contact form 1"]');?>
                        </form> <!-- end form -->

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->