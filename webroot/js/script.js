var products = null;

function updatePanels() {
    var product_types = [];
    var material_types = [];
    var product_options = [];

    $('[id^=field-pt-]').each(function(){
        if($(this).prop('checked')) product_types.push($(this).val());
    });

    $('[id^=field-po-] :selected').each(function(){
        if( $(this).val() != '-' ) {
            var selectedObj = { id: $(this).data('id'), value: $(this).val() };
            product_options.push(selectedObj);
        };
    });

    $('[id^=field-mt-]').each(function(){
        if($(this).prop('checked')) material_types.push($(this).val());
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

        for(var i = 0; i < Object.keys(data.products).length; i++){
            var product = data.products[i];
            console.log('Adding: ' + product.id + ' to product table.');
            product_table_add(i, product.id, product.name, product.series_id, product.material_type_id, product.product_type_id, 
                product.name, product.dwg_path, product.pdf_path); 
        }

        //$('#series-panel').text(materials);
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

function preview_file(type, id) {
    console.log('previewing file: ' + type + ', id: ' + id);

    // $('#image_preview').attr('src') = data.imageUrl;
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

$(document).ready(function() {

    $('#options-panel input,select').click(function() {
        console.log('selected item.');
        updatePanels();
    });

    $('#options-panel select').on('change', function() {
        updatePanels();
        console.log('selected change.');
    });

    $('select').selectpicker();
});

 