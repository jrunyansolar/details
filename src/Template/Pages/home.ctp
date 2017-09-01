
    <div style="background: #fafafa">
        <div class="container-fluid"  ng-app="mainApp">

            <div class="col-sm-3">
                <div class="panel panel-default">
                  <div class="panel-heading">Product Filter Options</div>
                    <div class="panel-body" id="options-panel">
                        <?= $this->Cell('Series'); ?>
                        <?= $this->Cell('ProductTypes'); ?>
                        <?= $this->Cell('MaterialTypes'); ?>
                        
                        <?= $this->Cell('ProductOptions'); ?> 

                        <button href="" id="search-button" class="btn btn-primary">Search</button> 

                    </div>
                </div>
            </div>
            <div class="col-sm-9"> 
                <div class="panel panel-default">
                    <div class="panel-heading">List of Products</div>
                    <div class="panel-np-body">

                        <table class="table table-striped table-bordered" id="product-table">

                            <tr><th>
                            <button href="" onclick="$('.series-checkbox').prop('checked', !$('.series-checkbox').prop('checked'))" class="btn btn-xs btn-default"><i class="fa fa-check"></i></button> 
                        
                            </th><th>Product</th><th>Series</th><th>Material Type</th><th>Product Type</th><th>Description</th><th>Options</th></tr>

                            <tr id="product-template-row" class="hidden">
                              
                              <td><input type="checkbox" id="1" class="series-checkbox"></td>

                              <td><span id="product_name">G3 FGW 2L Infold Rec Ramp</span></td>
                              
                              <td><span id="series">Series 6700</span></td>

                              <td><span id="material_type">Material Type</span></td>
                              
                              <td><span id="product_type">Product Type</span></td>
                              

                              <td><span id="product_description">This is a test series.</span></td>
                              
                              <td>
                                <button class="btn btn-xs btn-default preview-product"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <button class="btn btn-xs btn-primary download-product"><i class="fa fa-download" aria-hidden="true"></i></button>
                                
                              </td>
                              
                            </tr>

                            <tr id="product-table-empty"><td colspan=7>Choose from the product filters.</td></tr>
                        </table>

                        
                    </div>
                    <div class="panel-footer">
                        <button onclick="$('.series-checkbox').prop('checked', true)" class="btn btn-xs btn-default"><i class="fa fa-check"></i> Check All</button> 
                        <button onclick="$('.series-checkbox').prop('checked', false)" class="btn btn-xs btn-default"><i class="fa fa-square-o"></i> Uncheck All</button>
                        <button class="btn btn-xs btn-primary download-products"><i class="fa fa-download" aria-hidden="true"></i> Download Checked</button> 
                        
                        <div id="series-panel"></div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">Preview of Product</div>
                    <div class="panel-body">
                        
                        <span id="preview-unavailable">No preview is available.</span>
                        
                        <div id="preview-panel"></div>

                        <form action="/file-upload" class="dropzone hidden" id="my-awesome-dropzone"></form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 hidden">
                <div class="panel panel-default">
                  <div class="panel-heading">Selected Products</div>
                    <div class="panel-body" id="selected-products">
                      <div class="rl-no-margin" id="selected-product-template">
                        <table class="table" >
                          <tr>
                          <td class="rl-no-margin">
                            <div class="product-panel">
                              <table class="table" style="background: #fafafa">
                              <tr class="product-labels">
                                <td><label class="small-label">Series</label><span class="product-label product-label-value">6700</span></td>
                                <td><label class="small-label">Material Type</label><span class="product-label material-type-label-value">Aluminum</span> </td>
                                <td colspan="2"><label class="small-label">Product Type</label><span class="product-label product-type-label-value">Folding Glass Wall</span></td>
                              </tr>
                              
                              <tr><td colspan=4><label class="small-label">Product Description</label> 
                                <span class="product-label product-description-value" style="min-height: 80px">Blah blah blah</span></td>
                              </tr>
                              
                              
                              
                              <tr><td colspan=4>
                                <button href="" class="btn btn-danger">Remove</button> <button onclick="return preview_file(1);" class="btn btn-default">Preview</button> 
                                
                                <div class="btn-group dropdown">
                                  <button type="button" class="btn btn-default">Download</button>
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-right"> 
                                    <li><a onclick="return download_file('pdf', 1);">Download PDF</a></li> 
                                    <li><a onclick="return download_file('dwg', 1);">Download DWG</a></li> 
                                    <li role="separator" class="divider"></li> 
                                    <li><a onclick="return download_file('zip', 1);">Download Zip</a></li> 
                                  </ul>
                                </div>
                              </td>
                              </tr>
                              </table>
                              </div>
                          </td>
                          </tr> 
                        </table>

                        <div id="download-panel"></div>

                      </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default">Download All Files</button>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
 