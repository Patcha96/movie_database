<?php
/**
 * My members page
 *
 * PHP version 7
 *
 * @category Page
 * @package  Website
 * @author   Eryk <p238855@tafe.wa.edu.au>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost/movies.php
 */
?>
<?php
require 'components/header.inc.php';
require "db_connection_mysqli_oo.php";
$searchCriteria = null;
$title = null;
?>
<script src="js/regex.js" type="text/javascript"></script>
<form id="search" method="post">
    <div class="form-group">
        <input type="text" class="form-control"
               id="title" name="title" placeholder="Title"
               pattern="[A-Za-z0-9\:\ \-\']*">
    </div>
    <div class="text-center btn-div">
        <button type="submit" class="btn btn-primary btn-lg btn-block"
                name="submit">Search</button>
    </div>
</form>
<br>
<?php
require "db_connection_mysqli_oo.php";
if (isset($_POST['submit'])) {

    $regexTitle = "/^[A-Za-z0-9\:\ \-\'\,]*$/";

    $sql = "SELECT * FROM movie";

    $searchCriteria = array();

    // INPUT SANITIZATION
    if (!empty(($_POST['title']))) {
        $title = ($_POST['title']);
        $title = filter_var($title, FILTER_SANITIZE_STRING);
    }
    // REGEX MATCHING TITLE
    if (!preg_match($regexTitle, $title)) {
        die("<b>INVALID TITLE, PLEASE TRY AGAIN</b>");
    }

    if (!empty(($_POST['studio']))) {
        $studio = ($_POST['studio']);
    }

    if (!empty(($_POST['genre']))) {
        $genre = ($_POST['genre']);
    }
    if (!empty(($_POST['rating']))) {
        $rating = ($_POST['rating']);
    }
    if (!empty(($_POST['year']))) {
        $year = ($_POST['year']);
    }

    if (!empty($title) && !is_null($title)) {
        $searchCriteria[] = "title LIKE '%$title%'";
    }

    if (!empty($studio) && $studio != "Studio") {
        $searchCriteria[] = "studio = '$studio'";
    }

    if (!empty($genre) && $genre != "Genre") {
        $searchCriteria[] = "genre = '$genre'";
    }

    if (!empty($rating) && $rating != "Rating") {
        $searchCriteria[] = "rating = '$rating'";
    }

    if (!empty($year) && $year != "Year") {
        $searchCriteria[] = "year = '$year'";
    }

    if (!empty($searchCriteria)) {
        $sql .= " WHERE " . implode(" AND ", $searchCriteria);
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //open table
        echo '
        <table class="table table-hover" id="outTable">';
        echo     "<tr>
				<th>Title</th>
			</tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];

            echo "<div class='fixed_head_table' id='table_results'><tr>
			<td>" . $title. "</td>
			</tr>";
        }
        echo "</div></table>";
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>
<?php
require 'components/footer.inc.php'
?>