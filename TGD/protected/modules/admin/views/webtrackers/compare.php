<?php
$this->breadcrumbs=array(
    'Manage Web Tracks'=>array('index')
);

$this->layout='//layouts/column2';

?>

<h1>Compare Web Trackers</h1>
<a class="compare-link" data="h1" href="#">Trackers that are not longer in disconnect.me file but are still on our file</a>
<br/>
<a class="compare-link" data="h2" href="#">Trackers that have been added to disconnect.me and are still not on our file</a>

<br/>
<br/>

<div class="compare-block hide" id="h1">
    <h4>Trackers that are not longer in disconnect.me file but are still on our file</h4>
    <?php echo "<pre>$trackers2</pre>"; ?>
</div>

<div class="compare-block hide" id="h2">
    <h4>Trackers that have been added to disconnect.me and are still not on our file</h4>
    <?php echo "<pre>$trackers1</pre>"; ?>
</div>
<script>
    $(function(){
        $('.compare-link').click(function(){
            $('.compare-block').addClass('hide')
            $('#'+$(this).attr('data')).removeClass('hide');
            return false;
        })
    })
</script>
