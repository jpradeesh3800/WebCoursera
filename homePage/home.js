function myFunction() {
  // Declare variables
  var courseList, courseTileList, filter, i, txtValue;
  filter = document.getElementsByTagName("input")[0].value.toLowerCase();
  console.log(filter);

  courseList = document.getElementsByClassName('courseList')[0];
  courseTileList = courseList.getElementsByClassName("courseTile");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < courseTileList.length; i++) {
    txtValue = courseTileList[i].getAttribute("value");
    if (txtValue.toLowerCase().indexOf(filter) > -1) {
        courseTileList[i].style.display = "";
    } else {
        courseTileList[i].style.display = "none";
    }
  }
}