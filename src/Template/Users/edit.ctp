<h1>Editar Usuário</h1>

<?= $this->Form->create($user); ?>

<?= $this->Form->control('name'); ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Editar') ?>

<?= $this->Form->end(); ?>
