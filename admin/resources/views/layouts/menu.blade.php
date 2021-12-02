<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 22:26:55
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-01 23:09:44
 */
?>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                 <li class="nav-item mt-3">ADMIN</li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="" class="btn btn-sm btn-danger">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    <li> <a href="{{ route('home') }}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                    <li> <a href="{{ route('visitor') }}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                    <li> <a href="{{ route('service') }}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Services</span></a></li>
                    <li> <a href="{{ route('courses') }}" ><span> <i class="fas fa-book-open"></i> </span><span class="hide-menu">Courses</span></a></li>
                </ul>
            </nav>
        </div>
    </aside>
<div class="page-wrapper">
