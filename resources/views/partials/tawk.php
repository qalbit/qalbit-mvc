<?php
$config = config('chat', []);
if (empty($config['tawk_enabled']) || empty($config['tawk_property_id'])) {
    return;
}
$propertyId = $config['tawk_property_id'];
$widgetId   = $config['tawk_widget_id'] ?? 'default';
?>
<script
    src="<?= asset('/js/tawk-layer.js') ?>"
    data-tawk-property-id="<?= htmlspecialchars($propertyId) ?>"
    data-tawk-widget-id="<?= htmlspecialchars($widgetId) ?>"
    defer
></script>
