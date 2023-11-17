<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
    exit;
}

include("../layouts/planheader.php")
?>
<main>
    <div class="container">
        <section class="section_todo_add">

            <?php

            if (isset($_POST["save"])) {

                include("../dbconnect.php");

                mysqli_select_db($conn, "plan_db");
                $sql = "CREATE TABLE IF NOT EXISTS plan(
                    plan_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
                    userid INT,
                    plan_details VARCHAR(200) NOT NULL,
                    plan_date VARCHAR(200) NOT NULL,
                    dateInserted DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (userid) REFERENCES users(userid) ON DELETE CASCADE
                );";

                mysqli_query($conn, $sql);

                $plan = $_POST["task"];
                $date = $_POST["task_date"];

                $query = "INSERT INTO `plan`(plan_details,plan_date) VALUES('$plan','$date')";

                mysqli_query($conn, $query);
            }

            ?>

            <form action="plan.php" id="todo_form" class="form" method="POST">
                <input type="text" name="task" class="todo" id="todo" placeholder="Enter your task.">
                <input type="date" name="task_date" class="task" id="todo_date">
                <input type="submit" value="SAVE" name="save">
                <span class="plan_error" id="plan_error" style="color:red;"></span>
            </form>

            <script>
                const planform = document.getElementById("todo_form");
                planform.onsubmit = (e) => {
                    const todo = document.getElementById("todo").value;
                    const todo_date = document.getElementById("todo_date").value;
                    const error_div = document.getElementById("plan_error");
                    error_div.style.display = "";
                    if ((todo.trim()).length === 0 && todo_date.length === 0) {
                        e.preventDefault();
                        error_div.style.display = "block";
                        error_div.innerText = "Fill all plan fields please. ";
                    } else {
                        error_div.style.display = "none";
                    }
                }
            </script>
        </section>

        <section class="section" id="section_tasks">

            <p class="div_header">PLANS</p>


            <table>
                <thead>

                    <tr>
                        <td>TODO ID</td>
                        <td>TASK</td>
                        <td>TASK DATE</td>
                        <td>EDIT</td>
                        <td>DELETE</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../dbconnect.php");
                    mysqli_select_db($conn, "plan_db");
                    $query_plan = "SELECT * FROM plan";
                    $result = mysqli_query($conn, $query_plan);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $plan_id=$row["plan_id"];
                        echo "
                        <tr>
                        <td>$plan_id</td>
                        <td>{$row['plan_details']}</td>
                        <td>{$row['plan_date']}</td>
                        <td><a href='#' class='table_button edit_btn'>EDIT</a></td>
                        <td><a href='#' class='table_button delete'>DELETE</a></td>
                        <div class='delete_modal'>

                        <div class='delete_wrapper'>

                            <p>Are you sure you want to delete?</p>

                            <div class='modal_buttons'>
                                <div>
                                    <a href='../delete.php?id={$row['plan_id']}' class='modal_button ok_button'>OK</a>
                                </div>

                                <div>
                                    <a href='#' class='modal_button cancel_button'>CANCEL</a>
                                </div>
                            </div>

                        </div>
                        </tr>";

                  
                        
                      


                  
                    }

                    ?>
                </tbody>


            </table>

            <!-- / -->
    </div>


    </section>


    </div>

</main>
<script src="../design/plan.js"></script>
<?php include("../layouts/planfooter.php") ?>