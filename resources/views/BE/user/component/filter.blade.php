<div class="filter-wrapper">
    <div class="uk-flex uk-flex-middle uk-flex-space-beetween">
        <div class="perpage">
            <div class="uk-flex uk-flex-middle uk-flex-space-beetween">
                <select name="perpage" class="form-control input-sm perpage filter mr10">
                    @for($i = 20; $i <= 200; $i += 20)
                        <option value="{{$i}}">{{$i}} bản ghi</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="action uk-flex">
            <div class="uk-flex uk-flex-middle">
                <select name="user_categolue_id" class="form-control mr10">
                    <option value="0" selected>Chọn nhóm thành viên</option>
                </select>
            </div>
            <div class="uk-search uk-flex uk-flex-middle mr10 ">
                <div class="input-group">
                    <input
                        type="text"
                        name="keyword"
                        id=""
                        value=""
                        placeholder="Nhập tên user bạn muốn tìm kiếm..."
                        class="form-control"
                    >
                    <span class="input-group-btn ">
                                        <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm" >
                                            Tìm kiếm
                                        </button>
                                    </span>
                </div>
            </div>
            <a href="" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới thành viên</a>
        </div>

    </div>
</div>
