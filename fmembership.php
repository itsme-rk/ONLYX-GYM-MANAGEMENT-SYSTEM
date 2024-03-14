<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onlyx GYM- Memberships & Workouts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #fff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #ff3c00;
            margin: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #ff3c00;
            margin-top: 0;
        }

        p {
            color: #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ff3c00;
            color: #fff;
        }

        footer {
            background-color: #333;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Onlyx GYM</h1>
    </header>

    <main>
        <section>
            <h2>Membership Plans</h2>
            <p>Choose the membership plan that suits you best.</p>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plan</th>
                        <th>Monthly Price</th>
                        <th>Annual Price</th>
                        <th>Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection file
                    include 'config.php';

                    // Fetch membership plans from the database
                    $query = "SELECT * FROM membership";
                    $result = mysqli_query($connection, $query);

                    // Loop through the results and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['plan'] . "</td>";
                        echo "<td>" . $row['monthly_price'] . "</td>";
                        echo "<td>" . $row['annual_price'] . "</td>";
                        echo "<td>" . $row['access'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Workout Schedule</h2>
            <p>Check out our weekly workout schedule.</p>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Day</th>
                        <th>Workout Type</th>
                        <th>Diet Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch workout schedule from the database
                    $query = "SELECT * FROM schedule";
                    $result = mysqli_query($connection, $query);

                    // Loop through the results and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['day'] . "</td>";
                        echo "<td>" . $row['workout_type'] . "</td>";
                        echo "<td>" . $row['diet_plan'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        &copy; <?php echo date('Y'); ?> Onlyx GYM. All rights reserved.
    </footer>
</body>

</html>
