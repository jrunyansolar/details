var products = null;

function updatePanels() {
    var product_types = [];
    var material_types = [];
    var product_options = [];

    $('[id^=product-type] :selected').each(function(){
        product_types.push($(this).val());
    });

    $('[id^=field-po-] :selected').each(function(){
        if( $(this).val() != '-' ) {
            var selectedObj = { id: $(this).data('id'), value: $(this).val() };
            product_options.push(selectedObj);
        };
    });

    $('[id^=material-type] :selected').each(function(){
        material_types.push($(this).val());
    });

    var selected_items = {
        product_types: product_types,
        material_types: material_types,
        product_options: product_options
    };

    // On Material Type Selection
    $.post('//details.solarinnovations.test/ajax/index.json', 
        JSON.stringify(selected_items)
    ).done(function(data) {
        product_table_clear();

        // Save to memory so we can use this data later without sending new requests.
        products = data.products;
        console.log('saved products to memory');
        console.log(products);

        if(Object.keys(data.products).length > 0) {
            for(var i = 0; i < Object.keys(data.products).length; i++){
                var product = data.products[i];
                console.log('Adding: ' + product.id + ' to product table.');
                product_table_add(i, product.id, product.name, product.series_id, product.material_type_id, product.product_type_id, 
                    product.name, product.dwg_path, product.pdf_path); 
            }
        
            // Show the preview for the first file.
            preview_file(0);
        }
    });
};

/*
* Remove all products from the table.
*/
function product_table_clear() {
    $('.product-row').remove();
    $('#product-table-empty').show();
}

/*
* Add the product to the product table.
*/
function product_table_add(row_id, product_id, product_name, series_id, material_type, product_type, description, dwg_path, pdf_path) {
    var row = $('#product-template-row').clone()
    row.removeClass('hidden');
    row.addClass('product-row');
    
    row.find('#product_name').text(product_name);
    row.find('#series').text(series_id);
    row.find('#product_description').text(description);
    row.find('#product_type').text(product_type);
    row.find('#material_type').text(material_type);
    row.attr('data-id', row_id);
    row.find('.preview-product').attr('data-id', row_id);
    row.find('.download-product').attr('data-id', row_id);
    
    /*row.on('click', function() {
        $('.selected-row').removeClass('selected-row');
        alert('Previewing ' + $(this).data('id') + ' product');
        $(this).addClass('selected-row');
    });*/
    
    row.find('.preview-product').on('click', function() {
        console.log('Previewing ' + $(this).data('id') + ' product');
        var id = $(this).data('id');
        console.log(products[id]);

        var image = new Image();
        image.className = 'img-responsive';
        image.src = '/files/png/' + products[id].name + '.png';
        
        $('#preview-panel img').remove();
        $('#preview-panel').append(image);

        $('#preview-unavailable').hide();

    });
    
    row.find('.download-product').on('click', function() {
        console.log($(this).data('id'));

        var id = $(this).data('id');

        window.location = '/files/pdf/' + products[id].name + '.pdf';
    });

    row.find('.download-products').on('click', function() {
        alert('Downloading all products');
    });
    
    var product_table = $("#product-table");
    product_table.append(row); 

    $('#product-table-empty').hide();
}

function download_file(type, id) {
    console.log('downloading: ' + type + ', id: ' + id);
}

function preview_file(id) {
    console.log('previewing file: id: ' + id);
    var image = new Image();
    image.className = 'img-responsive';
    image.src = '/files/png/' + products[id].name + '.png';
    
    $('#preview-panel img').remove();
    $('#preview-panel').append(image);

    $('#preview-unavailable').hide();
}

function new_cart_item(series, material_type, product_type, product_description) {
    var parent = $('#selected-products');
    var newchild = $('#selected-product-template').clone(parent);
    newchild.find('.product-label-value')[0].innerText = series;
    newchild.find('.product-type-label-value')[0].innerText = product_type;
    newchild.find('.material-type-label-value')[0].innerText = material_type;;
    newchild.find('.product-description-value')[0].innerText = product_description;
    parent.append(newchild);
    
}
bootstrap_alert = function() {}
bootstrap_alert.warning = function(message) {
    $('#alert_container').html('<div class="alert alert-warning"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}

bootstrap_alert.error = function(message) {
    $('#alert_container').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}

bootstrap_alert.success = function(message) {
    $('#alert_container').html('<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
}


$(document).ready(function() {
    
    var is_changed = false;

    $('#options-panel input,select').click(function() {
        console.log('selected item.');
        updatePanels();
    });

    $('#options-panel select').on('change', function() {
        updatePanels();
        console.log('selected change.');
    });

    $('#parent-id').on('change', function() {
        is_parent = $(this).val() == '';
        //$('#value').attr('disabled', is_parent);
        //$('#identifier-key').attr('disabled', is_parent);
    });

    
    $('#import').on('click', function() { 
        $('#importer-actions').hide();
        $('#import-result').show();
        var rowsImported = 0;
        var rowsErrored = 0;

        if (!window.XMLHttpRequest){
            alert("Your browser does not support the native XMLHttpRequest object.");
            exit;

        }
        try{
            var xhr = new XMLHttpRequest();  
            xhr.previous_text = '';
                                        
            xhr.onerror = function() { console.log("[XHR] Fatal Error."); };
            xhr.onreadystatechange = function() {
                try{
                    if (xhr.readyState == 4){
                        $('#table-result-rows').html(xhr.responseText);
                        console.log(xhr.responseText);

                        var failed = $('#table-result-rows tr.failed').length;
                        var success = $('#table-result-rows tr').length - failed;
                        
                        bootstrap_alert.success(success + ' product(s) has been imported successfully.<br>' + failed + ' product(s) have failed to be imported successfully.');

                    } 
                    else if (xhr.readyState > 2){
                        xhr.previous_text = xhr.responseText;
                        $('#table-result-rows').html(xhr.responseText);
                        rowsImported++;
                        console.log(xhr.responseText);
                    }  
                }
                catch (e){
                    console.log("[XHR STATECHANGE] Exception: " + e);
                }                     
            };
            
            var reindex = $('#reindex').prop('checked');
            
            xhr.open("POST", "import", true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.send('{ "reindex": ' + reindex + ' }');      
        }
        catch (e){
            alert("[XHR REQUEST] Exception: " + e);
        }
    });

    $('.generate-identifier-key').on('click', function() { 
        is_changed = true; 
        
        var name = $('#name').val(); 
        if(name == '') {
            bootstrap_alert.error('You must provide a name for the option before you can generate an Identifier Key.');
            return;
        }
        if(name.length < 4) {
            bootstrap_alert.error('The name must be longer than 4 characters to generate an Identifier Key.');
            return;
        }

        var identifier_key_field = $('#identifier-key'); 
        var identifier_key = create_identifier(name);
        identifier_key_field.val(identifier_key);
        console.log('Generated Identifier Key', name, identifier_key); 

        bootstrap_alert.success('An Identifier Key has been created off the product name.');

        return false;
    });

    $('select').selectpicker();
    //$('table').footable();

});

function create_identifier(name) {
    
    var identifier = '';
    var parts = name.split(' ');
    if(parts.length <= 2) {
        identifier = name.substring(0, 4);
    }
    else {
        identifier = parts[0].substring(0, 2) + parts[1].substring(0,1) + parts[2].substring(0,1);
    }

    console.log("gen: " + name, identifier);
    return identifier.toUpperCase();
}


$('#add-option-save-changes').on('click', function(e) { 
    console.log('submitting changes'); 
    e.preventDefault(); 
    
    var alert_div = $('#alert');
    
    var keep_open = $('#keep-open').prop('checked');
    var option_name = $('#name').val();
    var parent_id = $('#parent-id').val();
    var option_type = $('#type').val();
    var identifier_key = $('#identifier-key').val();
    if(option_name == '' || identifier_key == '') {
        alert('You must provide a name and an identifier key.');
        return;
    }
    $.post('/options/add/index.json', {'parent_id': parent_id, 'name': option_name, 'type': 0, 'identifier_key': identifier_key, 'value': ''})
    .done(function(data) {
        option_name = $('#name').val('');
        $('#identifier-key').val('');

        alert_div.addClass('alert-success');
        alert_div.text('The option was added.');
        alert_div.show();

        if(keep_open == 0) $('#myModal').modal('hide');  
    }).fail(function(msg) {
        alert( "alert-error" );
        alert_div.text('The option was not added.');
        alert_div.show();
    });
    


    console.log('done');

    
});