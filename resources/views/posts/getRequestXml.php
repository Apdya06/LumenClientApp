<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>List Post</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results['Post'] as $result) {
                    echo "<tr>";
                    echo "<td>" . $result['id'] . "</td>";
                    echo "<td>" . $result['user_id'] . "</td>";
                    echo "<td>" . $result['title'] . "</td>";
                    echo "<td>" . $result['status'] . "</td>";
                    echo "<td>" . $result['content'] . "</td>";
                    echo "<td>" . $result['created_at'] . "</td>";
                    echo "<td>" . $result['updated_at'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
