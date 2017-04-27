@extends('admin.layouts.layouts')
@section('title-main')
Điểm Danh Học Viên Lớp <b>{{ $lop->TenLop }}</b>
@stop
@section('header-main')
{{-- <label><a href="{{ URL::previous() }}">Go Back</a></label> --}}
@stop
@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="{{ route('chuc-nang-diem-danh') }}">Quản lý điểm danh</a></li>
  <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Chọn lớp điểm danh</a></li>
  <li class="breadcrumb-item active">Điểm danh học viên</li>
</ol>
<label>Hôm nay : <?php echo date('d-m-Y'); ?></label>
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
                        <th>Điểm Danh</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cou = 1;
                    @endphp
                    @foreach ($hocviens as $hocvien)
                    <tr>
                        <td>
                            @php
                            echo 10*($hocviens->currentPage()-1) + $cou;
                            $cou++;
                            @endphp
                        </td>
                        <td class="hidden">{{ $hocvien->MaHocVien }}</td>
                        <td class="hidden">{{ $lop->MaLop }}</td>
                        <td class="hidden">{{ $MaBangDiemDanh }}</td>
                        <td>{{ $hocvien->HoTen  }}</td>
                        <td>{{ str_replace(' 00:00:00', '',date("d/m/Y", strtotime( $hocvien->NgaySinh))) }}</td>
                        <td>{{ $hocvien->Phai }}</td>
                        <td>{{ $hocvien->CapDai }}</td>
                        @php
                            if($hocvien->TrangThai == 0 )
                            {
                                echo "<td><input type=\"checkbox\" data-toggle=\"toggle\"></td>";
                            }else{
                                echo "<td><input type=\"checkbox\" checked data-toggle=\"toggle\"></td>";
                            }
                        @endphp
                        
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
    $(document).ready(function(){
        $('tr').change(function(){
            var MaHocVien = $(this).find('td:nth-child(2)').html();
            var MaLop = $(this).find('td:nth-child(3)').html();
            var MaBangDiemDanh = $(this).find('td:nth-child(4)').html();
            var CSRF_TOKEN = $('#_token').val();
            //console.log(CSRF_TOKEN );
            $.ajax({ 
                url: "diem-danh",
                method : "POST",
                cache : false,
                data : {
                    _token: CSRF_TOKEN,
                    MaHocVien: MaHocVien,
                    MaBangDiemDanh: MaBangDiemDanh
                },
                success : function(data){
                    //console.log(data);
                }
            });
        });
    });
</script>
@stop