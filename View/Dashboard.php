<?php

include "../Controller/DashboardValidation.php";

?>

<!DOCTYPE html>
<html>

<head>

    <title>TO-DO | Dashboard</title>

</head>

<body>

    <h1>TO-DO Dashboard</h1>

    <h3>
        Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>
    </h3>

    <a href="AddTask.php">Add New Task</a>

    &nbsp;&nbsp;

    <a href="../Controller/Logout.php">Logout</a>

    <hr>

    <h2>My Tasks</h2>

    <?php echo htmlspecialchars($message ?? ""); ?>

    <table border="1">

        <tr>

            <th>Title</th>

            <th>Description</th>

            <th>Status</th>

            <th>Created At</th>

            <th>Action</th>

        </tr>

        <?php

        if($tasks && $tasks->num_rows > 0)
        {

            while($row = $tasks->fetch_assoc())
            {

        ?>

        <tr>

            <td>
                <?php echo htmlspecialchars($row["title"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row["description"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row["status"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($row["created_at"]); ?>
            </td>

            <td>

                <a href="EditTask.php?id=<?php echo $row["id"]; ?>">
                    Edit
                </a>

                |

                <a href="../Controller/CompleteTask.php?id=<?php echo $row["id"]; ?>">
                    Complete
                </a>

                |

                <a href="../Controller/DeleteTask.php?id=<?php echo $row["id"]; ?>">
                    Delete
                </a>

            </td>

        </tr>

        <?php

            }

        }
        else
        {

        ?>

        <tr>

            <td colspan="5">
                No tasks found.
            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</body>

</html>