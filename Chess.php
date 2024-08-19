<?php


for($row=1; $row<=8; $row++)
{
    echo "<tr>"; // Start a new table row
    
    // Inner loop for columns
    for($col=1; $col<=8; $col++)
    {
        // Calculate total sum of row and column indices
        $total = $row + $col;
        
        // Check if total is even or odd to determine cell color
        if($total % 2 == 0)
        {
            // If total is even, set cell background color to white
            echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
        }
        else
        {
            // If total is odd, set cell background color to black
            echo "<td height=30px width=30px bgcolor=#000000></td>";
        }
    }
    
    echo "</tr>"; // End the table row

}




abstract class Piece
{
    public $positionLetter;
    public $positionNumber;
    public abstract function moveRule($endLetter, $endNumber);
    public abstract function getPosition();

    public abstract function move($endLetter, $endNumber);

}


class WhitePawn extends Piece
{

    public $startLetter;
    public $startNumber;
    public $firstMove = false;


    public function moveRule($endLetter, $endNumber)
    {
        if ($this->firstMove == false && ($endLetter - $this->startLetter) == -2) {
            $this->firstMove = true;
            return true;
        } else if (($endLetter - $this->startLetter) == -1) {
            return true;
        } else if (($endLetter - $this->startLetter) == -1 && ($endNumber - $this->startNumber) == -1 && capture($endLetter, $endNumber)) {
            return true;
        }
    }


    public function getPosition()
    {
        return $this->startLetter . $this->startNumber;
    }

    public function move($endLetter, $endNumber)
    {
        if ($this->moveRule($endLetter, $endNumber)) {
            $this->startLetter = $endLetter;
            $this->startLetter = $endNumber;
        } else {
            var_dump("cant move like that");
        }
    }
}
