<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://recranet.com/
 * @since      1.0.4
 *
 * @package    Recranet
 * @subpackage Recranet/public/partials
 */

$options = array(
    'organization' => get_option( 'recranet_organization', 1000 ),
    'accommodation_category' => get_option( 'recranet_accommodation_category', null ),
    'locality_category' => get_option( 'recranet_locality_category', null ),
    'google_api_key' => get_option( 'recranet_google_api_key', null )
);

$locale = get_locale();
$locale = substr($locale, 0, 2);

$action = '/';
if (isset($atts['action'])) {
    $action = $atts['action'];
}
?>

<script type="text/javascript">
    window.recranetConfig = {
        organization: '<?php echo $options['organization']; ?>',
        locale: '<?php echo $locale; ?>',
        currency: 'EUR',
        googleApiKey: <?php echo (isset($options['google_api_key']) && !empty($options['google_api_key']) ? '\''.$options['google_api_key'].'\'' : 'null'); ?>,
        accommodationParams: {
            accommodationCategory: <?php echo (isset($options['accommodation_category']) && $options['accommodation_category'] > 0 ? $options['accommodation_category'] : 'null'); ?>,
            localityCategory: <?php echo (isset($options['locality_category']) && $options['locality_category'] > 0 ? $options['locality_category'] : 'null'); ?>
        }
    };
</script>
<script type="text/javascript" src="//static.recranet.com/elements/sdk-<?php echo $locale; ?>/sdk.js?<?php echo mt_rand(); ?>" async></script>

<recranet-search-bar class="recranet-element" formAction="<?php echo $action; ?>"></recranet-search-bar>
