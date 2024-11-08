
<!-- ========== footer start =========== -->
<footer class="footer-39201">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 mb-4 mb-md-0">
        <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid">
        <p class="mt-4">
          {{ $footerData->footer_detail }}
        </p>

      </div>

      <div class="col-md mb-4 mb-md-0">
        {{--  <h3>Store</h3>
        <ul class="list-unstyled nav-links">
          <li><a href="#">Men</a></li>
          <li><a href="#">Women</a></li>
          <li><a href="#">Children</a></li>
          <li><a href="#">New Arrivals</a></li>
          <li><a href="#">Top Brands</a></li>
          <li><a href="#">Special Offers</a></li>  --}}
        </ul>
      </div>


      <div class="col-md-4 mt-4 mb-md-0">
        <h3>{{ __('webstring.address') }}</h3>
        <ul class="list-unstyled nav-links">
          <li><i class="mdi mdi-phone mdi-18px"></i> <a href="tel:{{ $footerData->contact }}">{{ $footerData->contact }}</a> </li>
          <li><i class="mdi mdi-email mdi-18px"></i> <a href="mailto:{{ $footerData->email }}">{{ $footerData->email }}</a></li>
          <li><i class="mdi mdi-home mdi-18px"></i> {{ $footerData->house }}</li>
          <li><i class="mdi mdi-road-variant mdi-18px"></i> {{ $footerData->road }}</li>
          <li><i class="mdi mdi-map-marker mdi-18px"></i> {{ $footerData->location }}</li>
          <li><i class="mdi mdi-printer mdi-18px"></i> {{ $footerData->location_text }}</li>

        </ul>
      </div>


      <div class="col-md-3 mt-4 mb-md-0">
        <h3>সম্পাদক ও প্রকাশক</h3>
        <ul class="list-unstyled nav-links">
          <li><a href="#">মোঃ গোলাম রব্বানী </a></li>
          {{-- <li><a href="tel:01712183915">01712183915</a></li>
          <li><a href="mailto: mahabubt2003@yahoo.com">mahabubt2003@yahoo.com</a></li> --}}
          {{--  <li><a href="#">Author License</a></li>  --}}
        </ul>
      </div>

      {{--  <div class="col-md-4 mb-4 mb-md-0">
        <h3>Subscribe</h3>
        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque dolor ducimus doloremque earum ullam. Architecto voluptatum odio magni.</p>
        <form action="#" class="subscribe">
            <input type="text" class="form-control" placeholder="Enter your e-mail">
            <input type="submit" class="btn btn-submit" value="Send">
          </form>
      </div>  --}}


    </div>

    <div class="row align-items-center">
      <div class="col-12">
        <div class="border-top my-5"></div>
      </div>
      <div class="col-md-4">
        <p><small>&copy; {{ date('Y') }} {{$footerData->copyright}}</small></p>
      </div>
      <div class="col-md-4">
        <ul class="social list-unstyled">
          <li><a href="{{ route('home.aboutUs') }}" target="_blank">About Us</a></li>
          <li><a href="{{ route('home.terms') }}" target="_blank">Terms & Condition</a></li>
          <li><a href="{{ route('home.privacy') }}" target="_blank">Privacy Policy</a></li>

        </ul>
      </div>

      <div class="col-md-4 ">
        <ul class="social list-unstyled">
            <li><a href="https://www.facebook.com/profile.php?id=100063556671825"><span class="mdi mdi-facebook"></span></a></li>
            <li><a href="https://x.com/?lang=en"><span class="mdi mdi-twitter"></span></a></li>
            <li><a href="https://www.instagram.com/"><span class="mdi mdi-instagram"></span></a></li>

        </ul>
      </div>

    </div>
  </div>
</footer>

      <!-- ========== footer end =========== -->
