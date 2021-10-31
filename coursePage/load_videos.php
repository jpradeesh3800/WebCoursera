<?php 

    for($i=0;$i<6;$i++){

        $content_url = $GLOBALS["content"][$i]["url"];
        $content_class = $GLOBALS["content"][$i]["class"];
        $content_name = $GLOBALS["content"][$i]["name"];
        $j = $i + 1;
        if($GLOBALS["isEnrolled"]){
            echo "<input type = 'checkbox' id = 'checkbox' class='$content_class' name = '$content_name' value = '$j' onclick='toggleMe(this)'";
            if($GLOBALS["course_completion_status"][$i]) echo "checked";
            echo " >";
        }
        echo "<label for = '$content_name'>";
        echo "<iframe width='420' height='315' src='$content_url' class='$content_class'></iframe></label>";
    }
?>