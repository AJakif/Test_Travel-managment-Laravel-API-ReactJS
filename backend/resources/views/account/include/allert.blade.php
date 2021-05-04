    <div class="row">
        <div class="col-md-12">
        @if(Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>{{ Session::get('success') }}</h5>
            </div>
		@endif
		@if(Session::get('fail'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i>{{ Session::get('fail') }}</h5>
            </div>
		@endif
        </div>
    </div>