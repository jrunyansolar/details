
<label class="control-label" for="material-types">Material Type</label>  
<div class="form-group">  
    <select 
    class="form-control selectpicker show-menu-arrow" 
    id="material-type"
    multiple
    data-selected-text-format="count"
    title="Choose one of the following...">
    
    <? foreach($materialTypes as $materialType): ?>
    <option data-id="<?= $materialType->id;?>" value="<?= $materialType->id ?>"><?= $materialType->name ?></option>
    <? endforeach; ?>
    </select>
</div>
 
