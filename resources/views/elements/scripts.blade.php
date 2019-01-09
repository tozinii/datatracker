<!-- jQuery JS -->
      <script src="{{asset('assets/js/jquery-1.12.0.min.js')}}"></script>
      <script src="{{asset('assets/vendors/popup/lightbox.min.js')}}"></script>
      <script type="text/javascript">
         $(document).ready(function() {
         $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
           e.preventDefault();
           $(this).siblings('a.active').removeClass("active");
           $(this).addClass("active");
           var index = $(this).index();
           $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
           $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
         });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
           $(".currency_year").hide();
             $("#radio1").click(function(){
                 $(".currency_year").hide();
                 $(".currency_month").show();
             });
             $("#radio2").click(function(){
                 $(".currency_month").hide();
                 $(".currency_year").show();
             });
         });

          $('.tabs_label').click(function(){
                      $('.tabs_label').removeClass('active_t');
                      $(this).addClass('active_t');

                  })

      </script>
      @if(Session::has('loginError') && Session::get('loginError') != null)
        <script>
          $(document).ready(function(){
            $('#login').modal('show');
          });
        </script>
      @endif
      <!-- Bootstrap JS -->
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <!-- Animate JS -->
      <script src="{{asset('assets/vendors/animate/wow.min.js')}}"></script>
      <script src="{{asset('assets/vendors/sidebar/main.js')}}"></script>
      <!-- Owlcarousel JS -->
      <script src="{{asset('assets/vendors/owl_carousel/owl.carousel.min.js')}}"></script>
      <!-- Self JS -->
      <script src="{{asset('assets/js/scripts.js')}}"></script>
      <!-- Theme JS -->
      <script src="{{asset('assets/js/theme.js')}}"></script>
