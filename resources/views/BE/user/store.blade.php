@include('BE.dashboard.component.breadcrumb',['title' => $config['seo'][$config['method']]['title']])

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $url = $config['method'] == 'create' ? route('user.store') : route('user.update',$user->id) ;
@endphp
<form action="{{$url}}" method="post" class="box">
    @csrf
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
                                        value="{{old('email',($user->email)??"")}}"
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
                                        name="fullname"
                                        value="{{old('fullname',($user->fullname)??"")}}"
                                        class="form-control"
                                        placeholder="Nhập họ tên của người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @php
                            $user_catalogue_id = [
                                'Chọn nhóm thành viên',
                                'Quản trị viên',
                                'Người dùng'
                            ];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control">
                                        @foreach($user_catalogue_id as $key => $item)
                                            <option value="{{$key}}" @if($key == old('user_catalogue_id',$user->user_catalogue_id??"")) selected @endif>{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh</label>
                                    <input
                                        type="date"
                                        name="birthday"
                                        value="{{old('birthday',$user->birthday??"")}}"
                                        class="form-control"
                                        placeholder="Nhập ngày sinh của người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @if($config['method'] == 'create')
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
                                        placeholder="Nhập lại mật khẩu của người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <input
                                        type="text"
                                        name="image"
                                        value="{{old('image',$user->image??"")}}"
                                        class="form-control input-image"
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
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin liên hệ</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Tỉnh/Thành phố</label>
                                    <select name="province_id" class="form-control province location" data-target="districts">
                                        <option value="0">Chọn thành phố</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                                <option @if(old('province_id') == $province->code) selected @endif value="{{$province->code}}">{{$province->full_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="district_id" class="control-label text-left">Quận/Huyện</label>
                                    <select name="district_id" class="form-control districts location" data-target="wards" >
                                        <option value="0">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Phường/Xã</label>
                                    <select name="ward_id" class="form-control wards">
                                        <option value="0">Chọn phường xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Địa chỉ</label>
                                    <input
                                        type="text"
                                        name="address"
                                        value="{{old('address', $user->address??"")}}"
                                        class="form-control"
                                        placeholder="Nhập địa chỉ của người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số điện thoại</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone', $user->phone??"")}}"
                                        class="form-control"
                                        placeholder="Nhập số điện thoại người dùng người dùng"
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ghi chú</label>
                                    <input
                                        type="text"
                                        name="description"
                                        value="{{old('description',$user->description??"")}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                        data-upload = "Images"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-primary" type="submit" name="send" value="send">{{$config['seo'][$config['method']]['button'] }}</button>
        </div>
    </div>
</form>
<script>
    var province_id = {{$user->province_id ?? old('province_id')}} ;
    var district_id = {{$user->district_id ?? old('district_id')}};
    var ward_id = {{$user->ward_id ?? old('district_id')}};
</script>
