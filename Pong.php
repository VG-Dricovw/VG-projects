<?php
use LDAP\Result;

class Pong
{
    public $maxScore;
    public $player_1_current_score = 0;
    public $player_2_current_score = 0;
    public $player_decider = 1;
    public $result;

    public function __construct($maxScore)
    {
        $this->maxScore = $maxScore;
    }

    public function play($ballPos, $playerPos)
    {

        if ($this->player_1_current_score === $this->maxScore || $this->player_2_current_score === $this->maxScore) {
            $this->result = "game over aleady";
            return $this->result;
        }
        $this->player_decider += 1;

        switch ($this->player_decider) {

            case ($this->player_decider % 2 == 0):
                if (($ballPos - $playerPos) <= 3 && ($ballPos - $playerPos) >= -3) {
                    $this->result = "Player 1 has hit the ball!";
                    break;
                } else {
                    $this->result = "Player 1 has missed the ball!";
                    $this->player_2_current_score +=1;
                    break;
                }

                
            case ($this->player_decider % 2 == 1):
                if (($ballPos - $playerPos) <= 3 && ($ballPos - $playerPos) >= -3) {
                    $this->result = "Player 2 has hit the ball!";
                    break;
                } else {
                    $this->result = "Player 2 has missed the ball!";
                    $this->player_1_current_score += 1;
                    break;
                }


        }
        if ($this->player_2_current_score === $this->maxScore && $this->result == "Player 1 has missed the ball!") {
                $this->result = "Player 2 has won the game!";
            
        } elseif ($this->player_1_current_score === $this->maxScore &&  $this->result == "Player 2 has missed the ball!") {
            $this->result = "Player 1 has won the game!";
        }

        return $this->result;
    }
}

$game = new Pong(2);
echo $game->play(50, 53);
echo $game->play(100, 97);
echo $game->play(0, 4);
echo $game->play(25, 25);
echo "this one:  " .  $game->play(75, 25);
echo $game->play(50, 50);