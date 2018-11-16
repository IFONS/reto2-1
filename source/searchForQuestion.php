<?php
        include ("server/connection.php");
        include ("server/questionDB.php");       
        include ("server/categoryDB.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/foundQuestion.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Nanum+Gothic" rel="stylesheet">
<body>
    <div id="grid">
        <?php
            include "sideBar.php";
            include "navBar.php";
        ?>
        <div id="content">
            <h2>Resultado</h2>
            <div id="found">
                <?php
                    if (isset($_POST["searchQuestion"])) {
                        $questions = searchQuestionHeader($_POST["searchQuestion"]);
                        for ($x = 0; $x < sizeof($questions); $x++){
                        echo '<div class="divfoundQuestion">';
                            echo '<div class="divVotes">';

                            echo '</div>';
                            echo '<div class="divQuestionInfo">';
                                echo '<div class="questionHeader">';
                                    echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>';
                                echo '</div>';
                                echo '<div class="questionData">';
                                    echo $questions[$x]["raw_data"];
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        }
                    }

                    if (isset($_GET["categoryName"])) {
                        $idC = selectIdCategory($_GET["categoryName"]);
                        $questions = selectQuestionByCategory($idC);
                        for ($x = 0; $x < sizeof($questions); $x++){
                        echo '<div class="divfoundQuestion">';
                            echo '<div class="divVotes">';

                            echo '</div>';
                            echo '<div class="divQuestionInfo">';
                                echo '<div class="questionHeader">';
                                    echo '<a href="question.php?idQ='.$questions[$x]['id'].'">'.$questions[$x]["header"].'</a>';
                                echo '</div>';
                                echo '<div class="questionData">';
                                    echo $questions[$x]["raw_data"];
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        }
                    }
                ?>

            </div>
        </div>
    </div>
</body>
    <script src="js/main.js"></script>
</html>
