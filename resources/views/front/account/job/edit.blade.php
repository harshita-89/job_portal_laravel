@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
            @include('front.layouts.message')
            <form action="{{ route('account.saveJob') }}" method="POST" id="editJobForm" name="editJobForm">
             @csrf
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Edit Job Details</h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input value="{{ $job->title }}"type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>                                
                                @enderror
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $category)
                                            <option {{ ($job->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach                                        
                                    @endif
                                </select>
                                @error('category')
                                    <p class="invalid-feedback">{{ $message }}</p>                                
                                @enderror
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                <select class="form-select" name="jobType" id="jobType">
                                  <option>Select Job Nature</option>
                                    @if($jobTypes->isNotEmpty())
                                        @foreach($jobTypes as $jobType)
                                            <option {{ ($job->job_type_id == $jobType->id) ? 'selected' : '' }} value="{{ $jobType->id }}">{{ $jobType->name }}</option>                             
                                        @endforeach                                    
                                    @endif
                                </select>
                                @error('jobType')
                                    <p class="invalid-feedback">{{ $message }}</p>                                
                                @enderror
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input value="{{ $job->vacancy }}" type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                @error('vacancy')
                                    <p class="invalid-feedback">{{ $message }}</p>                                
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input value="{{ $job->salary }}" type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input value="{{ $job->location }}" type="text" placeholder="location" id="location" name="location" class="form-control">
                                @error('location')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ $job->description }}</textarea>
                            @error('description')
                                <p class="invalid-feedback">{{ $message }}</p>                                
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $job->benefits }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{ $job->responsibility }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{ $job->qualifications }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                            <select name="experience" id="experience" class="form-control" >
                                <option value="0" {{ ($job->experience == 0)? 'selected' : '' }}>Freshers(0 year) </option>
                                <option value="1" {{ ($job->experience == 1)? 'selected' : '' }}>1 year</option>
                                <option value="2" {{ ($job->experience == 2)? 'selected' : '' }}>2 years</option>
                                <option value="3" {{ ($job->experience == 3)? 'selected' : '' }}>3 years</option>
                                <option value="4" {{ ($job->experience == 4)? 'selected' : '' }}>4 years</option>
                                <option value="5" {{ ($job->experience == 5)? 'selected' : '' }}>5 years</option>
                                <option value="6" {{ ($job->experience == 6)? 'selected' : '' }}>6 years</option>
                                <option value="7" {{ ($job->experience == 7)? 'selected' : '' }}>7 years</option>
                                <option value="8" {{ ($job->experience == 8)? 'selected' : '' }}>8 years</option>
                                <option value="9" {{ ($job->experience == 9)? 'selected' : '' }}>9 years</option>
                                <option value="10" {{ ($job->experience == 10)? 'selected' : '' }}>10 years</option>
                                <option value="10_plus" {{ ($job->experience == '10_plus')? 'selected' : '' }}>10+ years</option>
                            </select>
                            @error('experience')
                                <p class="invalid-feedback">{{ $message }}</p>                                
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords</label>
                            <input value="{{ $job->keyword }}" type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                        </div>

                        
                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input value="{{ $job->company_name }}" type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                @error('company_name')
                                    <p class="invalid-feedback">{{ $message }}</p>                                
                                @enderror
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input value="{{ $job->company_location }}" type="text" placeholder="Location" id="company_location" name="company_location" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>                            
                            <input value="{{ $job->company_website}}" type="text" placeholder="Website" id="website" name="website" class="form-control">
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </div>               
                </div>
            </form>               
            </div>
        </div>
    </div>
</section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('customJS')
<script>
$(document).ready(function(){
       console.log("Document ready");
    $("#editJobForm").submit(function(e){
        e.preventDefault();
        //console.log("Form submission intercepted");
        $("button[type='submit']").prop('disabled', true);

        let $btn = $(this).find('button[type="submit"]');
        $btn.prop('disabled', true).text('Saving...');

        $.ajax({
            url: '{{ route("account.updateJob" , $job->id) }}',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response){
                $("button[type='submit']").prop('disabled', false);
                //console.log("Response received", response);
                if(response.status === true){
                    window.location.href = response.redirect_url;
                } else {
                    handleErrors(response.errors);
                }

                $btn.prop('disabled', false).text('Save Job');
            },
            error: function(xhr){
                if (xhr.status === 422) {
                    handleErrors(xhr.responseJSON.errors);
                } else {
                    console.log(xhr.responseText);
                    alert('Unexpected error occurred.');
                }

                $btn.prop('disabled', false).text('Save Job');
            }
        });

        function handleErrors(errors){
            $(".form-control").removeClass('is-invalid');
            $(".invalid-feedback").remove();

            $.each(errors, function(field, message){
                let input = $(`[name="${field}"]`);
                input.addClass('is-invalid');
                if (input.siblings('.invalid-feedback').length === 0) {
                    input.after(`<p class="invalid-feedback d-block">${message[0]}</p>`);
                }
            });
        }
    });
});
</script>
@endsection