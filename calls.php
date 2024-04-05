<?php
class Database
{
    private $host;
    private $username;
    private $passsword;
    private $dbname;

    protected function connect()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->passsword = '';
        $this->dbname = 'tehseen_crud';

        $conn = new mysqli($this->host, $this->username, $this->passsword, $this->dbname);
        return $conn;
    }
}


class CrudOperations extends Database
{

    public function readData($table, $field = '*', $condition = '', $order_by_field = '', $order_by_type = 'DESC', $limit = '')
    {
        $sql = "SELECT $field FROM $table ";
        if ($condition != '') {
            $sql .= ' WHERE ';
            $c = count($condition);
            $i = 1;
            foreach ($condition as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' and ";
                }
                $i++;
            }
        }

        if ($order_by_field != '') {
            $sql .= " ORDER by $order_by_field $order_by_type ";
        }

        if ($limit != '') {
            $sql .= " LIMIT $limit";
        }
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input class='row-ch' type='checkbox'></td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td><button onclick='editData(this)' data-userid='" . $row['user_id'] . "' class='edit-btn'>Edit</a></td>";
                echo "<td><button onclick='deleteData(this)' data-userid='" . $row['user_id'] . "' class='del-btn'>Delete</button></td>";
                echo "</tr>";
            }
        }

        if ($order_by_field != '') {
            $sql .= " ORDER by $order_by_field $order_by_type ";
        }

        if ($limit != '') {
            $sql .= " LIMIT $limit";
        }
    }

    public function editFields($table, $field = '*', $condition = '')
    {
        $sql = "SELECT $field FROM $table ";
        if ($condition != '') {
            $sql .= ' WHERE ';
            $c = count($condition);
            $i = 1;
            foreach ($condition as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' and ";
                }
                $i++;
            }
        }
        $result = $this->connect()->query($sql);
        $userData = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $userData[] = $row;
            }
            return $userData;
        } else {
            echo "No Record Found!";
        }
    }

    public function createData($table, $values_arr)
    {
        if (!empty($values_arr)) {
            $fields_arr = array();
            $val_arr = array();
            foreach ($values_arr as $key => $val) {
                $fields_arr[] = $key;
                $val_arr[] = $this->getSafeStr($val);
            }
            $field = implode(",", $fields_arr);
            $value = "'" . implode("','", $val_arr) . "'";
            $sql = "INSERT INTO $table($field) values($value) ";
            $result = $this->connect()->query($sql);
            if ($result) {
                echo "User's data Saved Successfully!";
            } else {
                echo "User not created!";
            }
        } else {
            echo "Fill all fields";
        }
    }

    public function updateData($table, $condition, $field, $value)
    {
        if ($condition != '') {
            $sql = "UPDATE $table SET ";
            $c = count($condition);
            $i = 1;
            foreach ($condition as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val', ";
                }
                $i++;
            }
            $sql .= " WHERE $field = '$value' ";
            $result = $this->connect()->query($sql);

            if ($result) {
                echo "Update Record Successfully!";
            } else {
                echo "Cannot Updaet Record!";
            }
        } else {
            echo "Error occurred!";
        }
    }


    public function deleteData($table, $condition)
    {
        if (!empty($condition)) {
            $sql = "DELETE FROM $table WHERE ";
            $c = count($condition);
            $i = 1;
            foreach ($condition as $key => $val) {
                if ($i == $c) {
                    $sql .= "$key = '$val'";
                } else {
                    $sql .= "$key = '$val' and ";
                }
                $i++;
            }
            $result = $this->connect()->query($sql);
            if ($result) {
                echo "Record deleted successfully!";
            } else {
                echo "Error deleting record!";
            }
        }
    }

    public function getSafeStr($str)
    {
        if (!empty($str)) {
            return mysqli_real_escape_string($this->connect(), $str);
        }
    }


    function save_data($data)
    {
        $obj = new CrudOperations();
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];
        $address = $data['address'];
        $gender = $data['gender'];
        $course = $data['course'];

        $condition_arr = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'address' => $address,
            'gender' => $gender,
            'course' => $course
        );

        if (!empty($condition_arr['name'])) {
            return $obj->createData('users', $condition_arr);
        }
    }
}

if (isset($_POST['flag']) && $_POST['flag'] == 'save_data') {
    $obj = new CrudOperations();
    $obj->save_data($_POST);
}


// echo (isset($_POST['flag']) && $_POST['flag'] == 'read_data');
if (isset($_POST['flag']) && $_POST['flag'] == 'read_data') {
    $obj = new CrudOperations();
    $obj->readData('users', '*', '', 'user_id');
}


if (isset($_POST['flag']) && $_POST['flag'] == 'delete') {
    $obj = new CrudOperations();
    $id = $_POST['userid'];
    $condition = array('user_id' => $id);
    $obj->deleteData('users', $condition);
}


if (isset($_POST['flag']) && $_POST['flag'] == 'edit') {
    $obj = new CrudOperations();
    $id = $_POST['userid'];
    $condition = array('user_id' => $id);
    $result = $obj->editFields('users', '*', $condition);
    header('Content-Type: application/json');
    print_r(json_encode($result[0]));
}

if (isset($_POST['flag']) && $_POST['flag'] == 'change') {
    $obj = new CrudOperations();
    $id = $_POST['userid'];
    $condition_arr = $_POST['condition_arr'];
    $obj->updateData('users', $condition_arr, 'user_id', $id);
}
