@extends('layouts.user')
<style>
    ul{
        list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
    }

  li {

    float: left;
    margin-right: 10px;
    margin-top: 10px;
  }

  li a {
  display: block;
  color: white;
  text-align: center;
  padding: 5px 7px;
  text-decoration: none;
  background-color: #3d55b6;
  border-radius: 15%;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #08548f;
  color: white;
}



</style>
@section('contents')
    <div class="container-fluid">

        <!-- start page title -->
        <!--<div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>-->
        <!-- end page title -->


       <!-- <div class="row">
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Balance</h5>
                        <div class="flex text-green-500  px-2 py-1 rounded-full hover:scale-110 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M15.22 6.268a.75.75 0 01.968-.432l5.942 2.28a.75.75 0 01.431.97l-2.28 5.941a.75.75 0 11-1.4-.537l1.63-4.251-1.086.483a11.2 11.2 0 00-5.45 5.174.75.75 0 01-1.199.19L9 12.31l-6.22 6.22a.75.75 0 11-1.06-1.06l6.75-6.75a.75.75 0 011.06 0l3.606 3.605a12.694 12.694 0 015.68-4.973l1.086-.484-4.251-1.631a.75.75 0 01-.432-.97z"
                                    clip-rule="evenodd" />
                            </svg>
                            @if ($percentage_deposit_increase > 0)
                                <span>+ {{ round($percentage_deposit_increase, 2) }}%</span>
                            @else
                                <span>+0%</span>
                            @endif

                        </div>
                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center space-x-2 font-mono">
                                <div class=" text-blue-500 rounded-full p-2 w-8 h-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4">
                                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                                        <path fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                                    </svg>
                                </div>

                                <h2>
                                    <font color="white">{{ formatAmount(user()->balance) }}</font>
                                </h2>
                            </div>
                            <div class="text-xs font-mono" style="color: #ffffff;">
                                +{{ formatAmount($todays_deposits) }} today
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Withdrawals</h5>
                        <br />

                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center space-x-2 font-mono">
                                <div class=" text-blue-500 rounded-full p-2 w-8 h-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4">
                                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                                        <path fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                                    </svg>
                                </div>

                                <h2>
                                    <font color="white">{{ formatAmount($total_withdrawals) }}</font>
                                </h2>
                            </div>
                            <div class="text-xs font-mono" style="color: #ffffff;">

                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Pending Withdrawals</h5>
                        <br />

                        <div class="w-full flex items-center justify-between">
                            <div class="flex items-center space-x-2 font-mono">
                                <div class=" text-blue-500 rounded-full p-2 w-8 h-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-4 h-4">
                                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                                        <path fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
                                    </svg>
                                </div>

                                <h2>
                                    <font color="white">{{ formatAmount($pending_withdrawals) }}</font>
                                </h2>
                            </div>
                            <div class="text-xs font-mono" style="color: #ffffff;">

                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>-->
        <div class="row content">


            <div class="col-sm-12">
                <div class="card my-4" style="background-color:#fff; color:#111010">
                    <!--<h5 class="card-header bg-primary text-white">Dashboard</h5>-->
                    <div class="card-body">

                        <!-- Header starts here -->

                        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                     LOGO


                   <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                        <i class="fa fa-fw fa-bars" aria-hidden="true"></i>
                </button>

                </div>

                <div class="d-flex">

                    <a href="{{route('home')}}"><img width="150px" src="{{ asset('assets/images/' . site('logo_rec')) }}" alt="Header Avatar"></a>

                </div>
            </div>
        </header>

        <!-- header ends here -->


        <div class="vertical-menu">

             LOGO
            <div class="navbar-brand-box px-10 py-2 mt-2">
                <a href="{{route('home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/' . site('logo_square')) }}" alt="" width="42">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/' . site('logo_square')) }}" alt="" width="40">
                    </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/' . site('logo_square')) }}" alt="" height="42">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/' . site('logo_square')) }}" alt="" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars" aria-hidden="true"></i>
            </button>

            <div data-simplebar="init" class="sidebar-menu-scroll">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">

                                 Sidemenu
                                    <div id="sidebar-menu">
                                         Left Menu Start
                                        <ul class="metismenu list-unstyled" id="side-menu">
                                            <li class="menu-title">Menu</li>

                                            <li>
                                                <a href="{{ route('user.dashboard') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.dashboard')) ts-gray-1 @endif">
                                                    <i class="fas fa-home" aria-hidden="true"></i>
                                                    <span>Dashboard</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('user.bots.index') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.bots.index')) ts-gray-1 @endif">
                                                    <i class="fas fa-upload" aria-hidden="true"></i>
                                                    <span>Make a Deposit</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('user.bots.list') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.bots.list')) ts-gray-1 @endif">
                                                    <i class="fas fa-list-ol" aria-hidden="true"></i>
                                                    <span>Deposit List</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('user.withdrawals.index') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.withdrawals.index')) ts-gray-1 @endif">
                                                    <i class="fas fa-download" aria-hidden="true"></i>
                                                    <span>Withdraw</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="javascript: void(0);">
                                                    <i class="fas fa-history" aria-hidden="true"></i>
                                                    <span>History</span>
                                                </a>
                                                <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                    <li><a href="{{ route('user.deposits.history') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.bots.history')) ts-gray-1 @endif">Deposits History</a></li>
                                                    <li><a href="{{ route('user.bots.earnings') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.bots.earnings')) ts-gray-1 @endif">Earnings History</a></li>
                                                    <li><a href="{{ route('user.withdrawals.history') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.withdrawals.history')) ts-gray-1 @endif">Withdrawal History</a></li>
                                                </ul>
                                            </li>

                                            <li>
                                                <a href="{{ route('user.profile.edit') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.profile.edit')) ts-gray-1 @endif">
                                                    <i class="fas fa-id-badge" aria-hidden="true"></i>
                                                    <span>Edit Profile</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('user.security.edit') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.security.edit')) ts-gray-1 @endif">
                                                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                                                    <span>Security</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('user.referrals') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.referrals')) ts-gray-1 @endif">
                                                    <i class="fas fa-network-wired" aria-hidden="true"></i>
                                                    <span>Referrals</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a href="{{ route('user.referralslink.linkindex') }}" class="hover:text-blue-700 hover:scale-110 transition-all @if (request()->routeIs('user.referralslink.linkindex')) ts-gray-1 @endif">
                                                    <i class="fas fa-bullhorn" aria-hidden="true"></i>
                                                    <span>Promotional Tools</span>
                                                </a>

                                            </li>

                                            <li>
                                                <a role="button"
                                    class="hover:text-blue-700 logout">
                                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                    <span>Logout</span>
                                                </a>

                                            </li>
                                            <li id="google_translate_element"></li>

                                        </ul>
                                    </div>
                                     Sidebar
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;">
                    </div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="transform: translate3d(0px, 0px, 0px); display: none; height: 465px;"></div>
                </div>
            </div>
        </div>



                        <div class="row">
                            <div class="col-md-3 col-sm-3" style="padding-left: 20px">
                                <h2><font color="#111010" size="4"><b>Hello, {{ user()->name }}</b><br />({{ user()->email }})</font></h2>
                                <br />
                                <select class="form-control form-control-lg">
                                    <option>Kringle</option>
                                    <option>TBC</option>
                                    <option>USD</option>
                                </select>


                                </div><div class="col-md-3">
                                </div>
                            <div class="col-md-6 py-4">
                                <!--Navigation menu-->

                                    <ul>
                                        <li><a href=""><i class="fas fa-download" aria-hidden="true"></i>
                                            <span>Recover</span></a></li>
                                        <li><a href=""><i class="fas fa-upload" aria-hidden="true"></i>
                                            <span>Swap</span></a></li>
                                        <li><a href=""><i class="fas fa-bullhorn" aria-hidden="true"></i>
                                            <span>Referrals</span></a></li>
                                        <li><a href=""><i class="fa fa-search" aria-hidden="true"></i>
                                            <span>Explorer</span></a></li>
                                        <li><a href=""><i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                                            <span>Logout</span></a></li>


                                    </ul>


                            </div>




                        </div>
                        <div class="row mt-12">
                            <div class="col-md-12 text-center">
                                <p><font size="5">Balance {{ user()->balance }} TBC</font></p>
                                <br />
                                <p>qrcode here</p><br />
                                <p style="background-color:#cac8c8; color: #1d1a1ad3; padding: 2px;"><font size="5">Wallet Address</font></p>
                                </div>

                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        var profits = {!! json_encode($profits) !!};
        var profitInt = profits.map(value => parseFloat((value * 1).toFixed(2)));

        // var profitPercentages = {!! json_encode($profit_percentages) !!};
        // var profitPercentagesInt = profitPercentages.map(value => parseFloat((value * 1).toFixed(2)));





        Highcharts.chart('profitChart', {
            chart: {
                type: 'area',
                backgroundColor: '#1f1a23', // Set background color here

                plotBackgroundColor: '#1f1a23',
                plotBorderWidth: 1,
                plotBorderColor: 'rgb(168, 85, 247)',

                borderWidth: 0,
                borderColor: 'rgb(168, 85, 247)',
                borderRadius: 10,
                style: {
                    fontFamily: 'Arial, sans-serif',
                    fontSize: '14px',
                    color: '#fff'
                }
            },
            accessibility: {
                point: {
                    descriptionFormatter: function(p) {
                        return p.series.name + ', ' + p.category + ', ' + p.y + '{{ site('currency') }}.';
                    }
                }
            },
            title: {
                text: '<span style="color: white">7 Days PNL</span>'
            },
            subtitle: {
                text: 'Cummulative PNL Chart history for the last 7 days'
            },
            xAxis: {
                categories: {!! json_encode($days) !!},
                crosshair: true
            },
            yAxis: {

                title: {
                    text: '<span style="color: white">PNL ({{ site('currency') }})</span>'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<span style="font-size: 10px">' + this.x +
                        ' PNL</span><br/> {{ site('currency') }} ' +
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'PNL',
                data: profitInt
            }]
        });
    </script>
@endsection
