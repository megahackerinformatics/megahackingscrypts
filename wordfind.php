﻿﻿<html>
<head>
 <title>Word Find</title>
</head>
<body>
<?
$wordList = $_REQUEST["wordList"];
$word = $_REQUEST["word"];
$boardData = $_REQUEST["boardData"];
$width = $_REQUEST["width"];
$height = $_REQUEST["height"];
$name = $_REQUEST["name"];
$legalBoard = $_REQUEST["legalBoard"];
$key = $_REQUEST["key"];
$board = $_REQUEST["board"];
$keyPuzzle = $_REQUEST["keyPuzzle"];
$puzzle = $_REQUEST["puzzle"];
$itWorked = $_REQUEST["itWorked"];
$currentWord = $_REQUEST["currentWord"];
$row = $_REQUEST["row"];
$col = $_REQUEST["col"];
$direction = $_REQUEST["direction"];
$counter = $_REQUEST["counter"];
$keepGoing = $_REQUEST["keepGoing"];
$dir = $_REQUEST["dir"];
$result = $_REQUEST["result"];
$theWord = $_REQUEST["theWord"];
$newCol = $_REQUEST["newCol"];
$newRow = $_REQUEST["newRow"];
$boardLetter = $_REQUEST["boardLetter"];
$wordLetter = $_REQUEST["wordLetter"];
$i = $_REQUEST["i"];
$theBoard = $_REQUEST["theBoard"];
$newLetter = $_REQUEST["newLetter"];
$puzzleName = $_REQUEST["puzzleName"];
if ($wordList == NULL){
    $word = array(
    "ANDY",
    "HEATHER",
    "LIZ",
    "MATT",
    "JACOB"
    );
} else {
    $boardData = array(
    width => $width,
    height => $height,
    name => $name
    );
    if (parseList() == TRUE){
        $legalBoard = FALSE;

        while ($legalBoard == FALSE){
            clearBoard();
            $legalBoard = fillBoard();
        }
        $key = $board;
        $keyPuzzle = makeBoard($key);

        addFoils();
        $puzzle = makeBoard($board);

        printPuzzle();
    }
}
 
          
function parseList(){

    global $word, $wordList, $boardData;
    $itWorked = TRUE;

    $wordList = strtoupper($wordList);

    $word = explode("\n", $wordList);
    foreach ($word as $currentWord){

        $currentWord = rtrim($currentWord);

        if ((strlen($currentWord) > $board["width"]) &&
            (strLen($currentWord) > $boardData["height"])){
            print "$currentWord is too long for puzzle";
            $itWorked = FALSE;
           }
    }
    return $itWorked;
}
function clearBoard(){

    global $board, $boardData;
    for ($row = 0; $row < $boardData["height"]; $row++){
        for ($col = 0; $col < $boardData["width"]; $col++){
            $board[$row][$col] = ".";
           }
    }
}
function fillBoard(){

    global $word;
    $direction = array("N", "S", "E", "W");
    $itWorked = TRUE;
    $counter = 0;
    $keepGoing = TRUE;
    while($keepGoing){
        $dir = rand(0, 3);
        $result = addWord($word[$counter], $direction[$dir]);
        if ($result == FALSE){
            $keepGoing = FALSE;
            $itWorked = FALSE;
        }
        $counter++;
        if ($counter >= count($word)){
            $keepGoing = FALSE;
        }
    }
    return $itWorked;
}
function addWord($theWord, $dir){

    global $board, $boardData;

    $theWord = rtrim($theWord);
    $itWorked = TRUE;
    switch ($dir){
        case "E":
            $newCol = rand(0, $boardData["width"] - 1 - strlen($theWord));
            $newRow = rand(0, $boardData["height"]-1);
            for ($i = 0; $i < strlen($theWord); $i++){
                $boardLetter = $board[$newRow][$newCol + $i];
                $wordLetter = substr($theWord, $i, 1);

                if (($boardLetter == $wordLetter) ||
                    ($boardLetter == ".")){
                    $board[$newRow][$newCol + $i] = $wordLetter;
                } else {
                    $itWorked = FALSE;
                }
            }
            break;
        case "W":
            $newCol = rand(strlen($theWord), $boardData["width"] - 1);
            $newRow = rand(0, $boardData["height"]-1);
            for ($i = 0; $i < strlen($theWord); $i++){
                $boardLetter = $board[$newRow][$newCol - $i];
                $wordLetter = substr($theWord, $i, 1);
                if (($boardLetter == wordLetter) ||
                    ($boardLetter == ".")){
                    $board[$newRow][$newCol - $i] = $wordLetter;
                } else {
                    $itWorked = FALSE;
                }
            }
            break;
        case "S":
            $newCol = rand(0, $boardData["width"] -1);
            $newRow = rand(0, $boardData["height"]-1 - strlen($theWord));
//print "south:\tRow: $newRow\tCol: $newCol<br>\n";
            for ($i = 0; $i < strlen($theWord); $i++){
                $boardLetter = $board[$newRow + $i][$newCol];
                $wordLetter = substr($theWord, $i, 1);
                if (($boardLetter == $wordLetter) ||
                    ($boardLetter == ".")){
                    $board[$newRow + $i][$newCol] = $wordLetter;
                } else {
                    $itWorked = FALSE;
                }
            }
            break;
        case "N":
            $newCol = rand(0, $boardData["width"] -1);
            $newRow = rand(strlen($theWord), $boardData["height"]-1);
            for ($i = 0; $i < strlen($theWord); $i++){
                $boardLetter = $board[$newRow - $i][$newCol];
                $wordLetter = substr($theWord, $i, 1);
                if (($boardLetter == $wordLetter) ||
                ($boardLetter == ".")){
                $board[$newRow - $i][$newCol] = $wordLetter;
                } else {
                $itWorked = FALSE;
                }
            }
        break;
    }
    return $itWorked;
} 
function makeBoard($theBoard){
    global $boardData;
    $puzzle = " ";
    $puzzle .= "<table border = 0>\n";
    for ($row = 0; $row < $boardData["height"]; $row++){
        $puzzle .= "<tr>\n";
        for ($col = 0; $col < $boardData["width"]; $col++){
            $puzzle .= "<td width = 15>{$theBoard[$row][$col]}</td>\n";
        }
        $puzzle .= "</tr>\n";
    }
    $puzzle .= "</table>\n";
    return $puzzle;
}
function addFoils(){
    global $board, $boardData;
    for ($row = 0; $row < $boardData["height"]; $row++){
        for ($col = 0; $col < $boardData["width"]; $col++){
            if ($board[$row][$col] == "."){
                $newLetter = rand(65, 90);
                $board[$row][$col] = chr($newLetter);
            }
        }
    }
}
function printPuzzle(){

    global $puzzle, $word, $keyPuzzle, $boardData;

    print 
<<<HERE
<center>
<h1>{$boardData["name"]}</h1>
$puzzle
<h3>Word List</h3>
<table border = 0>
HERE;

    foreach ($word as $theWord){
        print "<tr><td>$theWord</td></tr>\n";
    }
    print "</table>\n";
    $puzzleName = $boardData["name"];

    print 
<<<HERE
<br><br><br><br><br><br><br><br>
<form action = "wordFindKey.php"
method = "post">
<input type = "hidden"
name = "key"
value = "$keyPuzzle">
<input type = "hidden"
name = "puzzleName"
value = "$puzzleName">
<input type = "submit"
value = "show answer key">
</form>
</center>
HERE;
}
?>
</body>
</html>