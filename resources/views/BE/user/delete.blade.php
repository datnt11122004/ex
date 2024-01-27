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
<form action="{{route('user.destroy',$user->id)}}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xóa người dùng có email là: {{$user->email}}</p>
                        <p>Tên của người dùng là: {{$user->fullname}}</p>
                        <p class="text-danger">Lưu ý: Xóa không thể khôi phục được dữ liệu lại</p>
                    </div>
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
                                        readonly
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
                                        readonly
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-right">
            <button class="btn btn-danger" type="submit" name="send" value="send">{{$config['seo'][$config['method']]['button']}}</button>
        </div>
    </div>
</form>

