<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th class="text-center">
            <input type="checkbox" name="" id="checkAll" class="input-checkbox">
        </th>
        <th class="text-center">Họ tên</th>
        <th class="text-center">Email</th>
        <th class="text-center">Số điện thoại</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($user) & is_object($user))
        @foreach($user as $value)

        <tr>
            <td class="text-center">
                <input type="checkbox" name="" class="input-checkbox checkboxItem">
            </td>
            <td class="text-center">
                {{$value -> fullname}}
            </td>
            <td class="text-center">{{$value -> email}}</td>
            <td class="text-center">
                {{$value -> phone}}
            </td>
            <td class="text-center">
                {{$value -> address}}
            </td>
            <td class="text-center">
                <input type="checkbox" class="js-switch" checked />
            </td>
            <td class="text-center">
                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>

        @endforeach
    @endif
    </tbody>
</table>
{{$user->links('pagination::bootstrap-4') }}
