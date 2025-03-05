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
?>
