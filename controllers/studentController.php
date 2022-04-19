<?php
include_once './models/studentModel.php';
include_once './models/teacherModel.php';
include_once './controllers/Request/formRequest.php';

// use Request;
// use studentModel;

class studentController
{
    public function index()
    {

        $alert = (isset($_SESSION['alert'])) ? $_SESSION['alert'] : '';
        unset($_SESSION['alert']);
        $studentModel = new studentModel();

        $errors = [];
        unset($_SESSION['errors']);
        $total_records = $studentModel->count();

        $limit  = 5;
        $genders  = 2;
        $total_page = ceil($total_records / $limit);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if ($page > 1) {
            $pre = $page - 1;
        } else {
            $pre = 1;
        }
        if ($page < $total_page) {
            $next = $page + 1;
        } else {
            $next = $total_page
            ;
        }

        $offset = ($page - 1) * $limit;

        $items = $studentModel->paginate($offset, $limit, $_REQUEST);
        $genders = ['Nam', 'Nữ'];
        $positions = ['Lớp Trưởng', 'Tổ Trưởng', 'Thành Viên'];


        $teacherModel = new teacherModel();
        $teachers = $teacherModel->getAll();

        // if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        //     $search = $_REQUEST['search'];
        // }

        // echo "<pre>";
        // print_r($teachers);
        // echo "</pre>";
        // die();
        $param = [
            'offset' => $offset,
            'genders' => $genders,
            'positions' => $positions,
            'teachers' => $teachers,
            'items' => $items,
            'total_page' => $total_page,
            'pre' => $pre,
            'next' => $next,
        ];
        $this->renderView("/students/index.php", $param);

        include_once './views/students/index.php';
    }
    public function renderView($path, $params = [])
    {
        extract($params);
        include 'views' . $path;
    }
    public function add()
    {
        //Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);
        //Lấy giá trị POST từ form vừa submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = new Request($_REQUEST);
            $request->validateForm(
                [
                    'name',
                    'gender',
                    'birthday',
                    'position',
                    'teacherID',

                ],
                [
                    'name' => 'Vui lòng nhập tên học sinh',
                    'gender' => 'Vui lòng nhập tuổi',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ',
                    'teacherID' => 'Vui lòng nhập GVCN',

                ]
            );
            if ($request->isvalid()) {
                $studentModel = new studentModel();
                //insert dữ liệu vào database table
                $studentModel->store($_REQUEST);

                $_SESSION['flash_message'] = "Thêm mới thành công";
                // echo "<pre>";
                // print_r($_SESSION);
                // echo "</pre>";
                // die();
                header('location:index.php?controller=student&action=index');
            } else {
                // $_SESSION['errors'] = $errors;
                header('location:index.php?controller=student&action=add');
            }
        }
        $teacherModel = new teacherModel();
        $teachers = $teacherModel->getAll();
        // echo "<pre>";
        // print_r($teachers);
        // echo "</pre>";

        include_once './views/students/add.php';
    }
    public function edit()
    {
        $errors = [];
        $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
        unset($_SESSION['errors']);
        $id = $_REQUEST['id'];
        $studentModel = new studentModel();
        $student = $studentModel->find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $request = new Request($_REQUEST);
            $request->validateForm(
                [
                    'name',
                    'gender',
                    'birthday',
                    'position',
                    'teacherID',
                ],
                [
                    'name' => 'Vui lòng nhập tên học sinh',
                    'gender' => 'Vui lòng nhập tuổi',
                    'birthday' => 'Vui lòng nhập ngày sinh',
                    'position' => 'Vui lòng nhập chức vụ',
                    'teacherID' => 'Vui lòng nhập GVCN',
                ]
            );

            if ($request->isValid()) {
                $id = $_REQUEST['id'];
                $studentModel->update($id, $_REQUEST);
                $_SESSION['flash_message'] = "Chỉnh sửa thành công";

                header('location:index.php?controller=student&action=index');
            } else {
                header('location:index.php?controller=student&action=edit&id='. $id);
            }
        }
        $teacherModel = new teacherModel();
        $teachers = $teacherModel->getAll();
        include_once './views/students/edit.php';
    }

    public function delete()
    {
        try {
            $errors = [];
            $id = $_REQUEST['id'];
            $studentModel = new studentModel();
            $studentModel->destoy($id);
            $_SESSION['flash_message'] = "Xóa thành công";
            // echo "<pre>";
            // print_r($_SESSION);
            // echo "</pre>";
            // die();
            header('location:index.php?controller=student&action=index');
        } catch (\Exception $e) {
            $_SESSION['errors'] = $errors;
            header('location:index.php?controller=student&action=index');
        }
    }

    public function show()
    {
        $id = $_REQUEST['id'];
        $studentModel = new studentModel();
        $student = $studentModel->find($id);


        include_once './views/students/show.php';
    }

    public function search_name()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = $_REQUEST['search'];
            $gender = $_POST['gender'];
            $studentModel = new studentModel();
            $items = $studentModel->search($search, $gender);

            if ($items == null) {
                $error = "Không tìm thấy kết quả nào";
            } else {
                $error = '';
            }
            $param = [
                'items' => $items,
                'error' => $error
            ];
            $this->renderView("/students/search.php", $param);
            // echo '<pre>';
            // print_r($students);
            // die();
        }
    }




    public function sort_asc()
    {
        unset($_SESSION['errors']);
        $studentModel = new studentModel();

        $total_records = $studentModel->count();

        $limit  = 5;
        $total_page = ceil($total_records / $limit);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        if ($page > 1) {
            $pre = $page - 1;
        } else {
            $pre = 1;
        }
        if ($page < $total_page) {
            $next = $page + 1;
        } else {
            $next = $total_page;
        }

        $offset = ($page - 1) * $limit;

        $column = $_GET['column'];

        $items = $studentModel->sort_asc($offset, $limit, $column);

        $param = [
            'items' => $items,
            'total_page' => $total_page,
            'pre' => $pre,
            'next' => $next,
            'column' => $column
        ];
        $this->renderView("/type-notes/sortAsc.php", $param);
    }

    public function sort_desc()
    {
        unset($_SESSION['errors']);
        $studentModel = new studentModel();
        $total_records = $studentModel->count();

        $limit  = 5;
        $total_page = ceil($total_records / $limit);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if ($page > 1) {
            $pre = $page - 1;
        } else {
            $pre = 1;
        }
        if ($page < $total_page) {
            $next = $page + 1;
        } else {
            $next = $total_page;
        }

        $offset = ($page - 1) * $limit;

        $column = $_GET['column'];

        $items = $studentModel->sort_desc($offset, $limit, $column);

        $param = [
            'items' => $items,
            'total_page' => $total_page,
            'pre' => $pre,
            'next' => $next,
            'column' => $column
        ];
        $this->renderView("/type-notes/sortDesc.php", $param);
    }
}
