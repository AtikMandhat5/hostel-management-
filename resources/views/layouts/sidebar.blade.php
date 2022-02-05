<!-- 1stdiv footer -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

        <!-- begin:: Header Menu -->

        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>

        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                <ul class="kt-menu__nav ">



                </ul>

            </div>

        </div>

        <!-- end:: Header Menu -->



        <!-- begin:: Header Topbar -->

        <div class="kt-header__topbar">



            <!--begin: User Bar -->

            <div class="kt-header__topbar-item kt-header__topbar-item--user">

                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">

                    <div class="kt-header__topbar-user">

                        <span class="kt-header__topbar-welcome kt-hidden-mobile">{{Session::get('login_name')}} </span>

                        <span class="kt-header__topbar-username kt-hidden-mobile"></span>

                        <img class="kt-hidden" alt="Pic" src="{{ asset('/assets/media/users/300_25.jpg') }}" />



                        <!-- use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it)  -->

                        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
                            {{Session::get('login_name')[0]}}</span>

                    </div>

                </div>

                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">



                    <!--begin: Head -->

                    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">

                        <div class="kt-user-card__avatar">

                            <!-- <img class="kt-hidden" alt="Pic" src="{{ asset('assets/imge/user.jpg') }}" /> -->

                            <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"> -->
                                <!-- <a href="dashbord"> -->
                                 <!--    <img alt="Logo" src="{{ asset('/assets/interview.png') }}" style="height: 45px; width: 60px;" /> -->
                             <!-- </a> -->

                         </span>

                     </div>

                     <div class="kt-user-card__name">

                     	
                        {{Session::get('login_name')}}
                        {{Session::get('login_email')}}<br/>
                        {{Session::get('login_enrollment')}}
                    </div>

                    <div class="kt-user-card__badge">

                        <!-- <span class="btn btn-success btn-sm btn-bold btn-font-md">Update Profile</span> -->
                            <br>
                                
                                <!-- <a href="#"class="btn btn-success btn-sm btn-bold btn-font-md">My Profile</a><br><br> -->
                                <a href="{{ route('logout')}}"  class="btn btn-success btn-sm btn-bold btn-font-md">Sign Out</a>

                    </div>

        </div>
                       <!--end: Head -->
                        <!--begin: Navigation -->
                        <!--end: Navigation -->

                    </div>

                </div>



                <!--end: User Bar -->

            </div>



            <!-- end:: Header Topbar -->

        </div>