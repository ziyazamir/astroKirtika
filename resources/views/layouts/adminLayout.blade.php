<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path=" public/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Panel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/Mini-Logo.png" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css ') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href=" {{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css ') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    {{--  --}}


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>


    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>


    <!--    <script src="public/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="public/vendor/datatables/dataTables.bootstrap4.min.js"></script>-->
    <link src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    </link>
    <link src="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    </link>
    <link src="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    </link>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo" style="height: 100px;">
                    {{-- <a href="dashboard2" class="app-brand-link"> --}}
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('AstroKirtika/AstroKirtika.png') }}" alt="" srcset=""
                            width="auto" height="100">
                    </span>
                    {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin Panel</span> --}}
                    {{-- </a> --}}

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <li class="menu-item " id="home">
                        <a href="{{ url('/home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics"> User</div>
                        </a>
                    </li>
                    <li class="menu-item " id="astrologer">
                        <a href="{{ url('/astrologer') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics"> Astrologer</div>
                        </a>
                    </li>
                    <li class="menu-item " id="featuredAstrologer">
                        <a href="{{ url('/featuredAstrologer') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Featured Astrologers</div>
                        </a>
                    </li>

                    <li class="menu-item " id="banner">
                        <a href="{{ url('/banner') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics"> Banner</div>
                        </a>
                    </li>
                    <li class="menu-item " id="place">
                        <a href="{{ url('place') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics"> Place</div>
                        </a>
                    </li>
                    <li class="menu-item " id="chamber">
                        <a href="{{ url('chamber') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Chamber</div>
                        </a>
                    </li>
                    <li class="menu-item " id="chamber">
                        <a href="{{ url('offers') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Special offers</div>
                        </a>
                    </li>

                    <li class="menu-item " id="chamber">
                        <a href="{{ url('notification') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Notification</div>
                        </a>
                    </li>
                    <li class="menu-item " id="chamber">
                        <a href="{{ url('membership') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Memberships</div>
                        </a>
                    </li>
                    <li class="menu-item " id="chamber">
                        <a href="{{ url('ratings') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Rating and Review</div>
                        </a>
                    </li>
                    {{-- <li class="menu-item " id="Awards">
                        <a href="change-award-info" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-award"></i>
                            <div data-i18n="Analytics"> Awards</div>
                        </a>
                    </li> --}}


                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin Panel</span>
                    </li>

                    <li class="menu-item" id="Awards1">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Admin Panel</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item" id="Awards1_1">
                                <a href="state-award-report" class="menu-link">
                                    <div data-i18n="Without menu">Report</div>
                                </a>
                            </li>

                            <li class="menu-item" id="Awards1_2">
                                <a href="state-award-summary-report" class="menu-link">
                                    <div data-i18n="Without menu">Summary Report</div>
                                </a>
                            </li>

                            {{-- <li class="menu-item" id="Awards1_3">
                              <a href="state-award-districtwise-summary-report" class="menu-link">
                                  <div data-i18n="Without menu">Districtwise Summary Report</div>
                              </a>
                          </li> --}}

                            {{-- <li class="menu-item" id="Awards1_4">
                              <a href="state-award-districtwise-gender-summary-report" class="menu-link">
                                  <div data-i18n="Without menu">Districtwise Gender Summary Report</div>
                              </a>
                          </li> --}}

                        </ul>
                    </li>



                    <li class="menu-item">
                        {{-- <form action="{{route('logout')}}" method="POST"> --}}
                        <a href="logout" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-log-out"></i>
                            <div data-i18n="Boxicons">Logout</div>

                        </a>
                        {{-- </form> --}}
                    </li>

                    <!-- Forms & Tables -->


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">

                                    {{ Auth::User()->name }}

                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">

                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::User()->name }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <!--<li>
                      <a class="dropdown-item" href="change-password">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Change password</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>-->
                                    <li>
                                        <a class="dropdown-item" href="logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row">

                            @yield('content')


                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        {{-- <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                कॉपीराइट ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , यशवंतराव चव्हाण केंद्र. सर्व हक्क राखीव. डिझाइन आणि विकसित स्टर्लिंग सिस्टम्स प्रा.
                                लि. द्वारे

                            </div>

                        </div> --}}
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let currUrl = window.location.href;
            $(".menu-link").each(function(index, item) {
                console.log($(item).attr('href'));
                let val = $(item).attr('href');
                if (val == currUrl) {
                    $(item).parent().addClass('active');
                    return;
                }
            })

        })
    </script>

</body>

</html>
