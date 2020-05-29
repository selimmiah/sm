@extends('layouts.load')
@section('content')

						<div class="content-area no-padding">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

                                    <div class="table-responsive show-table">
                                        <table class="table">
                                            <tr>
                                                <th>{{ __("Staff ID#") }}</th>
                                                <td>{{$data->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Staff Photo") }}</th>
                                                <td>
                                              <img src="{{ $data->photo ? asset('images/admins/'.$data->photo):asset('images/noimage.png')}}" alt="{{ __("No Image") }}">

                                                </td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("Region Name ") }}</th>
                                                <td>{{$data->region_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Territory Name") }}</th>
                                                <td>{{$data->territory_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("BD ID") }}</th>
                                                <td>{{$data->bd_id}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Distributor Name") }}</th>
                                                <td>{{$data->distributor_name}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("District") }}</th>
                                                <td>{{ $data->role_id == 0 ? 'No Role' : $data->role->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("Thana") }}</th>
                                                <td>{{ $data->role_id == 0 ? 'No Role' : $data->role->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("Address") }}</th>
                                                <td>{{$data->address}}</td>
                                            </tr>

                                            <tr>
                                                <th>{{ __("Name") }}</th>
                                                <td>{{$data->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Staff Role") }}</th>
                                                <td>{{ $data->role_id == 0 ? 'No Role' : $data->role->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Staff Email") }}</th>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Staff Phone") }}</th>
                                                <td>{{$data->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __("Joined") }}</th>
                                                <td>{{$data->created_at->diffForHumans()}}</td>
                                            </tr>
                                        </table>
                                    </div>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

@endsection