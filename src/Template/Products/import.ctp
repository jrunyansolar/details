<div class="container-fluid">
    <div class="col-md-12">
        <h3>Product Importer</h3>

        <table class="table table-striped" style="display: none">
            <tr><td>Product Count</td><td>Imported Products</td><td>Imported Errors</td></tr>
            <tr><td><?= $productCount; ?></td><td><?= $importedProducts; ?><td><?= $errorCount; ?></td></tr>
        </table>
        
        <? //if(count($results)): ?>
        <div class="panel panel-default" id="import-result"  style="display: none">
            <div class="panel-heading">Import Results
            </div>
            <div class="panel-body">

                <table class="table tale-striped" id="table-results">
                    <tr><th>File Name</th><th>Series</th><th>Material Type</th><th>Product Type</th><th>Options</th><th>Result</th></tr>
                    <tbody id="table-result-rows">
                    <?foreach($results as $result): ?>
                        <tr class='<?= ($result['success'] == true ? 'successful' : 'failed') ?>'>
                            <td><?= basename($result['file']); ?></td>
                            <td><?= $result['series']['name']; ?></td>
                            <td><?= $result['material_type']['name'];; ?></td>
                            <td><?= $result['product_type']['name']; ?></td>
                            <td><?= $result['option_names']; ?></td>
                            <td><?= $result['message']; ?></td>
                        </tr>
                    <? endforeach; ?>
                </tbody>
                </table>

                
            </div>
        </div>
        <?php //else: ?>
            <div id="importer-actions">
                <div class="alert alert-warning"><span>The importer's time is depenent upon the number of files in the directory. It may take multiple hours for this process to complete.</span></div>

                <div class="form-group">
                    <div><label><input type="checkbox" id="reindex" name="reindex" value="reindex">Rebuild the entire product cache. <small>(This will delete all products in the current index and re-index them)</small></label></div>
                </div>

                <button class="btn btn-success" id="import">Run Importer</button>
            </div>
        <?php //endif; ?>
    </div>
</div>
 

<style>
body {
    font-size: 12px;
}

table {
    font-size: 12px;
}

.failed {
    color: #980a0a;
}

.successful { 
    color: green;
}
</style>

</body>
</html>