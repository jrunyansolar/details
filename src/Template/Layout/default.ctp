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
    <?= $this->Html->css(['bootstrap.paper.min.css', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css',
    '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css','//fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono','style.css']) ?>

</head> 
<body style="background: #fafafa">

    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><?= $this->Html->Image('main-logo.png', ['class'=>'logo img-logo']); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            
            <?php if($user): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/products/import">Import Product List</a></li>
                    <li><a href="/products/add" class="hidden">Add New Product</a></li>
                    <li><a href="/products/">Manage Products</a></li>

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


            <?php endif; ?>
        </ul>
        
        <!-- TODO: Implement search feature. -->
        <form class="navbar-form navbar-left hidden">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Search (e.g. 4600, Wall)" style="width: 300px">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <?php if($user): ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/users/logout">Signout</a></li>
        </ul>
        <?php endif; ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?= $this->Flash->render() ?>
            <div id="alert_container"></div>
        </div>
    </div>
</div>

<?= $this->fetch('content') ?>
<footer>
</footer>

<?= $this->Html->script(['jquery.min.js','bootstrap.min.js', 'dropzone.js', 'script.js',
'//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js','footable.min.js']) ?>
   

</body>
</html>
