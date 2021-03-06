<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('favicon.ico', '/favicon.ico', array (
    'type' => 'icon'
) ); ?>

    <?= $this->Html->css(['bootstrap.css','hoja.css','font-awesome.css']) ?>
    <?= $this->Html->script(['jquery-3.1.1.min','bootstrap.min','funciones.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <?= $this->element('menu') ?>
    <?= $this->Flash->render() ?>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
