<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'Details Solar Innovations';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['bootstrap.min.css','//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css',
    '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']) ?>
    <link href="//fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head> 
<body style="background: #fafafa">


  <nav class="navbar navbar-default ">
      <div class="container-fluid" style="margin-left: 20px">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><?= $this->Html->Image('main-logo.png', ['class'=>'logo img-logo']); ?></a>
          </div>
          <div id="navbar" class="x">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>

                  <? if($user): ?>
                  <li class="dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="/products/add">Add New Product</a></li>
                          <li><a href="/products/">Manage Products</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="/products/import">Import Product List</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product Types <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="/product-types/add">Add New Product Type</a></li>
                          <li><a href="/product-types/">Manage Product Types</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="/product-types/import">Import Product Type</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material Types <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="/material-types/add">Add New Material Type</a></li>
                          <li><a href="/material-types">Manage Material Types</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="/material-types/import">Import Material Type List</a></li>
                      </ul>
                  </li>
                  <li class="dropdown">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="/options/add">Add New Option</a></li>
                          <li><a href="/options/">Manage Options</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="/options/import">Import Option List</a></li>
                      </ul>
                  </li>
                  <?php endif; ?>
              </ul>
          </div><!--/.nav-collapse -->
      </div>
  </nav>


    <div style="background: #fafafa">
        <div class="container-fluid"  ng-app="mainApp">

            <div class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">Product Filter Options</div>
                    <div class="panel-body" id="options-panel">
                        <?= $this->Cell('MaterialTypes'); ?>
                        
                        <?= $this->Cell('ProductTypes'); ?> 
                        
                        <?= $this->Cell('ProductOptions'); ?> 

                        <button href="" id="search-button" class="btn btn-primary">Search</button> 

                    </div>
                </div>
            </div>
            <div class="col-md-9"> 
                <div class="panel panel-default">
                    <div class="panel-heading">List of Products</div>
                    <div class="panel-body">

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
            <div class="col-md-4 hidden">
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
 
    <?= $this->Html->script(['jquery.min.js','bootstrap.min.js', 'dropzone.js', 'script.js','//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js']) ?>
    

    <style>

    label {
        font-weight: 300;
    }

    body {
        font-size: 13px;
        line-height: 13px;
        font-weight: 100;
    }

    .img-logo {
        height: 30px;
    }

    .navbar-brand {
        padding: 10px 15px;
    }
    
    /*.panel-body {
        padding: 0px 10px 20px 10px;
    }
    .panel {
        border-radius: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }*/

    input[type=checkbox], input[type=radio] {
        margin: 0;
    }

    .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover,
    .btn-default,
    .btn-default:focus,
    .btn-default:active,
    .btn-default:hover {
        /*color: #fff;
        background-color: #408f42;
        border-color: #a0c6a0;*/
    }

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        border-top: none;
    }

    table tr th {
        color: black;
        border-bottom: none;
    }



    @-webkit-keyframes passing-through {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30%, 70% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); }
  100% {
    opacity: 0;
    -webkit-transform: translateY(-40px);
    -moz-transform: translateY(-40px);
    -ms-transform: translateY(-40px);
    -o-transform: translateY(-40px);
    transform: translateY(-40px); } }
@-moz-keyframes passing-through {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30%, 70% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); }
  100% {
    opacity: 0;
    -webkit-transform: translateY(-40px);
    -moz-transform: translateY(-40px);
    -ms-transform: translateY(-40px);
    -o-transform: translateY(-40px);
    transform: translateY(-40px); } }
@keyframes passing-through {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30%, 70% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); }
  100% {
    opacity: 0;
    -webkit-transform: translateY(-40px);
    -moz-transform: translateY(-40px);
    -ms-transform: translateY(-40px);
    -o-transform: translateY(-40px);
    transform: translateY(-40px); } }
@-webkit-keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); } }
@-moz-keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); } }
@keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(40px);
    -moz-transform: translateY(40px);
    -ms-transform: translateY(40px);
    -o-transform: translateY(40px);
    transform: translateY(40px); }
  30% {
    opacity: 1;
    -webkit-transform: translateY(0px);
    -moz-transform: translateY(0px);
    -ms-transform: translateY(0px);
    -o-transform: translateY(0px);
    transform: translateY(0px); } }
@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); }
  10% {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1); }
  20% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); } }
@-moz-keyframes pulse {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); }
  10% {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1); }
  20% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); } }
@keyframes pulse {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); }
  10% {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1); }
  20% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1); } }
.dropzone, .dropzone * {
  box-sizing: border-box; }

.dropzone {
  min-height: 150px;
  border: 2px solid rgba(0, 0, 0, 0.3);
  background: white;
  padding: 54px 54px; }
  .dropzone.dz-clickable {
    cursor: pointer; }
    .dropzone.dz-clickable * {
      cursor: default; }
    .dropzone.dz-clickable .dz-message, .dropzone.dz-clickable .dz-message * {
      cursor: pointer; }
  .dropzone.dz-started .dz-message {
    display: none; }
  .dropzone.dz-drag-hover {
    border-style: solid; }
    .dropzone.dz-drag-hover .dz-message {
      opacity: 0.5; }
  .dropzone .dz-message {
    text-align: center;
    margin: 2em 0; }
  .dropzone .dz-preview {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 16px;
    min-height: 100px; }
    .dropzone .dz-preview:hover {
      z-index: 1000; }
      .dropzone .dz-preview:hover .dz-details {
        opacity: 1; }
    .dropzone .dz-preview.dz-file-preview .dz-image {
      border-radius: 20px;
      background: #999;
      background: linear-gradient(to bottom, #eee, #ddd); }
    .dropzone .dz-preview.dz-file-preview .dz-details {
      opacity: 1; }
    .dropzone .dz-preview.dz-image-preview {
      background: white; }
      .dropzone .dz-preview.dz-image-preview .dz-details {
        -webkit-transition: opacity 0.2s linear;
        -moz-transition: opacity 0.2s linear;
        -ms-transition: opacity 0.2s linear;
        -o-transition: opacity 0.2s linear;
        transition: opacity 0.2s linear; }
    .dropzone .dz-preview .dz-remove {
      font-size: 14px;
      text-align: center;
      display: block;
      cursor: pointer;
      border: none; }
      .dropzone .dz-preview .dz-remove:hover {
        text-decoration: underline; }
    .dropzone .dz-preview:hover .dz-details {
      opacity: 1; }
    .dropzone .dz-preview .dz-details {
      z-index: 20;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      font-size: 13px;
      min-width: 100%;
      max-width: 100%;
      padding: 2em 1em;
      text-align: center;
      color: rgba(0, 0, 0, 0.9);
      line-height: 150%; }
      .dropzone .dz-preview .dz-details .dz-size {
        margin-bottom: 1em;
        font-size: 16px; }
      .dropzone .dz-preview .dz-details .dz-filename {
        white-space: nowrap; }
        .dropzone .dz-preview .dz-details .dz-filename:hover span {
          border: 1px solid rgba(200, 200, 200, 0.8);
          background-color: rgba(255, 255, 255, 0.8); }
        .dropzone .dz-preview .dz-details .dz-filename:not(:hover) {
          overflow: hidden;
          text-overflow: ellipsis; }
          .dropzone .dz-preview .dz-details .dz-filename:not(:hover) span {
            border: 1px solid transparent; }
      .dropzone .dz-preview .dz-details .dz-filename span, .dropzone .dz-preview .dz-details .dz-size span {
        background-color: rgba(255, 255, 255, 0.4);
        padding: 0 0.4em;
        border-radius: 3px; }
    .dropzone .dz-preview:hover .dz-image img {
      -webkit-transform: scale(1.05, 1.05);
      -moz-transform: scale(1.05, 1.05);
      -ms-transform: scale(1.05, 1.05);
      -o-transform: scale(1.05, 1.05);
      transform: scale(1.05, 1.05);
      -webkit-filter: blur(8px);
      filter: blur(8px); }
    .dropzone .dz-preview .dz-image {
      border-radius: 20px;
      overflow: hidden;
      width: 120px;
      height: 120px;
      position: relative;
      display: block;
      z-index: 10; }
      .dropzone .dz-preview .dz-image img {
        display: block; }
    .dropzone .dz-preview.dz-success .dz-success-mark {
      -webkit-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
      -moz-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
      -ms-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
      -o-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1);
      animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); }
    .dropzone .dz-preview.dz-error .dz-error-mark {
      opacity: 1;
      -webkit-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
      -moz-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
      -ms-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
      -o-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1);
      animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); }
    .dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark {
      pointer-events: none;
      opacity: 0;
      z-index: 500;
      position: absolute;
      display: block;
      top: 50%;
      left: 50%;
      margin-left: -27px;
      margin-top: -27px; }
      .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
        display: block;
        width: 54px;
        height: 54px; }
    .dropzone .dz-preview.dz-processing .dz-progress {
      opacity: 1;
      -webkit-transition: all 0.2s linear;
      -moz-transition: all 0.2s linear;
      -ms-transition: all 0.2s linear;
      -o-transition: all 0.2s linear;
      transition: all 0.2s linear; }
    .dropzone .dz-preview.dz-complete .dz-progress {
      opacity: 0;
      -webkit-transition: opacity 0.4s ease-in;
      -moz-transition: opacity 0.4s ease-in;
      -ms-transition: opacity 0.4s ease-in;
      -o-transition: opacity 0.4s ease-in;
      transition: opacity 0.4s ease-in; }
    .dropzone .dz-preview:not(.dz-processing) .dz-progress {
      -webkit-animation: pulse 6s ease infinite;
      -moz-animation: pulse 6s ease infinite;
      -ms-animation: pulse 6s ease infinite;
      -o-animation: pulse 6s ease infinite;
      animation: pulse 6s ease infinite; }
    .dropzone .dz-preview .dz-progress {
      opacity: 1;
      z-index: 1000;
      pointer-events: none;
      position: absolute;
      height: 16px;
      left: 50%;
      top: 50%;
      margin-top: -8px;
      width: 80px;
      margin-left: -40px;
      background: rgba(255, 255, 255, 0.9);
      -webkit-transform: scale(1);
      border-radius: 8px;
      overflow: hidden; }
      .dropzone .dz-preview .dz-progress .dz-upload {
        background: #333;
        background: linear-gradient(to bottom, #666, #444);
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 0;
        -webkit-transition: width 300ms ease-in-out;
        -moz-transition: width 300ms ease-in-out;
        -ms-transition: width 300ms ease-in-out;
        -o-transition: width 300ms ease-in-out;
        transition: width 300ms ease-in-out; }
    .dropzone .dz-preview.dz-error .dz-error-message {
      display: block; }
    .dropzone .dz-preview.dz-error:hover .dz-error-message {
      opacity: 1;
      pointer-events: auto; }
    .dropzone .dz-preview .dz-error-message {
      pointer-events: none;
      z-index: 1000;
      position: absolute;
      display: block;
      display: none;
      opacity: 0;
      -webkit-transition: opacity 0.3s ease;
      -moz-transition: opacity 0.3s ease;
      -ms-transition: opacity 0.3s ease;
      -o-transition: opacity 0.3s ease;
      transition: opacity 0.3s ease;
      border-radius: 8px;
      font-size: 13px;
      top: 130px;
      left: -10px;
      width: 140px;
      background: #be2626;
      background: linear-gradient(to bottom, #be2626, #a92222);
      padding: 0.5em 1.2em;
      color: white; }
      .dropzone .dz-preview .dz-error-message:after {
        content: '';
        position: absolute;
        top: -6px;
        left: 64px;
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #be2626;
  }


 
  .small-label {
    text-transform: uppercase;
    font-size: 11px;
    line-height: 15px;
    color: #cacaca;
    display: block;
  }


  .rl-no-margin {
      margin: 0px;
      padding: 0px 2px !important;
  }

span.product-label {
    background: white;
    border-radius: 3px;
    padding: 4px;
    display: block;
  }

  #selected-products .table {
    margin-bottom: 1px; 
  }

  #selected-products {
    overflow-y: scroll;
    margin: 0px;
    padding: 5px 0px;
    max-height: 600px;
  }

  .selected-row {
    background: #cfe1cf !important;
    font-weight: 500;
  }
  </style>
</body>
</html>
