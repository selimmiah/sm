@extends('layouts.load')
@section('content')

						<div class="content-area">
							<div class="add-product-content1">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">
                        @include('includes.admin.form-error') 
											<form id="geniusformdata" action="{{ route('admin-staff-store') }}" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __('Staff Profile Image') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <div class="img-upload">
						                                <div id="image-preview" class="img-preview" style="background: url({{ asset('images/noimage.png') }});">
						                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
						                                    <input type="file" name="photo" class="img-upload" id="image-upload">
						                                  </div>
						                            </div>
						                          </div>
						                        </div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Name') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="name" placeholder="{{ __("User Name") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __('Region Name') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="region_name" placeholder="{{ __("Region Name") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __('Territory Name') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="territory_name" placeholder="{{ __("Territory Name") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __('BD ID') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="bd_id" placeholder="{{ __("BD ID") }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __('Distributor Name') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="distributor_name" placeholder="{{ __("Distributor Name") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __('Address') }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="address" placeholder="{{ __("Address") }}" required="" value="">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Email") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="email" class="input-field" name="email" placeholder="{{ __("Email Address") }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Phone") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" name="phone" placeholder="{{ __("Phone Number") }}" required="" value="">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __("Districts") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<select class="form-control" name="district" required="" id="district">
															@include('includes.districts')
														</select>
													</div>
												</div>



												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">{{ __("Thana") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<select class="form-control" name="thana" required="" id="thana">
															<option value="">Select thana</option>
														</select>

													</div>
												</div>

												<div class="row">
														<div class="col-lg-4">
															<div class="left-area">
																	<h4 class="heading">{{ __("Role") }} *</h4>
															</div>
														</div>
														<div class="col-lg-7">
																<select  name="role_id" required="">
																	<option value="">{{ __('Select Role') }}</option>
																	  @foreach(DB::table('roles')->get() as $data)
																		<option value="{{ $data->id }}">{{ $data->name }}</option>
																	  @endforeach
																  </select>
															</div>
													</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Password") }} *</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="password" class="input-field" name="password" placeholder="{{ __("Password") }}" required="" value="">
													</div>
												</div>

						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                              
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <button class="addProductSubmit-btn" type="submit">{{ __("Create Staff") }}</button>
						                          </div>
						                        </div>

											</form>


											</div>
										</div>
									</div>
								</div>
							</div>
						</div>




						<script>
							$('#district').change(function(){
								var district_id = $(this).val();

								$.ajaxSetup({
									headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});
								$.ajax({
									type: 'POST',
									url: '/get/thana/list',
									data: {
										district_id: district_id
									},
									success: function(data) {
										$("#thana").html(data);
									}
								});
							});
						</script>

@endsection