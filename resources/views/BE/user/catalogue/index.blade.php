
@include('BE.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])
<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $config['seo']['index']['tableHeading'] }} </h5>
                @include('BE.user.catalogue.component.toolbox', ['model' => 'UserCatalogue'])
            </div>
            <div class="ibox-content">
                @include('BE.user.catalogue.component.filter')
                @include('BE.user.catalogue.component.table')
            </div>
        </div>
    </div>
</div>

