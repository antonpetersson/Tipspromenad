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
        
        if(isset($_POST['options' . $this->id])) {
            $right = false;
            if ($_POST['options' . $this->id] == $this->correct){
                $right = true;
            }
        }

        echo '<tr><th id="thQuestion' . $this->id . '" rowspan="3">' . $this->text . '</th>';

        if(isset($right)) {
            if($this->correct == 'answer1') echo '<td style="background-color: #2ECC40;">';
            else echo '<td>';
        } else echo '<td>';
            echo '1 <input type="radio" name="options' . $this->id . '" value="answer1"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answer1'){echo ' checked="checked"';}
            echo '>' . $this->answer1;
        echo '</td></tr><tr>';

        if(isset($right)) {
            if($this->correct == 'answerX') echo '<td style="background-color: #2ECC40;">';
            else echo '<td>';
        } else echo '<td>';
            echo 'X<input type="radio" name="options' . $this->id . '" value="answerX"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answerX'){echo ' checked="checked"';}
            echo '>' . $this->answerX;
        echo '</td></tr><tr>';

        if(isset($right)) {
            if($this->correct == 'answer2') echo '<td style="background-color: #2ECC40;">';
            else echo '<td>';
        } else echo '<td>';
            echo '2 <input type="radio" name="options' . $this->id . '" value="answer2"';
            if (isset($_POST['options' . $this->id]) && $_POST['options' . $this->id] == 'answer2'){echo ' checked="checked"';}
            echo '>' . $this->answer2;
        echo '</td></tr>';

        if(isset($_POST['options' . $this->id])) {
            // $_SESSION = $_POST;
            if ($_POST['options' . $this->id] == $this->correct){
                echo '<style>#thQuestion' . $this->id . ' {background-color: #2ECC40;}</style>';
                $GLOBALS["numCorrectAnswers"] ++;
            }
            else{
                echo '<style>#thQuestion' . $this->id . ' {background-color: #FF4136 ;}</style>';
              
            }

            
            
        }
 
    }

    // function checkAnswer(){
    //     <!-- Kolla vilken som är rätt (booleans) -->
    // }
}



?>