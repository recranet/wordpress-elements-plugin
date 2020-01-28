<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://recranet.com/
 * @since      1.0.0
 *
 * @package    Recranet
 * @subpackage Recranet/public/partials
 */

$options = array(
    'organization' => get_option( 'recranet_organization', 1000 )
);

$locale = get_locale();
$locale = substr($locale, 0, 2);

$baseUrl = '/';
if (isset($atts['baseUrl'])) {
    $baseUrl = $atts['baseUrl'];
}
?>

<recranet-packages class="recranet-element" baseUrl="<?php echo $baseUrl; ?>"></recranet-packages>

<script type="text/javascript">
    window.recranetConfig = {
        organization: '<?php echo $options['organization']; ?>',
        locale: '<?php echo $locale; ?>',
        currency: 'EUR'
    };
</script>
<script type="text/javascript" src="//static.recranet.com/elements/sdk-<?php echo $locale; ?>/sdk.js?<?php echo mt_rand(); ?>"></script>
