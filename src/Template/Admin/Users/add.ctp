<h1>Cadastrar Usuário</h1>

<?= $this->Form->create($user) ?>
<?= $this->Form->control('name') ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Cadastrar') ?>
<?= $this->Form->end() ?>
