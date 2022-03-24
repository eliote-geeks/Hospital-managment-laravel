    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="admin/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item  ">
                            <a href="{{ url('add_doctor_view') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Add doctor</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ url('showappointment') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Appoitment</span>
                            </a>
                        </li>                      

                        <li class="sidebar-item  ">
                            <a href="{{ url('showdoctor') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>All Doctors</span>
                            </a>
                        </li>                                                

                        <li class="sidebar-item  ">
                            <a href="{{ url('showuser') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Manage Users</span>
                            </a>
                        </li>   

                        <li class="sidebar-item  ">
                            <a href="{{ url('makenews') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Make news</span>
                            </a>
                        </li>   
                        <li class="sidebar-item  ">
                            <a href="{{ url('allnews') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>All news</span>
                            </a>
                        </li>   

                        <li class="sidebar-item  ">
                            <a href="{{ url('message') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Messages</span>
                            </a>
                        </li>                                                                                                                        

                        <li class="sidebar-item  ">
                            <a href="{{ url('addimage') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Add images</span>
                            </a>
                        </li>              

                        <li class="sidebar-item  ">
                            <a href="{{ url('imageview') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>images View</span>
                            </a>
                        </li>                                                                                                                                                                        

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>