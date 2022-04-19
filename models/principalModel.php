<?php
include './db.php';

class principalModel
{

    public function getAll()
    {

        global $connect;
        $sql = "SELECT * FROM `principal`";

        $stmt = $connect->query($sql);

        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        //fetchALL se tra ve du lieu nhieu hon 1 ket qua
        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function find($id)
    {
        global $connect;
        $sql = "SELECT * FROM `principal` WHERE `id` = $id";

        $stmt = $connect->query($sql);

        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        //fetch se tra ve du lieu 1 ket qua
        $row = $stmt->fetch();

        return $row;
    }

    public function store($data)
    {

        global $connect;


        $name = $data['name'];
        $gender = $data['gender'];
        $birthday = $data['birthday'];
        $position = $data['position'];
        
        $sql = "INSERT INTO `principal` (`name`, `gender`, `birthday`, `position`) VALUES
         (
            '" . $data['name'] . "',
            '" . $data['gender'] . "',
            '" . $data['birthday'] . "',
            '" . $data['position'] . "'
             
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
        $sql = "UPDATE `principal` SET `name` = '$name',
         `gender` = '$gender',
          `birthday` = '$birthday',
          `position` = '$position' 
          WHERE `principal`.`id` = $id";
        $connect->query($sql);
    }

    public function destroy($id)
    {
        global $connect;
        $sql = "DELETE FROM `principal` WHERE `principal`.`id` = $id";
        //thực thi câu lênh sql
        $connect->query($sql);
    }

    public function detail($id)
    {
        global $connect;

        $sql = "SELECT * FROM `principal` WHERE `id` = $id";

        $connect->query($sql);
    }
}
