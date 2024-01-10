<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{config('user.user.title')}}</h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
            <li>
                <a href="{{route('dashboard.index')}}">Dashboard</a>
            </li>
            <li class="active"><strong>{{config('user.user.title')}}</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12 ">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{config('user.user.table-title')}}</h5>
                @include('BE.user.component.toolbox')
            </div>
            <div class="ibox-content">
                @include('BE.user.component.filter')
                <div class="m-b"></div>
                @include('BE.user.component.table')
            </div>
        </div>
    </div>
</div>

