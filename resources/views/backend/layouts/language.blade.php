<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @php $locale = app()->getLocale();
        $image_flag = $locale==='ar' ? 'egypt.png': 'united-states.png';
    @endphp
   <img class="img-profile rounded-circle" src="{{asset('images/'.$image_flag)}}">
  </a>
  <!-- Dropdown - Language -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="languageDropdown">
    <a class="dropdown-item" href="{{route('setlang','ar')}}">
        <img class="img-profile rounded-circle mx-2" width="30"  src="{{asset('images/egypt.png')}}">
      {{trans('frontend.arabic')}}
    </a>
    <a class="dropdown-item" href="{{route('setlang','en')}}">
        <img class="img-profile rounded-circle mx-2"  width="30" src="{{asset('images/united-states.png')}}">
      {{trans('frontend.english')}}
    </a>
  </div>
