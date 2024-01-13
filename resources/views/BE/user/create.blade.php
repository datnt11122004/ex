@include('BE.dashboard.component.breadcrumb',['title' => $config['seo']['create']['title']])

<form action="" method="post" class="box">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email <span class="text-danger">(*)</span></label>
                                    <input
                                        type="text"
                                        name="email"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ tên <span class="text-danger">(*)</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control">
                                        <option value="0">Chọn nhóm thành viên</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Người dùng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh</label>
                                    <input
                                        type="date"
                                        name="birthday"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Password <span class="text-danger">(*)</span></label>
                                    <input
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập mật khẩu người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                    <input
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <input
                                        type="file"
                                        name="image"
                                        value=""
                                        class="form-control"
                                        placeholder="Ảnh đại diện"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">Nhập thông tin chung của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email <span class="text-danger">(*)</span></label>
                                    <input
                                        type="text"
                                        name="email"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ tên <span class="text-danger">(*)</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control">
                                        <option value="0">Chọn nhóm thành viên</option>
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Người dùng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh</label>
                                    <input
                                        type="date"
                                        name="birthday"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Password <span class="text-danger">(*)</span></label>
                                    <input
                                        type="password"
                                        name="password"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập mật khẩu người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                    <input
                                        type="password"
                                        name="re_password"
                                        value=""
                                        class="form-control"
                                        placeholder="Nhập email của bạn"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <input
                                        type="file"
                                        name="image"
                                        value=""
                                        class="form-control"
                                        placeholder="Ảnh đại diện"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
