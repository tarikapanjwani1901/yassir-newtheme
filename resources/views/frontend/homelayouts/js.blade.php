<!-- jQuery -->
<!-- {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js')!!} -->

<!-- Bootstrap -->
{!!Html::script('/assests/front-end/js/plugins.js')!!}
{!!Html::script('/assests/front-end/js/main.js')!!}


<script type="text/javascript">
    $(window).scroll(function(e) {
        var $el = $('.sticky-search');
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 200 && !isPositionFixed) {
            $el.css({
                'position': 'fixed',
                'top': '70px'
            });
        }
        if ($(this).scrollTop() < 200 && isPositionFixed) {
            $el.css({
                'position': 'static',
                'top': '70px'
            });
        }
    });
    $(document).ready(function(e) {
        
    @if (Session::has('alert-error'))
        toastError('{{ Session::get('alert-error') }}');
    @endif

    @if (Session::has('alert-success'))
        toastSuccess('{{ Session::get('alert-success') }}');
    @endif
    });
</script>

@stack('script')
