@if(Session::has('info'))

<div class="btn btn-info" >
	 {{Session::get('info')}}
	
</div>

@endif