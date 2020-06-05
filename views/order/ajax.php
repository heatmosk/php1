<div id="orders"></div>
<script type="text/javascript">
  function updateOrders() {
    console.log("updating");
    $.ajax({
      url: "/order/get",
      success: function(a, b) {
        $("#orders").html(a);
      }
    });
  }
  $(document).ready(function() {
    var loader = setInterval(updateOrders, 1000);
  })
</script>