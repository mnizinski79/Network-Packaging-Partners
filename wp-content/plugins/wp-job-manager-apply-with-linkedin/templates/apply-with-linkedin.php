<?php if ( $website = get_the_company_website() ) : ?>
<input class="apply-with-linkedin" type="button" value="<?php _e( 'Apply with LinkedIn', 'wp-job-manager-apply-with-linkedin' ); ?>" />
<?php else : ?>
<input class="apply-with-linkedin" type="button" value="<?php _e( 'Import from LinkedIn', 'wp-job-manager-apply-with-linkedin' ); ?>" />
<?php endif; ?>