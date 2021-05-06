<?php
/**
 * My Add member page
 *
 * PHP version 7
 *
 * @category Connection
 * @package  Website
 * @author   Eryk <p238855@tafe.wa.edu.au>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost/index.php
 */
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "movies_deployment";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
//echo "Connected successfully";
?>
