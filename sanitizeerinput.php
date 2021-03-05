

<?php     //   modifing inputs to standard form (removing html tag and back slash and strip tags)
function sanitizeString($a){

    $a1 = strip_tags($a);
    if($a1 != $a){
        echo "::<i> your Username changed from <u>".$a."</u > to <u>".$a1."</u> applying</i><b><u> strip_tags()</u></b>::<br/>";
    }
    $a2 = stripslashes($a1);
    if($a1 != $a2){
        echo ":: <i>your Username changed from <u>".$a1."</u> to <u >".$a2."</u> applying</i><b><u> stripslashes()</u></b> ::<br/>";
    }
    $a3 = htmlentities($a2);
    if($a3 != $a2){
        echo ":: <i>your Username changed from <u>".$a2."</u> to <u>" .$a3."</u> applying </i><b><u>htmlentities()</u></b>::<br/>";
    }
    $a4 = str_replace('/','',$a3);
    if($a4 != $a3){
        echo "::<i> your Username changed from <u>".$a3."</u> to <u>" .$a4."</u> applying </i><b><u>str_replace()</u></b>::";
    }
    return $a4;
}
?>