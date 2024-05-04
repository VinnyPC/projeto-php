<?php

require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if (isset($_POST["id"], $_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]))
    updateUserAction($conn, $_POST["id"], $_POST["nome"], $_POST["email"], $_POST["telefone"]);

$user = findUserAction($conn, $_GET['id']);

?>
<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>usuarios - Edit</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/edit.php" method="POST">
                <input type="hidden" nome="id" value="<?=$user['id']?>" required/>
                <label>nome</label>
                <input type="text" nome="nome" value="<?=htmlspecialchars($user['nome'])?>" required/>
                <label>E-mail</label>
                <input type="email" nome="email" value="<?=htmlspecialchars($user['email'])?>" required/>
                <label>telefone</label>
                <input type="text" nome="telefone" value="<?=htmlspecialchars($user['telefone'])?>" required/>

                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>
