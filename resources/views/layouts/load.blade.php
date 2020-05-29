@yield('styles')

@yield('content')

<script src="{{asset('admin//js/vendors/jquery-1.12.4.min.js')}}"></script>
		<script src="{{asset('admin//js/jqueryui.min.js')}}"></script>
<script src="{{asset('admin//js/vendors/vue.js')}}"></script>
<script src="{{asset('admin//js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{asset('admin//js/plugin.js')}}"></script>
<script src="{{asset('admin//js/tag-it.js')}}"></script>
<script src="{{asset('admin//js/load.js')}}"></script>

@yield('scripts')
