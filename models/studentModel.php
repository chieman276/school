<?php
include_once './db.php';
include_once './controllers/Request/formRequest.php';

class studentModel
{
    public $errors = [];

    public function getAll()
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID";
        $stmt = $connect->query($sql);
        //thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function find($id)
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID 
        where students.id = $id";
        $stmt = $connect->query($sql);
        //thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $row = $stmt->fetch();
        return $row;
    }

    public function search($search)
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID 
        WHERE students.`gender` LIKE '%$search%' OR students.`birthday` LIKE '%$search%' OR students.`name` LIKE '%$search%' OR teachers.`name` LIKE '%$search%' OR students.`position` LIKE '%$search%' OR students.`birthday` LIKE '%$search%' ";
        $stmt = $connect->query($sql);
        //thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function store($data)
    {
        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $teacherID = $data['teacherID'];
        $sql = "INSERT INTO `students` (`name`, `gender`, `birthday`, `position`, `teacherID`) 
        VALUES (
            '" . $data['name'] . "',
            '" . $data['gender'] . "',
            '" . $data['birthday'] . "',
            '" . $data['position'] . "',
            '" . $data['teacherID'] . "'
            )";
        $connect->query($sql);
    }
    public function update($id, $data)
    {
        global $connect;
        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        $teacherID = $data['teacherID'];
        $sql = "UPDATE `students` SET 
        `name` = '$name',
        `gender` = '$gender',
        `birthday` = '$birthday',
        `position` = '$position',
        `teacherID` = '$teacherID' 
        WHERE `students`.`id` = $id";
        $connect->query($sql);
    }
    public function destoy($id)
    {
        global $connect;
        $sql = "DELETE FROM `students` WHERE `students`.`id` = $id";
        $connect->query($sql);
    }

    function count($params = [])
    {

        global $connect;
        $sql = "SELECT count(students.id) as total FROM `students` JOIN teachers ON teachers.id = students.teacherID
        WHERE soft_delete = 0  ";

        $position  = isset($params['position']) ? $params['position'] : '';
        $teacherID  = isset($params['teacherID']) ? $params['teacherID'] : '';
        $gender  = isset($params['gender']) ? $params['gender'] : '';
        $search  = isset($params['search']) ? $params['search'] : '';

        if ($position) {
            $sql .= " AND students.`position` = '$position'";
        }
        if ($teacherID) {
            $sql .= " AND students.`teacherID` = '$teacherID'";
        }
        if ($gender) {
            $sql .= " AND students.`gender` = '$gender'";
        }
        if ($search) {
            $sql .= " AND students.`name` = '%$search%'";
        }

        // echo $sql;
        // die();

        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $total_record = $stmt->fetch();
        return $total_record->total;
    }

    function paginate($offset, $limit, $params = [])
    {
        global $connect;
        $sql = "SELECT students.*,teachers.name AS teacherName FROM `students` JOIN teachers ON teachers.id = students.teacherID
        WHERE soft_delete = 0 ";

        $position  = isset($params['position']) ? $params['position'] : '';
        $teacherID  = isset($params['teacherID']) ? $params['teacherID'] : '';
        $gender  = isset($params['gender']) ? $params['gender'] : '';
        $search  = isset($params['search']) ? $params['search'] : '';

        if ($position) {
            $sql .= " AND students.`position` = '$position'";
        }
        if ($teacherID) {
            $sql .= " AND students.`teacherID` = '$teacherID'";
        }
        if ($gender) {
            $sql .= " AND students.`gender` = '$gender'";
        }
        if ($search) {
            $sql .= " AND students.`name` = '%$search%'";
        }



        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        // die();

        $sql .= "LIMIT $offset, $limit";

        //x += 10 => x=x+10

        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }

    function sort_asc($offset, $limit, $column)
    {
        global $connect;
        $sql = "SELECT *
        FROM  students WHERE soft_delete = 0
        ORDER BY $column ASC
        LIMIT $offset, $limit";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }

    function sort_desc($offset, $limit, $column)
    {
        global $connect;
        $sql = "SELECT *
        FROM students WHERE soft_delete = 0
        ORDER BY $column DESC
        LIMIT $offset, $limit";
        $stmt = $connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $items = $stmt->fetchAll();
        return $items;
    }
}
