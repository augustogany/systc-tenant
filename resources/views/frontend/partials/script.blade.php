<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/mdb/jquery-3.4.1.min.js')}}"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/mdb/popper.min.js')}}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb/bootstrap.min.js')}}"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb/mdb.min.js')}}"></script>

<script>
  //Animation init
  new WOW().init();

  //Modal
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
  })

  // Material Select Initialization
  $(document).ready(function () {
    $('.mdb-select').material_select();
  });

</script>