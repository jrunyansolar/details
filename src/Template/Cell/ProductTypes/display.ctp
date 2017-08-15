<label class="control-label" for="product-types">Product Type</label>  
<div class="form-group">  
    <select 
    class="form-control selectpicker show-menu-arrow" 
    multiple
    id="product-type"
    data-selected-text-format="count"
    title="Choose one of the following...">
    
    <? foreach($productTypes as $productType): ?>
    <option data-id="<?= $productType->id;?>" value="<?= $productType->id ?>"><?= $productType->name ?></option>
    <? endforeach; ?>
    </select>
</div>
 
