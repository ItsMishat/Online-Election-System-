<script>
  var counter = 1;
    var limit = 8;
    function addInput(p_language){
 if (counter == limit)  {
      alert("You have reached the limit of adding " + counter + " inputs");
 }
 else {
      var languagediv = document.createElement('div');
      languagediv.innerHTML = "</br>" + "<input type ='text' name='p_language'>";
      document.getElementById(p_language).appendChild(languagediv);
      counter++;
 }
}
</script>

    <script>
     var counter = 1;
   var limit = 6;
    function addInput(c_project){
    if (counter == limit)  {
           alert("You have reached the limit of adding " + counter + " inputs");
            }
            else {
          var projectdiv = document.createElement('div');
      //newdiv.innerHTML = "Entry " + (counter + 1) + "<br><input type ='text' class='form-control' name='c_project[]'>";
          projectdiv.innerHTML = "<br><input type='text' name='c_project[]'>";
        document.getElementById(c_project).appendChild(projectdiv);
           counter++;
           }
    }
    </script>

