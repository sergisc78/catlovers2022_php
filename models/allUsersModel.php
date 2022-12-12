<?php

require_once("/opt/lampp/htdocs/catsmvc/config/config.php");


class allUsersModel
{

    private $db;


    public function getConnection()
    {

        $this->db = new Connection();
        $this->db = $this->db->connect();
    }


    public function getUsers()
    {

        // VARIABLES

        $this->getConnection();
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $sql_users = "SELECT u.id,u.username, u.role_id,r.role FROM roles r RIGHT JOIN users u ON r.id=u.role_id";
        $result = $this->db->prepare($sql_users);
        $result->bindParam(1, $id);
        $result->execute();
        return $result->fetchAll();
    }

    public function updateUser()
    {
        if (isset($_POST['edit'])) {

            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $roleId = isset($_POST['roleId']) ? $_POST['roleId'] : '';


            $this->getConnection();
            $sql_update = "UPDATE users  SET role_id=:roleId WHERE id=:id";
            $result = $this->db->prepare($sql_update);
            $result->bindParam(':id', $id);
            $result->bindParam(':roleId', $roleId);
            $result->execute();

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                User role updated successfully !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header("refresh:5;url=users.php");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                User role not be updated !. Something wrong happened !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                header("refresh:5;url=editUser.php");
            }
        }
    }
}
