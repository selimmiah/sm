<option value="">Select Thana</option>
@if(Auth::check())
    @foreach (DB::table('thanas')->get() as $data)
        <option value="{{ $data->id }}" {{ Auth::user()->thana == $data->thana_name ? 'selected' : '' }}>{{ $data->thana_name }}</option>
    @endforeach
@else
    @foreach (DB::table('thanas')->get() as $data)
        <option value="{{ $data->id }}">{{ $data->thana_name }}</option>
    @endforeach
@endif