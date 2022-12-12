<?php

require_once("../config/config.php");


class userModel
{

    private $db;


    // GET CONNECTION

    public function getConnection()
    {

        $this->db = new Connection();
        $this->db = $this->db->connect();
    }



    // REGISTER

    public function register()
    {

        $username = isset($_POST['username'])   ? $_POST['username'] : '';
        $password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $this->getConnection();

        // IF USER EXIST

        if (isset($_POST['register'])) {
            $sql_select = "SELECT * FROM users WHERE username=?";
            $result = $this->db->prepare($sql_select);
            $result->bindParam(1, $username);
            $result->execute();
            $count = $result->rowCount();


            if ($count != 0) {

                echo '<div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                Username exist ! . Choose another one !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

                header('refresh:8,url=register.php');
            }

            //INSERT USER INTO DATABASE

            else {
                $sql_insert = "INSERT INTO users (username, user_password) VALUES (?,?)";
                $result2 = $this->db->prepare($sql_insert);

                $result2->bindParam(1, $username);
                $result2->bindParam(2, $hash_password);


                $result2->execute();


                echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                User registered successfully ! . We will redirect you to login page !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

                header("refresh:8,url=login.php");
            }
        }
    }


    //LOGIN

    public function login()
    {

        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        //$role = isset($_POST['role_id']) ? $_POST['role_id'] : '';
        $count = 0;

        $this->getConnection();

        if (isset($_POST['login'])) {


            $sql_select = "SELECT * FROM users WHERE username='$username'";
            $result = $this->db->prepare($sql_select);
            $result->bindParam(1, $username);

            // $result->bindParam(2, $admin_password);
            $result->execute();
            $count = $result->rowCount();


            // IF USER EXIST
            if ($count > 0) {

                session_start(); // IF USER EXIST, SESSION STARTS

                $_SESSION['username'] = $_POST['username'];

                while ($user = $result->fetch(PDO::FETCH_ASSOC)) {

                    // PASSWORD_VERIFY
                    if (password_verify($password, $user['user_password'])) {

                        // IF ROLE IS ADMIN
                        if ($user['role_id'] == 1) {

                            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                            Admin logged in sucessfully ! Wait ... 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';

                            header("refresh:5,url=../views/admin/dashboard.php");
                        } else { // IF ROLE IS USER

                            echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                            User logged in sucessfully ! Wait ...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';

                            header("refresh:5,url=../views/users/cats.php");
                        }
                    } else {
                        echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
                        Username or password wrong !
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                        header('refresh:5,url=login.php');
                    }
                }
            }
        }
    }
}
