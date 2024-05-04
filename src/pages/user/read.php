<?php

require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

$usuarios = readUserAction($conn);

?>
<div class="container">
    <div class="row">
        <a href="../../../"><h1>usuarios - Read</h1></a>
        <a class="btn btn-success text-white" href="./create.php">New</a>
    </div>
    <div class="row flex-center">
        <?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
    </div>

    <table class="table-usuarios">
        <tr>
            <th>nome</th>
            <th>EMAIL</th>
            <th>telefone</th>
        </tr>
        <?php foreach($usuarios as $row): ?>
        <tr>
            <td class="user-nome"><?=htmlspecialchars($row['nome'])?></td>
            <td class="user-email"><?=htmlspecialchars($row['email'])?></td>
            <td class="user-telefone"><?=htmlspecialchars($row['telefone'])?></td>
            <td>
                <a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remove</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once '../partials/footer.php'; ?>
