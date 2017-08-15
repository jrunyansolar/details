<ul class="list-unstyled" id="product-options">

<? foreach($productOptions as $productOption): 

?>
<li>

<?php if($productOption['type'] == 0) { 
// MultiChoiceText ?>
<label class="control-label" for="field-po-<?= $productOption->id; ?>"><?= $productOption->name; ?></label>  
<div class="form-group">  
    <select class="form-control selectpicker show-menu-arrow" id="field-po-<?= $productOption->id; ?>" data-id="<?= $productOption->id;?>" name=field-po-<?= $productOption->id; ?>" multiple
    data-selected-text-format="count"
    title="Choose one of the following..."
    >
    <? foreach($productOption->child_options as $option): ?>
    <option data-id="<?= $productOption->id;?>" value="<?= $option->id ?>"><?= $option->name ?></option>
    <? endforeach; ?>
    </select>
</div>
<?php }
else 
if($productOption['type'] == 1) { 
// FreeNumeric 
?>
<label for="test"><?= $productOption->name; ?></label> 
<div class="form-group">
    <input type="number" empty="empty"" min="0" max="99" id="field-po-<?= $productOption->id; ?>" value="" class="form-control"> 
</div>
<?php }
else if($productOption['type'] == 2) { 
// MultiChoiceNumeric ?> 
<label for="test"><?= $productOption->name; ?></label> 
<div class="form-group">
<select 
    data-selected-text-format="count"
    title="Choose one of the following..."
    class="form-control selectpicker show-menu-arrow" 
    id="field-po-<?= $productOption->id; ?>"
     data-id="<?= $productOption->id;?>" 
     name="field-po-<?= $productOption->id; ?>"
     multiple>
    <option data-id="<?= $productOption->id;?>" value="2">2</option>
    <option data-id="<?= $productOption->id;?>" value="3">3</option>
    <option data-id="<?= $productOption->id;?>" value="4">4</option>
    <option data-id="<?= $productOption->id;?>" value="5">5</option>
    <option data-id="<?= $productOption->id;?>" value="6">6</option>
    <option data-id="<?= $productOption->id;?>" value="7">7</option>
    <option data-id="<?= $productOption->id;?>" value="8">8</option>
    <option data-id="<?= $productOption->id;?>" value="9">9</option>
</select>
<?php }
else if($productOption['type'] == 3) { ?>
UNKNOWN_TODO
<?php } ?>


</li>
<? endforeach; ?>
</ul>

