<?php
$ci = & get_instance();
$ci->load->model('category_model');
$ci->load->model('stackguide_ads_model');

//$ci->load->('category_model');
?>
<link href="<?php echo base_url(); ?>assets/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script type="text/javascript">
    var result = "";
    jQuery(document).ready(function() {
<?php
$base_url = base_url();
$map_data = $ci->category_model->get_mapping_data();
foreach ($map_data as $key => $result) {
    $count = $ci->stackguide_ads_model->get_count_advertisement_map_by_state($result['state_id']);
    $arr[$result['key']] = array(
        "path" => $result['path'],
        "name" => $result['name'],
        "url" => "{$base_url}home/map_searching/{$result['state_id']}",
        "count" => !empty($count) ? $count : 0
    );
}
$jsonRecode = json_encode($arr);
?>

        jQuery.fn.vectorMap('addMap', 'usa_en', {
            "width": 959,
            "height": 593,
            "pathes": <?php echo $jsonRecode; ?>,
        });

        jQuery('#vmap').vectorMap({
            map: 'usa_en',
            enableZoom: true,
            showTooltip: true,
            selectedRegion: 'MO',
            hoverColor: '#c9dfaf',
            borderColor: '#818181',
            color: '#ffffff',
            backgroundColor: '#192e4c',
            values: sample_data,
        });
    });

</script>
<section>
    <div class="main_part">
        <div id="vmap">

        </div>
    </div>
</section>
</div>
</div>