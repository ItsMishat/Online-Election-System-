<input type="text" placeholder="Type something here" />

<div id="checkbox-container">
  <div>
    <label for="option1">Option 1</label>
    <input type="checkbox" id="option1">
  </div>
  <div>
    <label for="option2">Option 2</label>
    <input type="checkbox" id="option2">
  </div>
  <div>
    <label for="option3">Option 3</label>
    <input type="checkbox" id="option3">
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {};
    $checkboxes = $("#checkbox-container :checkbox");

$checkboxes.on("change", function(){
  $checkboxes.each(function(){
    checkboxValues[this.id] = this.checked;
  });
  
  localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
});

// On page load
$.each(checkboxValues, function(key, value) {
  $("#" + key).prop('checked', value);
});

</script>