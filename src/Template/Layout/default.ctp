<? $cakeDescription = 'Details Solar Innovations'; ?>

</head>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=false;">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['style.css','bootstrap.min.css','footable.bootstrap.min.css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css','//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css',
    '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']) ?>
    <link href="//fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

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
                <a class="navbar-brand" href="/"><?= $this->Html->Image('main-logo.png', ['class'=>'logo img-logo']); ?></a>
            </div>
            <div id="navbar" class="x">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
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
                        </ul>
                    </li>
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material Types <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/material-types/add">Add New Material Type</a></li>
                            <li><a href="/material-types">Manage Material Types</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/options/add">Add New Option</a></li>
                            <li><a href="/options/">Manage Options</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

<?= $this->Flash->render() ?>

<div id="alert_container"></div>

<?= $this->fetch('content') ?>

<footer>
</footer>

<?= $this->Html->script(['jquery.min.js','bootstrap.min.js', 'dropzone.js', 'script.js',
'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js','footable.min.js']) ?>
   

</body>
</html>
