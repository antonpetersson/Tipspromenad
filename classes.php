<?php
$nextQuestionId = 0;
$numCorrectAnswers = 0;

class Question{
    private $questions;

    function __construct($text, $answer1, $answerX, $answer2, $correct){
        $this -> id = $GLOBALS["nextQuestionId"];
        $GLOBALS["nextQuestionId"]++;
        $this -> text = $text;
        $this -> answer1 = $answer1;
        $this -> answerX = $answerX;
        $this -> answer2 = $answer2;
        $this -> correct = $correct;
    }
    function printQuestion(){
        echo '<tr><th id="thQuestion' . $this->id . '" rowspan="3">' . $this->text . '</th>';
        echo '<td>';
            echo '1 <input type="radio" name="options' . $this->id . '" value="answer1"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answer1'){echo ' checked="checked"';}
            echo '>' . $this->answer1;
        echo '</td></tr><tr><td>';
            echo 'X<input type="radio" name="options' . $this->id . '" value="answerX"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answerX'){echo ' checked="checked"';}
            echo '>' . $this->answerX;
        echo '</td></tr><tr><td>';
            echo '2 <input type="radio" name="options' . $this->id . '" value="answer2"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answer2'){echo ' checked="checked"';}
            echo '>' . $this->answer2;
        echo '</td></tr>';

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // $_SESSION = $_POST;
            if ($_POST['options' . $this->id] == $this->correct){
                echo '<style>#thQuestion' . $this->id . ' {background-color: green;}</style>';
                $GLOBALS["numCorrectAnswers"] ++;
            }
            else{
                echo '<style>#thQuestion' . $this->id . ' {background-color: red;}</style>';
            }
            
        }
 
    }

    // function checkAnswer(){
    //     <!-- Kolla vilken som är rätt (booleans) -->
    // }
}



?>