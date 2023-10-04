<?php
require './boot.php';


if (isset($_POST['emailsend']) && isset($_POST['passwordsend'])) {
    $email = $_POST['emailsend'];
    $password = $_POST['passwordsend'];

    $user = login($email, $password);
    $_SESSION['user'] = $user;



    if ($user == false) {
        $response = array(
            'code' => 500,
            'message' => 'user not a found',
            'data' => [],
            'menu' => '<li class="nav-item" id="login" data-bs-toggle="modal" data-bs-target="#modalLogin"> <a class = "nav-link"> login </a> </li> <li class = "nav-item">
            <a class = "nav-link"
        onclick = "handleLogin()" > register </a> </li>'
        );
    } else {
        $response = array(
            'code' => 200,
            'message' => 'login success',
            'data' => $user,
            'menu' => '<li class="nav-item">
            <a class="nav-link">' . 'hello, ' . $_SESSION['user']['email'] . '</a>
        </li>'
                . ' <li class="nav-item">
            <a class="nav-link" onclick="handleLogout()">Logout</a>
        </li>'
        );
    }

    echo json_encode($response);
}

if (isset($_POST['action']) && $_POST['action'] == "view") {

    $output = '';
    $userList = get_user_list();

    $output .= '<table class="table" id="table_id">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>';

    foreach ($userList as $row) {
        $output .= '<tr>
        <th scope="row">' . $row['id'] . '</th>
        <td>' . $row['email'] . '</td>
        <td><img src="" /></td>
       
        <td>
        <button class="btn btn-warning edit" data-bs-toggle="modal" data-bs-target="#modaledit" id="' . $row['id'] . '">Edit</button>
        <button class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modaldelete" id="' . $row['id'] . '">Delete</button>
        </td>
      </tr>';
    }
    $output .= '</tbody>
    </table>';

    echo $output;
}
if (isset($_POST['action']) && $_POST['action'] == "insert") {
    if (!isset($_SESSION['user'])) {
        echo 'vui lòng đăng nhập';
    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $data = create_user($email, $password, $role);

        echo 'thêm mới thành công';
    }
}
if (isset($_POST['action']) && $_POST['action'] == "login") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = login($email, $password);

    $_SESSION['user'] = $data;

    if ($data == false) {
        $response = array(
            'code' => 500,
            'message' => 'user not a found',
            'data' => []
        );
    } else {
        $response = array(
            'code' => 200,
            'message' => 'login success',
            'data' => $data
        );
    }

    echo json_encode($response);
}

if (isset($_POST['dataID'])) {

    $id = $_POST['dataID'];

    $data = get_user($id);

    echo json_encode($data);
}
if (isset($_POST['action']) && $_POST['action'] == "update") {
    if (!isset($_SESSION['user'])) {
        echo 'vui lòng đăng nhập';
    } else {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $data = update_user($id, $email, $password, $role);

        echo 'cập nhật thành công';
    }
}

if (isset($_POST['action']) && $_POST['action'] == "delete") {
    if (!isset($_SESSION['user'])) {
        echo 'vui lòng đăng nhập';
    } else {
        $id = $_POST['id'];

        $data = delete_user($id);
        echo 'xóa thành công';
    }
}
