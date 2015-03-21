<?php if(!empty($categories)) : ?>
    <table class="table borderless hide">
        <thead>
        <tr>
            <th></th>
            <th class="text-center">Don't like</th>
            <th class="text-center">Like</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) { ?>
            <tr>
                <td class="col-md-4 <?php if($category->has_sub) echo 'interest-category-link'; ?>" data-id="<?php echo $category->id; ?>"><?php echo $category->category;?> </td>
                <td class="col-md-6 border-right"><?php if($category->rating < 0) : ?><div class="interest-bar nowidth pull-right <?php if($category->has_sub) echo 'interest-category-link'; ?>" data-id="<?php echo $category->id; ?>" style="background-color:#EA6654;width: <?php echo abs($category->rating*0.8); ?>%"></div><div class="pull-right interest-bar-number"><?php echo round($category->rating); ?></div><?php endif; ?></td>
                <td class="col-md-6"><?php if($category->rating > 0) : ?><div class="interest-bar nowidth pull-left <?php if($category->has_sub) echo 'interest-category-link'; ?>" data-id="<?php echo $category->id; ?>" style="background-color:#A6D5AF;width: <?php echo $category->rating*0.8; ?>%"></div> <div class="pull-left interest-bar-number">+<?php echo round($category->rating); ?></div><?php endif; ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
<?php else : ?>
    <h4>No Categories</h4>
<?php endif; ?>

<div class="row">
    <ol class="breadcrumb">
        <li class="interest-category-link" data-id="0">Top</li>
        <?php foreach($breadcrumbs as $crumb) :?>
            <li class="interest-category-link" data-id="<?php echo $crumb['id']; ?>"><?php echo $crumb['category']; ?></li>
        <?php endforeach; ?>
        <!--                        <li class="active">Data</li>-->
        <div class="pull-right">
            <button class="btn btn-primary interest-category-link" data-id="<?php echo $parent_id; ?>" title="Back"><i class="glyphicon glyphicon-arrow-left"></i></button>
            <button class="btn btn-primary interest-category-link" data-id="0" title="Home"><i class="glyphicon glyphicon-home"></i></button>
        </div>
    </ol>
</div>