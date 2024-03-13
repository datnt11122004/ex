@include('BE.dashboard.component.breadcrumb',['title'=>$config['seo']['index']['title']])

<div class="row mt20">
    <div class="col-lg-12 ">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$config['seo']['index']['tableHeading']}}</h5>
                @include('BE.user.user.component.toolbox')
            </div>
            <div class="ibox-content">
                @include('BE.user.user.component.filter')
                <div class="m-b"></div>
                @include('BE.user.user.component.table')
            </div>
        </div>
    </div>
</div>

