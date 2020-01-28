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
    'organization' => get_option( 'recranet_organization', 1000 )
);

$locale = get_locale();
$locale = substr($locale, 0, 2);

$action = '/';
if (isset($atts['action'])) {
    $action = $atts['action'];
}
?>

<recranet-search-bar class="recranet-element" formAction="<?php echo $action; ?>"></recranet-search-bar>

<script type="text/javascript">
    window.recranetConfig = {
        organization: <?php echo $options['organization']; ?>,
        locale: <?php echo $locale; ?>,
        currency: 'EUR'
    };
</script>
