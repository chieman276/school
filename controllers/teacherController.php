<?php

namespace controllers;

include_once './models/teacherModel.php';
include_once './controllers/Request/formRequest.php';

use Request;
use teacherModel;

class teacherController
{
    public function index()
    {
        $teacherModel = new teacherModel();
        $teachers = $teacherModel->getAll();

        $genders = ['Nam', 'Nữ'];
        $positions = ['GVCN: lớp 10','GVCN: lớp 11','GVCN: lớp 12'];
        


        $param = [
            'teachers' => $teachers,
            'genders' => $genders,
            'positions' => $positions,

        ];

        $this->renderView("/teachers/index.php", $param);

        include_once './views/teachers/index.php';
    }

    public function renderView($path, $params = [])
    {
        extract($params);
        include 'views' . $path;
    }


    public function add()
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = new Request($_REQUEST);

            $request->validateForm(
                [
                    'name',
                    'gender',
                    'birthday',
                    'position',
                    'principalID',
                ],
                [
                    'name' => 'Vui lòng nhập tên giáo viên',
                    'gender' => 'Vui lòng nhập tuổi',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ',
                    'principalID' => 'Vui lòng nhập hiệu trưởng',
                ]
            );

            if ($request->isValid()) {
                $teacherModel = new teacherModel();
                $teacherModel->store($_REQUEST);

                header('location: index.php?controller=teacher&action=index');
            } else {
                header('location: index.php?controller=teacher&action=add');
            }
        }
        include_once './views/teachers/add.php';
    }
    public function edit()
    {
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);
        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacher = $teacherModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = new Request($_REQUEST);
            $request->validateForm(
                [
                    'name',
                    'gender',
                    'birthday',
                    'position',
                    'principalID',
                ],
                [
                    'name' => 'Vui lòng nhập tên giáo viên',
                    'gender' => 'Vui lòng nhập tuổi',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ',
                    'principalID' => 'Vui lòng nhập hiệu trưởng',
                ]
            );

            if ($request->isValid()){
            $teacherModel->update($id, $_REQUEST);

            header('location:index.php?controller=teacher&action=index');
            } else {
                header('location:index.php?controller=teacher&action=add');

            }
        }
        include_once './views/teachers/edit.php';
    }
    public function delete()
    {

        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacherModel->destroy($id);

        header('location:index.php?controller=teacher&action=index');
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        $teacherModel = new teacherModel();
        $teacher = $teacherModel->find($id);
        include_once './views/teachers/show.php';
    }

    public function search_name()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = $_REQUEST['search'];
            $teacherModel = new teacherModel();
            $teachers = $teacherModel->search($search);
            // echo "<pre>";
            // print_r($teachers);
            // echo "</pre>";
            // die();

            if ($teachers == null) {
                $error = "Không tìm thấy kết quả nào";
            } else {
                $error = '';
            }
            $params = [
                'teachers' => $teachers,
                'error' => $error
            ];
            $this->renderView("/teachers/search.php", $params);
        }
    }
}
