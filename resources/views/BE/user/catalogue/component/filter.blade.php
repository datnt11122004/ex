<form action="{{route('auth.user.catalogue')}}" method="get" role="form">
    @csrf
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-beetween">
            @php
                $perpage = request('perpage') ?: old('perpage');
            @endphp
            <div class="perpage">
                <div class="uk-flex uk-flex-middle uk-flex-space-beetween">
                    <select name="perpage" class="form-control input-sm perpage filter mr10">
                        @for($i = 20; $i <= 200; $i += 20)
                            <option value="{{$i}}" @if($i==$perpage) selected @endif>{{$i}} bản ghi</option>
                        @endfor
                    </select>
                </div>
            </div>
            @php
                $user_catalogue_id = [
                    'Chọn nhóm thành viên',
                    'Quản trị viên',
                    'Người dùng'
                ];
                $old_user_catalogue_id = request('user_catalogue_id') ?: old('user_catalogue_id');
            @endphp
            <div class="action uk-flex">
                <div class="uk-flex uk-flex-middle">
                    @php
                        $publishArray = ['Publish', 'Unpublish'];
                        $old_publish = request('publish')?: old('publish');
                    @endphp
                    <select name="publish" class="form-control mr10">
                        <option value="-1">Trạng thái nhóm thành viên</option>
                        @foreach($publishArray as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="uk-search uk-flex uk-flex-middle mr10 ">
                    <div class="input-group">
                        <input
                            type="text"
                            name="keyword"
                            id=""
                            value="{{request('keyword') ?: old('keyword')}}"
                            placeholder="Nhập keyword bạn muốn tìm kiếm..."
                            class="form-control"
                        >
                        <span class="input-group-btn ">
                            <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm" >
                                Tìm kiếm
                            </button>
                        </span>
                    </div>
                </div>
                <a href="{{route('user.catalogue.create')}}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới nhóm thành viên</a>
            </div>
        </div>
    </div>
</form>
