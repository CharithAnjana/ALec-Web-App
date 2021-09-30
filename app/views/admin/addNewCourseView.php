<?php $errors = $data['errors'] ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ALec</title>

    <?php linkCSS('add_new_course'); ?>

</head>

<body>

    <?php linkPhp("navigationBarAdmin"); ?>

    <div class="wrapper center">

        <div class="form-container">
            <div class="slide"> ADD NEW COURSE </div>

            <div class="form-inner">

                <!-- FORM START -->
                <form method="post" action="<?php echo BASEURL . '/addNewCourse/index'; ?>" class="login" id="registerForm" onsubmit="validateAll()">

                    <div class="field" id="courseField">
                        <input type="text" placeholder="Course Name" name="c_name" id="c_name" onfocusout="validateCourseName()">
                        <div class="error" id="error"><?php echo $errors["name"]; ?></div>
                    </div>

                    <div class="field-long">
                        <textarea placeholder="Course Description" name="c_desc" id="c_desc" rows="10" cols="30" onfocusout="validateCourseDescription()"></textarea>
                        <div class="error" id="error"></div>
                    </div>

                    <div class="field">
                        <input type="text" placeholder="Year" name="c_year" id="c_year" onfocusout="validateCourseYear()">
                        <div class="error" id="error"><?php echo $errors["year"]; ?></div>
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Register">
                    </div>
                </form>
                <!-- FORM END -->


            </div>
        </div>
    </div>

    <?php linkPhp("notification"); ?>

    <?php linkPhp("footer"); ?>

    <?php linkJS("corseRegisterValidation"); ?>

</body>

</html>