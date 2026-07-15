		<!-- Online scrips for css, jquery and js -->
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap.min.css">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
       	<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap.min.js"></script>
        


        <!-- Online scrips for css, jquery and js -->
       
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">

        <!-- jQuery -->
        <script src="assets/jquery/jquery-1.12.4.min.js"></script>

        <!-- Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- DataTables -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
       	<script src="assets/js/dataTables.bootstrap.min.js"></script>



        
    
        
            
    
        <style media="screen">
            /* Set black background color, white text and some padding of a footer*/
            .navbar{
                position: sticky;
                top: 0;
                background: black;
                z-index: 1000;

            }
            footer {
                background-color: black;
                color: white;
                padding: 15px;
            }
            .responsive_pics{
                width: 100%;
                height: auto;
            }
            #error_message{
                background: #F3A6A6;
            }
            #success_message{
                background: #CCF5CC;
            }
            .ajax_response {
                padding: 10px 20px;
                border: 0;
                display: inline-block;
                margin-top: 20px;
                cursor: pointer;
                display:none;
                color:#555;
            }
            .table-hover tbody tr:hover{
                background-color: #798e92;
                }
            thead{background-color: #8baeb8;
                color: #fff
            }
            .dropdown-menu{
                padding:4px;
                min-width: 4px;
            }
            .dropdown-menu > li {
                padding: 0;
            }
            .dropdown-menu > li > button,
            .dropdown-menu > li > a {
                padding: 4px 12px;
                width: 100%;
                text-align: left;
                border: none;
                background: none;
            }
            .dataTables_wrapper .dataTables_info{
                float:left;
            }

            .dataTables_wrapper .dataTables_paginate{
                float:right;
            }

            .dataTables_wrapper .dataTables_paginate ul.pagination{
                margin:0;
            }

            .dataTables_wrapper:after{
                content:"";
                display:block;
                clear:both;
            }


            #page-loader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #ffffff;
                z-index: 9999;

                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .spinner {
                width: 50px;
                height: 50px;
                border: 5px solid #e9ecef;
                border-top: 5px solid #0d6efd;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }

            #page-loader p {
                margin-top: 15px;
                color: #555;
                font-size: 16px;
            }

            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>