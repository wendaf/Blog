<footer>
    <script src="/assets/js/jquery-2.1.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/mobile-menu.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</footer>

<script type="text/javascript">
  var el = document.createElement('script');
      el.setAttribute('src', 'https://static.axept.io/sdk.js');
      el.setAttribute('type', 'text/javascript');
      el.setAttribute('async', true);
      el.setAttribute('data-id', '5f11c44d21e2490428619521');
      el.setAttribute('data-cookies-version', 'blog-base');
  if (document.body !== null) {
    document.body.appendChild(el);
  }
</script>
<script type="text/javascript">


    $(document).ready(function()
    {

        var objToday = new Date(),
            weekday = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            dayOfWeek = weekday[objToday.getDay()],
            domEnder = function() { var a = objToday; if (/1/.test(parseInt((a + "").charAt(0)))) return "th"; a = parseInt((a + "").charAt(1)); return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th" }(),
            dayOfMonth = ( objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,
            months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            curMonth = months[objToday.getMonth()],
            curYear = objToday.getFullYear();
        var today = dayOfWeek + " " + dayOfMonth + " of " + curMonth + ", " + curYear;

        $('#dateToday').text(today);

        $('.fa-heart').click(function(e) {
            console.log("###", e.target.getAttribute('data-id'));
            var id = e.target.getAttribute('data-id');
            $.ajax({
                type: 'get',
                url: '/article/like/' + id,
                success: function(res) {
                    console.log('1', res, 'success');
                    console.log('2', e, 'success');
                    var nb_like = parseInt(e.target.textContent);
                    e.target.textContent = (nb_like + 1);
                },
                error: function(res) {
                    console.log('Info', res, 'error');
                }
            })
        })


    });
</script>