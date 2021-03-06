<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

				<div id="comments">
					<h2>Comments</h2>
					<?php if ( have_comments() ) : ?>
					<ul class="commentlist">
						<?php wp_list_comments('avatar_size=80&max_depth=2&callback=ev_comment'); ?>
					</ul>
					 <?php else : ?>
					 <p class="nocomment">No one has said anything yet.</p>
						<?php if ( comments_open() ) : ?>
						 <?php else :  ?>
							<p class="nocomments">Comments are closed.</p>
						<?php endif; ?>
					<?php endif; ?>
					
					<?php if ( comments_open() ) : ?>
					<div id="commentform-container">
					<h3 class="comments" id="respond">Leave a Comment</h3>
					<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
					<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
					<?php else : ?>
					
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					
					<?php if ( is_user_logged_in() ) : ?>
					
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
					
					<?php else : ?>
					
					<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
					<label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>
					
					<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
					<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>
					
					<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
					<label for="url">Website</label></p>
					
					<?php endif; ?>
					
					
					<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
					
					<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
					</p>
					
					</form>
					
					<?php endif;?>
					</div>
					<?php endif; ?>

				</div>