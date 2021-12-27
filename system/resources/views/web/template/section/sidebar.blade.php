@php
  function chackRouteActive($route){
    if(Route::current()->uri == $route) return 'active' ; 
  }    
@endphp
