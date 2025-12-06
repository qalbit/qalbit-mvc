<?php
$config = config('chat', []);
if (empty($config['tawk_enabled']) || empty($config['tawk_property_id'])) {
    return;
}
$propertyId = $config['tawk_property_id'];
$widgetId   = $config['tawk_widget_id'] ?? 'default';
?>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/<?= htmlspecialchars($propertyId) ?>/<?= htmlspecialchars($widgetId) ?>';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
})();
</script>
