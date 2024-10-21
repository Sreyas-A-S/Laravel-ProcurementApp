<!DOCTYPE html><html lang="en" dir="ltr" data-bs-theme="auto"><head>

    <script src="{{ asset('pensio/assets/js/color-modes.js') }}"></script>

	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('pensio/assets/logo/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('pensio/assets/logo/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('pensio/assets/logo/favicon-16x16.png') }}">
	<link rel="icon" type="image/x-icon" href="{{ asset('pensio/assets/logo/favicon.ico') }}">
	<link rel="manifest" href="./assets/logo/site.webmanifest">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('pensio/assets/libraries/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('pensio/assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pensio/assets/css/style.css') }}">

    <!--Datatable cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</head>
<body>
	

   



	<!-- header top -->
 	<header class="position-absolute z-3 mt-3 w-100" data-bs-theme="dark">
	    <nav class="navbar navbar-expand-xl" aria-label="Offcanvas navbar large">
	        <div class="container py-1">
	         
	        </div>
	    </nav>
	</header>

    	<!-- header body -->
	<div class="overflow-hidden py-5 py-xl-5 position-relative rounded-bottom-3 rounded-sm-4 rounded-xl-5 m-0 m-sm-2 m-xl-3 shadow">
	   

       <div class="position-absolute z-n1 top-0 h-100 w-100 bg-dark" style="opacity: 0.85; mix-blend-mode: multiply; filter: contrast(1.15) brightness(0.85);">
    </div>

    <div class="position-absolute z-0 top-0 h-100 w-100">
        <div class="container h-100 d-flex align-items-center">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="m-0 mt-2 text-white tracking-tight text-3xl fw-bold" data-aos-delay="0" data-aos="fade" data-aos-duration="3000">
                    Pricing
                </h1>
                
            </div>
        </div>
    </div>
</div>

    
    <!-- Main Content Area -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
	<footer class="overflow-hidden py-6 py-sm-7 py-xl-8 bg-body-tertiary rounded-top-3 rounded-sm-4 rounded-xl-5 m-0 m-sm-2 m-xl-3 shadow">
		<div class="container">
			<div class="row gy-5 g-sm-5">
				
				

					
			</div>

			<hr class="mt-6 mb-0 text-body-emphasis opacity-10">

			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="order-last order-md-first mt-5 text-body-secondary leading-6 text-sm">
					© 
					<span class="current-year"></span> 
					ProcurementApp
				</div>

			
			</div>
		</div>
	</footer>

    <script src="{{ asset('pensio/assets/libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('pensio/assets/libraries/aos/aos.js') }}"></script>
	<script src="{{ asset('pensio/assets/js/scripts.js') }}"></script>
</body>
</html>