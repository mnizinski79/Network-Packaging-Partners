<?php
/**
 * Single view Job meta box
 *
 * Hooked into single_job_listing_start priority 20
 *
 * @since  1.14.0
 */
?>
<?php do_action( 'single_job_listing_meta_before' ); ?>

<?php if ( $companyName = get_the_company_name() ) : ?>

<ul class="meta">
	<?php do_action( 'single_job_listing_meta_start' ); ?>
    
    <li class="company-name">
        <?php if ( $website = get_the_company_website() ) : ?>
			<a href="<?php echo esc_url( $website ); ?>" itemprop="url" target="_blank" rel="nofollow"><?php the_company_name( '<span itemprop="name">', '</span>' ); ?></a>
		<?php else : the_company_name( '<strong itemprop="name">', '</strong>' ); ?>
        <?php endif; ?>
    </li>
    
	<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>" itemprop="employmentType"><?php the_job_type(); ?></li>

	<li class="location" itemprop="jobLocation"><?php the_job_location(); ?></li>

	<li class="date-posted" itemprop="datePosted"><date><?php printf( __( 'Posted %s ago', 'wp-job-manager' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></date></li>

	<?php if ( is_position_filled() ) : ?>
		<li class="position-filled"><?php _e( 'This position has been filled', 'wp-job-manager' ); ?></li>
	<?php endif; ?>

	<?php do_action( 'single_job_listing_meta_end' ); ?>
</ul>

<?php endif; ?>

<?php do_action( 'single_job_listing_meta_after' ); ?>