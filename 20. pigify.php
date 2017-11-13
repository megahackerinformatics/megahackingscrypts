<html>
<head>
       <title>Латинайзер</title>
</head>
<body>
<h1>Латинайзер</h1>
<?php 

if (!filter_has_var(INPUT_POST, "inputString")){
  print <<<HERE
  <form action = ""
	      method = "post">
	<fieldset>
    <textarea name = "inputString"
              rows = "20"
              cols = "40"></textarea>
     <input type = "submit"
            value = "pigify" />
   </fieldset>
	 </form>
HERE;
} else {  
  $inputString = filter_input(INPUT_POST, "inputString");
  $newPhrase = "";
  $words = explode(" ", $inputString);
  foreach ($words as $theWord) {
    $theWord = rtrim($theWord);
    $firstLetter = substr($theWord, 0, 1);
    $restOfWord = substr($theWord, 1, strlen($theWord)-1);
    if (strstr("euoaiEUOAI", $firstLetter)){
      $newWord = $theWord . "way";
    } else {
      $newWord = $restOfWord . $firstLetter . "ay";
    }
    $newPhrase = $newPhrase . $newWord . " ";
  }
  print "<p> $newPhrase</p> \n";
}
?>
</body>
</html>


    