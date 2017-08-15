<?php

$cakeDescription = 'Details Solar Innovations';
?>


    <div style="background: #fafafa">
        <div class="container-fluid"  ng-app="mainApp">

            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?= $this->Cell('MaterialTypes'); ?>
                        <hr/>
                        <?= $this->Cell('ProductTypes'); ?> 
                        <hr/>
                        <?= $this->Cell('ProductOptions'); ?> 

                        <a href="" class="btn btn-primary">Search</a> 

                    </div>
                </div>
            </div>
            <div class="col-md-8"> 
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <tr><th>Series</th><th>Description</th><th>Options</th></tr>
                            <tr><td><input type="checkbox" id="series-6700" class="series-checkbox"> <label for="series-6700">Series 6700</label></td><td>This is a test series.</td><td><a href="" class="btn btn-xs btn-primary">Download</a></td></tr>
                        </table>

                        <a href="" onclick="$('.series-checkbox').prop('checked', true)" class="btn btn-xs btn-default">Check All</a> 
                        <a href="" onclick="$('.series-checkbox').prop('checked', false)" class="btn btn-xs btn-default">Uncheck All</a>
                        <a href="" onclick="" class="btn btn-xs btn-primary">Download Checked</a> 
                        
                        <div id="series-panel"></div>
                    </div>
        
                    <div class="panel-body">
                        <h3>preview ...</h3>
                        <div id="preview-panel"></div>

                        <form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Selected ...</h3>
                        <div id="download-panel"></div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-default">Download All Files</button>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
 


    <style>
    </style>
</body>
</html>
