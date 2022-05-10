<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="https://rubick.left4code.com/dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}" />
    @stack('css')

    @livewireStyles
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">

    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="{{ route('dashboard') }}" class="flex mr-auto text-white text-xl">
                {{-- <span>{{ str()->upper(env('APP_NAME')) }}</span> --}}
                <img src="{{ asset('img/light logo.webp') }}" alt="logo" class="w-12 h-12">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler">
                <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
            </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 hidden">
            {{-- Dashboard--}}
            <li>
                <a href="{{ route('dashboard') }}"
                    class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="menu__title">
                        Dashboard

                    </div>
                </a>

            </li>
            {{-- File Manager --}}
            @can('file management')
            <li>
                <a href="{{ route('filemanager') }}"
                    class="menu {{ request()->routeIs('filemanager') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-hard-drive">
                            <line x1="22" y1="12" x2="2" y2="12"></line>
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                            </path>
                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="menu__title"> File Manager </div>
                </a>
            </li>
            @endcan
            @canany(['add banner', 'trash banner', 'edit banner'])

            {{-- Banner --}}
            <li>
                <a href="javascript:;" class="menu {{ request()->routeIs('banner*') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="menu__title">
                        Banner
                        <div
                            class="menu__sub-icon transform  {{ request()->routeIs('banner*') ? 'rotate-180' : 'rotate-0' }}">
                            <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
                <ul class=" {{ request()->routeIs('banner*') ? 'menu__sub-open' : '' }}">
                    @canany(['add banner', 'edit banner', 'delete banner'])

                    <li>
                        <a href="{{ route('banner') }}" class="menu">
                            <div class="menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="menu__title">
                                Banners
                            </div>
                        </a>
                    </li>
                    @endcan
                    @can('trash banner')

                    <li>
                        <a href="{{ route('banner.trash') }}" class="menu">
                            <div class="menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="menu__title">
                                Trash Banners
                            </div>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            {{-- Department --}}
            @can('department management')

            <li>
                <a href="{{ route('department') }}"
                    class="menu {{ request()->routeIs('department') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-hard-drive">
                            <line x1="22" y1="12" x2="2" y2="12"></line>
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                            </path>
                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="menu__title"> Departments </div>
                </a>
            </li>
            @endcan
            @canany(['add course','edit course'])
            {{-- Courses --}}
            <li>
                <a href="javascript:;" class="menu {{ request()->routeIs('courses*') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="layout" data-lucide="layout" class="lucide lucide-layout">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <div class="menu__title">
                        Courses
                        <div
                            class="menu__sub-icon transform  {{ request()->routeIs('courses*') ? 'rotate-180' : 'rotate-0' }}">
                            <i data-lucide="chevron-down"></i>
                        </div>
                    </div>
                </a>
                <ul class=" {{ request()->routeIs('courses*') ? 'menu__sub-open' : '' }}">

                    <li>
                        <a href="{{ route('courses') }}" class="menu">
                            <div class="menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="menu__title">
                                Add Courses
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('courses.index') }}" class="menu">
                            <div class="menu__icon">
                                <i data-lucide="activity"></i>
                            </div>
                            <div class="menu__title">
                                All Courses
                            </div>
                        </a>
                    </li>


                </ul>
            </li>
            @endcan
            {{-- success stories --}}
            @can('manage story')

            <li>
                <a href="{{ route('success.story') }}"
                    class="menu {{ request()->routeIs('success.story') ? 'menu--active' : '' }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-hard-drive">
                            <line x1="22" y1="12" x2="2" y2="12"></line>
                            <path
                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                            </path>
                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="menu__title"> Success Stories </div>
                </a>
            </li>
            @endcan
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="{{ route('dashboard') }}" class="intro-x flex items-center pl-5  md:pl-0 pt-4">
                <img src="{{ asset('img/light logo.webp') }}" alt="logo" class="w-10 h-10"> <span
                    class="hidden xl:block text-white text-lg ml-3">
                    {{ str()->upper(env('APP_NAME')) }}
                </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                {{-- dashboard --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="side-menu  {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <i data-lucide="home"></i>
                        </div>
                        <div class="side-menu__title">
                            Dashboard
                        </div>
                    </a>
                </li>
                {{-- User management --}}
                @can('user management')

                <li>
                    <a href="javascript:;"
                        class="side-menu {{ request()->routeIs('user*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-credit-card">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Manage Users
                            <div
                                class="side-menu__sub-icon transform  {{ request()->routeIs('user*') ? 'rotate-180' : 'rotate-0' }}">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class=" {{ request()->routeIs('user*') ? 'side-menu__sub-open' : '' }}">

                        <li>
                            <a href="{{ route('banner') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Add Users
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('banner') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Role Managements
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('banner.trash') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    All Users
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan
                {{-- file manager --}}
                @can('file management')
                <li>
                    <a href="{{ route('filemanager') }}"
                        class="side-menu {{ request()->routeIs('filemanager') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive">
                                <line x1="22" y1="12" x2="2" y2="12"></line>
                                <path
                                    d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                </path>
                                <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                <line x1="10" y1="16" x2="10.01" y2="16"></line>
                            </svg> </div>
                        <div class="side-menu__title"> File Manager </div>
                    </a>
                </li>
                @endcan
                @canany(['add banner', 'trash banner', 'edit banner'])
                {{-- banner --}}
                <li>
                    <a href="javascript:;"
                        class="side-menu {{ request()->routeIs('banner*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-credit-card">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Banner
                            <div
                                class="side-menu__sub-icon transform  {{ request()->routeIs('banner*') ? 'rotate-180' : 'rotate-0' }}">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class=" {{ request()->routeIs('banner*') ? 'side-menu__sub-open' : '' }}">

                        <li>
                            <a href="{{ route('banner') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Banners
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('banner.trash') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Trash Banners
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan
                {{-- Department --}}
                @can('department management')
                <li>
                    <a href="{{ route('department') }}"
                        class="side-menu {{ request()->routeIs('department') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="slack" data-lucide="slack"
                                class="lucide lucide-slack block mx-auto">
                                <rect x="13" y="2" width="3" height="8" rx="1.5"></rect>
                                <path d="M19 8.5V10h1.5A1.5 1.5 0 1019 8.5"></path>
                                <rect x="8" y="14" width="3" height="8" rx="1.5"></rect>
                                <path d="M5 15.5V14H3.5A1.5 1.5 0 105 15.5"></path>
                                <rect x="14" y="13" width="8" height="3" rx="1.5"></rect>
                                <path d="M15.5 19H14v1.5a1.5 1.5 0 101.5-1.5"></path>
                                <rect x="2" y="8" width="8" height="3" rx="1.5"></rect>
                                <path d="M8.5 5H10V3.5A1.5 1.5 0 108.5 5"></path>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Departments </div>
                    </a>
                </li>
                @endcan
                {{-- Courses --}}
                @canany(['add course','edit course'])
                <li>
                    <a href="javascript:;"
                        class="side-menu {{ request()->routeIs('courses*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="layout" data-lucide="layout"
                                class="lucide lucide-layout">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="3" y1="9" x2="21" y2="9"></line>
                                <line x1="9" y1="21" x2="9" y2="9"></line>
                            </svg>
                        </div>
                        <div class="side-menu__title">
                            Courses
                            <div
                                class="side-menu__sub-icon transform  {{ request()->routeIs('courses*') ? 'rotate-180' : 'rotate-0' }}">
                                <i data-lucide="chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <ul class=" {{ request()->routeIs('courses*') ? 'side-menu__sub-open' : '' }}">
                        @can('add course')


                        <li>
                            <a href="{{ route('courses') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Add Course
                                </div>
                            </a>
                        </li>
                        @endcan
                        @can('edit course')
                        <li>
                            <a href="{{ route('courses.index') }}" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-lucide="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    All Courses
                                </div>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan
                @can('manage story')
                <li>
                    <a href="{{ route('success.story') }}"
                        class="side-menu {{ request()->routeIs('success.story') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="slack" data-lucide="slack"
                                class="lucide lucide-slack block mx-auto">
                                <rect x="13" y="2" width="3" height="8" rx="1.5"></rect>
                                <path d="M19 8.5V10h1.5A1.5 1.5 0 1019 8.5"></path>
                                <rect x="8" y="14" width="3" height="8" rx="1.5"></rect>
                                <path d="M5 15.5V14H3.5A1.5 1.5 0 105 15.5"></path>
                                <rect x="14" y="13" width="8" height="3" rx="1.5"></rect>
                                <path d="M15.5 19H14v1.5a1.5 1.5 0 101.5-1.5"></path>
                                <rect x="2" y="8" width="8" height="3" rx="1.5"></rect>
                                <path d="M8.5 5H10V3.5A1.5 1.5 0 108.5 5"></path>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Success Stories </div>
                    </a>
                </li>
                @endcan

            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">


                    </ol>
                </nav>
                <!-- END: Breadcrumb -->

                <!-- BEGIN: Notifications -->
                <div class="intro-x dropdown mr-auto sm:mr-6">
                    <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                        aria-expanded="false" data-tw-toggle="dropdown">
                        <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
                    </div>
                    <div class="notification-content pt-2 dropdown-menu">
                        <div class="notification-content__box dropdown-content">
                            <div class="notification-content__title">Notifications</div>
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="https://rubick.left4code.com/dist/images/profile-3.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Angelina Jolie</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text
                                        of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="https://rubick.left4code.com/dist/images/profile-9.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">06:05 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact
                                        that a reader will be distracted by the readable content of a page when looking
                                        at its layout. The point of using Lorem </div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="https://rubick.left4code.com/dist/images/profile-4.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Keira Knightley</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text
                                        of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="https://rubick.left4code.com/dist/images/profile-13.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">05:09 AM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text
                                        of the printing and typesetting industry. Lorem Ipsum has been the
                                        industry&#039;s standard dummy text ever since the 1500</div>
                                </div>
                            </div>
                            <div class="cursor-pointer relative flex items-center mt-5">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone - HTML Admin Template" class="rounded-full"
                                        src="https://rubick.left4code.com/dist/images/profile-14.jpg">
                                    <div
                                        class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600">
                                    </div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium truncate mr-5">Sylvester Stallone</a>
                                        <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-slate-500 mt-0.5">Contrary to popular belief, Lorem
                                        Ipsum is not simply random text. It has roots in a piece of classical Latin
                                        literature from 45 BC, making it over 20</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-12 h-12">
                    <div class="dropdown-toggle w-12 h-12 rounded-full overflow-hidden shadow-lg image-fit zoom-in"
                        role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" title="{{ Auth::user()->name }}">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ str()->ucfirst(Auth::user()->name) }}</div>
                                <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500 capitalize">
                                    {{ Auth::user()->getRoleNames()[0] }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
                                </x-jet-dropdown-link>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item hover:bg-white/5"
                                    onclick="event.preventDefault();document.querySelector('#logout').submit()">
                                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                                </a>
                                <form method="POST" id="logout" action="{{ route('logout') }}" x-data>
                                    @csrf


                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->

            {{-- main section here --}}
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            {{ $slot }}
            {{-- main section here --}}

        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    {{-- <div data-url="https://rubick.left4code.com/page/side-menu/dark/dashboard-overview-1"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
        <div class="dark-mode-switcher__toggle  border"></div>
    </div> --}}
    <!-- END: Dark Mode Switcher-->


    <!-- BEGIN: JS Assets-->

    @livewire('livewire-ui-modal')
    @stack('modals')
    @livewireScripts

    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    @stack('js')
    <!-- END: JS Assets-->

</body>

</html>