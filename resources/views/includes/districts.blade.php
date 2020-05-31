
<option value="">Select District</option>
@if(Auth::check())
    @foreach (DB::table('districts')->get() as $data)
        <option value="{{ $data->id }}" {{ Auth::user()->district == $data->district_name ? 'selected' : '' }}>{{ $data->district_name }}</option>



    @endforeach
@else
    @foreach (DB::table('districts')->get() as $data)
        <option value="{{ $data->id }}">{{ $data->district_name }}</option>
    @endforeach
@endif


{{--<input type="hidden" value="" name="district_name" id="a">--}}

{{--$('#b').change(function(){--}}
{{--var i = this.val();--}}
{{--$('#a').val($i);--}}
{{--}--}}
