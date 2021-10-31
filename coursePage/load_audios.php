<?php
    for($i=6;$i<12;$i++){

        $content_url = $GLOBALS["content"][$i]["url"];
        $content_class = $GLOBALS["content"][$i]["class"];
        $content_name = $GLOBALS["content"][$i]["name"];
        $j = $i + 1;
        if($GLOBALS["isEnrolled"]){
            echo "<input type = 'checkbox' id = 'checkbox' class='$content_class' name = '$content_name' value = '$j' onclick='toggleMe(this)'";
            if($GLOBALS["course_completion_status"][$i]) echo "checked";
            echo " >";
        }

        echo "<label for = '$content_name'><audio controls class='$content_class'>";
        echo "<source src='$content_url' type='audio/mpeg'></audio></iframe></label>";
    }
?>