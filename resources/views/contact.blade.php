@extends('layouts.master')
@section('content')
<body>
    <div class="container body" id="mevivu_changepass">
      <div class="row">
        <div class="col-xs-7 col-xs-offset-2">
          <div class="well well-sm">
            <h2 class="text-center">Thông tin liên hệ</h2>
            <p>Tên công ty: Mevivu</p>
            <p>Địa chỉ: Mevivu</p>
            <p>hotline: 03333444</p>
            <p>Mail: admin@gmail.com</p>
            <p>Các chính sách</p>
            <p>
                <form action="#" class="form-inline">
                    <input class="form-control" type="text" placeholder="Gop Y" /> <input class="btn btn-default" type="submit" value="Góp ý" name="gopy" />
                </form>
            </p>
          </div>
        </div>
      </div>
    </div>
    
        <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>This is a small modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <div>
        <a href="{{URL::to('/')}}">Comback home</a>
    </div>
</body>
@endsection