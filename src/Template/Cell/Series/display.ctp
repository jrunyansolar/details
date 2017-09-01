<label class="control-label" for="product-types">Series</label>  
<div class="form-group">  
    <select 
    class="form-control selectpicker show-menu-arrow" 
    multiple
    id="series"
    data-selected-text-format="count"
    title="Choose one of the following...">
    
    <? foreach($series as $_series): ?>
    <option data-id="<?= $_series->id;?>" value="<?= $_series->id ?>"><?= $_series->name ?></option>
    <? endforeach; ?>
    </select>
</div>
 
