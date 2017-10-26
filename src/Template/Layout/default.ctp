<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('menu') ?>
    <?= $this->Flash->render() ?>
    <div class="container-fluid">
            <?= $this->fetch('content') ?>
    </div>
    <?= $this->element('footer') ?>
</body>
    <?= $this->Html->script(['jquery-3.2.1.min.js', 'bootstrap.min.js', 'jquery-ui.min.js', 'search.js']) ?>
</html>
