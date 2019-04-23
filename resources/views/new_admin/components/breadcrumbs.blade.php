<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-md-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{$slot}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="page-header float-right">
                    <div class="page-title">
                        <h1>{{(session('status') ?? '')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
