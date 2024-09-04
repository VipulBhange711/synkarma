<x-head />

<a href="{{route('logout.get')}}" class="btn btn-danger">
    logout
</a>

<h1>wecome {{Auth::user()->type}}</h1>

@if(Auth::user()->type === 'dealer' && (empty(Auth::user()->city)) )

<h3 class="display-4">
    You login First Time as a dealer You need to fill the required Information first
</h3>

<div class="col-4 offset-4">
    <form action="{{route('addinfo.post')}}" method="post">
        @csrf
      
        <input type="hidden" value="{{Auth::user()->id}}" name="id">
        <div class="form-group">
        
            <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt"  class="form-control">
               
            </select>
        </div>
        <div class="form-group">
 
            <select id="state" placeholder="city" name="city" class="form-control">
               
            </select>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Zip Code" name="zip">
            <div class="input-group-append">
            </div>
        </div>


        <script language="javascript">
            print_state("sts");
        </script>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn  text-white btn-block" style="background-color: blueviolet;">Add Info</button>
            </div>
        </div>
    </form>
</div>

@endif




@if(Auth::user()->type === 'employee')


@endif





<x-foot />