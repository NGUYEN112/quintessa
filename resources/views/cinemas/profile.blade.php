@extends('layouts.cinema-layout')

@section('content')
<div class="user-profile container-content">
    <article class="avatar-img">
        
    </article>
    <aside class="user-info">
        <div class="form-horizontal">
            <div class="header-title">
                <h3>Thông tin thành viên</h3>
            </div>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">Tên đầy đủ</label>
                <div class="col-md-7    ">
                    <input id="inputHorizontalSuccess"  type="text" placeholder="" class="form-control form-control-success" value="{{auth()->user()->name}}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label">Q-Point</label>
                <div class="col-md-7">
                    <input type="text" placeholder="" class="form-control form-control-success" value="{{auth()->user()->point}}" disabled>
                </div>
            </div>
            <ol class="myCinema_list">
                <div class="ticket-title">
                    <h4>Lịch sử mua vé</h4>
                </div>
                @foreach($tickets as $ticket)
                <li>
                    <div class="myCinema_box"><span class="thum"><img src="{{asset('/storage/'.$ticket->screening->film->image)}}" alt=""></span>
                        <dl class="myCimema_cont">
                            <dt class="Lang-LBL3016">Đặt vé</dt>
                            <dd>{{$ticket->screening->film->name}}</dd>
                            <dt class="Lang-LBL3016">Ngày chiếu</dt>
                            <dd>{{$ticket->screening->start_time}} / {{date('d-m-Y', strtotime($ticket->screening->film->release_date))}}</dd>
                            @php
                            $count = count($ticket['seat_id']);
                            @endphp
                            </dd>
                            <dt class="Lang-LBL0045">Tổng số tiền </dt>
                            <dd>{{$count * $ticket->total_price}}₫</dd>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
    </aside>
</div>

<script>
    window.onload = loadForm
    function loadForm() {
		var url = `{{route('cinema.avatarform')}}`;

		$.ajax({
			url: url,
			success: function(xml) {

				$('.avatar-img').html(xml);
			},
			error: function(error) {
				console.log("Xảy ra lỗi: " + error.message)
			}
		})
	}

    function changeAvatar() {
			const data = {
				_token: document.querySelector(`.change-avatar-form [name="_token"]`).value,
				avatar: document.querySelector(`.change-avatar-form [name="avatar"]`).value,
			}

			$.ajax({
				url: `/cinema/changeavatar`,
				type: 'POST',
				data: data,
				success: function() {
					// Close Modal

					// Reload List
					loadForm();
				},
				error: function() {
					alert("Edit Failed")
				}
			})
		};
</script>
@endsection