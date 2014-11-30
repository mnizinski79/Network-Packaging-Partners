<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WP_Job_Manager_Applications_Integration class.
 *
 * Integrates the applications plugin with other form plugins.
 */
class WP_Job_Manager_Applications_Integration {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Integrate apply with linkedin
		add_filter( 'wp_job_manager_apply_with_linkedin_enable_http_post', '__return_true' );
		add_action( 'wp_job_manager_apply_with_linkedin_application', array( $this, 'handle_apply_with_linkedin' ), 10, 3 );
	}

	/**
	 * Handle an application from LinkedIn
	 * @param  array $application
	 */
	public function handle_apply_with_linkedin( $job_id, $profile_data, $cover_letter ) {
		if ( ! $job_id || empty( $profile_data ) ) {
			return;
		}

		$candidate_name      = $profile_data->formattedName;
		$candidate_email     = $profile_data->emailAddress;
		$application_message = $cover_letter;
		$application_meta    = array();

		if ( ! $application_message ) {
			$application_message = $profile_data->headline;
		} else {
			$application_meta[ __( 'Title', 'wp-job-manager-applications' ) ] = $profile_data->headline;
		}

		// Add meta data from submitted profile
		$application_meta[ __( 'Location', 'wp-job-manager-applications' ) ]     = $profile_data->location->name;
		$application_meta[ __( 'Full Profile', 'wp-job-manager-applications' ) ] = $profile_data->publicProfileUrl;

		create_job_application( $job_id, $candidate_name, $candidate_email, $application_message, $application_meta, false );
	}
}
new WP_Job_Manager_Applications_Integration();