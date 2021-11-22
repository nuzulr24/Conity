<?php
foreach($css as $asset_css) {
    echo $asset_css."\n";
}
?>
<?php foreach($assetscss as $inlinecss) echo '<link rel="stylesheet" href="'.base_url().$inlinecss.'"></script>'; ?>