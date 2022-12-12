<?php

require_once("../../config/config.php");


class usersModel
{


    private $db;


    // GET CONNECTION

    public function getConnection()
    {

        $this->db = new Connection();
        $this->db = $this->db->connect();
    }


    // GET ALL CATS FROM DATABASE

    public function getCats()
    {
        $this->getConnection();

        /* $page = isset($_GET['page']) ? $_GET['page'] : '';

        if ($page) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $limit = 3;
        $offset = ($page - 1) * $limit;
        $previous=$page-1;
        $next=$page+1;

        $sql_total="SELECT COUNT(*) as total_cats FROM cats";
        $result1 = $this->db->prepare($sql_total);
        $result1->execute();
        return $result1->fetchAll();

        $sql_select = "SELECT * FROM cats LIMIT $offset,$limit";
        $result2 = $this->db->prepare($sql_select);
        $result2->execute();
        return $result2->fetchAll();*/

        $sql_select = "SELECT * FROM cats";
        $result = $this->db->prepare($sql_select);
        $result->execute();
        return $result->fetchAll();



        $page = isset($_GET['page']) ? $_GET['page'] : '';

        $size_page = 3; /* PAGINATION VARIABLE */

        $countCats = $result->rowCount();

        $pages = ceil($countCats / $size_page);


        /* -------------------------------------------- PAGINATION CODE ------------------------------------------- */



        // $pages = ceil($countCats / $size_page); /*  PAGINATION VARIABLE */

        /* TO SHOW 3 CATS PER PAGE 

    if (!$_GET) { // ALWAYS REDIRECT TO PAGE=1

        header("Location:cats.php?page=1");
    }

    if ($page > $size_page || $page <= 0 ) { // IF PAGE DOESN´T EXIST, REDIRECT TO PAGE=1

        header("Location:cats.php?page=1");
    }

    $beginToCount = ($page - 1) * $size_page;

    $sql_cats = "SELECT * FROM cats LIMIT $beginToCount,$size_page";

    $resultLimit = $this->db->prepare($sql_cats);

    $resultLimit->execute();

    return $resultLimit->fetchAll();

    //$adultCountCats = $resultLimit->rowCount();

*/
    }
}
