<? $cakeDescription = 'Details Solar Innovations'; ?>

</head>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <?= $this->Html->css(['bootstrap.min.css','style.css']) ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
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
                        <li><a href="/product-options/add">Add New Option</a></li>
                        <li><a href="/product-options/">Manage Options</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/product-options/import">Import Option List</a></li>
                    </ul>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<?= $this->Flash->render() ?>

<?= $this->fetch('content') ?>

<footer>
</footer>

<?= $this->Html->script(['jquery.min.js','bootstrap.min.js', 'dropzone.js', 'script.js']) ?>

<style>


</body>
</html>
