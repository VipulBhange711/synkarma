<x-head/>

<a href="{{route('logout.get')}}" class="btn btn-danger">
    logout
</a>

<h1>wecome {{Auth::user()->type}}</h1>

@if(Auth::user()->type === 'dealer' && (empty(Auth::user()->city)) )

<h3 class="display-4">
    You login First Time as a dealer You need to fill the required Information first
</h3>

@endif

@if(Auth::user()->type === 'dealer' && (empty(Auth::user()->city)) )


@endif


             
            

<x-foot/>