<?php
    for($i=12;$i<15;$i++){

        $content_url = $GLOBALS["content"][$i]["url"];
        $content_class = $GLOBALS["content"][$i]["class"];
        $content_name = $GLOBALS["content"][$i]["name"];
        $content_value = $GLOBALS["content"][$i]["value"];
        $j = $i + 1;
        if($GLOBALS["isEnrolled"]){
            echo "<input type = 'checkbox' id = 'checkbox' name = '$content_name' value = '$j' onclick='toggleMe(this)'";
            if($GLOBALS["course_completion_status"][$i]) echo "checked";
            echo " >";
        }
        echo "<label for = '$content_name' ><i class='$content_class'></i>";
        echo "<form action='$content_url'><input type='submit' value='$content_value'/></form></label><br>";
    }
?>