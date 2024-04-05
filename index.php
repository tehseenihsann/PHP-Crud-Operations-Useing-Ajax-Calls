<?php
require_once('calls.php');
$id = '';
$name = '';
$email = '';
$password = '';
$phone = '';
$address = '';
$gender = '';
$course = '';
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>PHP Forms</title>
</head>

<body>
    <div class="top">
        <h1>PHP Crud Operations Useing Ajax Calls</h1>
    </div>
    <div class="screen-body">
        <form class="form" id="form" method="POST">
            <h2 class="form-heading">Manage User</h2>

            <label class="field-lbl" for="name">Name</label>
            <input value="<?php echo $name ?>" maxlength="50" autofocus required class="in-field" placeholder="Enter Your Full Name" type="text" name="name" id="name">
            <em id="nameErr">err</em><br>

            <label class="field-lbl" for="email">Email</label>
            <input value="<?php echo $email ?>" maxlength="50" required class="in-field" placeholder="Enter Your Email" type="email" name="email" id="email">
            <em id="emailErr">err</em><br>


            <label class="field-lbl" for="password">Password</label>
            <input value="<?php echo $password ?>" maxlength="50" class="in-field" placeholder="Enter Your Password" type="password" name="password" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" required>
            <em id="passwordErr">err</em><br>

            <label class="field-lbl" for="confirm">confirm Password</label>
            <input value="<?php echo $password ?>" maxlength="50" required class="in-field" placeholder="Password" type="password" name="confirm" id="confirm">
            <em id="confirmErr">err</em><br>

            <label class="lbl" for="show">Show Passowrd:</label>
            <input class="ch-box" type="checkbox" name="show" id="show"><br>



            <label class="field-lbl" for="phone">Phone Number</label>
            <input value="<?php echo $phone ?>" maxlength="11" required class="in-field" placeholder="Enter your Phone Number" type="tel" name="phone" id="phone">
            <em id="phoneErr">err</em><br>

            <label class="field-lbl">Address</label>
            <input value="<?php echo $address ?>" maxlength="100" required class="in-field" placeholder="Enter your Address" type="text" name="address" id="address">
            <em id="addressErr">err</em><br>

            <label class="lbl">Gender:</label>

            <input required class="rdo" type="radio" name="gender" id="male" value="male" <?php if ($gender == 'male') echo 'checked'; ?>>
            <label class="lbl" for="male">Male</label>

            <input required class="rdo" type="radio" name="gender" id="female" value="female" <?php if ($gender == 'female') echo 'checked'; ?>>
            <label class="lbl" for="female" <?php if ($course == 'Female') echo 'selected'; ?>>Female</label>

            <input required class="rdo" type="radio" name="gender" id="other" value="other" <?php if ($gender == 'other') echo 'checked'; ?>>
            <label class="lbl" for="other" <?php if ($course == 'Other') echo 'selected'; ?>>Other</label><br>
            <em id="genderErr">Select a gender</em><br>

            <label class="slct-lbl">Course</label>
            <select required class="slct" name="course" id="course">
                <option selected disabled class="opt" value="">Select a course</option>
                <option class="opt" value="PHP" <?php if ($course == 'PHP') echo 'selected'; ?>>PHP</option>
                <option class="opt" value="java" <?php if ($course == 'java') echo 'selected'; ?>>Java</option>
                <option class="opt" value="python" <?php if ($course == 'python') echo 'selected'; ?>>Python</option>
            </select>
            <em id="courseErr">Select a course</em><br>

            <label class="lbl">Disable:</label>
            <input class="ch-box" type="checkbox" name="disable" id="disable">

            <div class="btn-container">
                <input class="btn" type="button" name="submit" id="submit" value="Submit" onclick="save_data()">
                <button onclick="document.getElementById('form').reset()" class="btn">Clear</button>
            </div>
            <div id="message" class="message"></div>
        </form>


        <div id="confirmDialog" class="dialog">
            <div class="dialog-content">
                <p>Do you want to submit this form?</p>
                <button class=".btnn" id="confirmYes">Yes</button>
                <button class=".btnn" id="confirmNo">No</button>
            </div>
        </div>


        <div class="container">
            <div class="table-top">
                <div class="left">
                    <label class="lbl" for="entry">Show</label>
                    <select class="entry" name="entry" id="entry">
                        <option class="opt" value="10">10</option>
                        <option class="opt" value="20">20</option>
                        <option class="opt" value="50">50</option>
                    </select>
                    <label for="entry">Entries</label>
                </div>
                <div class="right">
                    <label class="lbl" for="search">Search:</label>
                    <input class="search" name="search" id="search" placeholder="Search..." type="search">
                </div>
            </div>
            <div id="msg" class="message"></div>
            <table id="dataTable">
                <thead>
                    <tr>
                        <th><input id="checkAll" type="checkbox"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Comming From PHP -->
                </tbody>
            </table>

            <div class="bottom">
                <div class="b-left">
                    <span id="ent">
                </div>
                <div class="b-right">
                    <button class="pre" id="pre">Previous</button>
                    <span class="pg-num" id="pgNum"></span>
                    <button class="next" id="next">Next</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function checkEmpty() {
            var empty = false;
            let rdo = $('form input[type="radio"]:checked').length > 0;
            $('form input').each(function() {
                if ($(this).val() === '') {
                    empty = true;
                }
            });
            if (!rdo) {
                empty = true;
            }
            console.log(empty);
            return empty;
        }


        function read_data() {
            var tbl = "flag=read_data";
            $.ajax({
                type: 'POST',
                url: 'calls.php',
                data: tbl,
                success: function(response) {
                    $('#dataTable tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        }

        read_data();

        function save_data() {
            var formData = $('#form').serialize() + '&flag=save_data';
            if (confirm("Do you want to submit this data?")) {
                let check = checkEmpty();
                if (!check) {

                    $.ajax({
                        type: 'POST',
                        url: 'calls.php',
                        data: formData,
                        success: function(response) {
                            $('#message').html(response);
                            $('#form')[0].reset();
                            read_data();
                        }
                    });
                } else {
                    alert('Required all fields!');
                }

            }
        }

        function deleteData(button) {
            if (confirm("Do you want to delete this record?")) {
                var user_id = $(button).data('userid');
                $.ajax({
                    type: 'POST',
                    url: 'calls.php',
                    data: {
                        'userid': user_id,
                        'flag': 'delete'
                    },
                    success: function(response) {
                        $('#msg').html(response);
                        read_data();
                        $('#msg').focus();
                    }
                });
            }
        }

        function editData(button) {
            var user_id = $(button).data('userid');
            $.ajax({
                type: 'POST',
                url: 'calls.php',
                data: {
                    'userid': user_id,
                    'flag': 'edit'
                },
                success: function(response) {
                    var pass = response['password'];
                    console.log(response['user_id']);
                    $('#name').val(response['name']);
                    $('#email').val(response['email']);
                    $('#password').val(pass);
                    $('#confirm').val(pass);
                    $('#phone').val(response['phone']);
                    $('#address').val(response['address']);
                    $('input[name="gender"][value="' + response['gender'] + '"]').prop('checked', true);
                    $('#course').val(response['course']);
                    $('#submit').attr('onclick', 'edit_data("' + response['user_id'] + '")');
                    $('#name').focus();
                }
            })
        }

        function edit_data(id) {
            let = condition = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'phone': $('#phone').val(),
                'address': $('#address').val(),
                'gender': $('input[name="gender"]:checked').val(),
                'course': $('#course').val(),
            }
            $.ajax({
                type: 'POST',
                url: 'calls.php',
                data: {
                    'userid': id,
                    'flag': 'change',
                    'condition_arr': condition,
                },
                success: function(response) {
                    $('#message').html(response);
                    $('#form')[0].reset();
                    read_data();
                    $('#submit').attr('onclick', 'save_data()');
                    $('#dataTable').focus();
                }
            })
        }
    </script>

    <script src="index.js"></script>
</body>