@extends($app_layout)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
        </div>
        @include($theme_name.'.layouts.partial.breadcrumb')

        <div class="col-md-12 form_page">
            <form action="{{ $form_action }}" class="" method="post">
                @csrf
                @if($edit)
                <input type="hidden" value="{{$data->id}}" name="id">
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="row form_sec">
                            <div class="col-12">
                                <h5>Basic Details</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role">Category Name</label>
                                    <select class="form-control k-input" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($category as $category)
                                        <?php
                                                $selected = "";
                                                if ($edit) {
                                                  if ($data->category_name == $category->category_name) {
                                                    $selected = "selected";
                                                  }
                                                }
                                                ?>
                                        <option value="{{$category->category_name}}" {{ $selected }}>{{
                                            ucfirst($category->category_name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small id="domainHelp" class="form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Sub Category Name</label>
                                    <input type="text" name="subcategory_name" class="form-control k-input" @if($edit)
                                        value="{{$data->subcategory_name}}" @else value="{{old('subcategory_name')}}"
                                        @endif id="subcategory_name" aria-describedby="nameHelp">
                                    <small id="nameHelp" class="form-text text-muted"></small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br />
                <!-- <div class="card">
          <div class="card-body">
            <div class="row form_sec">
              <div class="col-12">
                <h5>Two Factor Authentication (Email/SMS)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="switch">
                  <input type="checkbox" name="two_factor_enable" <?php if ($edit) {
                                                                    if ($data->two_factor_enable == 1) {
                                                                      echo 'checked';
                                                                    }
                                                                  } ?> class="two_factor_enable k-input" id="two_factor_enable">
                  <span class="slider"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <br /> -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn k-btn k-btn-primary add_site">
                            @if($edit)
                            Update Changes
                            @else
                            Add Sub-category
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
