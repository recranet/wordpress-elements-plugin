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
    'organization' => get_option( 'recranet_organization', 1000 ),
    'accommodation_category' => get_option( 'recranet_accommodation_category', null ),
    'locality_category' => get_option( 'recranet_locality_category', null ),
    'google_api_key' => get_option( 'recranet_google_api_key', null )
);

$locale = get_locale();
$locale = substr($locale, 0, 2);

$layoutType = '';
if (isset($atts['layouttype'])) {
    $layoutType = $atts['layouttype'];
}

$accommodationCategory = '';
if (isset($atts['accommodationcategory'])) {
    $accommodationCategory = $atts['accommodationcategory'];
}
?>

<?php if (!empty($accommodationCategory)) : ?>
<script type="text/javascript">
    window.recranetConfig = {
        organization: '<?php echo $options['organization']; ?>',
        locale: '<?php echo $locale; ?>',
        currency: 'EUR',
        googleApiKey: <?php echo (isset($options['google_api_key']) && !empty($options['google_api_key']) ? '\''.$options['google_api_key'].'\'' : 'null'); ?>,
        accommodationParams: {
            accommodationCategory: <?php echo $accommodationCategory; ?>,
            localityCategory: <?php echo (isset($options['locality_category']) && $options['locality_category'] > 0 ? $options['locality_category'] : 'null'); ?>
        }
    };
</script>
<?php else : ?>
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
<?php endif; ?>
<script type="text/javascript" src="//static.recranet.com/elements/<?php echo $locale; ?>/sdk.js?<?php echo mt_rand(); ?>" async></script>

<recranet-accommodations accommodationCategory="<?php echo $accommodationCategory; ?>" layoutType="<?php echo $layoutType; ?>" class="recranet-element"></recranet-accommodations>
