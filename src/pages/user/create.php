<?php

require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]))
    createUserAction($conn, $_POST["nome"], $_POST["email"], $_POST["telefone"]);

?>
<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>usuarios - Create</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/create.php" method="POST">
                <label>nome</label>
                <input type="text" nome="nome" required/>
                <label>E-mail</label>
                <input type="email" nome="email" required/>
                <label>telefone</label>
                <input type="text" nome="telefone" required/>

                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../partials/footer.php'; ?>