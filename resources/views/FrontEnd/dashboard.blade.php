@if(Session::has('loginId'))
    {{ Session::get('loginId')}}
@endif
