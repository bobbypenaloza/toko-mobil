 <!-- Footer section -->
 <section class="footer-section">
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <div class="footer-widget about-widget">
                     <h2>About</h2>
                     <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus
                         urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                     <img src="{{ asset('user/img/cards.png') }}" alt="">
                 </div>
             </div>
             <div class="col-md-8">
                 <div class="footer-widget about-widget">
                     <h2>Brand</h2>
                     <ul>
                         @php
                             $i = 1;
                         @endphp
                         @foreach ($merek as $data)
                             <li><a href="{{ route('category', $data->id) }}">{{ $data->name }}</a></li>
                             @if ($i % 6 == 0)
                     </ul>
                     <ul>
                         @endif
                         @php
                             $i++;
                         @endphp
                         @endforeach
                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <div class="social-links-warp">
         <div class="container">
             <p class="text-white text-center mt-5">Copyright &copy; @if (date('Y') == '2019')
                     {{ date('Y') }}
                 @else
                     2019 - {{ date('Y') }}
                 @endif All rights reserved </p>
         </div>
     </div>
 </section>
 <!-- Footer section end -->



 <!--====== Javascripts & Jquery ======-->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
 </script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
 </script>
 <script src="{{ asset('user/js/jquery-3.2.1.min.js') }}"></script>
 <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('user/js/jquery.slicknav.min.js') }}"></script>
 <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('user/js/jquery.nicescroll.min.js') }}"></script>
 <script src="{{ asset('user/js/jquery.zoom.min.js') }}"></script>
 <script src="{{ asset('user/js/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('user/js/main.js') }}"></script>

 <script type="text/javascript">
     $(".update_cart-cart").click(function(e) {
         e.preventDefault();
         var ele = $(this);
         $.ajax({
             url: '{{ url('update_cart') }}',
             method: "patch",
             data: {
                 _token: '{{ csrf_token() }}',
                 id: ele.attr("data-id"),
                 quantity: ele.parents("tr").find(".new-quantity").val()
             },
             success: function(response) {
                 window.location.reload();
             }
         });
     });

     $(".remove-from-cart").click(function(e) {
         e.preventDefault();
         var ele = $(this);
         if (confirm("Are you sure")) {
             $.ajax({
                 url: '{{ url('remove') }}',
                 method: "DELETE",
                 data: {
                     _token: '{{ csrf_token() }}',
                     id: ele.attr("data-id")
                 },
                 success: function(response) {
                     window.location.reload();
                 }
             });
         }
     });
 </script>

 </body>

 </html>
