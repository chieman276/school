<?php

namespace controllers;

include './models/principalModel.php';
include './controllers/Request/formRequest.php';

use principalModel;
use Request;

class principalController
{
    public function index()
    {
        $alert = (isset($_SESSION['alert'])) ? $_SESSION['alert'] : '';
        unset($_SESSION['alert']);
        $principalModel = new principalModel();
        $principals = $principalModel->getAll();

        include_once './views/principal/index.php';
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
                    'position'
                ],
                [
                    'name' => 'Vui lòng nhập tên hiệu trưởng',
                    'gender' => 'Vui lòng nhập giới tính',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ'
                ]
            );
            if ($request->isValid()) {
                $principalModel = new principalModel();
                $principalModel->store($_REQUEST);
                header('location:index.php?controller=principal&action=index');
            } else {
                header('location:index.php?controller=principal&action=add');
            }
        }
        include_once './views/principal/add.php';
    }


    // public function delete()
    // {
    //     $id = $_REQUEST['id'];
    //     $principalModel = new principalModel();
    //     $principalModel->destroy($id);

    //     header('location:index.php?controller=principal&action=index');
    // }
    public function delete()
    {
        try {
            $id = $_REQUEST['id'];
            $principalModel = new principalModel();
            $principalModel->destroy($id);
            header('location:index.php?controller=principal&action=index');
        } catch (\Exception  $e) {
            $_SESSION['alert'] = 'Không thể xóa Hiệu Trưởng';
            header('location:index.php?controller=principal&action=index');
        }
    }


    public function edit()
    {

        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);
        $id = $_REQUEST['id'];
        $principalModel = new principalModel();
        $principal = $principalModel->find($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = new Request($_REQUEST);

            $request->validateForm(
                [
                    'name',
                    'gender',
                    'birthday',
                    'position'
                ],
                [
                    'name' => 'Vui lòng nhập tên hiệu trưởng',
                    'gender' => 'Vui lòng nhập giới tính',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ'
                ]
            );
            if ($request->isValid()) {
                $principalModel = new principalModel();
                $principalModel->update($id, $_REQUEST);

                header('location:index.php?controller=principal&action=index');
            } else {
                header('location:index.php?controller=principal&action=add');
            }
        }
        include_once './views/principal/edit.php';
    }


    public function show()
    {
        $id = $_REQUEST['id'];
        $principalModel = new principalModel();
        $principal = $principalModel->find($id);

        include_once './views/principal/show.php';
    }
}
