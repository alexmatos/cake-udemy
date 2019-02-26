<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?= $usuario->id ?></td>
        <td><?= $usuario->name ?></td>
        <td><?= $usuario->email ?></td>
        <td>Ver Editar Apagar</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>