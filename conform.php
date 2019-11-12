<?php 
function contactform7_before_send_mail( $conform) {
     global $wpdb;
    $conform = WPCF7_Submission::get_instance();
    if ( $conform ) 
        $formData = $conform->get_posted_data();
    $email = $formData['email'];
	$fname = $formData['fname'];
	$lname = $formData['lname'];
	
    $wpdb->insert( 'contact_form_backup', array( 'email' =>$email,'fname' =>$fname ,'lname' =>$lname ,'date' => date('Y-m-d H:i:s')) );
}
remove_all_filters ('wpcf7_before_send_mail');
add_action( 'wpcf7_before_send_mail', 'contactform7_before_send_mail' );

?>


