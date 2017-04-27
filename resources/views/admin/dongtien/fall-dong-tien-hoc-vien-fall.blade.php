@extends('admin.layouts.layouts')
@section('title-main')
Đóng Tiền Học Viên Lớp <b>{{ $lop->TenLop }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')
<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
<input id="Thang" class="hidden" value="{{ $Thang }}">
<input id="Nam" class="hidden" value="{{ $Nam }}">
<label><a href="{{ URL::previous() }}"><< Trở Lại</a></label>
<label> - Ngày : <?php echo date('d-m-Y'); ?> - Đóng tiền tháng {{ $Thang }} năm {{ $Nam }}</label>
<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Cấp Đai</th>
                        <th>
                            Ghi Chú
                        </th>
                        <th>Đóng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($hocviens as $hocvien)
                    <tr>
                        <td>
                            @php
                                echo (10 * ($hocviens->currentPage()-1) + $count++); // them count nữa, nhìn cho nó ngầu dạ
                            @endphp
                        </td>
                        <td>{{ $hocvien->HoTen  }}</td>
                        <td>{{ $hocvien->NgaySinh }}</td>
                        <td>{{ $hocvien->Phai }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        <td>
                            <input id="note-{{ $hocvien->MaHocVien }}" type="text" class="form-control" id="GhiChu">
                        </td> 
                        <td class="toggle-button"
                                data-id="{{ $hocvien->MaHocVien }}"
                                data-class="{{ $lop->MaLop }}"
                                data-fee="{{ $MaHocPhi }}">
                            <input type="checkbox" data-toggle="toggle">  
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $hocviens->links() }}
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
</div>
@stop
@section('script')
<script>
    // $(document).ready(function(){
    //      // $('tr').click(function(){
            
    //      //    var MaHocVien = $(this).find('td:nth-child(2)').html();
    //      //    var MaLop = $(this).find('td:nth-child(3)').html();
    //      //    var MaHocPhi = $(this).find('td:nth-child(4)').html();
    //      //    // var GhiChu = $(this).find('#input' + MaHocVien).val(); // em làm tieefp phần còn lại .
    //      //    //var GhiChu = $("\'\#"+"input"+MaHocVien+"\'").val(); // em viết sai thì có, viết đúng là thế này nè
    //      //    var GhiChu = $('#input' + MaHocVien).val(); // em bắt selector sai, em bắt sự kiện click hình như chưa phù hợp
    //      //    // nếu nguwofi dùng ấn vô input nó cũng tình là click.
    //      //    console.log(GhiChu);
    //         //console.log(GhiChu);
    //     //     var CSRF_TOKEN = $('#_token').val();
    //     //     //console.log(CSRF_TOKEN );
    //     //     $.ajax({ 
    //     //         url: "diem-danh",
    //     //         method : "POST",
    //     //         cache : false,
    //     //         data : {
    //     //             _token: CSRF_TOKEN,
    //     //             MaHocVien: MaHocVien,
    //     //             MaBangDiemDanh: MaBangDiemDanh
    //     //         },
    //     //         success : function(data){
    //     //             //console.log(data);
    //     //         }
    //     //     });
    //     });
    // });
</script>
<script type="text/javascript">
    // biểu diễn tí :D
    jQuery(document).ready(function($) {
             $('.toggle-button').on('click', (e) => {
            let self = $(e.target);
            let parent = $(self.parents()[2]);
            let student = {
                "MaHocVien": parent.attr('data-id'),
                "MaLop": parent.attr('data-class'),
                "MaHocPhi": parent.attr('data-fee'),
                "GhiChu": $('#note-' + parent.attr('data-id')).val()
            };
            // Viết ngắn hơn hông :D// cam ơn anh em hiểu r 
            // biết data-* là gì hem mà hiểu? em nghĩ anh đăt tên biến lưu giá trị trong thẻ.
            // :D cái này thuộc phần nâng cao của JS.. ko dành cho beginner
            // cái này là thuọc tính (attributes) của một Node trong DOM (đọc cuốn DOM Enlightenment)
            // Anh hy vọng em đọc xong ko hiểu gì hết :D :v
            // em làm tiếp nha anh cám ơn anh nhiều lắm
            // anh bắt rồi cho vào object rồi đó, chỉ cần gởi thẳng object đó lên server là dc
            // anh code tiếp đây :D sáng mai gặp nha. dạ bye anh.
            var CSRF_TOKEN = $('#_token').val();
            var Thang = $('#Thang').val();
            var Nam = $('#Nam').val();
            var MaHocVien = parent.attr('data-id');
            var MaLop= parent.attr('data-class');
            var MaHocPhi= parent.attr('data-fee');
            var GhiChu= $('#note-' + parent.attr('data-id')).val();
            //console.log(MaHocPhi+" "+MaLop+" "+MaHocVien+" "+GhiChu+" "+CSRF_TOKEN+" "+Thang+" "+Nam);
            //console.log(CSRF_TOKEN);
            $.ajax({ 
                    url: "dong-tien",
                    method : "POST",
                    cache : false,
                    data : {
                        _token: CSRF_TOKEN,
                        Thang: Thang,
                        Nam: Nam,
                        MaLop: MaLop,
                        MaHocVien: MaHocVien,
                        MaHocPhi: MaHocPhi,
                        GhiChu: GhiChu
                    },
                    success : function(data){
                        console.log(data);
                    }
                });
        });
    });
   
</script>
@stop