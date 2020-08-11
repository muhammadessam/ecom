@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        <table id="style-1" class="table style-2  table-hover">
                            <thead>
                            <tr>
                                <th class="checkbox-column"> Record Id </th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="checkbox-column"> 1 </td>
                                <td>Jane</td>
                                <td>Lamb</td>
                                <td>johndoe@yahoo.com</td>
                                <td>555-555-5555</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 2 </td>
                                <td>Linda</td>
                                <td>Nelson</td>
                                <td>linda@gmail.com</td>
                                <td>555-555-6666</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 3 </td>
                                <td>Kelly</td>
                                <td>Young</td>
                                <td>kelly@live.com</td>
                                <td>777-555-5555</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 4 </td>
                                <td>Vincent</td>
                                <td>Carpenter</td>
                                <td>vinnyc@outlook.com</td>
                                <td>555-666-5555</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 5 </td>
                                <td>Lila</td>
                                <td>Perry</td>
                                <td>lila@adobe.com</td>
                                <td>444-444-4444</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 6 </td>
                                <td>Traci</td>
                                <td>Lopez</td>
                                <td>traci@gmail.com</td>
                                <td>111-111-1111</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            <tr>
                                <td class="checkbox-column"> 7 </td>
                                <td>Nia</td>
                                <td>Hillyer</td>
                                <td>niaHill@yahoo.com</td>
                                <td>111-666-1111</td>
                                <td class="text-center">
                                    <span><img src="assets/img/90x90.jpg" class="rounded-circle profile-img" alt="avatar"></span>
                                </td>
                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                            </tr>
                            </tbody>
                        </table>                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--  END SIDEBAR  -->
@section('scripts')
    <script>
        c1 = $('#style-1').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });

        multiCheck(c1);

    </script>
@endsection
