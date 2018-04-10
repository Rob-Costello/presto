<?php
/**
 * Reward Tagz
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;

if( $_POST ){

	$_POST['reward'] = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_POST['reward']);

	$wpdb->query('UPDATE rt_tagz SET description = "' . $_POST['description'] . '", reward = "' . $_POST['reward'] . '" WHERE code = "' . $_POST['tag'] . '"' );

	$log = $wpdb->get_results( 'SELECT * FROM rt_tagz_events_log WHERE tag = "' . $_POST['tag'] . '" ORDER BY datetime DESC', OBJECT );

	if( $log[0]->event_id == 3 ){

		$finder = $wpdb->get_row( 'SELECT * FROM rt_finders WHERE tag = "' . $_POST['tag'] . '" ORDER BY datetime DESC', OBJECT );

		$to = $finder->email;
        $subject = 'Reward Updated';
        $body = 'Good news! The item you found with Tag Number: '.$this->input->post('tag').' has had its reqard changed.  Please visit the site and enter the tag number to review: <a href="'. WP_HOME .'/rt/">Visit Website</a>';

       	$headers = array('Content-Type: text/html; charset=UTF-8');
 		wp_mail( $to, $subject, $body, $headers );

	}

	$wpdb->query('INSERT INTO rt_tagz_events_log (event_id, tag, value, ip_address, info) 
		values (4, "' . $_POST['tag'] . '", "From description:  '.$_POST['orig_description'] . ' reward: '.$_POST['orig_reward'].' To description: ' . $_POST['description'] . ' reward: '.$_POST['reward'] . '" , "' . $_SERVER['REMOTE_ADDR'] . '", "'.$_SERVER['HTTP_USER_AGENT'].'")' );

}

$tagz = $wpdb->get_results( 'SELECT * FROM rt_tagz WHERE user_id = ' . get_current_user_id(), OBJECT );
?>

<section class="row">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <table width="100%">
        <thead>
        <tr>
            <th colspan="2"></th>
            <th width="150"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Includes 10% admin and money transfer fees">total paid</span></th>
            <th width="150">total received by finder/charity</th>
        </tr>
        </thead>
	<?php foreach( $tagz as $t ){ ?>
        <tr id="tag<?php echo $t->code; ?>">
		<form method="post" class="columns small-12">



				<td><?php echo $t->code; ?></td>
				<td><input type="text" name="description" value="<?php echo $t->description; ?>" disabled></td>
				<td><span class="woocommerce-Price-amount amount"><input type="text" name="reward" class="priceFix" value="£<?php echo $t->reward; ?>" disabled></span></td>
                <td><span class="woocommerce-Price-amount amount actualOffer"></span></td>
				<td>
					<input type="hidden" name="tag" value="<?php echo $t->code; ?>">
					<input type="hidden" name="orig_description" value="<?php echo $t->description; ?>">
					<input type="hidden" name="orig_reward" value="<?php echo $t->reward; ?>">
					<button type="button" onclick="tagEditable('tag<?php echo $t->code; ?>');" class="button view edit">Edit</button>
					<button type="submit" class="button view save" style="display: none;">Save</button>
				</td>

            <script>
                function updateOffer<?php echo $t->code; ?>() {
                    var origVal = $("#tag<?php echo $t->code; ?> .priceFix").val().match(/\d+/)[0];
                    var discount = origVal - (origVal / 100 * 10); // percent means divide by 100
                    $('#tag<?php echo $t->code; ?> .actualOffer').html('&pound;' + discount);
                }
                $( "#tag<?php echo $t->code; ?> .priceFix" ).keyup(function() {
                    updateOffer<?php echo $t->code; ?>();
                });
                updateOffer<?php echo $t->code; ?>();
            </script>
		</form>
        </tr>

	<?php } ?>
        </tbody>
    </table>

</section>
