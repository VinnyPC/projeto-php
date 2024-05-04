<?php

function findUserDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
    $user;

    $sql = "SELECT * FROM usuarios  WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
        exit('SQL error');

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    mysqli_close($conn);
    return $user;
}

function createUserDb($conn, $nome, $email, $telefone) {
    $nome = mysqli_real_escape_string($conn, $nome);
    $email = mysqli_real_escape_string($conn,  $email);
    $telefone = mysqli_real_escape_string($conn,  $telefone);

    if($nome && $email && $telefone) {
        $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');

        mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $telefone);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return true;
    }
}

function readUserDb($conn) {
    $usuarios = [];

    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($conn, $sql);

    $result_check = mysqli_num_rows($result);

    if($result_check > 0)
        $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $usuarios;
}

function updateUserDb($conn, $id, $nome, $email, $telefone) {
    if($id && $nome && $email && $telefone) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, telefone = ? WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');

        mysqli_stmt_bind_param($stmt, 'sssi', $nome, $email, $telefone, $id);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return true;
    }
}

function deleteUserDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    if($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        return true;
    }
}