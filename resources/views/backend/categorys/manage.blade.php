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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control k-input" @if($edit)
                                        value="{{$data->category_name}}" @else value="{{old('category_name')}}" @endif
                                        id="category_name" aria-describedby="nameHelp">
                                    <small id="nameHelp" class="form-text text-muted"></small>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn k-btn k-btn-primary add_site">
                            @if($edit)
                            Update Changes
                            @else
                            Add Category
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
