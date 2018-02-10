<script>
    $(document).ready(function() {
        // Set trigger and container variables
        var trigger = $('#Generator a'),
            container = $('#Generator');

        // Fire on click
        trigger.on('click', function() {
            // Set $this for re-use. Set target from data attribute

            // Load target page into container
            container.load('pass.php');
            //container.load('result.php');

            // Stop normal link behavior
            return false;
        });
    });
</script>
<?php
$mysqli = mysqli_connect("localhost", "UserName", "PassWord", "badpw");
if (!$mysqli) {
    echo "Cannot Connect to the database";
    exit;
}
//echo "Success";
$randNum = mt_rand(1, 1001);
//echo $randNum;
if (is_numeric($randNum)) {
    $query = "SELECT PASSWORD FROM badpw WHERE id = '" . $randNum . "'";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $badpass = $row["PASSWORD"];
        }
        $result->free();
    }
    mysqli_close($mysqli);
} else {
    echo "Do Not break our machine!";
    mysqli_close($mysqli);
}
?>
      <section id="Generator">
            <div class="section--basic section--darker">
                <div class="container">
                    <div class="headline">
                        <h2>Bad Password Generator</h2>
                        <h3>The Bad Password is: </h3>
                    </div>
                    <h2 data-aos="fade" align="center" style="text-transform:none; color:red;">
                        	<b><?php
                        	include('result.php');
                        ?></b>
                    </h2>
                </br>
                </br>
                <p align="center">WOW! You generated a really bad password!! Please use it immediately!!</p>
                </div>
                <div class="buttons-group buttons-group-center mt-3 Portfolio-see-more" data-aos="fade">
                    <a href="#" class="btn btn-black btn-right-icon">Generate Another One</a>
                </div>
            </div>
        </section>