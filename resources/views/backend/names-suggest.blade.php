@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
$selectedStatus = isset($_GET['status']) ? $_GET['status'] : 'suggested';
$suggest_st = array(
    'suggested' => 'แนะนำเข้ามา',
    'added' => 'เพิ่มเข้าคลังรายชื่อ',
    'worked' => 'เข้าตารางงาน',
    'created' => 'สร้างลายเซ็นต์แล้ว',
    'deleted' => 'ลบแล้ว',
);

// echo "<pre>";
// print_r($page_name);
// echo "</pre>";
?>
    <div class="intro-y mt-5 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    </div>

    <div class="lg:flex intro-y mt-5 mb-5">

        <div class="relative">
            <input type="text" name="keyword" id="keyword" class="form-control py-3 px-4 w-full lg:w-64 box pr-10" placeholder="" value="{{ request()->input('keyword') }}" onkeypress="handleEnter(event)" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0 text-slate-500" data-lucide="search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg> 
        </div>
        
        
    


        <select id="status" name="status" onchange="applyFilters()" class="form-select py-3 px-4 box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
            @foreach($suggest_st as $keysuggest_st => $suggeststatus)
                <option value="{{ $keysuggest_st }}" {{ $keysuggest_st == $selectedStatus ? 'selected' : '' }}>
                    {{ $suggeststatus }}
                </option>
            @endforeach
        </select>







        


    </div>
    <!-- <div id="fetchCustomerss"></div> -->

    @if(isset($query) && count($query)>0)
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="text-center whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">name_th</th>
                    <th class="whitespace-nowrap">name_en</th>
                    <th class="whitespace-nowrap">email</th>
                    <th class="whitespace-nowrap">phone</th>
                    <th class="whitespace-nowrap">status</th>
                    <th class="text-center whitespace-nowrap"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($query as $keyres => $res)
                @php
                $profile_img = ($res->image)?asset($res->image):asset('frontend/images/avatar.jpeg');
                @endphp
                    <tr class="intro-x">
                        <td class="text-center">{{(($query->currentPage()-1)*24)+$keyres+1}}</td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->name_th}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->name_en}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->email}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$res->phone}}</div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap">{{$suggest_st[$res->status]}}</div>
                        </td>

                        <td class="table-report__action w-56">

                            @if($res->status == 'suggested')
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-success mr-3" href="#" onclick="approveSuggestion({{ $res->id }})">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> อนุมัติ
                                </a>
                                <a class="flex items-center text-danger" href="#" onclick="deleteSuggestion({{ $res->id }})">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> ลบ
                                </a>
                            </div>
                            @endif


                            
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <div class="d-flex">
    {!! $query->appends(request()->input())->links() !!}
    </div>
    @endif

    





      



@endsection

@section('script')
<script>

function approveSuggestion(id) {
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: 'คุณต้องการอนุมัติการแนะนำนี้หรือไม่?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('BN_names_suggest_action') }}';

            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;
            form.appendChild(inputId);

            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        }
    });
}













    function applyFilters() {
        var status = document.getElementById('status').value;
        var keyword = document.getElementById('keyword').value;
        var newUrl = `{{ route('BN_names_suggest') }}?status=${status}&keyword=${keyword}`;
        window.location.href = newUrl;
    }
    function handleEnter(event) {
        if (event.key === 'Enter') {
            applyFilters();
        }
    }

    function deleteSuggestion(id) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/backend/names/suggest-delete/' + id;
            }
        });
    }
    

</script>


@endsection