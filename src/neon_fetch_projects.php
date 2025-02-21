<?php
// Database connection details for NeonDB (PostgreSQL)
$host = "ep-still-credit-a5oz69sk-pooler.us-east-2.aws.neon.tech"; // NeonDB host
$port = "5432"; // PostgreSQL default port
$dbname = "dict"; // Database name
$user = "dict_owner"; // Database username
$password = "npg_AGLU9QpDVma5"; // Database password

// Endpoint ID (first part of the domain name)
$endpoint_id = "ep-still-credit-a5oz69sk";

// Prepare the connection string with SSL
$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require options='endpoint=$endpoint_id'";

// Establish the connection
$conn = pg_connect($connection_string);

// Check connection
if (!$conn) {
    die("Database connection failed: " . pg_last_error());
}

// Query to fetch the project data (updated query based on your provided SQL)
$query = "
  SELECT p.id, p.name, COUNT(a.id) AS activity_count, SUM(a.\"numberOfParticipants\") AS total_participants
  FROM \"Project\" p
  LEFT JOIN \"Activity\" a ON p.id = a.\"projectId\"
  GROUP BY p.id, p.name
";

// Execute the query
$result = pg_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . pg_last_error());
}

// Prepare the data to send back to the frontend
$projects = [];
while ($row = pg_fetch_assoc($result)) {
    $projects[] = [
        'name' => $row['name'],
        'value' => (int)$row['activity_count'], // Number of activities
        'participants' => (int)$row['total_participants'], // Total number of participants
    ];
}

// Return the data as a JSON response
header('Content-Type: application/json');
echo json_encode($projects);

// Close the connection
pg_close($conn);
?>
