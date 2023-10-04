<?php
require_once 'db.php';



function get_user_list()
{
    $sql = 'SELECT * FROM USERS';
    $pdo = get_pdo();

    $stmt = $pdo->query($sql);
    $user_list = array();

    while ($row = $stmt->fetch()) {
        $user = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role'],
        );

        array_push($user_list, $user);
    }

    return $user_list;
}

function email_exit($email)
{
    $sql = 'SELECT * FROM USERS WHERE email=:email';
    $pdo = get_pdo();

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}

function get_user($id)
{
    $sql = 'SELECT * FROM USERS WHERE id=:id';
    $pdo = get_pdo();

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    while ($row = $stmt->fetch()) {
        $user = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role'],
        );

        return $user;
    }
    return null;
}
function delete_user($id)
{
    $sql = 'DELETE FROM USERS WHERE ID=:id';
    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}

function create_user($email, $password, $role)
{
    $sql = 'INSERT INTO USERS(ID,EMAIL,PASSWORD,ROLE) VALUES (NULL, :email, :password, :role)';
    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    $stmt->execute();
}
function update_user($id, $email, $password, $role)
{
    $sql = 'UPDATE USERS SET EMAil=:email, PASSWORD=:password, ROLE=:role WHERE ID=:id';
    $pdo = get_pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);


    $stmt->execute();
}

/**
 * Authentication
 */
function login($email, $password)
{
    $sql = 'SELECT * FROM USERS WHERE email=:email AND password=:password';
    $pdo = get_pdo();

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $user = array(
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password']
        );

        return $user;
    }

    return false;
}
function register($email, $password)
{
    $sql = 'INSERT INTO USERS (id, email, password) VALUES (null, :email, :password)';
    $pdo = get_pdo();

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    return false;
}
